<?php
include ("conexion.php");
ini_set('display_errors', '1');
//var_dump((int)($datos["calificacion"]))
?>

<!DOCTYPE html>
<html lang="en">

<?php include("assets/_head.php"); ?>
  <body>

<!-- Features Section -->
    <div class="container">
      <div class="row internas">
        <?php

            if (isset($_GET['id_user'])) {
            $user=$_GET['id_user'];
            $q="SELECT * FROM users where id_users= $user";
            $res=ejecutar($q);
            $datos = mysqli_fetch_array($res);
        }
        ?>
       
            <div class="card">
            <h2  class="card-header"><?php echo($datos["nombre"])?></h2>  
          <div class="profile-container">
                <img class="img-responsive rounded profile-picture" src="img/<?php echo $datos["avatar"]?>" alt="">
                </div>
          <div class="card-body"><p><?php echo($datos["frase"])?></p></div>
          <div class="card-footer"><p><?php echo($datos["email"])?></p></div>
        </div>
   
      </div>
     </div>

    </body>
</html>
    