<!DOCTYPE html>

<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="../js/jquery.js"></script>
		<title>Buscar Producto</title>

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

		<script>
			$(document).ready(function(){
				id_numbers = new Array();

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

	        function Buscar(categoria){
		        var parametros = {
		                "categoria" : categoria
		        };
		        $.ajax({
		                data:  parametros,
		                url:   '../funciones/mostrarProductoByCategoria.php',
		                type:  'post',
		                success:  function (msg) {
								var cont=0;
								var valor=0;
								$("#t_contenido").empty();
								$("#respuesta").css("display", "inline-block");
		                        for (var i=0; i<msg[0].length; i++){
									cont=cont+parseInt(msg[2][i]);
									valor=valor+(parseFloat(msg[3][i])*parseInt(msg[2][i]));
					        		$('#tabla> tbody:last').append('<tr>'+
					        			'<td>'+(i+1)+'</td>'+
					        			'<td>'+msg[1][i]+'</td>'+
					        			'<td>'+msg[2][i]+'</td>'+
					        			'<td>'+msg[3][i]+'</td>'+
				        			'</tr>');
					        	}
					        	$('#tabla> tbody:last').append('<tr>'+
				        			'<td> </td>'+
				        			'<td> <label> TOTAL </label></td>'+
				        			'<td><label>'+cont+'</label></td>'+
				        			'<td><label>'+valor+'</label></td>'+
			        			'</tr>');
		                },
						dataType:"json"
		        });
			}
		</script>

	</head>
	<body>

		<?php 
			include_once "navigator.php";
		?>

		<div class="contenedor" id="buscador">
			<form method="post">
				<label>Seleccione una categoria :</label>
				<select class="form-control" name="categorias" id="categorias">
				</select>
				<button class="btn btn-primary" id="buttonBuscar" onclick="Buscar($('#categorias').val());return false;">Buscar</button>
			</form>
		</div>

		<div class="contenedor" id="respuesta">
			<table class="table table-bordered table-striped" id="tabla">
				<thead>
			    	<tr>
			    		<th>No</th>
				        <th>Nombre del Producto</th>
				        <th>Cantidad</th>
				        <th>Costo (S/.)</th>
			     	</tr>
			    </thead>
	    		<tbody id="t_contenido">
	    		</tbody>
  			</table>
		</div>

	</body>
</html>