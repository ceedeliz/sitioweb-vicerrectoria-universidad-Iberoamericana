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
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    
<style>
body{
    font-family: arial;
	background:#f2f2f2;
	}

form{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    margin: 0 auto;
    justify-content: center;
    background:#F5F5F4;

}
    input{
        width: 50%;
        height: 15px;
    }
    label{
        width: 100%;
        text-align: center;
        height: 10px;
        margin: 10px 0
    }
    #boton{
    margin: 30px 10%;
    height: 40px;
    width: 80px;
    border: none;
    background: gray;
    color: white;
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
    .column, .miniatura{
        background: white;
    }
    .column{
        width: 55%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }
    
    .column input, .column label {
        float: left;
        width: 80%;
    }
    textarea{
        min-width: 80%;
        max-width: 80%;
        height: 700px;
    }
    .miniatura{
        width: 20%;

        padding: 0 10px;
    }
    .miniatura label{
        display: flex;
        margin: 10px 0;
        flex-wrap: wrap;
    }
    .miniatura input{
        width: 100%;
        margin: 10px 0;
    }
    .format-text {
        width: 90%;
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


<form method="post" action="_add_postdb.php" enctype="multipart/form-data" >
    <div class="column">
<h1>Añadir nueva reseña</h1>
    
    <input type="hidden" value="<?php echo $_SESSION["id_users"] ?>" name="autor">
    <label>Titulo:</label>
    <input type="text" id="titulo" name="titulo" required /><br/>        
  
    <label>Reseña:</label>
        <div class="format-text">
    <textarea id="summernote" name="resena" class="jqte-test" placeholder="Escribe tu reseña"></textarea>    </div>
            <br/>
    </div>
    <div class="miniatura">

    
    <label>Categoría:</label>
    <br/>
 <select name="categoria" ><?php 
	$q = "select * from categorias";
    $res=ejecutar($q);
    while ($r=mysqli_fetch_array($res)){
	?>
    <option value="<?php echo $r['id_categorias'];?>"><?php echo $r['nombre'];?></option>
   <?php } ?>
    </select>
    <br/>  
    <label>Foto principal:</label>

     <input id="boton" type="file" id="file" name="file"  onchange="control(this)"/><br/>
        
    <input id="boton" type="submit" value="Añadir" name="submit"  />
</div>
</form>

</div>
        <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
        </script>
</body>
</html>