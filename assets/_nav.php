    <nav class=" navegador navbar fixed-top navbar-expand-lg navbar-dark bg-white fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://www.uia.mx"><img src="img/logo_cabecera.png"> </a>
        <a class="navbar-brand" href="index.php">VICERRECTORÍA ACADÉMICA </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.php">Rumbo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Compartir
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
               <ul>
                <?php
    $sql="SELECT * FROM categorias ";
    $rs=ejecutar($sql);
    $filas = mysqli_num_rows($rs);
    $columnas=mysqli_num_fields($rs); while($datos=mysqli_fetch_array($rs)){ ?>
    
    <li>
        <a href="categories.php?id=<?php echo($datos["id_categorias"])?>"> <?php echo($datos["nombre"]); ?></a> 
       </li>
    <?php } ?>
              </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dialogar.php">Dialogar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>