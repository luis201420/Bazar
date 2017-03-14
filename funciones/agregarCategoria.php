<?php

require_once("../manager/managerCategoria.php");

$name=$_POST["nombre"];

$manager = new managerCategoria();
$nuevo = $manager->newCategoria();
$nuevo->setNombre($name);

$status=$manager->addCategoria($nuevo);

header('Location: ../vista/nuevaCategoria.php?status='.$status);	

?>