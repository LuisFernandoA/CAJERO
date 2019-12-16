<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: grey">

	<div class="container">
		<div class="row">
			<div class="col-sm-16">
				<center><div class="jumbotron">
				<h2>Bienvenido a Nuestro Servicio ATMW</h2>
				<br><br><br>
				<p></p>
				<a href="php/SaldoCuenta.php" class="btn btn-primary">Consultar Saldo</a>
				<p></p>
				<a href="php/salir.php" class="btn btn-primary">Transacción</a>
				<p></p>
				<a href="php/salir.php" class="btn btn-danger">Salir del sistema</a>
				</div> </center>

			</div>
		</div>
	</div>
</body>
</html>
<?php
} else {
	header("location:index.php");
	}
 ?>
