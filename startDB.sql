DROP DATABASE IF EXISTS weather_test;
CREATE DATABASE weather_test;

DROP TABLE IF EXISTS data_cache;
CREATE TABLE data_cache (
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    format_day VARCHAR(20),
    overview VARCHAR(20),
    tempmax INT,
        tempmin INT,
    rainchance INT,
    wind INT
);

INSERT INTO data_cache
(format_day,overview, tempmax, tempmin, rainchance, wind)
VALUES
("monday","sunny",25,20,0,6),
("tuesday","cloudy",21,16,14,7),
("wednesday","raining",15,10,100,12),
("thursday","storms",7,5,89,25),
("friday","sunny",26,22,0,2);