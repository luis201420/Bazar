<?php 

require_once("../entity/venta.php");
require_once("../datos/generico.class.php");


class repositoryVenta{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getVentas($fecha){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select * from ventas where Fecha='$fecha'";

        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        $ventas=array();

        if($result){
            while ($row = $this->objcon->UnRegistro($result)) {
                $venta=new Venta();
                $venta->setId($row[0]);
                $venta->setFecha($row[1]);
                $ventas[]=$venta;
            }
            return $ventas;
        }
        else{
            return 0;
        }        
    }

    public function createVenta(Venta $nuevo){
    	$this->objcon->conectar();
    	$this->objcon->selectdb();

        $fecha=$nuevo->getFecha();

    	$sql="insert into ventas(Fecha) values('$fecha')";

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