/*
    Shubham Mohanty
    lab09_users.sql
    26th July 2023
    INFT1206
*/

-- Drop the table if it exists
DROP TABLE IF EXISTS users;

-- Create the users table 
CREATE TABLE users (
    id VARCHAR(20) PRIMARY KEY,
    password VARCHAR(15) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    email_address VARCHAR(125) NOT NULL,
    enrol_date DATE NOT NULL,
    last_access DATE NOT NULL
);

INSERT INTO
    users (
        id,
        password,
        first_name,
        last_name,
        email_address,
        enrol_date,
        last_access
    )
VALUES
    (
        'mohantys',
        'ilovepizza@007',
        'Shubham',
        'Mohanty',
        'mohanty.shubham@gmail.com',
        '2022-09-07',
        '2023-07-28'
    );
    
-- Grant permission to prof
GRANT ALL ON users TO clint;