
<script>
$( document ).ready(function() {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
}
</script>
<?php
    $arrayJugadores = array();

    if(isset($_POST['idJugador'])){
        $idJugador = $_POST['idJugador'];
        $nombreJugador = $_POST['nombreJugador'];
        $edadJugador = $_POST['edadJugador'];
        $posicionJugador = $_POST['posicionJugador'];
        $puntosJugador = 0;
        $arrayJugadores[] =array("idJugador" => $idJugador, "nombreJugador" => $nombreJugador, "edadJugador" => $edadJugador,
        "posicionJugador" => $posicionJugador, "puntosJugador"=>$puntosJugador);
        if($idJugador !=""){
            //editar jugador
        }else{
            // nuevo jugador
        }  
        
    }
?>

<h1>JUGADORES</h1>
<div class="container">
   <div class="row">
        <div class="col-12 text-right mb-2">
            <a href="?menu=jugadoresadd" class="btn btn-info" role="button">+</a>
        </div>
    </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Posicion</th>
            <th scope="col">Puntos</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
            foreach ($arrayJugadores as $jugador):
        ?>
          <tr>
            <th scope="row"><?php echo $jugador['nombreJugador'];?></th>
            <td><?php echo $jugador['edadJugador'];?></td>
            <td><?php echo $jugador['posicionJugador'];?></td>
            <td><?php echo $jugador['puntosJugador'];?></td>
            <td>
                 <a href="?menu=jugadoresficha" class="btn btn-info" role="button">Ver ficha</a>
                 <a href="?menu=jugadoresedit" class="btn btn-info" role="button">Editar ficha</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borraJugador">Borrar ficha</button>
            </td>
          </tr>
        <?php
            endforeach;
        ?>
        <div class="modal fade" id="borraJugador" tabindex="-1" role="dialog" aria-labelledby="borraJugador" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borraJugador">Borrar jugador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Quieres borrar el jugador?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Borrar</button>
                </div>
                </div>
            </div>
        </div>
        </tbody>
      </table>
    </div>
  </div>
</div>
