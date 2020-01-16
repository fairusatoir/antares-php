<?php 
session_start();
function postdata($key,$app,$device,$sensor,$value){
  $_SESSION['key'] = $key;
  $_SESSION['app'] = $app;
  $_SESSION['device'] = $device;
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$app."/".$device."",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\r\n  \"m2m:cin\": {\r\n    \"con\": \"{\\\"$sensor\\\":\\\"$value\\\"}\"\r\n  }\r\n}",
    CURLOPT_HTTPHEADER => array(
      "X-M2M-Origin:".$key,
      // "X-M2M-Origin: 236239f36aa1b12c:c6270c4ba2ce6849",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    ),
  ));

  $response = curl_exec($curl);
  curl_close($curl);
  } 

?>