/*
 Shubham Mohanty
 lab7_auto_records.sql
 14th July 2023
 INFT1206
 */

-- dropping tables, if it already exists:
DROP TABLE IF EXISTS automobiles;

-- creating automobile table:
CREATE TABLE automobiles (
    id INTEGER PRIMARY KEY,
    make VARCHAR(15) NOT NULL,
    model VARCHAR(20) NOT NULL,
    yr INTEGER NOT NULL CHECK (
        yr BETWEEN 1900
        AND 2050
    ),
    owner VARCHAR(50) NOT NULL,
    msrp DECIMAL(8, 2) NOT NULL CHECK (
        msrp BETWEEN 0
        AND 999999.99
    ),
    purchase_date DATE NOT NULL
);

-- inserting favorite cars into the automobile table
INSERT INTO automobiles (id, make, model, yr, owner, msrp, purchase_date)
VALUES (1, 'Tesla', 'Model S', 2022, 'Hermione Granger', 79999.99, '2022-02-08'),
       (2, 'Lamborghini', 'Huracan', 2022, 'Rubues Hagrid', 249999.99, '2022-07-06'),
       (3, 'Ford', 'Mustang', 2023, 'Draco Malfoy', 59999.99, '2023-02-28'),
       (4, 'Nissan', 'GT-R', 2022, 'Ron Weasley', 89999.99, '2022-10-01'),
       (5, 'Porsche', '911', 2021, 'Harry Potter', 129999.99, '2021-02-03');

-- updating ownership of car
UPDATE
    automobiles
SET
    owner = 'Shubham Mohanty'
WHERE
    make = 'Lamborghini'
    AND model = 'Huracan';

-- Delete the least favorite car
DELETE FROM
    automobiles
WHERE
    make = 'Ford'
    AND model = 'Mustang';

-- giving permission to prof:
GRANT ALL ON automobiles TO clint;
