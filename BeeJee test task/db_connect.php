<?php
  // Connecting to the Database
  $mysqli = new mysqli('127.0.0.1','TaskManager','wqY-45V-Ap2-3Ne','prodiler');

  if ($mysqli->connect_errno) {
      echo "Database access denied<br>";
      echo $mysqli->connect_error;
      exit();
  }
 ?>
