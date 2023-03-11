<?php

function get_cities(){
    ini_set('memory_limit',-1);
    $json_file = file_get_contents(_json_file_);
    $cities = json_decode($json_file,true);
    $egyptian_cities = array();

    foreach ($cities as $key => $value) {
        foreach ($value as $ke => $val) {
            if ($ke === "country" && $val === "EG") {
                array_push($egyptian_cities, $cities[$key]);
            }
        }
    }
      return $egyptian_cities;
}

function get_weather(){
    
    if(isset($_POST["submit"])){
        $city_id = $_POST["city"];
        $api_URL = _api_url_. $city_id ."&appid="._api_key_;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$api_URL);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response,true);  
        return  $data;
    }
}

function display_weather(){
    $weather_data =  get_weather();
    $current_time = date("F d Y h:i a");
    echo "<center class='app-wrap'>";
    foreach ($weather_data as $key => $value) {
        if ($key === 'name'){
            echo "<br><h1> $value Weather Status </h1><br>";
            echo "<p> $current_time </p>"; 
        } 
    }

    foreach ($weather_data as $key => $value) {
        if ($key === "weather") {
            foreach ($value as $weatherprop => $val) {
                if ($weatherprop === 0) {
                    foreach ($val as $prop => $propval) {
                        if ($prop === "description") echo "<br><h2> $propval</h2><br>";
                    }
                }
            }
        }
        if ($key === 'main' || $key === 'wind') {
            foreach ($value as $prop => $propval) {
                if ($prop === "temp"){
                    $propval = $propval -273;
                    echo "<b> $prop </b> : $propval C<br>";
                } 
                if ($prop === "humidity") echo "<b> $prop </b> : $propval % <br>";
                if ($prop === 'speed')  echo "<b> $prop </b> : $propval Km/h <br>";
            }
        }
    }
    echo "</center>";
    
}