<?php
    require("clases/Jugador.php");
    if($_POST['idBorrar']){
        $sql = "SELECT * FROM Jugadores WHERE id = ". $_POST['idBorrar'];
        $jugadorSql = $mysqli->query($sql);
        $jugadorTmp = $jugadorSql->fetch_assoc();
        if($jugadorTmp){
            $jugador = new Jugador($jugadorTmp['id'], $jugadorTmp['nombre'], $jugadorTmp['edad'], $jugadorTmp['posicion'],
            $jugadorTmp['puntos'], $jugadorTmp['idEquipo']);
            $sql = "DELETE FROM Jugadores where id=" . $jugador->getId();
            $mysqli->query($sql);
        }
        $mysqli->close();
    }
    header("Location: ?menu=jugadores");
?>