<?php
$registrospagina=5;
$numPaginas=ceil($filas/$registrospagina);

 if(isset($_REQUEST['pag'])){
     //si se ha enviado el querystring 
     //recuperamos dicho qrystring para determinar que pagina desplegamos
     $pag=$_REQUEST['pag'];
     //hacemos el query para desplegar los registros de la pagina seleccionada 
     $sql.=" LIMIT ".($pag-1)*$registrospagina.",".$registrospagina;	
  }else{
      $pag=1;
      $pag_max=1;
      //no se ha enviado el qry string (la pagina se abre por primera vez y desplegamos los primeros registros del recordset)
      $sql.=" LIMIT 0,".$registrospagina;	
		}
?>