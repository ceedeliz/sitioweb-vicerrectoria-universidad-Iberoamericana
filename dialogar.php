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
    $sql="SELECT * FROM posts inner join users on posts.id_users=users.id_users";
    $sql.=" limit 3";
            
    $rs=ejecutar($sql);
    $filas = mysqli_num_rows($rs);
    $columnas=mysqli_num_fields($rs); ?>
                <?php  while($datos=mysqli_fetch_array($rs)){ ?>
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
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Foro</li>
        </ol>
        <div class="row">
      <h3 class="col-sm-8 mt-5 mb-5">Bienvenido al sitio de la vicerrectoría académica</h3>
<div class="col-sm-4 mt-5 mb-5"><a  class="btn btn-primary" href="add_topic.php"><i class="fa fa-plus-square" aria-hidden="true"></i>
 Crear nuevo tema</a> </div>
      </div>
        <!-- Marketing Icons Section -->
      <div class="row">
          <div class="col-sm-6">
   <a class="twitter-timeline" href="https://twitter.com/TwitterDev/timelines/539487832448843776?ref_src=twsrc%5Etfw">National Park Tweets - Curated tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <!-- /.container -->
        </div>
          <div class="col-sm-6">
          
          <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page"   data-width="600" data-height="1200"  data-href="https://www.facebook.com/SE.Economia/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SE.Economia/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SE.Economia/">Secretaría de Economía</a></blockquote></div>
          </div>
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
