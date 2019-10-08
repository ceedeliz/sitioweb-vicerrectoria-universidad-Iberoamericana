    <footer>
      <div class="footer1">
      <a href="">Inicio</a>
      <a href="about.html">Acerca de nosotros</a>
      <a href="">Archivo</a>
      </div>
      <div class="footer2">
        <figure><img src ="img/jalp.jpg"></figure>
          <p><a href="">José Lara</a><br>
        Economista haciendo reseñas de comida.</p>
      </div>
      <div class="footer3">
      <p>FoodTipsMX</p>
      <p>2007 Reseñas de comida</p>
<?php
if(isset($_SESSION['email'])){ ?>
    <p><a href="panel.php">Regresar al panel</a> </p>
<?php }else { ?> 

          <?php } ?>

      </div>
    </footer>