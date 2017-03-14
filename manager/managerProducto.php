<?php

require_once("../repository/repositoryProducto.php");

class managerProducto
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryProducto();
    }
    public function newProducto(){
        return new Producto();
    }

    public function findById($id){
        return $this->repositorio->getProductoById($id);
    }

    public function getAllByCategoria($id_c){
        return $this->repositorio->getAllProductoByCategoria($id_c);
    }

    public function addProducto(Producto $n){
        return $this->repositorio->addProducto($n);
    }
}
