/*
Shubham Mohanty
Test 3 
August 10, 2023
INFT1206
*/

-- Drop the table if it exists
DROP TABLE IF EXISTS tt3Colors;

-- Create the colors table 
CREATE TABLE tt3Colors (
    colorID INT PRIMARY KEY, 
    colorName VARCHAR(25) NOT NULL,
    Red INT NOT NULL CHECK (Red >= 0 AND Red <= 255),
    Green INT NOT NULL CHECK (Green >= 0 AND Green <= 255),
    Blue INT NOT NULL CHECK (Blue >= 0 AND Blue <= 255),
    cssHex CHAR(6) NOT NULL,
    description VARCHAR(255)
);

-- Insert initial color data
INSERT INTO tt3Colors (colorID, colorName, Red, Green, Blue, cssHex, description)
VALUES
    (1, 'Red', 255, 0, 0, 'FF0000', 'The color of passion and energy'),
    (2, 'Green', 0, 255, 0, '00FF00', 'The color of nature and growth'),
    (3, 'Blue', 0, 0, 255, '0000FF', 'The color of calm and serenity'),
    (4, 'Purple', 128, 0, 128, '800080', 'The color of creativity and royalty'),
    (5, 'Yellow', 255, 255, 0, 'FFFF00', 'The color of sunshine and happiness');

-- Insert GOLD color
INSERT INTO tt3Colors (colorID, colorName, Red, Green, Blue, cssHex, description)
VALUES
    (6, 'Gold', 255, 210, 0, 'FFD200', 'The color of wealth and luxury');

-- Grant permission to professor
-- Uncomment the following line when you're ready to execute the script in your database
GRANT ALL ON tt3Colors TO clint;
