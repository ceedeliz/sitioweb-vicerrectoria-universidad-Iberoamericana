
<?php
session_start();

include "../conexion.php";

$titulo     	   = $_POST['titulo'];

$resena   = $_POST['resena'];
$categoria        = $_POST['categoria'];
$autor    = $_POST['autor'];

$date = date('Y-m-d H:i:s');


define('ANCHO_FIJO',500);
define('ALTO_FIJO',500);


print_r($_FILES);

if ($_FILES['file']['error']>0){
  echo "error	". $_FILES ['file']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file']['tmp_name'];
  $nom_arch=$timestamp.$_FILES['file']['name'];


   $datosImagen = getimagesize($nom_temp);
  $ancho=$datosImagen[0];
  $alto=$datosImagen[1];
  $tipoImagen = $datosImagen['mime'];
  $sePudo=true;
switch($tipoImagen){
  case 'image/jpeg':
	  $imagenBase=imagecreatefromjpeg($nom_temp);
		break;
  case 'image/png':
	  $imagenBase=imagecreatefrompng($nom_temp);
		break;
  case 'image/gif':
	  $imagenBase=imagecreatefromgif($nom_temp);
		break;		
  default:
	$sePudo=false;			
		
	
  }
  
  
if($sePudo){
  $esHorizontal = $ancho > $alto ; // true si es horizontal false si es cuadrada o vertical
  if($esHorizontal){
	$proporcion=ANCHO_FIJO/$ancho;
  }else {
	$proporcion=ALTO_FIJO/$alto;
  }
  $nuevoAncho=$ancho * $proporcion;
  $nuevoAlto= $alto * $proporcion;
  //$imagenAEscala = imagescale($imagenBase,$nuevoAncho,$nuevoAlto,IMG_BILINEAR_FIXED);
 $imagenAEscala=imagecreatetruecolor($nuevoAncho,$nuevoAlto);
 imagecopyresampled($imagenAEscala,$imagenBase,0,0,0,0,$nuevoAncho,$nuevoAlto,$ancho,$alto);
 
  if ($esHorizontal && ($nuevoAlto > ALTO_FIJO)){
	$pedazoDeImagen=array(
	  'x' => (($nuevoAncho - ANCHO_FIJO)/2),
	  'y' => (($nuevoAlto - ALTO_FIJO)/2),
	  'width' => ANCHO_FIJO,
	  'height' => ALTO_FIJO
	);
	//$imagenRecortada=imagecrop($imagenAEscala,$pedazoDeImagen);
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO, ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'../img/'.$nom_arch);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO, ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'../img/'.$nom_arch);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  
  
 // $movido = move_uploaded_file($nom_temp, "../img/home1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :../img/$nom_arch<br/>";
?>
<p>Imagen 0 cargada con exito</p>
<?php
  } else {
?>
<p>Imagen 0 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}

	$q="INSERT INTO posts SET "
			."titulo='$titulo', "
			."resena='$resena', "
			."id_categorias='$categoria', "
			."id_users='$autor', "
			."fecha='$date'";

	if ($nom_arch != "") {
		$q.=", foto_principal= '$nom_arch'";
	}
	echo $q;
	$rs = ejecutar($q);
	?>
<script>
 parent.parent.location.reload();
</script>
