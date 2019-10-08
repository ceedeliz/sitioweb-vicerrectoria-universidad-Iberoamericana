<?php 
ini_set('display_errors',1);

include ("../conexion.php");

session_start();

$titulo           = isset($_POST['titulo']) ? $_POST['titulo'] : 0;
$resena       = isset($_POST['resena'])          ? $_POST['resena']: '';
$id         = isset($_POST['id'])  ? $_POST['id']            : '';
$categoria = isset($_POST['categoria'])    ? $_POST['categoria']    : '';
$date = date('Y-m-d H:i:s');


$q="update posts set " 
            ."titulo='$titulo', "
			."resena='$resena', "
			."id_categorias='$categoria' where id_posts = $id";

echo $q;
$rs=ejecutar($q);
 //header('Location:exito.php');

?>
<script>
 parent.parent.location.reload();
</script>
