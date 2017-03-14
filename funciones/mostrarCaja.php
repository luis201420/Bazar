<?php

require_once("../manager/managerCaja.php");

$id=1;

$manager= new managerCaja();
$caja=$manager->findById($id);

echo json_encode(array($caja->getGanancia(),$caja->getCapital()));
?>