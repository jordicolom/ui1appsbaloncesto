<h1>FICHEROS</h1>

<?php
    $datosPartidosJson = null;
    if(isset($_FILES['fichero'])){
        $datosPartidos = file_get_contents($_FILES['fichero']['tmp_name']);
        $datosPartidosJson = json_decode($datosPartidos,true);
        foreach($datosPartidosJson as $partido){
            $sql = "INSERT INTO Partidos(equipoLocal, equipoVisitante, fecha, puntosLocal, puntosVisitante)VALUES(";
            $sql .= $partido['local'] . "," . $partido['visitante'] . ",'" . $partido['fecha'] . "',";
            $sql .= $partido['puntosLocal'] . "," . $partido['puntosVisitante'] . ")";
            $mysqli->query($sql);
            
        }
        $mysqli->close();
        header("Location: ?menu=partidos");
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
    </div>
  </div>
</div>