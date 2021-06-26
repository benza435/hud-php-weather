<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
  <body>
  <a href="index.html">home</a>
  <h1>data direct from MET API</h1>
<?php
include 'api_keys.php';
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api-metoffice.apiconnect.ibmcloud.com/metoffice/production/v0/forecasts/point/daily?latitude=56.4620066&longitude=-2.9709497",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "X-IBM-Client-Id: $client_id",
    "X-IBM-Client-Secret: $client_secret",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$data = json_decode($response);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $updated = $data->features[0]->properties->modelRunDate;
  echo "last updated ".$updated."<br>";

  $readings = $data->features[0]->properties->timeSeries;
  unset($readings[7]);
  unset($readings[6]);
  unset($readings[0]);
  echo "<table border=1><tr>";

  foreach ($readings as $reading){
    echo "<td>";
    echo $reading->time;
    echo "<br>";
    echo "summary: ".$reading->daySignificantWeatherCode;
    echo "<br>";
    echo "max temp: ".$reading->dayUpperBoundMaxTemp;
    echo "<br>";
    echo "min temp: ".$reading->dayLowerBoundMaxTemp;
    echo "<br>";
    echo "rain chance: ".$reading->dayProbabilityOfPrecipitation."%";
    echo "<br>";    
    $wind1 = $reading->midday10MWindSpeed;
    $wind2 = $reading->midnight10MWindSpeed;
    echo "avg wind speed: ".round($wind1+$wind2/2)." mph";
    echo "<br><br>";
    echo "</td>";
  }

}



?>


</body>
</html>

