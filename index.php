<?php
include('lib/antares-php.php');
$antares = new Antaresphp();

$antares->getAccesskey('236239f36aa1b12c:c6270c4ba2ce6849');
$data = '{"humidity":"35","Suhu":"37"}';
$antares->sendTo($data,'Generator','mysensor');  
    


// if(isset($_POST['submit'])){
//   $key = $_POST['key'];
//   $app = $_POST['application'];
//   $device = $_POST['device'];
//   $sensor = $_POST['sensor'];
//   $value = $_POST['value'];
// }
// else if (isset($_POST['view'])) {
//   header("location: view.php");
// }
?>

<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Antares GET/POST</title> 
  </head> 
  <body>
    <!-- Post code  -->
    <!-- <h1>Post Data Gan</h1>
    <form action="" method="post">
      <div class="form-group row">
        <br><br>
        <input type="text" name="value" id="value" autocomplete="off" placeholder="Value" >
      </div>
      <br><br>
      <div class="form-group row mt-4">
        <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fab fa-telegram-plane"></i> Post</button>
      </div>
    </form>

    <form action="view.php">
      <input type="submit" value="View Data" />
  </form> -->
    <!-- /Post code  -->    
  </body> 
</html>