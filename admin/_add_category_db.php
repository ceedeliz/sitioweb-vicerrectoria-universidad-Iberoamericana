
<?php
session_start();

include "../conexion.php";

if(!isset($_SESSION['email']) || $_SESSION['tipo'] != 3){
header("HTTP/1.1 401 Unauthorized");
   ?>
<h1>Acceso no autorizado</h1>
<?php

    exit;

}

$nombre    	   = $_POST['nombre'];


$q="INSERT INTO categorias SET "
			."nombre='$nombre'";
echo $q;
	$rs = ejecutar($q);
	
		// header('Location:panel.php?new_post=true');

	?>
<script>
 parent.parent.location.reload();
</script>