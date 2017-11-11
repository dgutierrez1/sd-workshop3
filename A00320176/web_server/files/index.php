<?php
 echo "<h1> Taller 3 - Daniel Gutierrez</h1><br>"
 echo "<h5>Listado de cursos</h5><br>" 

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
