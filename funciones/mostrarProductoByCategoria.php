<?php

require_once("../manager/managerProducto.php");

$id_c=$_POST['categoria'];

$manager= new managerProducto();
$productos=$manager->getAllByCategoria($id_c);

$ids=array();
$nombres=array();
$cantidades=array();
$costos=array();

foreach ($productos as &$producto) {
    $ids[]=$producto->getId();
    $nombres[]=$producto->getNombre();
    $cantidades[]=$producto->getCantidad();
    $costos[]=$producto->getCosto();
}

echo json_encode(array($ids,$nombres,$cantidades,$costos));
?>