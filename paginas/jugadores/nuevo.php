

<h1>Nuevo Jugador</h1>

<form method="post" action="?menu=jugadores">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control"  required name="nombreJugador" id="nombreJugador"  placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Edad</label>
    <input type="text" class="form-control" required name="edadJugador" id="edadJugador" placeholder="Edad">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Posición</label>
    <input type="text" class="form-control" required name="posicionJugador" id="posicionJugador" placeholder="Posición">
    <input type="hidden" name="idJugador" id="idJugador" value=""/>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>


</form>