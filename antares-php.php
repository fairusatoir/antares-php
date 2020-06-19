<?php 
session_start();
class antares_php {
  // ==============
  // SET KEY ACCESS
  // ==============
  function set_key($accesskey) {
    $this->key = $accesskey;
  }

  function get_key() {
    return $this->key;
  }

  // ==============================
  // SEND data to server Antares.id
  // ==============================
  function send($data,$deviceName,$projectName){
    $keyacc = "{$this->key}";

    $header = array(
      "X-M2M-Origin: $keyacc",
      // "X-M2M-Origin: ",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    );

    $curl = curl_init();
    $dataSend = array(("m2m:cin") => array("con" => ($data)));
    $data_encode = json_encode($dataSend);
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>$data_encode,
      CURLOPT_HTTPHEADER => $header,
    ));
    curl_exec($curl);
    // CHECK respone status
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($httpCode == "404") {
      echo "ERROR[003] : Something WRONG when SEND data";
    }
    curl_close($curl);
  }

  // ==========================================
  // GET data with LIMIT from server Antares.id
  // ==========================================
  function get_limit($limit,$deviceName,$projectName){
    //!!!! $limit type STRING  !!!!
    $keyacc = "{$this->key}";
    $header = array(
      "X-M2M-Origin: $keyacc",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    );
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."?fu=1&ty=4&lim=".$limit, //$limit type STRING 
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $header,
    ));
    //GET json Respone -> String
    $response = curl_exec($curl);
    // CHECK respone status
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($httpCode != "404") {
      //CONVERT to array
      $raw = json_decode('['.$response.']', true);
      //REMOVE header
      $temp_url = $raw[0]["m2m:uril"];
      $count_temp =  count($temp_url);
      $raw_data = [];
      
      //GET data
      for($i = 0; $i < $count_temp; $i++){
        $cin = curl_init();
        curl_setopt_array($cin, array(
          CURLOPT_URL => "https://platform.antares.id:8443/~".$temp_url[$i],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => $header,
        ));
        //GET json Respone -> String
        $cin_res = curl_exec($cin);
        //CONVERT to array
        $raw = json_decode('['.$cin_res.']', true);
        $raw_json = json_decode($raw[0]["m2m:cin"]["con"],true);
        //ADD data to array
        array_push($raw_data,$raw_json);
        curl_close($cin);  
      }
      return $raw_data; //-> Array
    }else{
      echo "ERROR[004] : Application Name or Device Name is Wrong";
    }
    curl_close($curl);
  }


  // ===================================
  // GET ALL data from server Antares.id
  // ===================================
  function get_all($deviceName,$projectName){
    $keyacc = "{$this->key}";
    $header = array(
      "X-M2M-Origin: $keyacc",
      "Content-Type: application/json;ty=4",
      "Accept: application/json"
    );

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."?fu=1&ty=4",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $header,
    ));
    //GET json Respone -> String
    $response = curl_exec($curl);
    // CHECK respone status
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($httpCode != "404") {
      //CONVERT to array
      $raw = json_decode('['.$response.']', true);
      //REMOVE header
      $temp_url = $raw[0]["m2m:uril"];
      $count_temp =  count($temp_url);
      $raw_data = [];
      
      //GET data
      for($i = 0; $i < $count_temp; $i++){
        $cin = curl_init();
        curl_setopt_array($cin, array(
          CURLOPT_URL => "https://platform.antares.id:8443/~".$temp_url[$i],
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => $header,
        ));
        //GET json Respone -> String
        $cin_res = curl_exec($cin);
        //CONVERT to array
        $raw = json_decode('['.$cin_res.']', true);
        $raw_json = json_decode($raw[0]["m2m:cin"]["con"],true);
        //ADD data to array
        array_push($raw_data,$raw_json);
        curl_close($cin);  
      }
      return $raw_data; //-> Array
    }else{
      echo "ERROR[001] : Application Name or Device Name is Wrong";
    }
    curl_close($curl);
  }

  // ====================================
  // GET LAST data from server Antares.id
  // ====================================

  function get($deviceName,$projectName){
    $keyacc = "{$this->key}";
    $header = array(
      "X-M2M-Origin: $keyacc",
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
    //GET json String
    $response = curl_exec($curl);
    // CHECK respone status
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($httpCode != "404") {
      //CONVERT to array
      $raw = json_decode('['.$response.']', true);

      //REMOVE header
      $temp_url = $raw[0]["m2m:cin"]["con"];
      $JSON = json_decode('['.$temp_url.']',true);
      curl_close($curl);
      return $JSON; //-> Array
    }else{
      echo "ERROR[002] : Application Name or Device Name is Wrong";
    }

    
  }
}
?>