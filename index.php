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

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php  
    $sql_slider="SELECT * FROM posts inner join users on posts.id_users=users.id_users order by fecha desc";
    $sql = $sql_slider;
          $sql_slider.=" limit 3";
          $rslider=ejecutar($sql_slider);

    ?>

                <?php  while($datos=mysqli_fetch_array($rslider)){ ?>
                      <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" id="slider<?php echo($datos["id_posts"]); ?>" style="background-image: url('img/<?php echo($datos["foto_principal"]); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3><?php echo($datos["titulo"]); ?></h3>
            </div>
          </div>
            <?php } ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Bienvenido al sitio de la vicerrectoría académica</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-7 mb-4">
        <?php
             
            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs);
            include("assets/_paginate.php");  
            while($datos=mysqli_fetch_array($rs)){  ?>
                <div class="col-lg-12 mb-4">
                  <div class="card h-100">
                    <h4 class="card-header"><?php echo($datos["titulo"])?></h4>
                    <div class="card-body">
                      <p class="card-text"><?php echo substr($datos["resena"],0,320); echo "..."?></p>
                    </div>
                    <div class="card-footer">
                     <a class="btn btn-primary" href="post.php?id_post=<?php echo($datos["id_posts"]) ?>"> Leer más </a>
                    </div>
                  </div>
                </div>
                <?php } ?>
         <div class="col-lg-12">
        <p>Reseñas más antiguas:</p>
         <div class="antiguas"  >
              <?php
            // echo $registrospagina."/";
                 $pag_min=1;
                echo ("<a href='index.php?pag=".$pag_min."'>"."<<"."</a>&nbsp;&nbsp;");	
              for ($i=1; $i<=$numPaginas && $i > 0; $i++ ){
                $pag_max=$i;
                echo ("<a href='index.php?pag=".$i."'>".$i."</a>&nbsp;&nbsp;");	
                }
                echo ("<a href='index.php?pag=".$pag_max."'>".">>"."</a>&nbsp;&nbsp;");	
               ?>
          </div>
      </div>
          </div>
       
          <?php include("assets/_side_menu.php"); ?>
    <!-- /.container -->
        </div>
        </div>
    <?php include("assets/_footer.php") ?>
<script>
$(document).ready(function(){
    $(".carousel-item").first().addClass("active");
 }); 

</script>
  </body>

</html>
