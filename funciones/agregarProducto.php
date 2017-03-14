<?php

require_once("../manager/managerProducto.php");
require_once("../manager/managerCategoria.php");

$nombre=$_POST["nombre"];
$cantidad=$_POST["cantidad"];
$costo=$_POST["costo"];
$id_c=$_POST["categoria"];

$manager = new managerProducto();
$nuevo = $manager->newProducto();
$nuevo->setNombre($nombre);
$nuevo->setCantidad($cantidad);
$nuevo->setCosto($costo);
$nuevo->setIdCategoria($id_c);

$status=$manager->addProducto($nuevo);

if($status){
	$managerC=new managerCategoria();
	$statusC=$managerC->aumentarContenidoTotal($id_c,$cantidad);
}

$status=$status && $statusC;

header('Location: ../vista/nuevoProducto.php?status='.$status);	

?>