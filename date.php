<?php
include ("conexion.php");

?>
<!doctype html>
<html>
<?php include("assets/_head.php"); ?>

    <!-- Navigation -->
	<body>
 

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
        }
          
   <div class="container mt-5">

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-7 mb-4">
 <?php

            if(isset($_GET['m']) && isset($_GET["y"])) {
            $mes=($_GET['m']);
            $ano =($_GET["y"]);
            switch ($mes) {
                case "Enero":
                    $date_mes = 1;
                    break;
                case "Febrero":
                    $date_mes = 2;
                    break;
                case "Marzo":
                    $date_mes = 3;
                    break;  
                case "Abril":
                    $date_mes = 4;
                    break;
                case "Mayo":
                    $date_mes = 5;
                    break;
                case "Junio":
                    $date_mes = 6;
                    break;
                case "Julio":
                    $date_mes = 7;
                    break;
                case "Agosto":
                    $date_mes = 8;
                    break;
                case "Septiembre":
                    $date_mes = 9;
                    break;
                case "Octubre":
                    $date_mes = 10;
                    break;
                case "Noviembre":
                    $date_mes = 11;
                    break;
                case "Diciembre":
                    $date_mes = 12;
                    break;
            }
            $fecha_inicio = $ano."-".$date_mes."-"."01";
            $fecha_fin = $ano."-".$date_mes."-"."31";
            $sql= "SELECT *, C.nombre as categoria, U.nombre as autor FROM posts P inner join users U on P.id_users=U.id_users inner join categorias C on C.id_categorias=P.id_categorias WHERE fecha >= '$fecha_inicio' and fecha <= '$fecha_fin' ORDER BY fecha";

            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs);


            }else{

            $sql= "SELECT *, C.nombre as categoria, U.nombre as autor FROM posts P inner join users U on P.id_users=U.id_users inner join categorias C on C.id_categorias=P.id_categorias order by fecha DESC";
            //$sql="SELECT * FROM posts WHERE fecha >= '$fecha_inicio' and fecha <= '$fecha_fin' ORDER BY fecha";
            //echo $sql;
            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs);   
        }
            ?>
              <div class="col-lg-12 mb-4">
            <h3 id="archivo_titulos">Por fecha:(<?php if (isset($fecha_inicio)) { echo $mes."-".$ano;} else 
            { echo "descendente"; } ?>)</h3>
            </div>
              <?php
                    while($datos=mysqli_fetch_array($rs)){
                ?>

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
                  <?php
                } 
            ?>
          </div>
       
          <?php include("assets/_side_menu.php"); ?>
    <!-- /.container -->
        </div>
        </div>

      <?php include ("assets/_footer.php") ?>
    </body>
</html>
