<?php
 
 $link = mysql_connect(‘db_dist’, ‘admin’, ‘password’);
  
 if (!$link) {
  die(‘Not connected: ‘ . mysql_error());
 }
 
 echo ‘Connected with mysql_connect<br />’;
 mysql_close($link);
 
 $mysqli = new mysqli(‘db_dist’, ‘admin’, ‘password’, ‘db_test’);
 
 if ($mysqli->connect_error) {
  die(‘Connect Error (‘ . $mysqli->connect_errno . ‘) ‘
 . $mysqli->connect_error);
 }

 if (mysqli_connect_error()) {
  die(‘Connect Error (‘ . mysqli_connect_errno() . ‘) ‘
 . mysqli_connect_error());
 }
 
 echo ‘Success with mysqli connection at … ‘ . $mysqli->host_info . “\n”;

 foreach($con->query('SELECT * FROM materia') as $row) {
    echo $row['nombre'].' '.$row['profesor'];
 }


 $mysqli->close();

 ?>
