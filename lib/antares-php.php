<?php 
session_start();
class Antaresphp {
  public $accesskey;

  function getAccesskey($accesskey){
    $this->accesskey = $accesskey;
  }

  // function getaccesskey(){
  //   return $this->accesskey;
  // }

  function sendTo($data,$projectName,$deviceName){
    $dataParse = '';
    if (gettype(json_decode($data)) == 'object'){
      $dataParse = json_decode($data);
      echo $data ."<br>";
      echo "Okeyyyyy <br><br><br>";
    }else{
      $dataParse = $data;
      echo "Erorrr <br><br><br>";
    };

    $option = "{'m2m:cin': {
           'con' : ".$data."}";
    echo $option."<br><br>";
    $sensor = "sensor";
    $value = "34";

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$projectName."/".$deviceName."",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n  \"m2m:cin\": {\r\n    \"con\": \"{\\\"$sensor\\\":\\\"$value\\\",\\\"$sensor\\\":\\\"$value\\\"}\"\r\n  }\r\n}",
      CURLOPT_HTTPHEADER => array(
        "X-M2M-Origin: 236239f36aa1b12c:c6270c4ba2ce6849",
        "Content-Type: application/json;ty=4",
        "Accept: application/json"
      ),
    ));
  $response = curl_exec($curl);
  curl_close($curl);
  echo "terkirim";
  }
}

// $dataTemplate  = {
    //   'm2m:cin': {
    //     'con' : dataParsed,
    //   }
    // };

    // $options = {
    //   method: 'POST',
    //   url: `https://platform.antares.id:8443/~/antares-cse/antares-id/$projectName/$deviceName`,
    //   headers: {
    //     'X-M2M-Origin': $accesskey, // The access key 
    //     'Content-Type': 'application/json;ty=4',
    //     'Accept': 'application/json'
    //   },
    //   body:  json_decode($data);
    // };

    // function  callback(error, response, body) {
    //   if(!error) {
    //     const data = JSON.parse(body)['m2m:cin'];

    //     let content = '';
    //     try {
    //       content = JSON.parse(data.con);
    //     }
    //     catch {
    //       content = data.con;
    //     }

    //     const finalData = {
    //       resource_identifier: data.ri,
    //       parent_id: data.pi,
    //       created_time: data.ct,
    //       last_modified_time: data.lt,
    //       content: content,
    //     }
        
    //     resolve(finalData);
    //   }
    // }


// function postdata($key,$app,$device,$sensor,$value){
//   $_SESSION['key'] = $key;
//   $_SESSION['app'] = $app;
//   $_SESSION['device'] = $device;
//   $curl = curl_init();
//   curl_setopt_array($curl, array(
//     CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/".$app."/".$device."",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_POSTFIELDS =>"{\r\n  \"m2m:cin\": {\r\n    \"con\": \"{\\\"$sensor\\\":\\\"$value\\\"}\"\r\n  }\r\n}",
//     CURLOPT_HTTPHEADER => array(
//       "X-M2M-Origin:".$key,
//       // "X-M2M-Origin: 236239f36aa1b12c:c6270c4ba2ce6849",
//       "Content-Type: application/json;ty=4",
//       "Accept: application/json"
//     ),
//   ));

//   $response = curl_exec($curl);
//   curl_close($curl);
//   } 
?>