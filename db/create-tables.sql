USE weather_test;
DROP TABLE IF EXISTS data_cache;
CREATE TABLE data_cache (
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    forecast_day VARCHAR(20),
    overview INT,
    tempmax INT,
    tempmin INT,
    rainchance INT,
    wind_min INT,
    wind_max INT);

DROP TABLE IF EXISTS significant_codes;
CREATE TABLE significant_codes (
    val INT,
    summary VARCHAR(30));