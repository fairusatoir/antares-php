<?php
include('lib/antares-php.php');
$antares = new Antaresphp();

$antares->set_key('236239f36aa1b12c:c6270c4ba2ce6849');

$data = '{"Temperature":"27","Humidity":"87","hhh":"rendah"}';

$antares->sendTo($data,'Generator','mysensor');  


$Viewdata = $antares->viewData('Generator','mysensor');
$Viewdata_encode = json_encode($Viewdata);

?>
<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Antares GET/POST</title> 
  </head> 
  <body>  
    <h1>DATA GET dari Antares</h1>
    <table>
      <td>Pesan : </td>
      <td>
      <?php
        echo $Viewdata_encode
      ?>
      </td>
    </table>
  </body> 
</html>