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
    <meta charset="UTF-8">
    <title>Administrador de contenido</title>
    <link href="lity/assets/prism.css" media="all" rel="stylesheet" type="text/css">
    <link href="lity/dist/lity.css" rel="stylesheet"/>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-34232738-1', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');
    </script>

<script src="lity/vendor/jquery.js"></script>
<script src="lity/dist/lity.js"></script>
<script src="lity/assets/prism.js"></script>
    


<style>
    
        body{
            margin: 0 auto;
            width: 1280px;
            font-family: arial;
        background: #e2e2e2;
            
        }
        #contenedor{
            margin: 0 auto;
            width: 80%;
            background: white;
            padding: 15px;
            display: flex;
            flex-wrap: wrap;
        }
    h1{
        display: block;
        width: 100%;
        padding: 20px 0;
        background: #fe0032;
        color: white;
        text-align: center;
    }
img {
	width: 100px;
}
#editar img, #borrar img, #imagenes img, #mapas img {
	width: 20px;
}



#panel {
    width: 100%;
    background: none repeat scroll 0% 0% #FFF;
    text-align: center;

}
#panel table {
    float: left;
    width: 100%;
    margin-top: 15px;
}
input[type="submit"] {
    margin: 35px auto;
    margin-left: 35%;
}

#panel tr{
    font-family: "Share Tech",sans-serif;
    background-color: #F2F2F2;
    font-size: 1em;
    font-weight: 200;
}
h3{
float:left;
width:100%;
display:block;
}
 
        .boton, #logout{
            display: block;
            padding: 10px 20px;
            background: #fe0032;
            text-decoration: none;
            color: white;
            width: 40%;
            margin: 10px 0;
            border: none;
        }
    #logout{
        width: 300px;
        margin: 20px;
        margin-left: 0;
        
    }
    #form_logout{
        margin-top: 20px;
        display: flex;
    }
    
    .welcome_admin {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    #perfil {
    width: 30%;
    }
    #botones{
        width: 60%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

</style>
</head>

<body>
<div id="contenedor">
    <h1>Panel de control </h1>

  <div id="panel">
    <?php
$sql="SELECT * FROM posts inner join users on posts.id_users=users.id_users";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

   
    if(isset($_SESSION['email'])){
       
        $tipo = $_SESSION['tipo'];
        if ($tipo == 3 ) {
            ?> 
    
<div class="welcome_admin">
    <div id="perfil">
        <figure><img src="../img/<?php echo ($_SESSION['avatar']) ?> "></figure>
        <h3>Bienvenido <?php echo ($_SESSION['nombre']) ?></h3>
    </div>
    <div id="botones">
        
                  <a href="_add_post.php" class="boton" data-lity>Nueva reseña</a>
          <a href="_add_user.php" class="boton" data-lity>Nuevo usuario</a>
          <a href="_add_category.php" class="boton" data-lity>Nueva categoría</a>
          <a href="_add_date.php" class="boton" data-lity>Actualizar fecha</a>
          <a href="../index.php" class="boton">Inicio</a>
          <a href="logout.php" class="boton">Terminar sesión</a>


    </div>
</div>
    <table >
      <tr>
        <th>Post</th>
        <th>Autor</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Borrar</th>

      </tr>
      <?php
while($datos=mysqli_fetch_array($rs)){
	?>
      <tr>
        <td><?php echo substr($datos["titulo"], 0,50)."..."; ?></td>
        <td><?php echo $datos["nombre"]?></td>
        <td><?php echo $datos["fecha"]?></td>         
        <td align='center' id="editar">
            <a href='_edit_post.php?id=<?php echo $datos["id_posts"]?>' data-lity>
                <img src='../img/admin/edit.png' border='0'>
            </a>
        </td>
  
        <td align="center" id="borrar"><a href='delete_post.php?id="<?php echo  $datos["id_posts"]?>"' onClick="return verificaBorrado();"><img src='../img/admin/delete.png'  border='0'></a></td>
      </tr>
        

      <?php
}


?>
    </table>

  </div>
  <div id="panel">
    <?php
$sql="SELECT * FROM users ";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

?>
    <table >
      <tr>
        <th>Usuario</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Borrar</th>

      </tr>
      <?php
while($datos=mysqli_fetch_array($rs)){
	?>
      <tr>
        <td><figure class="preview_picture">
            <img src="../img/<?php echo $datos["avatar"]?>"/>
            </figure></td>
        <td><?php echo $datos["email"]?></td>
        <td><?php 
                if($datos["tipo"] == 2) {
                    echo ("Colaborador");
                }else{
                    echo ("Administrador");
                }
            ?>
              <a href="_alter_type_user.php?id_user=<?php echo $datos["id_users"] ?>" class="boton" data-lity>Cambiar</a>
          </td>         
        <td align="center" id="borrar"><a href='delete_users.php?id="<?php echo  $datos["id_users"]?>"' onClick="return verificaBorrado();"><img src='../img/admin/delete.png'  border='0'></a></td>
      </tr>
        

      <?php } ?>
    </table>
  </div> 
    <br>
  <div id="panel">
    <?php
$sql="SELECT * FROM categorias ";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

?>
    <table >
      <tr>
        <th>Nombre</th>
        <th>Borrar</th>

      </tr>
      <?php
while($datos=mysqli_fetch_array($rs)){
	?>
      <tr>
        <td><?php echo $datos["nombre"]?></td>         
        <td align="center" id="borrar"><a href='delete_categories.php?id="<?php echo  $datos["id_categorias"]?>"' onClick="return verificaBorrado();"><img src='../img/admin/delete.png'  border='0'></a></td>
      </tr>
        

      <?php } ?>
    </table>
  </div>
  <div id="panel">
    <?php
$sql="SELECT * FROM agenda order by id_agenda asc ";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

?>
    <table >
      <tr>
        <th>Mes</th>
        <th>Año</th>
        <th>Borrar</th>

      </tr>
      <?php
while($datos=mysqli_fetch_array($rs)){
	?>
      <tr>
        <td><?php echo $datos["mes"]?></td>         
        <td><?php echo $datos["ano"]?></td>         
        <td align="center" id="borrar"><a href='delete_date.php?id="<?php echo  $datos["id_agenda"]?>"' onClick="return verificaBorrado();"><img src='../img/admin/delete.png'  border='0'></a></td>
      </tr>
        

      <?php } ?>
    </table>
      
              <?php
            
        }else  { ?> 
    
<div class="welcome_admin">
    <div id="perfil">
        <figure><img src="../img/<?php echo ($_SESSION['avatar']) ?> "></figure>
        <h3>Bienvenido <?php echo ($_SESSION['nombre']) ?></h3>
    </div>
    <div id="botones">
        
                  <a href="_add_post.php" class="boton" data-lity>Nueva reseña</a>
          <a href="../index.php" class="boton">Inicio</a>
          <a href="logout.php" class="boton">Terminar sesión</a>


    </div>
</div>
          <?php
$user = $_SESSION["id_users"];

$sql="SELECT * FROM posts inner join users on posts.id_users=users.id_users where users.id_users = $user";
//echo $sql;
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
?>
          <table >
      <tr>
        <th>Post</th>
        <th>Autor</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Borrar</th>

      </tr>
      <?php
while($datos=mysqli_fetch_array($rs)){
	?>
      <tr>
        <td><?php echo substr($datos["titulo"], 0,50)."..."; ?></td>
        <td><?php echo $datos["nombre"]?></td>
        <td><?php echo $datos["fecha"]?></td>         
        <td align='center' id="editar">
            <a href='_edit_post.php?id=<?php echo $datos["id_posts"]?>' data-lity>
                <img src='../img/admin/edit.png' border='0'>
            </a>
        </td>
  
        <td align="center" id="borrar"><a href='delete_post.php?id="<?php echo  $datos["id_posts"]?>"' onClick="return verificaBorrado();"><img src='../img/admin/delete.png'  border='0'></a></td>
      </tr>
        

      <?php
}


?>
    </table>
      <?php } } ?>
      
        
        
  </div>
</div>
<script>
function verificaBorrado(){
	var r = confirm('Seguro que quieres borrar el elemento?');
	return r;
}
</script>
</body>
</html>
<?php
function ajustaCorreo($elCorreo) {
	if ($elCorreo != '') {
		$partes = explode('@', $elCorreo);
		return $partes[0] . '<br>@<br>' . $partes[1];
	} else {
		return '';
	}
}

function ajustapass($elPassword){
	if ($elPassword !=''){
		return substr($elPassword,0,8) . '...';
	} else {
		return '';
	}
}
?>