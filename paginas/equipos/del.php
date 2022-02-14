<?php
    require("clases/Equipo.php");
    if($_POST['idBorrar']){
        $sql = "SELECT * FROM Equipos WHERE id = ". $_POST['idBorrar'];
        $equipoSql = $mysqli->query($sql);
        $equipoTmp = $equipoSql->fetch_assoc();
        if($equipoTmp){
            $equipo = new Equipo($equipoTmp['id'], $equipoTmp['nombre']);
            $sql = "DELETE FROM Equipos where id=" . $equipo->getId();
            $mysqli->query($sql);
        }
        $mysqli->close();
    }
    header("Location: ?menu=equipos");
?>