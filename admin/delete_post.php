<?php
include ("../conexion.php");
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email']) || $_SESSION['tipo'] != 3){
header("HTTP/1.1 401 Unauthorized");
   ?>
<h1>Acceso no autorizado</h1>
<?php

    exit;

} 

if(isset($_GET['id'])) {
	
	$id=($_GET['id']);
$sql="DELETE FROM `posts` WHERE `id_posts`  = $id";

$rs=ejecutar($sql);
header('Location:panel.php');

}

?>

  