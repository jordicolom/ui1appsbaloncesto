<?php 
    require("clases/Partido.php");

    $datos = array("equipoLocal"=>"", "equipoVisitante"=>"","fecha"=>"", "puntosLocal"=>"", "puntosVisitante" => "");

    $sql = "SELECT p.*, e.nombre AS equipoLocal, ee.nombre AS equipoVisitante FROM Partidos p LEFT JOIN Equipos e ON(e.id = p.equipoLocal) ";
    $sql .="LEFT JOIN Equipos ee ON(ee.id=p.equipoVisitante) WHERE p.id = ". $_GET['id'];
    $partidoSql = $mysqli->query($sql);

    $partidoTmp = $partidoSql->fetch_assoc();
    if($partidoTmp){
        $datos = array("equipoLocal"=>$partidoTmp['equipoLocal'], "equipoVisitante"=>$partidoTmp['equipoVisitante'],
"fecha"=>$partidoTmp['fecha'], "puntosLocal"=>$partidoTmp['puntosLocal'], "puntosVisitante" => $partidoTmp['puntosVisitante']);
    }
    $mysqli->close();
   
?>
<h1>Partido</h1>
<div class="container">
   <div class="row">
        <div class="col-12 text-left mb-2">Equipo Local: <?php echo $datos["equipoLocal"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Equipo Visitante: <?php echo $datos["equipoVisitante"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Fecha: <?php echo $datos["fecha"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mb-2">Resultado: <?php echo $datos["puntosLocal"] . " - " . $datos["puntosVisitante"];?></div>
    </div>
    <div class="row">
        <div class="col-12 text-left mt-5">
            <a href="?menu=partidos" class="btn btn-info" role="button">< Volver a partidos</a>
        </div>
    </div>
</div>