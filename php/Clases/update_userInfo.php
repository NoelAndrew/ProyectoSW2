<?php
include_once('Conexion.php');

$Cone = new Conexion();
$Cone->update_Info($_POST["user"],$_POST["pass"],$_POST["correo"],$_POST["nombre"],$_POST["rol"],$_POST["telefono"],$_POST["AuxUse"]);

?>