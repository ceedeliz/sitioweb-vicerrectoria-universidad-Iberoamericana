          <div id="lateral-menu" class="col-lg-3 mb-4 h-100">
            <div class="col-lg-12">
              <div class="h-100">
                <h4 class="mt-2 titulo-ibero">Vicerrectoria</h4>
                <div class="card-body">
                  <p class="card-text">Lorem ipsusdam dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
            </div>
        </div>            
        <div class="col-lg-12">
                <h4 class="mt-2 titulo-ibero">Investigaciones recientes</h4>
                <div class="card-body">
                  <p class="card-text">Lorem ipsusdam dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>

            <?php
            $sql="SELECT * FROM posts ORDER BY fecha DESC  LIMIT 4";
            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs); 
            while($datos=mysqli_fetch_array($rs)) { ?>
        <div class="col-lg-12 mt-3">
            <a class="" href="post.php?id_post=<?php echo($datos["id_posts"]) ?>">
                <h5 class="lateral-titles"><?php echo($datos["titulo"]) ?></h5>
                <img class="img-fluid rounded" src="img/<?php echo $datos["foto_principal"]?>" alt=""></a>
        </div>
            <?php } ?>
     
        </div>
         <div class="col-lg-12">
              <div class="">
                <h4 class="mt-2 titulo-ibero">Categorías:</h4>
                <div class="card-body">
                  <p class="card-text">Lorem ipsusdam dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
            </div>
            <ul>
            <?php
            $sql="SELECT * FROM categorias LIMIT 4";
            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs); while($datos=mysqli_fetch_array($rs)){ ?>

            <li>
                <a href="categories.php?id=<?php echo($datos["id_categorias"]) ?>"> <?php echo($datos["nombre"]); ?></a> 
               </li>
            <?php } ?>
            </ul>
        </div>
        <div class="col-lg-12">
              <div class="">
                <h4 class="mt-2 titulo-ibero">Archivo:</h4>
                <div class="card-body">
                  <p class="card-text">Lorem ipsusdam dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
            </div>
            <ul>
            <?php
            $sql="SELECT * FROM agenda LIMIT 4";
            $rs=ejecutar($sql);
            $filas = mysqli_num_rows($rs);
            $columnas=mysqli_num_fields($rs); while($datos=mysqli_fetch_array($rs)){ ?>

            <li>
                <a href="date.php?m=<?php echo($datos["mes"]) ?>&y=<?php echo($datos["ano"]) ?>"> <?php echo($datos["mes"]." ".$datos["ano"]); ?></a> 
               </li>
            <?php } ?>
            </ul>
        </div>
        </div>
          