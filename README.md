What's going on so far:  

EC2 container on AWS running Linux, Apache, Mariadb.  
Locally we have something similar, best practises are slipping today.  

DB name is test (password is under the desk) 
DB user is db_user  

Data required per day:
- date  
- one word weather (eg 'cloudy')
- name of day  
- High temp  
- low temp  
- rain chance  
- wind speed (average)    

The JSON that comes from the API is more than we need.  The daily forecast data lives in an array at "$response.features[1].properties.timeSeries".  

