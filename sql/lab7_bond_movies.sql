/*
 Shubham Mohanty
 lab7_bond_movies.sql
 14th July 2023
 INFT1206
*/

-- DROP'ping tables clear out any existing data
DROP TABLE IF EXISTS movies;
DROP TABLE IF EXISTS actors;

-- CREATE the table, note that id has to be unique, and you must have a name
CREATE TABLE actors(
	id INTEGER PRIMARY KEY,
	name VARCHAR(20) NOT  NULL
);
--ALTER TABLE actors OWNER TO userid;   --this will change the owner to your userid on your local/laptop database (over riding the default owner of postgres)
--GRANT ALL ON actors TO faculty;  --required when running the script on opentech to allow faculty members to access your database table

INSERT INTO actors(id, name) VALUES(
	1,
	'Sean Connery');
INSERT INTO actors(id, name) VALUES(
	2,
	'George Lazenby');
INSERT INTO actors(id, name) VALUES(
	3,
	'Roger Moore');
INSERT INTO actors(id, name) VALUES(
	4,
	'Timothy Dalton');
INSERT INTO actors(id, name) VALUES(
	5,
	'Pierce Brosnan');
	-- The new entry:
INSERT INTO actors(id, name) VALUES(
	6,
	'Daniel Craig');

-- CREATE the table, note movie_num is unique and title and year are required fields, though the actor can be optionally empty
CREATE TABLE movies(
	movie_num INTEGER PRIMARY KEY,
	title VARCHAR(35) NOT NULL,
	actor INTEGER,
	year INTEGER NOT NULL
);
--ALTER TABLE actors OWNER TO userid;  
--GRANT ALL ON actors TO faculty;  

INSERT INTO movies(movie_num, title, actor, year) 
VALUES(
	2,
	'From Russia With Love',
	1,
	1963);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	18,
	'Tomorrow Never Dies',
	5,
	1997);
INSERT INTO movies(movie_num, title, actor, year)
VALUES(
	3,
	'Goldfinger',
	1,
	1964);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	4,
	'Thunderball',
	1,
	1965);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	5,
	'You Only Live Twice',
	1,
	1967);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	6,
	'On Her Majesty''s Secret Service',
	2,
	1969);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	7,
	'Diamonds Are Forever',
	1,
	1971);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	8,
	'Live and Let Die',
	3,
	1973);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	9,
	'The Man With The Golden Gun',
	3,
	1974);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	10,
	'The Spy Who Loved Me',
	3,
	1977);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	11,
	'Moonraker',
	3,
	1979);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	12,
	'For Your Eyes Only',
	3,
	1981);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	14,
	'A View To A Kill',
	3,
	1985);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	15,
	'The Living Daylights',
	4,
	1987);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	16,
	'License To Kill',
	4,
	1989);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	1,
	'Dr. No',
	1,
	1962);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	13,
	'Octopussy',
	3,
	1983);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	17,
	'Goldeneye',
	5,
	1995);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	19,
	'The World Is Not Enough',
	5,
	1999);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	20,
	'Die Another Day',
	5,
	2003);
	-- new entries:
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	21,
	'Casino Royale',
	6,
	2006);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	22,
	'Quantum of Solace',
	6,
	2008);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	23,
	'Skyfall',
	6,
	2012);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	24,
	'Spectre',
	6,
	2015);
INSERT INTO movies(movie_num, title, actor, year) VALUES(
	25,
	'No Time to Die',
	6,
	2021);

-- This is important: (you need to provide / "GRANT" access to the prof (in this case, username = clint))
GRANT ALL ON actors TO clint;
GRANT ALL ON movies TO clint;
