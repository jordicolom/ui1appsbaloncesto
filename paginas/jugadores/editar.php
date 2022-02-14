<?php 
    require("clases/Jugador.php");

    $nombre =  "";
    $id = "";
    $posicion = "";
    $edad = "";
    $idEquipo = "";

    $sql = "SELECT * FROM Jugadores WHERE id=". $_GET['id'];
    $jugadorSql = $mysqli->query($sql);

    $jugadotTmp = $jugadorSql->fetch_assoc();
    if($jugadotTmp){
        $jugador = new Jugador($jugadotTmp['id'], $jugadotTmp['nombre'], $jugadotTmp['edad'],
        $jugadotTmp['posicion'], $jugadotTmp['puntos'], $jugadotTmp['idEquipo']);
        $nombre =  $jugador->getNombre();
        $id = $jugador->getId();
        $edad = $jugador->getEdad();
        $posicion = $jugador->getPosicion();
        $idEquipo = $jugador->getIdEquipo();
    }
    $sql = "SELECT * FROM Equipos ORDER BY nombre ASC";
    $arrayEquipos = $mysqli->query($sql); 
    $mysqli->close();
?>
<h1><?php echo nombre;?></h1>

<form method="post" action="?menu=jugadores" >
<div class="form-group">    
    <label for="exampleInputEmail1">Equipo</label>
    <select name="idEquipo" id="idEquipo" class="form-select" aria-label="Default select example">
        <option value="0" >Seleccionar equipo</option>
        <?php
            while ($equipo = $arrayEquipos->fetch_assoc()) :
        ?>
            <option <?php if($equipo['id'] == $idEquipo){echo " selected ";};?> value="<?=$equipo['id'];?>"><?=$equipo['nombre'];?></option>
        <?php
            endwhile;
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" minlength="2" required value="<?=$nombre;?>" name="nombreJugador" id="nombreJugador"  placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Edad</label>
    <input type="number" class="form-control" required value="<?=$edad;?>" name="edadJugador" id="edadJugador" placeholder="Edad">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Posición</label>
    <input type="text" class="form-control" minlength="2" value="<?=$posicion;?>" required name="posicionJugador" id="posicionJugador" placeholder="Posición">
    <input type="hidden" name="idJugador" id="idJugador" value="<?=$id;?>"/> 
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>