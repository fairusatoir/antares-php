<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/Generator/mysensor/la",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "X-M2M-Origin: 236239f36aa1b12c:c6270c4ba2ce6849",
    "Content-Type: application/json;ty=4",
    "Accept: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$someJSON = '['.$response.']';
$someArray = json_decode($someJSON, true);

$temp_url = $someArray[0]["m2m:cin"]["con"];
$temp_url3 = $temp_url[4];

$someJSONFix = '['.$temp_url.']';

$someArrayFix = json_decode($someJSONFix, true);

?>