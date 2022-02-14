
<?php
    require("clases/Partido.php");

    if(isset($_POST['idPartido'])){
        $idPartido = $_POST['idPartido'];
        $localPartido = $_POST['equipoLocal'];
        $visitantePartido = $_POST['equipoVisitante'];
        $fechaPartido = $_POST['fecha'];
        $resultadoLocal = $_POST['resultadoLocal'];
        $resultadoVisitante = $_POST['resultadoVisitante'];

        if($_POST['idPartido'] > 0){

            $sql = "SELECT * FROM Partidos WHERE id = ". $idPartido;
            $partidoSql = $mysqli->query($sql);
            $partidoTmp = $partidoSql->fetch_assoc();
            if($partidoTmp){
                $partido = new Partido($partidoTmp['id'], $localPartido, $visitantePartido,$fechaPartido, $resultadoLocal, $resultadoVisitante );
                $sql = "UPDATE Partidos SET equipoLocal=" . $partido->getEquipoLocal() . ",equipoVisitante=" . $partido->getEquipoVisitante();
                $sql .= ",fecha='" . $partido->getFecha() . "',puntosLocal=" .  $partido->getPuntosLocal() . ",puntosVisitante=" . $partido->getPuntosVisitante();
                $sql .= " WHERE id=". $partido->getId();
                $mysqli->query($sql);
            }
        }else{
                $partido = new Partido( $localPartido, $visitantePartido,$fechaPartido, $resultadoLocal, $resultadoVisitante );
                $sql = "INSERT INTO Partidos(equipoLocal, equipoVisitante, fecha, puntosLocal, puntosVisitante)VALUES(";
                $sql .= $partido->getEquipoLocal() . "," . $partido->getEquipoVisitante() . ",'" . $partido->getFecha() . "',";
                $sql .= $partido->getPuntosLocal() . "," . $partido->getPuntosVisitante() . ")";
                $mysqli->query($sql);
        }
        
    }
    $sql = "SELECT p.*,e.nombre AS nombreLocal, ee.nombre AS nombreVisitante ";
    $sql .= "FROM Partidos p LEFT JOIN Equipos e ON(e.id = p.equipoLocal) LEFT JOIN Equipos ee ON(ee.id=p.equipoVisitante) ORDER BY fecha DESC";
    $arrayPartidos = $mysqli->query($sql);
?>
<script>
$( document ).ready(function() {
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus');
    });
});
$(document).on("click", ".borrar", function () {
     var idBorrar = $(this).data('id');
     $(".modal-footer #idBorrar").val( idBorrar );
});
function form_submit() {
    document.getElementById("del_form").submit();
   } 
</script>
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
            while ($partido = $arrayPartidos->fetch_assoc()) :
        ?>
          <tr>
            <td ><?php echo $partido['nombreLocal'];?></td  >
            <td><?php echo $partido['nombreVisitante'];?></td>
            <td><?php echo $partido['fecha'];?></td>
            <td><?php echo $partido['puntosLocal'] . " - " . $partido['puntosVisitante'];?></td>
            <td>
              <a href="?menu=partidosficha&id=<?=$partido['id'];?>" class="btn btn-info" role="button">Ver Partido</a>
                 <a href="?menu=partidosedit&id=<?=$partido['id'];?>" class="btn btn-info" role="button">Editar Partido</a>
                <button type="button" class="btn btn-danger borrar" data-id="<?=$partido['id'];?>" data-toggle="modal" data-target="#borrarpartido">Borrar Partido</button>
            </td>
          </tr>
        <?php
            endwhile;
        ?>
        <div class="modal fade" id="borrarpartido" tabindex="-1" role="dialog" aria-labelledby="borrarpartido" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                 <form id="del_form" method="post" action="index.php?menu=partidosdel" >
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
                        <button onclick="form_submit()" type="button" class="btn btn-primary" data-dismiss="modal" onClick="">Borrar</button>
                            <input type="hidden" name="idBorrar" id="idBorrar" value=""/>
                    </div>
                </form>
                </div>
            </div>
        </div>
        </tbody>
      </table>
    </div>
  </div>
</div>