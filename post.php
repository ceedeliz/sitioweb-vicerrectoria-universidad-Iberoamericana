<?php
include ("conexion.php");
ini_set('display_errors', '1');
//var_dump((int)($datos["calificacion"]))
?>

<!DOCTYPE html>
<html lang="en">

<?php include("assets/_head.php"); ?>
  <body>

    <!-- Navigation -->
<?php include("assets/_nav.php"); ?>
      
<!-- Features Section -->
    <div class="container">
      <div class="row internas">
        <?php

            if (isset($_GET['id_post'])) {
            $post=$_GET['id_post'];
            $q="SELECT * FROM posts inner join users on posts.id_users=users.id_users where id_posts= $post";
            $res=ejecutar($q);
            $datos = mysqli_fetch_array($res);
        }
        ?>
        <div class="col-lg-12">
          <h2><?php echo($datos["titulo"])?></h2>

        </div>
        <div class="col-lg-12">
          <img class="img-fluid rounded" src="img/<?php echo $datos["foto_principal"]?>" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-9">
          <p><?php echo $datos["resena"]; ?></p>
        <?php
           if (isset($datos['doc'])) {
        ?>
            <a href="files/<?php echo ($datos["doc"]) ?>" class="doc-file"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descardar adjunto</a>
        <?php
           }    
        ?>
        </div>
 
        <?php include("assets/_side_menu_in.php") ?>

      </div>
      </div>
        <?php include("assets/_footer.php") ?>
    </body>
</html>
    