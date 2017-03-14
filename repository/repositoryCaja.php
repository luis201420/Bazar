<?php 

require_once("../entity/caja.php");
require_once("../datos/generico.class.php");


class repositoryCaja{

	private $objcon;

	function __construct() {
        $this->objcon=new BDgenerico();
    }

    public function getCajaId($id){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select * from caja where idCaja='$id'";

        $result=$this->objcon->cSimple($sql);
        $res=$this->objcon->nRegistros($result);

        if($res>0)
        {
            $row=mysql_fetch_row($result);
            $caja=new Caja();
            $caja->setId($row[0]);
            $caja->setGanancia($row[1]);
            $caja->setCapital($row[2]);
            return $caja;
        }
        else{
            return 0;
        }        
    }

    public function updateCapital($id,$cantidad){
    	$this->objcon->conectar();
    	$this->objcon->selectdb();

    	$sql="select Monto_capital from caja where idCaja='$id'";

    	$result= $this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        if($resp>0)
        {
            $row=mysql_fetch_row($result);
            $capital_actual=$row[0];
        }
        else{
            return 0;
        }
        $capital_actual=$capital_actual+$cantidad;

        $query="UPDATE caja SET Monto_capital = '$capital_actual' WHERE idCaja = '$id';";

        $result=$this->objcon->cSimple($query);

        $this->objcon->desconectar();
        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function updateGanancia($id,$cantidad){
        $this->objcon->conectar();
        $this->objcon->selectdb();

        $sql="select Monto_ganancia from caja where idCaja='$id'";

        $result= $this->objcon->cSimple($sql);
        $resp=$this->objcon->nRegistros($result);

        if($resp>0)
        {
            $row=mysql_fetch_row($result);
            $ganancia_actual=$row[0];
        }
        else{
            return 0;
        }
        $ganancia_actual=$ganancia_actual+$cantidad;

        $query="UPDATE caja SET Monto_ganancia = '$ganancia_actual' WHERE idCaja = '$id';";

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