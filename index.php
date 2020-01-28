<?php
include('antares-php.php');
$antares = new antares_php();

$antares->set_key('your-access-key-here');

$yourdata = '{"Sensor1":"Value1","Sensor2":"Value2"}';

$antares->send($yourdata,'your-device-name', 'your-application-name');  


$yourdata = $antares->get('your-device-name', 'your-application-name');
$yourdata_encode = json_encode($yourdata); //Json to String

?>
<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Antares GET/POST</title> 
  </head> 
  <body>  
    <h1>GET Data Antares</h1>
    <table>
      <td>Message : </td>
      <td>
      <?php
        echo $Viewdata_encode
      ?>
      </td>
    </table>
  </body> 
</html>