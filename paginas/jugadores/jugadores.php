
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
<?php
    require("clases/Jugador.php");

    if(isset($_POST['idJugador'])){
        $idJugador = $_POST['idJugador'];
        $nombreJugador = $_POST['nombreJugador'];
        $edadJugador = $_POST['edadJugador'];
        $posicionJugador = $_POST['posicionJugador'];
        $idEquipo = $_POST['idEquipo'];

        if($idJugador > 0){
            $sql = "SELECT * FROM Jugadores WHERE id = ". $idJugador;
            $jugadorSql = $mysqli->query($sql);
            $jugadorTmp = $jugadorSql->fetch_assoc();
            if($jugadorTmp){
                $jugador = new Jugador($jugadorTmp['id'], $nombreJugador, $edadJugador, $posicionJugador, $jugadorTmp['puntos'], $idEquipo);
                $sql = "UPDATE Jugadores SET nombre='" . $jugador->getNombre() . "',edad=" . $jugador->getEdad() . ",posicion='";
                $sql .= $jugador->getPosicion() . "',idEquipo=". $jugador->getIdEquipo();
                $sql .= " WHERE id=". $jugador->getId();
                $mysqli->query($sql);
            }
        }else{
            $jugador = new Jugador( $nombreJugador, $edadJugador, $posicionJugador, 0,$idEquipo);
            $sql = "INSERT INTO Jugadores(nombre, edad, posicion, puntos, idEquipo)VALUES('". $jugador->getNombre() . "'," . $jugador->getEdad();
            $sql .= ",'" . $jugador->getPosicion() . "'," . $jugador->getPuntos() ."," . $jugador->getIdEquipo().")";
            $mysqli->query($sql);
        }
            
    }
    $sql="SELECT j.*, e.nombre AS nombreEquipo FROM Jugadores j LEFT JOIN Equipos e ON(e.id = j.idEquipo) ORDER BY j.nombre ASC";
    $arrayJugadores = $mysqli->query($sql);
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
            <th scope="col">Equipo</th>
            <th scope="col">Posicion</th>
            <th scope="col">Puntos</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
            while ($jugador = $arrayJugadores->fetch_assoc()) :
        ?>
          <tr>
            <th scope="row"><?php echo $jugador['nombre'];?></th>
            <td><?php echo $jugador['edad'];?></td>
            <td><?php echo $jugador['nombreEquipo'];?></td>
            <td><?php echo $jugador['posicion'];?></td>
            <td><?php echo $jugador['puntos'];?></td>
            <td>
                 <a href="?menu=jugadoresficha&id=<?=$jugador['id'];?>" class="btn btn-info" role="button">Ver ficha</a>
                 <a href="?menu=jugadoresedit&id=<?=$jugador['id'];?>" class="btn btn-info" role="button">Editar ficha</a>
                <button type="button" class="btn btn-danger borrar" data-id="<?=$jugador['id'];?>" data-toggle="modal" data-target="#borraJugador">Borrar ficha</button>
            </td>
          </tr>
        <?php
            endwhile;
        ?>
        <div class="modal fade" id="borraJugador" tabindex="-1" role="dialog" aria-labelledby="borraJugador" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form id="del_form" method="post" action="index.php?menu=jugadoresdel" >
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
