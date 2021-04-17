<?php
include_once('Conexion.php');
$Cone = new Conexion();
$Cone->update_user($_POST["user"],$_POST["pass"],$_POST["Olduser"],$_POST["NewUser"],$_POST["NewPass"]);

?>