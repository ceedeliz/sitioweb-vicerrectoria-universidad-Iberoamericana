
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

$nombre     	   = $_POST['nombre'];
$desc   = $_POST['desc'];
$frase   = $_POST['frase'];
$email   = $_POST['email'];
$password       = $_POST['password'];



	// No hay ese correo registrado, a agregar al usuario

	if ($_FILES['file']['error'] > 0) {
		$nom_arch = '';
		//echo "error	". $_FILES ['file']['error']."<br/>";
	} else {
		$nom_temp=$_FILES['file']['tmp_name'];
		$timestamp = time();
		$nom_arch=$_FILES['file']['name'];
		$info_arch = pathinfo($nom_arch);
		$nom_arch = basename($nom_arch, '.'.$info_arch['extension']);
		$nom_arch .= $timestamp . '.' . $info_arch['extension'];
		$movido = move_uploaded_file($nom_temp, "../img/".$nom_arch);

		if ($movido) {
			$mensaje = "Imagen cargada con exito";
		} else {
			$mensaje = "Imagen NO cargada";
		} // if movido

	} // if $_FILES

	$q="INSERT INTO users SET "
			."nombre='$nombre', "
			."frase='$frase', "
			."descripcion='$desc', "
			."email='$email', "
			."tipo='2', "
			."password='$password'";

	if ($nom_arch != "") {
		$q.=", avatar= '$nom_arch'";
	}
	echo $q;

	$rs = ejecutar($q);
	
		// header('Location:panel.php?new_post=true');

	?>
<script>
 parent.parent.location.reload();
</script>
