<?php
include('lib/antarespost.php');

if(isset($_POST['submit'])){
  $key = $_POST['key'];
  $app = $_POST['application'];
  $device = $_POST['device'];
  $sensor = $_POST['sensor'];
  $value = $_POST['value'];
  postdata($key,$app,$device,$sensor,$value);
}
else if (isset($_POST['view'])) {
  header("location: view.php");
}
?>

<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <title>Antares GET/POST</title> 
  </head> 
  <body>
    <!-- Post code  -->
    <h1>Post Data Gan</h1>
    <form action="" method="post">
    <div class="form-group row">
        <br><br>
        <input type="text" name="key" id="key" autocomplete="off" placeholder="key" required value="<?PHP
          if(isset($_SESSION['key'])){
            echo $_SESSION['key'];
          }
        ?>">
        <input type="text" name="application" id="application" autocomplete="off" placeholder="Application" required value="<?PHP
          if(isset($_SESSION['app'])){
            echo $_SESSION['app'];
          }
        ?>">
        <input type="text" name="device" id="device" autocomplete="off" placeholder="Device" required value="<?PHP
          if(isset($_SESSION['device'])){
            echo $_SESSION['device'];
          }
        ?>">
      </div>
      <div class="form-group row">
        <br><br>
        <input type="text" name="sensor" id="sensor" autocomplete="off" placeholder="Sensor" required>
        <input type="text" name="value" id="value" autocomplete="off" placeholder="Value" required>
      </div>
      <br><br>
      <div class="form-group row mt-4">
        <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fab fa-telegram-plane"></i> Post</button>
      </div>
    </form>

    <form action="view.php">
      <input type="submit" value="View Data" />
  </form>
    <!-- /Post code  -->    
  </body> 
</html>