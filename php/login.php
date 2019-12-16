<?php 

	session_start();
	require_once "conexion.php";

	$conexion=conexion();

		$numero=$_POST['numero'];
		$pass=sha1($_POST['password']);

		$sql="SELECT * from cuenta where numero='$numero' and password='$pass'";
		$result=mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0){
			$_SESSION['user']=$numero;
			echo 1;
		}else{
			echo 0;
		}
 ?>