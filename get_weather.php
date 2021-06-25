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
$err = curl_error($curl);
$windMidnight = $response.features[1].properties.timeSeries[0].midnight10MWindSpeed;
$windMidday = $response.features[1].properties.timeSeries[0].midday10MWindSpeed;

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 echo $response;
 // echo $windMidnight;
}

// .features[0].properties.timeSeries[0].time
// foreach ($json_output['orders'] as $billing_details) {
// echo "<b>Name:</b><br>$billing_details['firstname'] $billing_details['lastname']<br>";}