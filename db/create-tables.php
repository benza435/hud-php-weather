<?php
include 'connection.php';

$conn = new sqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("could not connect to ".$servername.": " . $conn->connect_error);
  }

$createTable_data_cache = 
    "
    DROP TABLE IF EXISTS data_cache;
    CREATE TABLE data_cache (
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    format_day VARCHAR(20),
    overview VARCHAR(20),
    tempmax INT,
    tempmin INT,
    rainchance INT,
    wind INT);
    ";

$createTable_significant_codes = 
    " 
    DROP TABLE IF EXISTS significant_codes;
    CREATE TABLE significant_codes (
    val INT,
    summary VARCHAR(30));
    ";



if ($conn->query($createTable_data_cache) === TRUE) {
    echo "data_cache table created successfully!";
  } else {
    echo "data_cache table creation failed: " . $conn->error;
  }
  
if ($conn->query($createTable_significant_codes) === TRUE) {
    echo "significant_codes table created successfully!";
  } else {
    echo "significant_codes table creation failed: " . $conn->error;
  }
  

















  $conn->close();
  
  ?>




