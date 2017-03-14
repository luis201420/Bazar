<?php

require_once("../repository/repositoryCategoria.php");

class managerCategoria
{
    private $repositorio;
    function __construct() {
        $this->repositorio=new repositoryCategoria();
    }
    public function newCategoria(){
        return new Categoria();
    }

    public function findById($id){
        return $this->repositorio->getCategoriaById($id);
    }

    public function getAll(){
        return $this->repositorio->getAllNombres();
    }

    public function addCategoria(Categoria $n){
        return $this->repositorio->addCategoria($n);
    }

    public function aumentarContenidoTotal($id_c,$cantidad){
        return $this->repositorio->aumentarContenidoTotal($id_c,$cantidad);
    }
}
