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
       <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="dialogar.php">Foro</a></li>
            <li class="breadcrumb-item active">Tema actual</li>
        </ol>
      <div class="row internas">

        <?php

            if (isset($_GET['id_post'])) {
            $post=$_GET['id_post'];
            $q="SELECT *, users.nombre as autor, foro.contenido as hilo FROM foro inner join users on foro.id_users=users.id_users where id_foro=$post";
            //echo $q;
            $res=ejecutar($q);
              
            $datos = mysqli_fetch_array($res);
        }
        ?>
        <div class="col-lg-12 card">
            <div class="row">
            <h2 class="col-sm-12 card-header mb-5"><?php echo($datos["titulo"])?></h2>
            <div class="col-sm-2"><a href="profile.php?id_user=<?php echo($datos["id_users"]) ?>" data-toggle="lightbox">
            <img class="img-fluid rounded" src="img/<?php echo $datos["avatar"]?>" alt="">
            <h2 class="text-center"><?php echo($datos["autor"])?></h2></a>
            <p class="text-center"><?php echo($datos["fecha_creacion"])?></p>    
            </div>
           <div class="col-sm-6">
          
          <p><?php echo($datos["hilo"])?></p>
            </div>
            <div class="col-sm-12 card-footer">
            </div>
            </div>
        </div>        
          <?php
            $q="SELECT * FROM respuestas inner join users on respuestas.id_users = users.id_users  where id_foro = $post order by fecha_creacion desc";
              //echo $q;
            $res=ejecutar($q);
         
          while($datos=mysqli_fetch_array($res)){  ?>
            <div class="col-lg-12 card pt-5">
            <div class="row">
            <div class="col-sm-2"><a href="">
            <img class="img-fluid rounded" src="img/<?php echo $datos["avatar"]?>" alt="">
            <h2 class="text-center"><?php echo($datos["nombre"])?></h2></a>
            <p class="text-center"><?php echo($datos["fecha_creacion"])?></p>    
            </div>
           <div class="col-sm-6">
          <p><?php echo($datos["contenido"])?></p>
            </div>
        <div class="col-sm-12 card-footer">
            </div>
            </div>
        </div>
            <?php }  ?>
          
        <div class="col-lg-12 mb-5 mt-5 pr-0">
                <div class="card">
                <div class="card-header">
                    <h2>Deja tu comentario:</h2></div>
            <div class="form-group card-body">
            <form action="answer_question.php" enctype="multipart/form-data" method="post" class="col-lg-12">
                <input type="hidden" name="topic" value="<?php echo $post ?>">
                <input type="hidden" name="id_user" value="<?php echo 5 ?>">
                <label for="comment">Respuesta:</label>
                <textarea name="answer"  class="form-control" placeholder="Escribe tu respuesta aqui..." id="summernote"></textarea>
            

                <input type="submit" value="Enviar" class="btn btn-default mt-5">
            </form>
              </div>
                </div>    
        </div>
      </div>
      <!-- /.row -->

      </div>
        <?php include("assets/_footer.php") ?>
        <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
        </script>

    </body>
</html>
    