<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de cuenta</div>
				<div class="panel panel-body">
					<form id="frmRegistro">
						<label>Saldo</label>
					<input type="text" class="form-control input-sm" id="saldo" name="">
					<label>Cliente</label>
					<input type="text" class="form-control input-sm" id="cliente" name="">
					<label>Numero De La Cuenta</label>
					<input type="text" class="form-control input-sm" id="numero" name="">
					<label>Password</label>
					<input type="text" class="form-control input-sm" id="password" name="">
					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#saldo').val()==""){
				alertify.alert("Debes agregar el saldo de tu cuenta");
				return false;
			}else if($('#cliente').val()==""){
				alertify.alert("Debes agregar el nombre del cliente");
				return false;
			}else if($('#numero').val()==""){
				alertify.alert("Debes agregar el numero de la cuenta");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="saldo=" + $('#saldo').val() +
					"&cliente=" + $('#cliente').val() +
					"&numero=" + $('#numero').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){
							if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Cuenta Agregada con exito");
							}else{
								alertify.error("Fallo al agregar Cuenta");
							}
						}
					});
		});
	});
</script>

