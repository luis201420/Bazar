<?php

require_once("../manager/managerCaja.php");
require_once("../manager/managerMovimientosCaja.php");

$tipo=$_POST['tipo_monto'];
$monto=(-1)*(float)$_POST['monto_ret'];
$motivo=$_POST['motivo'];
$id=1;

$manager= new managerCaja();
$managerRegistro=new managerMovimientosCaja();

$movimiento= $managerRegistro->newMovimiento();
$movimiento->setMotivo($motivo);
$movimiento->setMonto($monto);
$movimiento->setFecha(date("Y/m/d"));

$status=0;

if($tipo=='c'){
	$status=$manager->updateCapital($id,$monto);
	$movimiento->setTipo("Capital");
}
else{
	$status=$manager->updateGanancia($id,$monto);
	$movimiento->setTipo("Ganancias");
}

if($status){
	$status2=$managerRegistro->addMovimiento($movimiento);
}

$status=$status&&$status2;

header('Location: ../vista/mostrarCaja.php?status='.$status);	

?>