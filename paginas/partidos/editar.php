<?php
$equiposLocal = $mysqli->query("SELECT * FROM Equipos ORDER BY nombre ASC");
$equiposVisitante = $mysqli->query("SELECT * FROM Equipos ORDER BY nombre ASC");

    $fecha =  "";
    $id = 0;
    $idEquipoLocal = 0;
    $idEquipoVisitante = 0;
    $puntosLocal = "";
    $puntosVisitante = "";

    $sql = "SELECT * FROM Partidos WHERE id=". $_GET['id'];
    $partidoSql = $mysqli->query($sql);

    $partidoTmp = $partidoSql->fetch_assoc();
    if($partidoTmp){
        $id =  $partidoTmp['id'];
        $fecha =  $partidoTmp['fecha'];
        $idEquipoLocal =  $partidoTmp['equipoLocal'];
        $idEquipoVisitante =  $partidoTmp['equipoVisitante'];
        $puntosLocal =  $partidoTmp['puntosLocal'];
        $puntosVisitante =  $partidoTmp['puntosVisitante'];
    }
    $mysqli->close();
?>
<h1>Partido</h1>

<form method="post" action="?menu=partidos">
 <div class="form-group">    
        <label for="exampleInputEmail1">Equipo Local</label>
        <select name="equipoLocal" id="equipoLocal" class="form-select" aria-label="Default select example">
            <option value="0" >Seleccionar equipo</option>
            <?php
                while ($equipo = $equiposLocal->fetch_assoc()) :
            ?>
                <option <?php if($equipo['id'] == $idEquipoLocal){echo " selected ";};?> value="<?=$equipo['id'];?>"><?=$equipo['nombre'];?></option>
            <?php
                endwhile;
            ?>
        </select>
    </div>
  <div class="form-group">    
        <label for="exampleInputEmail1">Equipo Visitante</label>
        <select name="equipoVisitante" id="equipoVisitante" class="form-select" aria-label="Default select example">
            <option value="0" >Seleccionar equipo</option>
            <?php
                while ($equipo = $equiposVisitante->fetch_assoc()) :
            ?>
                <option <?php if($equipo['id'] == $idEquipoVisitante){echo " selected ";};?> value="<?=$equipo['id'];?>"><?=$equipo['nombre'];?></option>
            <?php
                endwhile;
            ?>
        </select>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Fecha</label>
    <input type="text" class="form-control" required name="fecha" id="fecha"  value="<?=$fecha;?>">
    
  </div>
    
    <div class="form-group">
    <label for="exampleInputPassword1">Resultado Equipo Local</label>
    <input type="text" class="form-control" name="resultadoLocal"  value="<?=$puntosLocal;?>" id="resultadoLocalPartido" >
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Resultado Equipo Visitante</label>
    <input type="text" class="form-control" name="resultadoVisitante" value="<?=$puntosVisitante;?>" id="resultadoVisitantePartido" >
    <input type="hidden" name="idPartido" id="idPartido"  value="<?=$id;?>"/>
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>


</form>