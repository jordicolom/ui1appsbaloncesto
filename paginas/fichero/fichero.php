<h1>FICHEROS</h1>

<?php
    $datosPartidosJson = null;
    if(isset($_FILES['fichero'])){
        $datosPartidos = file_get_contents($_FILES['fichero']['tmp_name']);
        $datosPartidosJson = json_decode($datosPartidos,true);
        
    }
?>
<div class="container">
   <div class="row">
        <div class="col-12 text-right mb-2">
            <a href="?menu=ficherosadd" class="btn btn-info" role="button">Cargar Nuevo Fichero</a>
        </div>
    </div>
  <div class="row">
    <div class="col-12">
      <?php 
        if($datosPartidosJson!=""){
            print_r($datosPartidosJson);
        }   
        ?>
    </div>
  </div>
</div>