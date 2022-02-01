
<h1>Partido</h1>

<form method="post" action="?menu=partidos">
  <div class="form-group">
    <label for="exampleInputEmail1">Equipo Local</label>
    <input type="text" class="form-control"  required name="localPartido" id="localPartido"  placeholder="Equipo Local">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Equipo Visitante</label>
    <input type="text" class="form-control" required name="visitantePartido" id="visitantePartido" placeholder="Equipo Visitante">
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