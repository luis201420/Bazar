<?php

require_once("../manager/managerCategoria.php");

$manager= new managerCategoria();
$categorias=$manager->getAll();

$ids=array();
$nombres=array();

foreach ($categorias as &$categoria) {
    $ids[]=$categoria->getId();
    $nombres[]=$categoria->getNombre();
}

echo json_encode(array($ids,$nombres));
?>