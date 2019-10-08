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
<script type='text/javascript' src="js/jquery-3.2.1.js"></script>
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
.fileContainer {
    overflow: hidden;
    position: relative;
    height: 50px;
    width: 70px;
    background:url(img/empty_folder.png) center top no-repeat;
    background-size: 100%;
    padding-top: 20px;
    margin: 20px;
}

.fileContainer [type=file] {
    cursor: inherit;
    display: block;
    font-size: 999px;
    filter: alpha(opacity=0);
    min-height: 100%;
    min-width: 100%;
    opacity: 0;
    position: absolute;
    right: 0;
    text-align: right;
    top: 0;
    cursor: pointer;

}
    .file_selected {
        background:url(img/full_folder.png) center top no-repeat;
        background-size: 100%;
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
<script>

$( document ).ready(function() {
        console.log("jasadlñkadjskñl");
        $("#boton0").change(function(){
            var fileName = $("#boton0").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_0").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_0").removeClass("file_selected");

            } 
        });
    $("#boton1").change(function(){
            var fileName = $("#boton1").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_1").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_1").removeClass("file_selected");

            } 
        });
        $("#boton2").change(function(){
            var fileName = $("#boton2").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_2").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_2").removeClass("file_selected");
            } 
        });
        $("#boton3").change(function(){
            var fileName = $("#boton3").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_3").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_3").removeClass("file_selected");
            } 
        });
        $("#boton4").change(function(){
            var fileName = $("#boton4").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_4").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_4").removeClass("file_selected");
            } 
        });
        $("#boton5").change(function(){
            var fileName = $("#boton5").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_5").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_5").removeClass("file_selected");
            } 
        });
        $("#boton6").change(function(){
            var fileName = $("#boton6").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_6").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_6").removeClass("file_selected");
            } 
        });
        $("#boton7").change(function(){
            var fileName = $("#boton7").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_7").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_7").removeClass("file_selected");
            } 
        });
        $("#boton8").change(function(){
            var fileName = $("#boton8").val();
            if(fileName) { // returns true if the string is not empty
                $("#boton_contenedor_8").addClass("file_selected");
            } else { // no file was selected
                $("#boton_contenedor_8").removeClass("file_selected");

            } 
        });
});
   
</script>
</head>

<body>
<div  id="contenedor">
<?php 
if(isset($_GET['id'])) {
 $id=($_GET['id']);
}
?>


<form method="post" action="_add_images_db.php" enctype="multipart/form-data" >
<h1>Modificar articulo:</h1>
    <label>Foto principal</label>
    <input type="hidden" name="id" value="<?php echo $id ?>"> 
     <label id="boton_contenedor_0" class="fileContainer">
     <input id="boton0" type="file" id="file" name="file0"/><br/>
    </label>    
    <br>
    <label>Fotos:(Puedes seleccionar hasta 8 fotos)</label>
    <input type="hidden" name="id" value="<?php echo $id ?>"> 
     <label id="boton_contenedor_1" class="fileContainer">
     <input id="boton1" type="file" id="file" name="file1"/><br/>
    </label>
    <label id="boton_contenedor_2" class="fileContainer">
     <input id="boton2" type="file" id="file" name="file2"/><br/>
    </label>
    <label id="boton_contenedor_3" class="fileContainer">
     <input id="boton3" type="file" id="file" name="file3"/><br/>
    </label>
    <label id="boton_contenedor_4" class="fileContainer">
     <input id="boton4" type="file" id="file" name="file4"/><br/>
    </label>
    <label id="boton_contenedor_5" class="fileContainer">
     <input id="boton5" type="file" id="file" name="file5"/><br/>
    </label>
    <label id="boton_contenedor_6" class="fileContainer">
     <input id="boton6" type="file" id="file" name="file6"/><br/>
    </label>
    <label id="boton_contenedor_7" class="fileContainer">
     <input id="boton7" type="file" id="file" name="file7"/><br/>
    </label>
    <label id="boton_contenedor_8" class="fileContainer">
     <input id="boton8" type="file" id="file" name="file8"/><br/>
    </label>
        
    <input id="boton" type="submit" value="Añadir" name="submit"  />

</form>

</div>

</body>
</html>