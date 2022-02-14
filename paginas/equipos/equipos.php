
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
    require("clases/Equipo.php");
   

    if(isset($_POST['idEquipo'])){
        $idEquipo = $_POST['idEquipo'];
        $nombreEquipo = $_POST['nombreEquipo'];
        $equipo = new Equipo($nombreEquipo);

        if($idEquipo >0){
            $sql = "SELECT * FROM Equipos WHERE id = ". $idEquipo;
            $equipoSql = $mysqli->query($sql);
            $equipoTmp = $equipoSql->fetch_assoc();
            if($equipoTmp){
                $equipo = new Equipo($equipoTmp['id'], $nombreEquipo);
                $sql = "UPDATE Equipos SET nombre='" . $equipo->getNombre() . "' WHERE id=". $equipo->getId();
                $mysqli->query($sql);
            }

            

        }else{
            $sql = "INSERT INTO Equipos(nombre)VALUES('". $equipo->getNombre() . "')";
            $mysqli->query($sql);
        }

    }  
    $arrayEquipos = $mysqli->query("SELECT * FROM Equipos ORDER BY nombre ASC");    
    
?>

<h1>EQUIPOS</h1>

<div class="container">
   <div class="row">
        <div class="col-12 text-right mb-2">
            <a href="?menu=equiposadd" class="btn btn-info" role="button">+</a>
        </div>
    </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="col-8" scope="col">Nombre</th>
            <th class="col-6" scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php
            while ($equipo = $arrayEquipos->fetch_assoc()) :
        ?>
          <tr>
            <th scope="row"><?php echo $equipo['nombre'];?></th>
            <td class="text-center">
                 <a href="?menu=equiposedit&id=<?=$equipo['id'];?>" class="btn btn-info" role="button">Editar equipo</a>
                <button type="button" class="btn btn-danger borrar" data-id="<?=$equipo['id'];?>" data-toggle="modal" data-target="#borraJugador">Borrar equipo</button>
            </td>
          </tr>
        <?php
            endwhile;
        ?>
        
        <div class="modal fade" id="borraJugador" tabindex="-1" role="dialog" aria-labelledby="borraJugador" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="del_form" method="post" action="index.php?menu=equiposdel" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="borraJugador">Borrar equipo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Quieres borrar el equipo?
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

<?php
$mysqli->close();
?>