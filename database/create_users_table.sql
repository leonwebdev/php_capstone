-- DROP DATABASE IF EXISTS capstone;

-- CREATE DATABASE capstone;

USE capstone;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    street VARCHAR(255),
    city VARCHAR(255),
    postal_code CHAR(7),
    province VARCHAR(255),
    country VARCHAR(255),
    phone VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    subscribe_to_newsletter TINYINT NOT NULL DEFAULT 0,
    deleted BOOL NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
