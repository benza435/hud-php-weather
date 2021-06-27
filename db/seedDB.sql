USE weather_test;

INSERT INTO data_cache
(forecast_day,overview, tempmax, tempmin, rainchance, wind_min, wind_max)
VALUES
("2021-06-27T00:00Z",1,25,20,0,6,10),
("2021-06-28T00:00Z",7,21,16,14,7,10),
("2021-06-29T00:00Z",12,15,10,90,12,14),
("2021-06-30T00:00Z",15,7,5,100,25,30),
("2021-07-01T00:00Z",1,26,22,0,2,4);

INSERT INTO significant_codes
(val,summary)
VALUES
(0,	"Clear night"),
(1,	"Sunny day"),
(2,	"Partly cloudy (night)"),
(3,	"Partly cloudy (day)"),
(4,	"Not used"),
(5,	"Mist"),
(6,	"Fog"),
(7,	"Cloudy"),
(8,	"Overcast"),
(9,	"Light rain shower (night)"),
(10, "Light rain shower (day)"),
(11, "Drizzle"),
(12, "Light rain"),
(13, "Heavy rain shower (night)"),
(14, "Heavy rain shower (day)"),
(15, "Heavy rain"),
(16, "Sleet shower (night)"),
(17, "Sleet shower (day)"),
(18, "Sleet"),
(19, "Hail shower (night)"),
(20, "Hail shower (day)"),
(21, "Hail"),
(22, "Light snow shower (night)"),
(23, "Light snow shower (day)"),
(24, "Light snow"),
(25, "Heavy snow shower (night)"),
(26, "Heavy snow shower (day)"),
(27, "Heavy snow"),
(28, "Thunder shower (night)"),
(29, "Thunder shower (day)"),
(30, "Thunder");