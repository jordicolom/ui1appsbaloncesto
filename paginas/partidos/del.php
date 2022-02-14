<?php
    require("clases/Partido.php");
    if($_POST['idBorrar']){
        $sql = "SELECT * FROM Partidos WHERE id = ". $_POST['idBorrar'];
        $partidoSql = $mysqli->query($sql);
        $partidoTmp = $partidoSql->fetch_assoc();
        if($partidoTmp){
            $partido = new Partido($partidoTmp['id'], $partidoTmp['equipoLocal'], $partidoTmp['equipoVisitante'], $partidoTmp['fecha'],
            $partidoTmp['puntosLocal'],  $partidoTmp['puntosVisitante']);
            $sql = "DELETE FROM Partidos where id=" . $partido->getId();
            $mysqli->query($sql);
        }
        $mysqli->close();
    }
    header("Location: ?menu=partidos");
?>