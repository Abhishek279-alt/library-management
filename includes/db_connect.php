<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "elibrary";

mysqli_report(MYSQLI_REPORT_STRICT);
try {
  $con = new mysqli($servername,$username,$password,$db);
  // echo "Connection successful";
} catch (Exception $ex) {
  echo "Connection failed". $ex->getMessage();
}


?>