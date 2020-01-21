<?php 
session_start();
class Antaresphp {
  public $header; 

  function set_key($accesskey) {
    $this->key = $accesskey;
  }
  function get_key() {
    return $this->key;
  }

  function sendTo($data,$projectName,$deviceName){
    $keyacc = "{$this->key}";

    $header = array(
      "X-M2M-Origin: $keyacc",
      // "X-M2M-Origin: ",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    );

    $curl = curl_init();
    $sensor = "sensor";
    $value = "6";
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n  \"m2m:cin\": {\r\n    \"con\": \"{\\\"$sensor\\\":\\\"$value\\\"}\"\r\n  }\r\n}",
      CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);
    curl_close($curl);
  }

  function viewData($projectName,$deviceName){
    $keyacc = "{$this->key}";
    $header = array(
      "X-M2M-Origin: $keyacc",
      // "X-M2M-Origin: ",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."/la",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    // var_dump($response);

    $someJSON = '['.$response.']';
    $someArray = json_decode($someJSON, true);

    // print_r($someArray);
    // echo $someArray[0]["m2m:cin"]["con"];

    $temp_url = $someArray[0]["m2m:cin"]["con"];
    $someJSONFix = '['.$temp_url.']';

    $someArrayFix = json_decode($someJSONFix, true);
    $someArrayFix[0]["sensor"];
    return $someArrayFix;
  }
}
?>