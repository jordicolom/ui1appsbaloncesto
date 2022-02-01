<?php
    $datos = array("localPartido"=>"Barcelona", "visitantePartido"=>"Burgos","fechaPartido"=>"22/12/2021", "resultadoPartido"=>"40 - 40");
?>
<h1>Ficha</h1>
<div class="container">
   <div class="row">
        <div class="col-12 text-left mb-2">Equipo Local: <?php echo $datos["localPartido"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Equipo Visitante: <?php echo $datos["visitantePartido"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Fecha: <?php echo $datos["fechaPartido"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Resultado: <?php echo $datos["resultadoPartido"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mt-5">
            <a href="?menu=partidos" class="btn btn-info" role="button">< Volver a partidos</a>
        </div>
    </div>
</div>