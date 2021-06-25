<html>
  <body>

<?php

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
    "X-IBM-Client-Id: a9203c50-f04f-4504-89b9-b6958915f6e2",
    "X-IBM-Client-Secret: gR0kG1vQ6xV4nP2rY7iW1uN2mE6xJ4vK7aV4wX5jT4cH4pD0pT",
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
  echo "last updated ".$data->features[0]->properties->modelRunDate."<br>";
  echo "<h1>Forecast:</h2>";
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






// make an indexed array out output the second element... works ok
// $test = array("one","two");
// echo $test[1];

// echo $data->type; // returns 'FeatureCollection'
  // echo $data->features; // returns 'Array'
  // echo $data->features[0]; // returns nothing
  // echo $data->features[1]; // returns nothing
  // echo "printR";
  // print_r($data->features);  // returns Array ( [0] => stdClass Object ( [type....
  // multidimenstinioal arrays here we go...
  // print_r($data->features[1]); // returns nothing
  // print_r($data->features[1][1]); // returns nothing
  //print_r($data->features[0]);  // returns stdClass Object ( [type] => Fe....
  //print_r($data->features[0]->properties->timeSeries[0]->time); // returns 'feature'
  // 
  // print_r($readings);


?>
</body>
</html>
