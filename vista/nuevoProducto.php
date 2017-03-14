<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="../js/jquery.js"></script>
		<title>Nuevo Producto</title>

		<style type="text/css">
			#buttonAgregar{
				margin-top: 5px;
			}
			#nombre,#cantidad,#costo,#categoria{
				width: 50%;
			}
			#contenedor{
				margin-left: 30%;
				margin-top: 5%; 
			}
		</style>

		<script>
			$(document).ready(function(){
				id_numbers = new Array();

				$.ajax({
				    url:"../funciones/mostrarCategorias.php",
				    type:"POST",
				    success:function(msg){
				        for (var i=0; i<msg[0].length; i++)
				        $('#categoria').append('<option value='+msg[0][i]+'>'+msg[1][i]+'</option>');
				    },
				    dataType:"json"
				});

				$( "#cantidad" ).keyup(function() {
					this.value = (this.value + '').replace(/[^0-9]/g, '');
				});

				$( "#costo" ).keyup(function() {
					this.value = (this.value + '').replace(/[^0-9\.]/g, '');
				});
	        });
		</script>

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
      		<strong>Exito!</strong> Producto registrado corresctamente.
    	</div>
    	<div class="alert alert-danger" style=<?php if($status==-1 or $status!=0){ echo "display:none;";}elseif($status==0){ echo "display:block;";}?> >
     		<strong>Error!</strong> No se pudo ingresar el Producto.
        </div>

		<div id="contenedor">
			<form method="post" action="../funciones/agregarProducto.php">
				<label>Nombre del producto :</label>
				<input class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" required>
				<label>Cantidad :</label>
				<input class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" required>
				<label>Costo por unidad (S/.):</label>
				<input class="form-control" name="costo" id="costo" placeholder="Costo (Ejemplo 12.5)" required>
				<label>Categoria :</label>
				<select class="form-control" name="categoria" id="categoria">
				</select>

				<button type="submit" class="btn btn-primary" id="buttonAgregar">Agregar</button>
			</form>
		</div>
	</body>
</html>