<?php
class Equipo{
    private $id;
    private $nombre;

    public function __construct() {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct1($nombre){
        $this->nombre = $nombre;
    }

    public function __construct2($id, $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
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
}
?>