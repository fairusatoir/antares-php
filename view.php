<?php
    // include('lib/antares-php.php');
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$obj = json_decode($jsonobj);

foreach($obj as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>
<html>  
    <head>
        <title>View Data</title>
    </head>
    <body>
        <h1>Get Data Gan</h1>
        <table>
        <tr>
            <td>Pesan  : </td>
        </tr>
        </table>
    </body>
</html>