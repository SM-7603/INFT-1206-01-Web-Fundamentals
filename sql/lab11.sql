/*
    Shubham Mohanty
    lab11.sql
    11th August 2023
    INFT1206
*/

-- Drop the table if it exists
DROP TABLE IF EXISTS quiz;

-- create the table
CREATE TABLE quiz (
    qID SERIAL PRIMARY KEY,
    questionText VARCHAR(500) NOT NULL,
    answerA VARCHAR(250) NOT NULL,
    answerB VARCHAR(250) NOT NULL,
    answerC VARCHAR(250),
    answerD VARCHAR(250),
    answer CHAR(1) CHECK (answer IN ('A', 'B', 'C', 'D'))
);

-- insert values
INSERT INTO quiz (questionText, answerA, answerB, answerC, answerD, answer)
VALUES
    ('What is the capital of France?', 'Paris', 'Berlin', 'Rome', 'London', 'A'),
    ('What is 2 + 2?', '3', '4', '5', '6', 'B'),
    ('Which planet is closest to the Sun?', 'Earth', 'Mars', 'Mercury', 'Venus', 'C'),
    ('What is 2 - 2?', '3', '4', '5', '0', 'D');

-- Grant permission to prof
GRANT ALL ON quiz TO clint;