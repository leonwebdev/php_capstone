DROP DATABASE IF EXISTS capstone;

CREATE DATABASE capstone;

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

/*
 INSERT INTO
 users (
 first_name,
 last_name,
 email,
 phone,
 subscribe_to_newsletter,
 deleted,
 created_at,
 updated_at
 )
 VALUES
 (
 'Dave',
 'Jones',
 'djones@borland.com',
 '212-555-3456',
 '1',
 '0' '2021-01-12 09:03:52',
 '2021-01-12 09:03:52'
 ),
 (
 'Henry',
 'Bissoon',
 'hbissoon@borland.com',
 '204-323-1145',
 '1',
 '0' '2021-06-22 09:03:52',
 '2021-06-22 09:03:52'
 ),
 (
 'Margaret',
 'Thomson',
 'mthomson@borland.com',
 '234-456-6548',
 '1',
 '0' '2021-08-16 09:03:52',
 '2021-08-16 09:03:52'
 ),
 (
 'Jill',
 'King',
 'jking@borland.com',
 '212-555-4432',
 '1',
 '0' '2021-09-17 09:03:52',
 '2021-09-17 09:03:52'
 );
 */