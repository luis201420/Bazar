<?php

require_once("../repository/repositoryCaja.php");

class managerCaja
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryCaja();
    }
    public function newCaja(){
        return new Caja();
    }

    public function findById($id){
        return $this->repositorio->getCajaId($id);
    }

    public function updateGanancia($id,$monto){
        return $this->repositorio->updateGanancia($id,$monto);
    }

    public function updateCapital($id,$monto){
        return $this->repositorio->updateCapital($id,$monto);
    }
}
