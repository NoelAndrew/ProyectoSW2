<?php
include_once('Conexion.php');
$Cone = new Conexion();
$Cone->set_user($_POST["user"],$_POST["pass"],$_POST["NewUser"],$_POST["NewPass"]);

?>