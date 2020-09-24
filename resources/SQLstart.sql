CREATE DATABASE mainDB;
USE mainDB;
CREATE TABLE keste(
	className VARCHAR(20),
    weekday INT,
	lessId INT,
	lessName VARCHAR(20),
    PRIMARY KEY (className, weekDay, lessId)
);