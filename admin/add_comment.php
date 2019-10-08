
<?php
session_start();

include "../conexion.php";

$autor    	   = $_POST['autor'];
$comentario    	   = $_POST['comentario'];
$id_post   	   = $_POST['id_posts'];


	$q="INSERT INTO comentarios SET "
			."autor='$autor', "
			."comentario='$comentario', "
			."id_posts='$id_post'";
echo $q;
	$rs = ejecutar($q);
	
 header('Location:post.php?id_post='.$id_post);

	?>
