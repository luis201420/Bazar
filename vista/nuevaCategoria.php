<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Nueva Categoria</title>

		<style type="text/css">
			#buttonAgregar{
				margin-top: 5px;
			}
			#nombre{
				width: 50%;
			}
			#contenedor{
				margin-left: 30%;
				margin-top: 5%; 
			}
		</style>

		<?php
			if(isset($_GET['status'])){
				$status=$_GET['status'];
			}
			else{
				$status=-1;
			}
		?>

	</head>
	<body>
		<?php 
			include_once "navigator.php";
		?>

		<div class="alert alert-success" style=<?php if($status==-1 or $status!=1){ echo "display:none;";}elseif($status==1){ echo "display:block;";}?>  >
      		<strong>Exito!</strong> Categoria ingresada correctamente.
    	</div>
    	<div class="alert alert-danger" style=<?php if($status==-1 or $status!=0){ echo "display:none;";}elseif($status==0){ echo "display:block;";}?> >
     		<strong>Error!</strong> No se pudo ingresar la Categoria.
        </div>

		<div id="contenedor">
			<form method="post" action="../funciones/agregarCategoria.php">
				<label>Ingrese el nombre de la categoria :</label>
				<input class="form-control" name="nombre" id="nombre" placeholder="Nombre de la Categoria" required>
				<button type="submit" class="btn btn-primary" id="buttonAgregar">Agregar</button>
			</form>
		</div>
	</body>
</html>