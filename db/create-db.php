<?php
include 'connection.php';

$conn = new sqli($servername, $username, $password);

if ($conn->connect_error) {
    die("could not connect to ".$servername.": " . $conn->connect_error);
  }

$startDB = 
    "
    DROP DATABASE IF EXISTS weather_test;
    CREATE DATABASE weather_test;
    ";

  if ($conn->query($startDB) === TRUE) {
    echo "weather_test DB successfully!";
  } else {
    echo "weather_test DB creation failed: " . $conn->error;
  }
  
  $conn->close();
  
  ?>