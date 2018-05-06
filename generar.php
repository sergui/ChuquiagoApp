<?php 
$ci=10001;
$contrasenia = password_hash($ci, PASSWORD_DEFAULT);
echo $contrasenia;
 ?>