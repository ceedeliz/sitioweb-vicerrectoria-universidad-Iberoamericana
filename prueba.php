<?php
include ("../conexion.php");
ini_set('display_errors', '1');

$sql="SELECT *
FROM posts";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

?> 
  <?php
while($datos=mysqli_fetch_array($rs)){
	?>
<p><?php echo nl2br($datos["resena"])?></p>

      <?php
}
        

?>