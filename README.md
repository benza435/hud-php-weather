What's going on so far:

EC2 container on AWS running Linux, Apache, Mariadb.  
Locally we have something similar, best practises are slipping today.

Data required per day:

- date
- one word weather (eg 'cloudy')
- name of day
- High temp
- low temp
- rain chance
- wind speed (average)

roughly looks like this:

- 2021-06-25T00:00Z
- summary: 7
- max temp: 16.958366
- min temp: 12.831504
- rain chance: 6%
- avg wind speed: 7 mph

Currently the data from the API is going straight to the frontend. Not a relevant step really but PHP is a bit more of a joke than I thought it was.  
Next steps - create function on the server to fetch the relevant data, and push it to the db.  
Then have the frontend request the data from the server, which gets the data from the db.

when you work locally with this, you need to START THE APACHE SERVER FIRST LOL

---

Setting up a db and table today - db name is 'weather_test', table name is data_cache, user is 'tom'.  
Rows will be:

- day
- overview
- temp_max
- temp_min
- rain_chance
- wind
