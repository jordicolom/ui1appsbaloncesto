<?php
class Jugador{
    private $id;
    private $nombre;
    private $edad;
    private $posicion;
    private $puntos;
    private $idEquipo;

    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct5($nombre, $edad, $posicion, $puntos, $idEquipo){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->posicion = $posicion;
        $this->puntos = $puntos;
        $this->idEquipo = $idEquipo;
    }

    public function __construct6($id, $nombre, $edad, $posicion, $puntos, $idEquipo){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->posicion = $posicion;
        $this->puntos = $puntos;
        $this->idEquipo = $idEquipo;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setPosicion($posicion){
        $this->posicion = $posicion;
    }

    public function getPosicion(){
        return $this->posicion;
    }

    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }

    public function getPuntos(){
        return $this->puntos;
    }

    public function setIdEquipo($idEquipo){
        $this->idEquipo = $idEquipo;
    }

    public function getIdEquipo(){
        return $this->idEquipo;
    }
}
?>