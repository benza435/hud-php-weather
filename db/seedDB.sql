USE weather_test;

INSERT INTO data_cache
(format_day,overview, tempmax, tempmin, rainchance, wind)
VALUES
("monday","sunny",25,20,0,6),
("tuesday","cloudy",21,16,14,7),
("wednesday","raining",15,10,100,12),
("thursday","storms",7,5,89,25),
("friday","sunny",26,22,0,2);

<-- format this please
Value	Description
NA	Not available
0	Clear night
1	Sunny day
2	Partly cloudy (night)
3	Partly cloudy (day)
4	Not used
5	Mist
6	Fog
7	Cloudy
8	Overcast
9	Light rain shower (night)
10	Light rain shower (day)
11	Drizzle
12	Light rain
13	Heavy rain shower (night)
14	Heavy rain shower (day)
15	Heavy rain
16	Sleet shower (night)
17	Sleet shower (day)
18	Sleet
19	Hail shower (night)
20	Hail shower (day)
21	Hail
22	Light snow shower (night)
23	Light snow shower (day)
24	Light snow
25	Heavy snow shower (night)
26	Heavy snow shower (day)
27	Heavy snow
28	Thunder shower (night)
29	Thunder shower (day)
30	Thunder