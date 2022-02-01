<?php
switch($_GET['menu']){
    case 'jugadores':
        require_once('paginas/jugadores/jugadores.php');
        break;
    case 'jugadoresadd':
        require_once('paginas/jugadores/nuevo.php');
        break;
    case 'jugadoresedit':
        require_once('paginas/jugadores/editar.php');
        break;
    case 'jugadoresficha':
        require_once('paginas/jugadores/ficha.php');
        break;
    case 'partidos':
        require_once('paginas/partidos/partidos.php');
        break;
    case 'partidosadd':
        require_once('paginas/partidos/nuevo.php');
        break;
    case 'partidosedit':
        require_once('paginas/partidos/editar.php');
        break;
    case 'partidosficha':
        require_once('paginas/partidos/ficha.php');
        break;
    case 'ficheros':
        require_once('paginas/fichero/fichero.php');
        break;
    case 'ficherosadd':
        require_once('paginas/fichero/nuevo.php');
        break;
    case '':
        require_once('paginas/inicio/inicio.php');
        break;
        
}