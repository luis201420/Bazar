<?php

require_once("../manager/managerCategoria.php");

$id=$_POST["categorias"];

$manager= new managerCategoria();
$categoria=$manager->findById($id);

header('Location: ../vista/buscarCategoria.php?id='.$categoria->getId().'&nombre='.$categoria->getNombre().'&contenido='.$categoria->getContenidoTotal().'&vendido='.$categoria->getCantidadVendida());	

?>