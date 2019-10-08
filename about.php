<?php
include ("conexion.php");
ini_set('display_errors', '1');

?>

<!DOCTYPE html>
<html lang="en">
<?php include("assets/_head.php"); ?>
<?php include("assets/_nav.php"); ?>
  <body>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-5 mb-3">About
        <small>Subheading</small>
      </h1>

      <!-- Intro Content -->
      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="http://placehold.it/750x450" alt="">
        </div>
        <div class="col-lg-6">
          <h2>About Modern Business</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Team Members -->
      <h2>Our Team</h2>

      <div class="row">
             <?php
$sql="SELECT * FROM users";

//ejecutamos el query y obtenemos el recordset
$rs=ejecutar($sql);
$filas = mysqli_num_rows($rs);
$columnas=mysqli_num_fields($rs);
//echo "El recordset obtenido tiene ".$filas." filas y ".$columnas." columnas";

while($datos=mysqli_fetch_array($rs)){
	?>

        
        <div class="col-lg-4 mb-4">
          <div class="card h-100 text-center">
            <img class="card-img-top" src="img/<?php echo $datos["avatar"]?>" alt="">
            <div class="card-body">
              <h4 class="card-title"><?php echo $datos["nombre"] ?></h4>
              <h6 class="card-subtitle mb-2 text-muted">Position</h6>
              <p class="card-text"><?php echo $datos["frase"]?> </p>
            </div>
            <div class="card-footer">
              <a href="#"><?php echo $datos["email"]?> </a>
            </div>
          </div>
        </div>
      <?php
}


?>

          
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include("assets/_footer.php") ?>


  </body>

</html>
