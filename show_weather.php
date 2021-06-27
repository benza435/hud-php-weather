<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cached Weather</title>
</head>
  <body>
  <a href="index.html">home</a>
<h1>data from weather_test.data_cache:</h1>
<?php
include 'db/connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
data_cache.format_day,  
significant_codes.summary,
data_cache.tempmax, 
data_cache.tempmin, 
data_cache.rainchance, 
data_cache.wind
FROM data_cache
INNER JOIN significant_codes ON data_cache.overview=significant_codes.val;
";

$weather = $conn->query($sql);

//  show the last updated time here somehow:
//$update = "SELECT updated FROM data_cache LIMIT 1";
//$last_update = $conn->query($update);
//echo $last_update;

if ($weather->num_rows > 0) {

  echo "<table border=1><tr>";
  // output data of each row
  while($row = $weather->fetch_assoc()) {
    echo "<td style='padding:10px'>"
    ."<h2>".$row["format_day"]."</h2><br>"
    ."<h3>".$row["summary"]."</h3><br>"
    ."<span><img src='/images/hot.png' height='20'/>  ".$row["tempmax"]."°C</span><br>"
    ."<span><img src='/images/cold.png' height='20'/>  ".$row["tempmin"]."°C</span><br>"
    ."<span><img src='/images/rain.png' height='20'/>  ".$row["rainchance"]."%</span><br>"
    ."<span><img src='/images/wind.png' height='20'/>  ".$row["wind"]." mph</span><br>"
    ."</td>";
  }
  echo "</tr></table>";
} else {
  echo "0 results, try again";
}
$conn->close();
?>

</body>
</html>

