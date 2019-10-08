<?php
include ("../conexion.php");
ini_set('display_errors', '1');

session_start();

if(!isset($_SESSION['email'])){
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

#conedor {
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
<script type="text/javascript">
function control(f){
    var ext=['gif','jpg','jpeg','png'];
    var v=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v)
            return
    }
    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    alert('extensión no válida');
}
</script>
</head>

<body>
<div  id="contenedor">
<?php 
if(isset($_GET['not'])){
?>
 <script>
 alert("El auto ha sido agregada con éxito");
 </script>

<?php
}

?>


<form method="post" action="_add_category_db.php" enctype="multipart/form-data" >
<h1>Añadir nueva categoría</h1>
    
    <input type="hidden" value="<?php echo $_SESSION["id_users"] ?>" name="autor">
    <label>Nombre:</label>
    <input type="text" id="nombre" name="nombre" required /><br/>        

        
    <input id="boton" type="submit" value="Añadir categoría" name="submit"  />

</form>

</div>

</body>
</html>