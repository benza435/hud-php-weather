# A weather app

## What?

A PHP-centric app which displays five days worth of select data from the MET Office API.

## Why?

A tech test! I'd never properly used PHP before so it was... interesting.

## How?

The LAMP stack. I am running Apache and mySQL locally, with web content accessible at 127.0.0.1.  
[There was some Figma](https://www.figma.com/file/zxqUgtvYL6Xna7AqTkNDVP/LAMP-Stack-Weather-App?node-id=0%3A1) going on while I got started.

The key components:

- Firstly, `get_weather.php`, pulls data directly from the API and displays it in the browser. It stands alone except for the imported API credentials.
- In `/db` there are SQL scripts to create and seed the database, `weather_test` with two tables:

  - `data_cache` stores a sample weather forecast (it was supposed to cache a recent weather forecast, but more on that later).
  - `significant_codes` stores the 'summary' type data, ie 'sunny' or 'light rain' with their numeric identities.

- `show_weather.php` retreives data from both tables, runs it through some util functions, and displays it in the browser with some minimal styling and icons.

-`utils.php` contains some formatting bits and the main chunk of code I was working on to retreive data from the API, and cache it in the database.

![screenshot1](https://github.com/benza435/hud-php-weather/blob/main/images/get.png?raw=true)  
![screenshot1](https://github.com/benza435/hud-php-weather/blob/main/images/show.png?raw=true)

## But why... doesn't it work as specified?

I went about it in the wrong way. Firstly I tried to host a LAMP server on AWS, which was a journey in itself, burning up around half of the time allocated for the project. Secondly I paid no attention to the Laravel framework, attempting the task in raw SQL, PHP and HTML.
