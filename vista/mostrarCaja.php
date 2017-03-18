<!DOCTYPE html>

<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="../js/jquery.js"></script>
		<title>Caja</title>

		<style type="text/css">

			.contenedor{
				margin-left: 25%;
				margin-top: 5%;
				width: 40%;
			}
			#retiro{
				display: none;
			}
			#retiro_cap{
				margin-left: 30%;
			}
			#retiro_gan{
				margin-left: 5%;
			}
			#tabla_retiro{
				margin-left: 15%;
				width: 70%;
			}
		</style>

		<script>
			$(document).ready(function(){
				var monto_cap;
				var monto_gan;

				$.ajax({
				    url:"../funciones/mostrarCaja.php",
				    type:"POST",
				    success:function(msg){
				        for (var i=0; i<msg.length; i++){
			        		if(i==0){
			        			$('#tabla> tbody:last').append('<tr><td><label>Monto de la Ganancia :</label></td>'+
			        				'<td>'+msg[i]+'</td>'+
		        				'</tr>');
		        				monto_gan=msg[i];
		        			}
		        			else{
		        				$('#tabla> tbody:last').append('<tr><td><label>Monto de la Capital :</label></td>'+
			        				'<td>'+msg[i]+'</td>'+
		        				'</tr>');
		        				monto_cap=msg[i];
		        			}
			        	}
				    },
				    dataType:"json"
				});

				$( "#retiro_cap" ).click(function() {
					$('#tipo_monto').val('c');
					$("#monto").text(monto_cap);
					$("#restante").text(monto_cap);
					$("#retiro").css("display", "inline-block");
				});

				$( "#retiro_gan" ).click(function() {
					$('#tipo_monto').val('m');
					$("#monto").text(monto_gan);
					$("#restante").text(monto_gan);
					$("#retiro").css("display", "inline-block");
				});

				$( "#monto_retirar" ).keyup(function() {
					this.value = (this.value + '').replace(/[^0-9\.]/g, '');
				 	var res=parseFloat($('#monto').text())-$('#monto_retirar').val();
				 	$("#restante").text(res);
				 	if(res<0 || $('#monto_retirar').val()==0){$('#retirar').prop('disabled', true);}
				 	else{$('#retirar').prop('disabled', false);}
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
      		<strong>Exito!</strong> Retiro exitoso !.
    	</div>
    	<div class="alert alert-danger" style=<?php if($status==-1 or $status!=0){ echo "display:none;";}elseif($status==0){ echo "display:block;";}?> >
     		<strong>Error!</strong> No se pudo hacer el retiro.
        </div>

		<div class="contenedor" id="buscador">
			<table class="table table-bordered table-striped" id="tabla">
	    		<tbody>
	    		</tbody>
  			</table>
		</div>
		<button class="btn btn-primary" id="retiro_cap">Retirar de Capital</button>
		<button class="btn btn-primary" id="retiro_gan">Retirar de Ganancias</button>

		<div class="contenedor" id="retiro">
			<form method="post" action="../funciones/retirarCaja.php">
				<table class="table table-bordered table-striped" id="tabla_retiro">
					<input id="tipo_monto" name="tipo_monto" style="display:none;">
		    		<tbody>
		    			<tr>
		    				<td><label>Motivo del retiro :</label></td>
		    				<td style="text-align:center;"><input class="form-control" type="text" style="margin-left:10%;width:80%;" id="motivo" name="motivo"></td>
		    			</tr>
		    			<tr>
		    				<td><label>Monto Total (S/.) :</label></td>
		    				<td style="text-align:center;"><span id="monto"></span></td>
		    			</tr>
		    			<tr>
		    				<td><label>Monto a retirar (S/.) :</label></td>
		    				<td><input class="form-control" type="text"  style="margin-left:30%;width:40%;text-align:center;" id="monto_retirar" name="monto_ret" value="-"></td>
		    			</tr>
		    			<tr>
		    				<td><label>Monto restante (S/.) :</label></td>
		    				<td style="text-align:center;"><span id="restante"></span></td>
		    			</tr>
		    		</tbody>
	  			</table>
	  			<button type="submit" class="btn btn-primary" id="retirar" style="margin-left:70%;" disabled>Retirar</button>
			</form>
		</div>
	</body>
</html>