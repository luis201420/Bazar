<?php 

require_once("../entity/movimientosCaja.php");
require_once("../datos/generico.class.php");


class repositoryMovimientosCaja{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getAllMovimientos(){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select * from movimientoscaja";

        $result=$this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        $movimientos=array();

        if($result){
            while ($row = $this->objcon->UnRegistro($result)) {
                $movimiento=new MovimientosCaja();
                $movimiento->setId($row[0]);
                $movimiento->setMotivo($row[1]);
                $movimiento->setMonto($row[2]);
                $movimiento->setTipo($row[3]);
                $movimientos[]=$movimiento;
            }
            return $movimientos;
        }
        else{
            return 0;
        }
    }
    public function addMovimiento(MovimientosCaja $nuevo){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $motivo=$nuevo->getMotivo();
        $monto=$nuevo->getMonto();
        $tipo=$nuevo->getTipo();

        $sql="insert into movimientoscaja(Motivo,Monto,Tipo) values('$motivo','$monto','$tipo');";

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