<?php 

require_once("../entity/ventaProducto.php");
require_once("../datos/generico.class.php");


class repositoryVentaProducto{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getProductos($idVenta){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select * from ventaproducto where idVenta='$idVenta'";

        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        $registros=array();

        if($result){
            while ($row = $this->objcon->UnRegistro($result)) {
                $registro=new VentaProducto();
                $registro->setIdVenta($row[0]);
                $registro->setIdProducto($row[1]);
                $registro->setPrecio($row[2]);
                $registro->setCantidad($row[3]);
                $registros[]=$registro;
            }
            return $registros;
        }
        else{
            return 0;
        }        
    }

    public function registrarVentaProducto($idVenta,$idProductos,$precios,$cantidades){
    	$this->objcon->conectar();
    	$this->objcon->selectdb();

        /** FALTA PONER UN FOR PARA  QUE  RECORRA LAS 3 LISTAS (idProductos,precios,cantidades)**/
    	$sql="insert into ventaproducto(idVenta,idProducto,Precio,Cantidad) values('$idVenta','$idProducto','$precio','$cantidad')";
    	$result= $this->objcon->cSimple($sql);
        
        if($result)
        {
            return 1;
        }
        else{
            return 0;
        }
    }
}

?>