<?php

require_once("../repository/repositoryVenta.php");

class managerVenta
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryVenta();
    }
    public function newVenta(){
        return new Venta();
    }

    public function getVentas($fecha){
        return $this->repositorio->getVentas($fecha);
    }

    public function createVenta(Venta $nuevo){
        return $this->repositorio->createVenta($nuevo);
    }
}
