<?php
include ("../conexion.php");
ini_set('display_errors', '1');

session_start();
if(!isset($_SESSION['email']) || $_SESSION['tipo'] != 3){
header("HTTP/1.1 401 Unauthorized");
   ?>
<h1>Acceso no autorizado</h1>
<?php

    exit;

}   
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Añadir reseña</title>
<style>
body{
    font-family: arial;
	background:#f2f2f2;
	}

form{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    margin: 0 auto;
    justify-content: center;
    background: white;

}
    input{
        width: 50%;
        
    }
    label{
        margin: 20px 0px;
        width: 100%;
        text-align: center;
    }
    #boton{
        margin: 10px 10%;
    }

#contenedor {
    margin: 0 auto;
    width: 300px;
    background-color:#FFF;
    display: flex;
    flex-wrap: wrap;
}
h1 {
position: initial;
color: #333;
width: 100%;
text-align: center;
margin-bottom: 17px;
font-size: 1.25em;
margin-top: 15px;
}
</style>
</head>

<body>
<div  id="contenedor">
    <?php
if(isset($_GET['id_user'])){
$id = ($_GET['id_user']);    
    }
?>

<form method="post" action="_alter_type_user.php?id_user=<?php echo $id; ?>" enctype="multipart/form-data" >
<h1>Tipo de usuario:</h1>
    
    <input type="hidden" value="<?php echo ($id); ?>" name="usuario">
    <label>Tipo:</label>
 <select name="tipo" >
    <option value="2">Colaborador</option>
    <option value="3">Administrador</option>

    </select>    <input id="boton" type="submit" value="Cambiar" name="submit"  />

</form>
    
<?php
if(isset($_POST['tipo'])) {
	$tipo = $_POST['tipo'];
	$id_user = $_POST['usuario'];
	$q="update users set tipo='$tipo' where id_users='$id_user'";
    echo $q;

    $rs = ejecutar($q);
    ?>
    
    <script> 
        parent.parent.location.reload();
    </script>
    <?php
}
?>
</div>

</body>
</html>