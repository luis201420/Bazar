<?php

require_once("../repository/repositoryMovimientosCaja.php");

class managerMovimientosCaja
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryMovimientosCaja();
    }
    public function newMovimiento(){
        return new MovimientosCaja();
    }

    public function getAll(){
        return $this->repositorio->getAllMovimientos();
    }

    public function addMovimiento(MovimientosCaja $n){
        return $this->repositorio->addMovimiento($n);
    }
}
