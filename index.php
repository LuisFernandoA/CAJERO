<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: white">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><center><h3>Validar Cuenta</h3></center></div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/atm.jpg" height="250">
					</div>
					<center>
					<p></p>
					<label>Numero de la cuenta</label>
					<input type="text" id="numero" class="form-control input-sm" name="" placeholder="ingresa el numero de la cuenta">
					<label>Password</label>
					<input type="password" id="password" class="form-control input-sm" name="" placeholder="ingresa la contraseña" >
					<p></p>
					<span class="btn btn-success" id="entrarSistema">Ingresar</span>
					<a href="registro.php" class="btn btn-primary">Registrar cuenta</a>
					</center>
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
		$('#entrarSistema').click(function(){
			if($('#numero').val()==""){
				alertify.alert("Debes agregar el numero de la cuenta");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}
			cadena="numero=" + $('#numero').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="inicio.php";
							}else{
								alertify.alert("Fallo al entrar :(");
							}
						}
					});
		});	
	});
</script>