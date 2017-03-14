<?php 

require_once("../entity/categoria.php");
require_once("../datos/generico.class.php");


class repositoryCategoria{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getCategoriaById($id){
    	$this->objcon->conectar();
    	$this->objcon->selectdb();

    	$sql="select * from categoria where idCategoria='$id'";

    	$result= $this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        if($resp>0)
        {
            $row=mysql_fetch_row($result);
            $categoria=new Categoria();
            $categoria->setId($row[0]);
            $categoria->setNombre($row[1]);
            $categoria->setContenidoTotal($row[2]);
            $categoria->setCantidadVendida($row[3]);
            return $categoria;

        }
        else{
            return 0;
        }
    }
    public function getAllNombres(){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select idCategoria,Nombre from categoria";

        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        $categorias=array();

        if($result){
            while ($row = $this->objcon->UnRegistro($result)) {
                $categoria=new Categoria();
                $categoria->setId($row[0]);
                $categoria->setNombre($row[1]);
                $categorias[]=$categoria;
            }
            return $categorias;
        }
        else{
            return 0;
        }
    }
    public function addCategoria(Categoria $nuevo){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $nombre=$nuevo->getNombre();

        $sql="insert into categoria(Nombre) values('$nombre');";

        $result=$this->objcon->cSimple($sql);
        
        $this->objcon->desconectar();
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function aumentarContenidoTotal($id,$cantidad){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select ContenidoTotal from categoria where idCategoria='$id';";
        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        if($resp>0){
            $row=mysql_fetch_row($result);
            $cant=$row[0];
        }

        else{ return 0;}

        $cant=$cant+$cantidad;

        $query="UPDATE categoria SET ContenidoTotal = '$cant' WHERE idCategoria = '$id';";

        $result=$this->objcon->cSimple($query);

        $this->objcon->desconectar();
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }
}

?>