<?php 
    require("clases/Equipo.php");
    $datos = array("nombreJugador"=>"", "edadJugador"=>"","posicionJugador"=>"", "puntosJugador"=>"", "equipo" => "");
    $sql = "SELECT j.*, e.nombre AS nombreEquipo FROM Jugadores j LEFT JOIN Equipos e ON(e.id = j.idEquipo) WHERE j.id = ". $_GET['id'];
    $equipoSql = $mysqli->query($sql);

    $equipoTmp = $equipoSql->fetch_assoc();
    if($equipoTmp){
        $datos = array("nombreJugador"=>$equipoTmp['nombre'], "edadJugador"=>$equipoTmp['edad'],
"posicionJugador"=>$equipoTmp['posicion'], "puntosJugador"=>$equipoTmp['puntos'], "equipo" => $equipoTmp['nombreEquipo']);
    }
    $mysqli->close();
   
?>
<h1>Ficha</h1>
<div class="container">
<div class="row">
        <div class="col-12 text-left mb-2">Equipo: <?php echo $datos["equipo"];?></div>
    </div>
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