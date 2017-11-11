<?php
 
 $con = new PDO('mysql:host=25.8.240.42;dbname=db_dist;charset=utf8mb4', 'admin', 'password');
if (!$con)
  {
  die('Could not connect');
  }
 
 
 echo ‘Connected<br />’;

 foreach($con->query('SELECT * FROM materia') as $row) {
    echo $row['nombre'].' '.$row['profesor'];
 }

 ?>
