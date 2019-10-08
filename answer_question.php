
<?php
//session_start();

include "conexion.php";

$answer  = $_POST['answer'];
$topic  = $_POST['topic'];
$id_user  = $_POST['id_user'];


	$q="INSERT INTO respuestas SET "
			."contenido='$answer', "
			."id_foro='$topic', "
			."id_users='$id_user'";
    echo $q;
	$rs = ejecutar($q);
 header('Location:tema.php?id_post='.$topic);

	?>
