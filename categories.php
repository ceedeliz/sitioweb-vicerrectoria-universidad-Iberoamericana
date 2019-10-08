<?php
include ("conexion.php");
ini_set('display_errors', '1');
//var_dump((int)($datos["calificacion"]))
?>
<!doctype html>
<html>
   <?php include ("assets/_head.php") ?>
	<body>
   <?php include ("assets/_nav.php") ?>

    <div class="container">
           <div class="row internas">
                <div class="row mb-4">
                 <div class="col-md-9">

              <?php 
if(isset($_GET['id'])) {
 $id=($_GET['id']);
}
$q = "select * from categorias where id_categorias =$id";
$res=ejecutar($q);
$categoria=mysqli_fetch_array($res);
    
$sql="SELECT *, C.nombre as categoria, U.nombre as autor FROM posts P inner join users U on P.id_users=U.id_users inner join categorias C on C.id_categorias=P.id_categorias where C.id_categorias = $id";
//echo $sql;
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);

?> 
            <h3 class="mt-2 titulo-ibero titulo-interno">Categoria: <?php echo $categoria["nombre"] ?></h3>
  <?php
    while($datos=mysqli_fetch_array($rs)){
	?>
            <div class="col-md-12 mb-4">
                <div class="card h-100">
                   <h4 class="card-header"><a href="post.php?id_post=<?php echo($datos["id_posts"]) ?>"><?php echo nl2br($datos["titulo"])?></a></h4>
        <div class="card-body">
                    <img class="img-fluid rounded" src="img/<?php echo $datos["foto_principal"]?>"/>
                    </div>
        <div class="card-footer">
            <p>Publicado en : <a href="categories.php?id=<?php echo($datos["id_categorias"])?>"><?php echo($datos["categoria"])?></a> por  <a href="profile.php?id=<?php echo($datos["id_users"])?>"><?php echo($datos["autor"])?></a> el <?php echo ($datos["fecha"])?></p>
         <a class="btn btn-primary" href="post.php?id_post=<?php echo($datos["id_posts"]) ?>"> Leer más </a>
        </div>       
                </div>

 


</div>

      <?php
    }   ?>

                </div>
                <?php include ("assets/_side_menu_in.php") ?>
               </div>
            </div>
        </div>
        <?php include ("assets/_footer.php") ?>
    </body>
</html>