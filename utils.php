<?php
include 'api_keys.php';
include 'connection.php';


function getDay($date) {
    $unixTimestamp = strtotime($date);
    $dayOfWeek = date("l", $unixTimestamp);
    return $dayOfWeek;
}

function getAverage($a,$b){
    $avg = ($a + $b)/2;
    return round($avg);
}

function updateCache(){

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
        // get the weather data for 8 days starting yesterday
      $readings = $data->features[0]->propp;
    $col5 = $reading->dayProbabilityOfPrecipitation;
    $col6 = getAverage($reading->midday10MWindSpeed,$reading->midnight10MWindSpeed);
    
    //    insert it into the db.
    $connect = new mysqli($servername, $username, $password, $dbname);
    if ($connect->connect_error){
        die("Connection to db has failed: ".$connect->connect_error);
    }
    $sql = "INSERT INTO data_cache 
    (format_day, overview, tempmax, tempmin, rainchance, wind)
    VALUES ($col1,$col2,$col3,$col4,$col5,$col6)";
    $insert = $connect->$query($sql);

  }
}
