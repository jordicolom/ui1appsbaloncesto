<?php
    $datos = array("nombreJugador"=>"Juan Sanchez", "edadJugador"=>"22","posicionJugador"=>"Centro", "puntosJugador"=>100);
?>
<h1>Ficha</h1>
<div class="container">
   <div class="row">
        <div class="col-12 text-left mb-2">Nombre: <?php echo $datos["nombreJugador"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Edad: <?php echo $datos["edadJugador"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Posición: <?php echo $datos["posicionJugador"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Puntos: <?php echo $datos["puntosJugador"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mt-5">
            <a href="?menu=jugadores" class="btn btn-info" role="button">< Volver a jugadores</a>
        </div>
    </div>
</div>