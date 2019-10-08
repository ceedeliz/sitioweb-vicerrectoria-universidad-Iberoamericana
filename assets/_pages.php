   <div class="paginate">
        <p>Reseñas más antiguas:</p>
         <div class="antiguas">
              <?php
            // echo $registrospagina."/";
                 $pag_min=1;
                echo ("<a href='archivo.php?pag=".$pag_min."'>"."<<"."</a>&nbsp;&nbsp;");	
              for ($i=1; $i<=$numPaginas && $i > 0; $i++ ){
                $pag_max=$i;
                echo ("<a href='archivo.php?pag=".$i."'>".$i."</a>&nbsp;&nbsp;");	
                }
                echo ("<a href='archivo.php?pag=".$pag_max."'>".">>"."</a>&nbsp;&nbsp;");	
               ?>
          </div>
      </div>