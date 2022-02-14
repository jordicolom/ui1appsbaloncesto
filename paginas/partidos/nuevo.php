<?php
$equiposLocal = $mysqli->query("SELECT * FROM Equipos ORDER BY nombre ASC");
$equiposVisitante = $mysqli->query("SELECT * FROM Equipos ORDER BY nombre ASC");  
?>
<h1>Nuevo Partido</h1>

<form method="post" action="?menu=partidos">
    <div class="form-group">    
        <label for="exampleInputEmail1">Equipo Local</label>
        <select name="equipoLocal" id="equipoLocal" class="form-select" aria-label="Default select example">
            <option value="0" >Seleccionar equipo</option>
            <?php
                while ($equipo = $equiposLocal->fetch_assoc()) :
            ?>
                <option value="<?=$equipo['id'];?>"><?=$equipo['nombre'];?></option>
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
                <option value="<?=$equipo['id'];?>"><?=$equipo['nombre'];?></option>
            <?php
                endwhile;
            ?>
        </select>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Fecha</label>
    <input type="text" class="form-control" required name="fechaPartido" id="fechaPartido" placeholder="Fecha Partido">
    
  </div>
    
    <div class="form-group">
    <label for="exampleInputPassword1">Resultado Equipo Local</label>
    <input type="text" class="form-control" name="resultadoLocalPartido" id="resultadoLocalPartido" placeholder="Resultado Equipo Local">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Resultado Equipo Visitante</label>
    <input type="text" class="form-control" name="resultadoVisitantePartido" id="resultadoVisitantePartido" placeholder="Resultado Equipo Visitante">
    <input type="hidden" name="idPartido" id="idPartido" value=""/>
    </div>
  <button type="submit" class="btn btn-primary">Guardar</button>


</form>