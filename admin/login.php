<?php

ini_set('display_errors', '1');
session_start();
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel de administración</title>
<style>
body{
	background:#e8e8e8;
    font-family: arial;
	}
#admin{
	background:#FFF;
	margin:0 auto;
	width:400px;
	height:400px;
	height:auto;
	padding-bottom:10px;
	text-align:center;
	
	}
	#admin h3{
		width:100%;
		color:#FFF;
		background-color: #fe0032;
        padding: 10px 0;
		}
		/*boton de admin*/
		#badmin{
			background-color: #fe0032;
			color:#FFF;
			padding:10px 30px;
			border:none;
			
			}
			#admin p{
				color:#F00;
				font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
				}
    input{
        margin:10px;
    }
    figure {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        margin: 10px 0;
    }
    img{
        width: 30%;
        height: 30%;
    }
</style>

</head>
<body>
<div id="admin">
<h3>
<figure><img src="../img/logo_cabecera.png"></figure>
    </h3>
<form method="post" action="login.php">
	<input type="text"  	placeholder="Email"	 name="email"/><br/>
	<input type="password" 	placeholder="Contraseña" name="pass"/><br/>
	<input id="badmin" type="submit" value="Ingresar"/>
</form>
	
<?php
include "../conexion.php";

if(isset($_POST['email']) && isset($_POST['pass'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$q = "select * from users where email = '$email' and password = '$pass'";
	//echo $q."<br>";

	$res = ejecutar($q);
	$r = mysqli_fetch_array($res);
	
	if($r) {
		echo "Logueado correctamente: ", $r["nombre"];
		// Poner variables en sesión.
		// Aquí puedes poner las variables que necesites en sesión.
		$_SESSION["email"] = $email;
		$_SESSION["nombre"] = $r["nombre"];
		$_SESSION["avatar"] = $r["avatar"];
		$_SESSION["id_users"] = $r["id_users"];
		$_SESSION["tipo"] = $r["tipo"];
        //echo $_SESSION["email"];
		$valor=true;
    header('Location:panel.php');

	} else {
		
		//echo "Verifique nombre y contraseña.";
		//echo "$mail y $pass";
		// Remueve todas las variables de sesión y la destruye.
		session_unset();
		session_destroy();
		?>
        <p>Verifica tu usuario y contraseña</p>
		
		<?PHP
	}
}

?>	
	
    </div>
</body>
</html>