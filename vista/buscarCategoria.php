<!DOCTYPE html>

<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="../js/jquery.js"></script>
		<title>Buscar Categoria</title>

		<style type="text/css">
			#buttonBuscar{
				margin-top: 5px;
			}
			#categorias{
				width: 40%;
			}
			.contenedor{
				margin-left: 30%;
				margin-top: 5%;
				width: 40%;
			}
			#respuesta{
				display:none;
				margin-left: 25%;
			}
			#buscador{
				margin-left: 35%;	
			}
		</style>


		<?php
			if(isset($_GET['nombre'])){
				$id=$_GET['id'];
				$nombre=$_GET['nombre'];
				$contenido=$_GET['contenido'];
				$vendido=$_GET['vendido'];
				echo '<style> #respuesta{display: block;} </style>';
			}
			else{
				$id="";
				$nombre="";
				$contenido="";
				$vendido="";
			}
		?>

		<script>
			$(document).ready(function(){
				id_numbers = new Array();

				var id= <?php echo $id; ?>

				$.ajax({
				    url:"../funciones/mostrarCategorias.php",
				    type:"POST",
				    success:function(msg){
				        for (var i=0; i<msg[0].length; i++)
				        $('#categorias').append('<option value='+msg[0][i]+'>'+msg[1][i]+'</option>');
				    },
				    dataType:"json"
				});
	        });
		</script>

	</head>
	<body>

		<?php 
			include_once "navigator.php";
		?>

		<div class="contenedor" id="buscador">
			<form method="post" action="../funciones/buscarCategoria.php">
				<label>Seleccione una categoria :</label>
				<select class="form-control" name="categorias" id="categorias">
				</select>
				<button type="submit" class="btn btn-primary" id="buttonBuscar">Buscar</button>
			</form>
		</div>

		<div class="contenedor" id="respuesta">
			<table class="table table-bordered table-striped">
	    		<tbody>
	      			<tr>
				        <td><label>Nombre de la Categoria :</label></td>
				        <td><?php echo $nombre;    ?></td>
	      			</tr>
	      			<tr>
				        <td><label>Contenido Total :</label></td>
				        <td><?php echo $contenido; ?></td>
			     	</tr>
			      	<tr>
				        <td><label>Cantidad Vendida :</label></td>
				        <td><?php echo $vendido;   ?></td>
	      			</tr>
	    		</tbody>
  			</table>
		</div>
	</body>
</html>