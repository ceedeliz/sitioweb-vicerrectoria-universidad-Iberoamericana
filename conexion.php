<?php
//archivo de conexion

//declaramos una variable global que va a definir la conexion
global $conexion;
//1. función que hace la conexión
function conectar(){
	global $conexion;
	//datos para la conexión
	$servidor="localhost";
	$un="root";
	$pw="";
	$db="vicerrectoria";

	$conexion = mysqli_connect($servidor,$un,$pw,$db) or die("Error: No se pudo conectar al servidor.");
mysqli_set_charset($conexion, "utf8");

}

//2. función que hace la deconexión
function desconectar(){
	global $conexion;
	mysqli_close($conexion);
	
}

//3. función que ejecuta el query
function ejecutar($sql){
	global $conexion;
	//establemos la conexión
	conectar();
	//ejecutamos el query ($sql) y obtenemos el recordset (según el caso)
	$rs=mysqli_query($conexion, $sql) or die ("error en el query");
	//deconectamos
	desconectar();
	//devolvemos el recordset obtenido
	return $rs;
}


?>