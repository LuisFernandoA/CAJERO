<?php

require_once "conexion.php";

class ModeloCuenta{


	/*=============================================
	SALDO
	=============================================*/

	static public function mdlConsultarSaldo($numero){


			$stmt = Conexion::conectar()->prepare("SELECT saldo FROM cuenta WHERE numero = :item");

			$stmt -> bindParam(":item", $numero, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
		

		$stmt -> close();

		$stmt = null;

	}



	//Validar cuenta

	static public function mdlValidarCuenta($numero){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM cuenta WHERE numero = :item");

			$stmt -> bindParam(":item", $numero, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetch();
		

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	ACTUALIZAR CUENTA
	=============================================*/

	static public function mdlActualizarCuenta( $numero,  $saldo){

		$stmt = Conexion::conectar()->prepare("UPDATE cuenta SET saldo = :item1 WHERE numero = :item2");

		$stmt -> bindParam(":item1", $saldo, PDO::PARAM_INT);
		$stmt -> bindParam(":item2", $numero, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}