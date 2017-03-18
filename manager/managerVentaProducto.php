<?php

require_once("../repository/repositoryVentaProducto.php");

class managerVentaProducto
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryVentaProducto();
    }
    public function newVentaProducto(){
        return new VentaProducto();
    }

    public function findProductos($idVenta){
        return $this->repositorio->getProductos($idVenta);
    }

    public function nuevoRegistro($idVenta,$idProductos,$precios,$cantidades){
        return $this->repositorio->registrarVentaProducto($idVenta,$idProductos,$precios,$cantidades);
    }
}
