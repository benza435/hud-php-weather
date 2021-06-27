<?php
include 'connection.php'

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

DROP TABLE IF EXISTS significant_codes;
CREATE TABLE significant_codes (
    val INT,
    summary VARCHAR(30)
);