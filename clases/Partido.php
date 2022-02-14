<?php
class Partido{
    private $id;
    private $equipoLocal;
    private $equipoVitante;
    private $fecha;
    private $puntosLocal;
    private $puntosVisitante;

    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct5($equipoLocal, $equipoVisitante, $fecha, $puntosLocal, $puntosVisitante){
        $this->equipoLocal = $equipoLocal;
        $this->equipoVisitante = $equipoVisitante;
        $this->fecha = $fecha;
        $this->puntosLocal = $puntosLocal;
        $this->puntosVisitante = $puntosVisitante;
    }

    public function __construct6($id, $equipoLocal, $equipoVisitante, $fecha, $puntosLocal, $puntosVisitante){
        $this->id = $id;
        $this->equipoLocal = $equipoLocal;
        $this->equipoVisitante = $equipoVisitante;
        $this->fecha = $fecha;
        $this->puntosLocal = $puntosLocal;
        $this->puntosVisitante = $puntosVisitante;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setEquipoLocal($equipoLocal){
        $this->equipoLocal = $equipoLocal;
    }

    public function getEquipoLocal(){
        return $this->equipoLocal;
    }

    public function setEquipoVisitante($equipoVisitante){
        $this->equipoVisitante = $equipoVisitante;
    }

    public function getEquipoVisitante(){
        return $this->equipoVisitante;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setPuntosLocal($puntosLocal){
        $this->puntosLocal = $puntosLocal;
    }

    public function getPuntosLocal(){
        return $this->puntosLocal;
    }

    public function setPuntosVisitante($puntosVisitante){
        $this->puntosVisitante = $puntosVisitante;
    }

    public function getPuntosVisitante(){
        return $this->puntosVisitante;
    }
}

?>