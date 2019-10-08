<?php
include_once "../conexion.php";
ini_set('display_errors', '1');
session_start();
define('ANCHO_FIJO',500);
define('ALTO_FIJO',500);


print_r($_FILES);

if ($_FILES['file0']['error']>0){
  echo "error	". $_FILES ['file0']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file0']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file0']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file0']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file0']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file0']['tmp_name'];
  $nom_arch0=$timestamp.$_FILES['file0']['name'];


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
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch0);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO, ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch0);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  
  
 // $movido = move_uploaded_file($nom_temp, "img/home1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch0<br/>";
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

if ($_FILES['file1']['error']>0){
  echo "error	". $_FILES ['file1']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file1']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file1']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file1']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file1']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file1']['tmp_name'];
  $nom_arch1=$timestamp.$_FILES['file1']['name'];


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
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch1);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO, ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch1);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  
  
 // $movido = move_uploaded_file($nom_temp, "img/home1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch1<br/>";
?>
<p>Imagen 1 cargada con exito</p>
<?php
  } else {
?>
<p>Imagen 1 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}


if ($_FILES['file2']['error']>0){
  echo "error	". $_FILES ['file2']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file2']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file2']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file2']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file2']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file2']['tmp_name'];
  $nom_arch2=$timestamp.$_FILES['file2']['name'];
  
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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch2);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch2);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  

  //$movido = move_uploaded_file($nom_temp, "img/home2.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch2<br/>";
	?>
<p>Imagen 2 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 2 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}
?>

<?php


if ($_FILES['file3']['error']>0){
  echo "error	". $_FILES ['file3']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file3']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file3']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file3']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file3']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file3']['tmp_name'];
  $nom_arch3=$timestamp.$_FILES['file3']['name'];
  
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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch3);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch3);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  

  //$movido = move_uploaded_file($nom_temp, "img/home3.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch3<br/>";
	?>
<p>Imagen 3 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 3 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}
?>

<?php


if ($_FILES['file4']['error']>0){
  echo "error	". $_FILES ['file4']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file4']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file4']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file4']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file4']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file4']['tmp_name'];
  $nom_arch4=$timestamp.$_FILES['file4']['name'];

  
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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch4);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch4);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  
  //$movido = move_uploaded_file($nom_temp, "img/home5.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch4<br/>";
	?>
<p>Imagen 4 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 4 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}

?>

<?php


if ($_FILES['file5']['error']>0){
  echo "error	". $_FILES ['file5']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file5']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file5']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file5']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file5']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file5']['tmp_name'];
  $nom_arch5=$timestamp.$_FILES['file5']['name'];

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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch5);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch5);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  


  //$movido = move_uploaded_file($nom_temp, "img/Slideshow1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch5<br/>";
	?>
<p>Imagen 5 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 5 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}
?>

<?php


if ($_FILES['file6']['error']>0){
  echo "error	". $_FILES ['file6']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file6']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file6']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file6']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file6']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file6']['tmp_name'];
  $nom_arch6=$timestamp.$_FILES['file6']['name'];

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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch6);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch6);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  


  //$movido = move_uploaded_file($nom_temp, "img/Slideshow1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch6<br/>";
	?>
<p>Imagen 6 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 6 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}
?>


<?php


if ($_FILES['file7']['error']>0){
  echo "error	". $_FILES ['file7']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file7']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file7']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file7']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file7']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file7']['tmp_name'];
  $nom_arch7=$timestamp.$_FILES['file7']['name'];

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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch7);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch7);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  


  //$movido = move_uploaded_file($nom_temp, "img/Slideshow1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch7<br/>";
	?>
<p>Imagen 7 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 7 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}
?>

<?php


if ($_FILES['file8']['error']>0){
  echo "error	". $_FILES ['file8']['error']."<br/>";
} else {
  $timestamp = time();
  echo "Archivo		" .$_FILES ['file8']['name']. "<br/>";
  echo "Archivo		" .($_FILES ['file8']['size']). "Kb<br/>";
  echo "Archivo		" .$_FILES ['file8']['type']. "<br/>";
  echo "Archivo		" .$_FILES ['file8']['tmp_name']. "<br/>";
  $nom_temp=$_FILES['file8']['tmp_name'];
  $nom_arch8=$timestamp.$_FILES['file8']['name'];

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
	$imagenRecortada=imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	imagecopyresampled($imagenRecortada,$imagenAEscala,0,0,0,($nuevoAlto-ALTO_FIJO)/2,$nuevoAncho,ALTO_FIJO,ANCHO_FIJO,ALTO_FIJO);
	$sePudo= imagejpeg($imagenRecortada,'img/'.$nom_arch8);
	imagedestroy($imagenRecortada);
  }else{
	  //se va pegar en un nuevo lienzo
	  $nuevoLienzo= imagecreatetruecolor(ANCHO_FIJO,ALTO_FIJO);
	  //despues se rellenara de color
	  $color=imagecolorallocate($nuevoLienzo,255,255,255);
	  imagefilledrectangle($nuevoLienzo,0,0,ANCHO_FIJO, ALTO_FIJO,$color);
	  
	  //finalmente se copia la imagen a escala en el nuevo espacio
	  
	  imagecopy($nuevoLienzo,$imagenAEscala,(ANCHO_FIJO - $nuevoAncho)/2,(ALTO_FIJO - $nuevoAlto)/2,0,0,$nuevoAncho,$nuevoAlto);
	  	$sePudo= imagejpeg($nuevoLienzo,'img/'.$nom_arch8);
		imagedestroy($nuevoLienzo);

  }
  imagedestroy($imagenAEscala);
  imagedestroy($imagenBase);
}
  
			  


  //$movido = move_uploaded_file($nom_temp, "img/Slideshow1.jpg");

  if ($sePudo){
	echo"Archivo almacenado en :img/$nom_arch8<br/>";
	?>
<p>Imagen 8 cargada con exito</p>
<?php
	
  }else{
	  ?>
<p>Imagen 8 no cargada</p>
<?php	  
	//echo"Archivo NO cargado.<br/>";
  }
}

?>

<?php 
$id     	   = $_POST['id'];

$q="update posts set ";
 isset($nom_arch0) ? $q.= "foto_principal = '$nom_arch0' " : '';
 isset($nom_arch0) && isset( $nom_arch1) ? $q.= ",  " : '';
 isset($nom_arch1) ? $q.= "img1 ='$nom_arch1' " : '';
 isset($nom_arch1) && isset( $nom_arch2) ? $q.= ",  " : '';
 isset($nom_arch2) ? $q.= "img2 ='$nom_arch2' " : '';
 isset($nom_arch2) && isset( $nom_arch3)? $q.= ",  " : '';
 isset($nom_arch3) ? $q.= "img3 ='$nom_arch3' " : '';
 isset($nom_arch3) && isset( $nom_arch4)? $q.= ",  " : '';
 isset($nom_arch4) ? $q.= "img4 ='$nom_arch4' " : '';
 isset($nom_arch4) && isset( $nom_arch5)? $q.= ",  " : '';
 isset($nom_arch5) ? $q.= "img5 ='$nom_arch5' " : '';
 isset($nom_arch5) && isset( $nom_arch6)? $q.= ",  " : '';
 isset($nom_arch6) ? $q.= "img6 ='$nom_arch6' " : '';
 isset($nom_arch6) && isset( $nom_arch7)? $q.= ",  " : '';
 isset($nom_arch7) ? $q.= "img7 ='$nom_arch7' " : '';
 isset($nom_arch7) && isset( $nom_arch8)? $q.= ",  " : '';
 isset($nom_arch8) ? $q.= "img8 ='$nom_arch8' " : '';
$q.="where id_posts= '$id'";	


echo $q;
$rs=ejecutar($q);
//  header('Location:adhome.php');

?>

<script>
 parent.parent.location.reload();
</script>

