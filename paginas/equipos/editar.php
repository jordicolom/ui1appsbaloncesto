<?php 
    require("clases/Equipo.php");

    $nombre =  "";
    $id = "";
    $equipoSql = $mysqli->query("SELECT * FROM Equipos WHERE id = ". $_GET['id']);

    $equipoTmp = $equipoSql->fetch_assoc();
    if($equipoTmp){
        $equipo = new Equipo($equipoTmp['id'], $equipoTmp['nombre']);
        $nombre =  $equipo->getNombre();
        $id = $equipo->getId();
    }
    $mysqli->close();
?>
<h1><?php echo $nombre;?></h1>

<form method="post" action="?menu=equipos" >
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" minlength="2" required name="nombreEquipo" id="nombreEquipo"  value="<?=$nombre;?>">
    <input type="hidden" name="idEquipo" id="idEquipo" value="<?=$id;?>"/> 
  </div>
   
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>