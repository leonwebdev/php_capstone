DROP DATABASE IF EXISTS capstone;

CREATE DATABASE capstone;

USE capstone;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255),
    `city` VARCHAR(255),
    `postal_code` CHAR(7),
    `province` VARCHAR(255),
    `country` VARCHAR(255),
    `phone` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(255),
    `is_admin` BOOL NOT NULL DEFAULT 0,
    `subscribe_to_newsletter` TINYINT NOT NULL DEFAULT 0,
    `deleted` BOOL NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `deleted` BOOL NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
    `id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `event` VARCHAR(255),
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `authorid` BIGINT NOT NULL,
    `summary` TEXT NULL,
    `content` LONGTEXT NULL DEFAULT NULL,
    `image` VARCHAR(255),
    `categoryid` BIGINT NOT NULL,
    `status` ENUM('draft', 'hidden', 'post') DEFAULT 'draft',
    `allow_comment` BOOL NOT NULL DEFAULT 1,
    `deleted` BOOL NOT NULL DEFAULT 0,
    `published_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `posts`
ADD CONSTRAINT `fk_post_user`
        FOREIGN KEY (`authorid`)
        REFERENCES `capstone`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;

ALTER TABLE `posts`
ADD CONSTRAINT `fk_post_category`
        FOREIGN KEY (`categoryid`)
        REFERENCES `capstone`.`categories` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `postid` BIGINT NOT NULL,
    `userid` BIGINT NOT NULL,
    `content` TEXT NULL DEFAULT NULL,
    `deleted` BOOL NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `comments`
ADD CONSTRAINT `fk_comment_post`
        FOREIGN KEY (`postid`)
        REFERENCES `capstone`.`posts` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;

ALTER TABLE `comments`
ADD CONSTRAINT `fk_comment_user`
        FOREIGN KEY (`userid`)
        REFERENCES `capstone`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;

INSERT INTO `users` (
    `first_name`,
    `last_name`,
    `street`,
    `city`,
    `postal_code`,
    `province`,
    `country`,
    `phone`,
    `email`,
    `password`,
    `is_admin`
    )
    VALUES
('Lihang','Yao','123 Good Street','Winnipeg','R3C 5W7','Manitoba','Canada','123-123-1234','admin@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG','1'),
('Chris','Brown','73 Nice Street','Ottawa','R3G 9W3','Ontario','Canada','125-521-1764','chris@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG','0'),
('Jack','Smith','68 Mary Ave','Calgary','D3E 7F5','Alberta','Canada','159-874-3258','jack@gardener.com','$2y$10$ZzSz5O1q/3Zit9njCr4LNOnYV6BDcbbWPWPrQcmc1mzp8R0EqwNwG','0');

INSERT INTO `categories` (`title`)
VALUES
('Event'),
('Favorite'),
('Photographs'),
('Digest'),
('Tips');

INSERT INTO `posts` (
    `title`,
    `authorid`,
    `summary`,
    `content`,
    `image`,
    `categoryid`,
    `status`
  )
VALUES
("A tip to plant roses","1","A good concise suggestion on how to plant your roses in spring.","content","1.jpg","5","post"),
("Some pictures of my garden","2","I took some photos of my lovely little garden this morning.","content","2.jpg","3","post"),
("Local event about planting","1","There will be a seasonal meeting event in Polo Park this weekend.","content","3.jpg","1","post"),
("Beautiful tulip farm scenery","1","I visited a gorgeous tulip farm to share a beautiful picture.","content","4.jpg","3","post"),
("How to fertilize your flowers","1","My friends told me some practical strategies on fertilization.","content","5.jpg","5","post"),
("Join the Plants Fair in July","2","Facinaty Co. will hold a Plants Fair this July in Winnipeg.","content","6.jpg","1","post"),
("A good book to share","1","Recently, I read a book about gardening which I found it quite interesting.","content","7.jpg","4","post"),
("I watched a youtube video","1","The person in this video owned a super large garden behind his house.","content","8.jpg","2","post"),
("My friend John sent me a nice picture","1","He took a vacation in Hawaii, there are some special local species.","content","9.jpg","2","post"),
("A monthly review on my flowers","1","In April, my flowers grew quit good and pictures for share.","content","10.jpg","3","post"),
("Some practical tactics on watering","2","Lots of people said they don't know how to water flowers.","content","11.jpg","5","post"),
("Nice flower pattern on dishes","1","Medieval people left precious antique for us to appreciate.","content","12.jpg","2","post"),
("Article to share for best sunlight","1","Acknowledgements you must pay attention to for optimal sunlight.","content","13.jpg","4","post"),
("Different colors from dawn to dusk","2","I found some species' color will change during the whole day.","content","14.jpg","2","post"),
("A brand new conference to attend","1","Ottawa government will hold a global conference about plants in August.","content","15.jpg","1","post"),
("Some plants can serve as cuisine","2","Do you know some plants are delicious enough to serve as food?","content","16.jpg","1","post"),
("Flowers can be used to dye cloth","1","I read a book recently about techniques to dye cloth with flowers.","content","17.jpg","4","post"),
("Three species to bloom the whole year","1","These species can bloom even during Christmas in Northern Hemisphere.","content","18.jpg","5","post"),
("Precious species only bloom at night","1","Very interesting species that they only bloom at night.","content","19.jpg","2","post"),
("Not only bees can pollen","1","Some other animals or insects also can.","content","20.jpg","4","post")
;

UPDATE `posts` SET `content` =
"<p>Pellesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis consequatur quibusdam!</p>
<p>Aliquam ac lacus nibh. Nullam a posuere turpis, vitae mollis velit. Etiam maximus vitae libero vel blandit. Nulla rutrum velit et augue egestas vestibulum. Proin condimentum maximus sollicilici tu din. Dsddlio veritatis sed nihil xcde ilao.</p>";

INSERT INTO `comments` (
    `postid`,
    `userid`,
    `content`
    )
VALUES
    ("1", "1", "content"),
    ("1", "1", "content"),
    ("1", "2", "content"),
    ("2", "1", "content"),
    ("2", "2", "content"),
    ("3", "1", "content"),
    ("4", "2", "content"),
    ("5", "1", "content"),
    ("6", "2", "content"),
    ("7", "1", "content"),
    ("8", "2", "content"),
    ("9", "1", "content"),
    ("10", "2", "content"),
    ("11", "1", "content"),
    ("12", "2", "content")
;

UPDATE `comments` SET `content` =
"<p>Lorem ipsum dolor sit amet coisicing elita posuere turpis.</p>";