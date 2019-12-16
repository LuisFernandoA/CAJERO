<?php 
	require_once "conexion.php";
	$conexion=conexion();

		$saldo=$_POST['saldo'];
		$cliente=$_POST['cliente'];
		$numero=$_POST['numero'];
		$password=sha1($_POST['password']);

		$sql="INSERT into cuenta (saldo,cliente,numero,password)
				values ('$saldo','$cliente','$numero','$password')";
		echo $result=mysqli_query($conexion,$sql);
 ?>