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

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `postid` BIGINT NOT NULL,
    `userid` BIGINT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
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
