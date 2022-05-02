-- DROP DATABASE IF EXISTS capstone;

-- CREATE DATABASE capstone;

USE capstone;

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
    `id` BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `postid` BIGINT NOT NULL,
    `userid` BIGINT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NULL DEFAULT NULL,
    `deleted` BOOL NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `fk_comment_post`
        FOREIGN KEY (`postid`)
        REFERENCES `capstone`.`posts` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
);

ALTER TABLE `comments`
ADD CONSTRAINT `fk_comment_user`
    FOREIGN KEY (`userid`)
        REFERENCES `capstone`.`users` (`id`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;