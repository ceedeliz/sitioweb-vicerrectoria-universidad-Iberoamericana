
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


$mes = $_POST['mes'];
$ano   = $_POST['ano'];




	// No hay ese correo registrado, a agregar al usuario


	$q="INSERT INTO agenda SET "
			."mes='$mes', "
			."ano='$ano'";


	echo $q;

	$rs = ejecutar($q);
	
		// header('Location:panel.php?new_post=true');

	?>
<script>
 parent.parent.location.reload();
</script>
