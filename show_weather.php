<html>
  <body>

<h1>data from show_weather.data_cache:</h1>
<?php
include 'connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM data_cache";
$weather = $conn->query($sql);

//$update = "SELECT updated FROM data_cache LIMIT 1";
//$last_update = $conn->query($update);
//echo $last_update;

if ($weather->num_rows > 0) {

  echo "<table border=1><tr>";
  // output data of each row
  while($row = $weather->fetch_assoc()) {
    echo "<td style='padding:10px'>"
    ."<h2>".$row["format_day"]."</h2><br>"
    ."<h3>".$row["overview"]."</h3><br>"
    ."<span><img src='/images/hot.png' height='20'/>  ".$row["tempmax"]."°C</span><br>"
    ."<span><img src='/images/cold.png' height='20'/>  ".$row["tempmin"]."°C</span><br>"
    ."<span><img src='/images/rain.png' height='20'/>  ".$row["rainchance"]."%</span><br>"
    ."<span><img src='/images/wind.png' height='20'/>  ".$row["wind"]." mph</span><br>"
    ."</td>";
  }
  echo "</tr></table>";
} else {
  echo "0 results";
}
$conn->close();
?>


</body>
</html>

