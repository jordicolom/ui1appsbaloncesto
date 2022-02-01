<script>
$( document ).ready(function() {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });
}
</script>
<?php
    $arrayPartidos = array();

    if(isset($_POST['idPartido'])){
        $idPartido = $_POST['idPartido'];
        $localPartido = $_POST['localPartido'];
        $visitantePartido = $_POST['visitantePartido'];
        $fechaPartido = $_POST['fechaPartido'];
        $resultadoPartido = $_POST['resultadoLocalPartido'] . " - " . $_POST['resultadoVisitantePartido'];
        $arrayJugadores[] =array("idPartido" => $idPartido, "localPartido" => $localPartido, "visitantePartido" => $visitantePartido,
        "fechaPartido" => $fechaPartido, "resultadoPartido"=>$resultadoPartido);
        if($idJugador !=""){
            //editar jugador
        }else{
            // nuevo jugador
        }  
        
    }
?>
<h1>PARTIDOS</h1>
<div class="container">
   <div class="row">
        <div class="col-12 text-right mb-2">
            <a href="?menu=partidosadd" class="btn btn-info" role="button">+</a>
        </div>
    </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Local</th>
            <th scope="col">Visitante</th>
            <th scope="col">Fecha</th>
            <th scope="col">Resultado</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
            foreach ($arrayJugadores as $jugador):
        ?>
          <tr>
            <th scope="row"><?php echo $jugador['localPartido'];?></th>
            <td><?php echo $jugador['visitantePartido'];?></td>
            <td><?php echo $jugador['fechaPartido'];?></td>
            <td><?php echo $jugador['resultadoPartido'];?></td>
            <td>
              <a href="?menu=partidosficha" class="btn btn-info" role="button">Ver Partido</a>
                 <a href="?menu=partidosedit" class="btn btn-info" role="button">Editar Partido</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borrarpartido">Borrar Partido</button>
            </td>
          </tr>
        <?php
            endforeach;
        ?>
        <div class="modal fade" id="borrarpartido" tabindex="-1" role="dialog" aria-labelledby="borrarpartido" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borraJugador">Borrar Partido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Quieres borrar el partido?
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