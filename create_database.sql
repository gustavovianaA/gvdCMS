CREATE DATABASE gvdcms;

USE gvdcms;  

CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
user VARCHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL
);

CREATE TABLE categories(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
category VARCHAR(64) NOT NULL
);

CREATE TABLE items(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
title VARCHAR(64) NOT NULL,
description TEXT NOT NULL,
imgPath TEXT NOT NULL,
mainImg TEXT NOT NULL,
category varchar(64) NOT NULL,
extra TEXT NOT NULL
);

CREATE TABLE clients(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	
fromSite TINYINT NOT NULL,
name VARCHAR(64) NOT NULL,
phone VARCHAR(64) NOT NULL,
mail VARCHAR(64) NOT NULL,
message TEXT NOT NULL
);