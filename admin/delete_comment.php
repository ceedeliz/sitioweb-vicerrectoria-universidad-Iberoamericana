<?php
include ("../conexion.php");
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email'])){
header("HTTP/1.1 401 Unauthorized");
   ?>
<h1>Acceso no autorizado</h1>
<?php

    exit;

}

if(isset($_GET['id'])) {
	
	$id=($_GET['id']);
$sql="DELETE FROM `comentarios` WHERE `id_comentarios`  = $id";

$rs=ejecutar($sql);
header('Location:index.php');

}

?>

  