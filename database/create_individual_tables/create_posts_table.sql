-- DROP DATABASE IF EXISTS capstone;

-- CREATE DATABASE capstone;

USE capstone;

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `authorid` BIGINT NOT NULL,
    `summary` TINYTEXT NULL,
    `content` TEXT NULL DEFAULT NULL,
    `image` VARCHAR(255),
    `categoryid` BIGINT NOT NULL,
    `status` ENUM('draft', 'hidden', 'post'),
    `allow_comment` BOOL NOT NULL DEFAULT 0,
    `deleted` BOOL NOT NULL DEFAULT 0,
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
