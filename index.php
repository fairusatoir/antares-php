<?php
include('lib/antares-php.php');
$antares = new Antaresphp();

$antares->set_key('236239f36aa1b12c:c6270c4ba2ce6849');
// echo $antares->get_key();
$antares->sendTo("hahas",'Generator','mysensor');  
$data = $antares->viewData('Generator','mysensor');

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
      <td><?= $data[0]["sensor"] ?></td>
    </table>
  </body> 
</html>