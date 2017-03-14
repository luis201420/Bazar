<?php 

require_once("../entity/producto.php");
require_once("../datos/generico.class.php");


class repositoryProducto{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getProductoById($id){
    	$this->objcon->conectar();
    	$this->objcon->selectdb();

    	$sql="select * from producto where idProducto='$id'";

    	$result= $this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        if($resp>0)
        {
            $row=mysql_fetch_row($result);
            $producto=new Producto();
            $producto->setId($row[0]);
            $producto->setNombre($row[1]);
            $producto->setCantidad($row[2]);
            $producto->setCosto($row[3]);
            $producto->setIdCategoria($row[4]);
            return $producto;

        }
        else{
            return 0;
        }
    }
    public function getAllProductoByCategoria($id_c){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select idProducto,Nombre,Cantidad,Costo from producto where idCategoria='$id_c'";

        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        $productos=array();

        if($result){
            while ($row = $this->objcon->UnRegistro($result)) {
                $producto=new Producto();
                $producto->setId($row[0]);
                $producto->setNombre($row[1]);
                $producto->setCantidad($row[2]);
                $producto->setCosto($row[3]);
                $productos[]=$producto;
            }
            return $productos;
        }
        else{
            return 0;
        }
    }

    public function addProducto(Producto $nuevo){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $nombre   = $nuevo->getNombre();
        $cantidad = $nuevo->getCantidad();
        $costo    = $nuevo->getCosto();
        $id_Cat   = $nuevo->getIdCategoria();

        $sql="insert into producto(Nombre,Cantidad,Costo,idCategoria) values('$nombre','$cantidad','$costo','$id_Cat');";

        $result=$this->objcon->cSimple($sql);
        
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