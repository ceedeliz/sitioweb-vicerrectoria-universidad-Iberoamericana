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
        width: 10%;

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
    
    .select {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        height: 60px;
        margin-top: 10px;
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
if(isset($_GET['id'])) {
 $id=($_GET['id']);
}
$q = "select * from posts where id_posts =$id";
$res=ejecutar($q);
$datos=mysqli_fetch_array($res)
?>



<form method="post" action="_edit_post_db.php" enctype="multipart/form-data" >
<div class="column">
<h1>Editar articulo:</h1>
    
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <label>Titulo:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $datos['titulo']?>" required /><br/>           

    <label>Reseña:</label>
        <div class="format-text">
    <textarea id="summernote"  name="resena" class="jqte-test" placeholder="Escribe tu reseña">
            <?php echo $datos['resena']?>
            </textarea>    </div>
            <div class="select">
    <label>Categoría:</label>
 <select name="categoria" value="">
    

    <?php 
    $selected = $datos['id_categorias'];
	$q = "select * from categorias";
$res=ejecutar($q);
while ($r=mysqli_fetch_array($res)){

	
	
	?>
    <option value="<?php echo $r['id_categorias'];?>"  <?php if ($selected == $r['id_categorias']) {  echo ("selected"); } ?>   > <?php echo $r['nombre'];?></option>
   <?php 
	
	}
	?>
    </select>
    </div>
    <input id="boton" type="submit" value="Actualizar" name="submit"  />

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