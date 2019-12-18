<?php

class ControladorCuenta{

	/*=============================================
	INGRESO A LA CUENTA
	=============================================*/

	static public function ctrIngresoCuenta(){

		if(isset($_POST["numero"])){

			if(preg_match('/^[0-9]+$/', $_POST["numero"])){

			   	$encriptar = crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$respuesta = ModeloCuenta::mdlValidarCuenta($_POST["numero"]);

				if($respuesta["numero"] == $_POST["numero"] && $respuesta["contrasena"] == $encriptar){


						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id_titular"] = $respuesta["id_titular"];
						$_SESSION["numero"] = $respuesta["numero"];
						$_SESSION["nombre_titular"] = $respuesta["nombre_titular"];
						$_SESSION["ultimo_login"] = $respuesta["ultimo_login"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$tabla = "cuenta";

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "numero";
						$valor2 = $respuesta["numero"];

						$ultimoLogin = ModeloCuenta::mdlActualizarCuenta($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}				
						

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}


    //Validar saldo

	static public function ctrValidarSaldo($numero,$monto){

		$respuesta=ModeloCuenta::mdlConsultarSaldo($numero);

		if($monto>$respuesta[0]) return false;

		return true;

	}


    //Consultar Saldo

	static public function ctrConsultarSaldo($numero){

		$respuesta=ModeloCuenta::mdlConsultarSaldo($numero);

		return $respuesta;

	}



	/*=============================================
	Transferencia
	=============================================*/

	static public function ctrTransferencia(){

		if(isset($_POST["numero"])){

			if(preg_match('/^[0-9]+$/', $_POST["numero"] ||
		       preg_match('/^[0-9]+$/', $_POST["monto"])) ){

			   	$encriptar = crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$respuesta = ModeloCuenta::mdlValidarCuenta($_SESSION["numero"]);

				if($respuesta["nombre_titular"] == $_SESSION["nombre_titular"] && $respuesta["contrasena"] == $encriptar){

                        $saldo=ModeloCuenta::mdlConsultarSaldo($_SESSION["numero"]);

                        $validarSaldo=ControladorCuenta::ctrValidarSaldo($_SESSION["numero"],$_POST["monto"]);

                      if($validarSaldo){

                        	$validarCuenta=ModeloCuenta::mdlValidarCuenta($_POST["numero"]);

                        if($validarCuenta!=false && $_POST["numero"]!=$_SESSION["numero"]){

                        $saldoCuentaAtransferir=ModeloCuenta::mdlConsultarSaldo($validarCuenta["numero"]);

                        $nuevoSaldoCuentaAtransferir=$validarCuenta["saldo"]+$_POST["monto"];

                        $actualizarCuentaAtransferir=ModeloCuenta::mdlActualizarCuenta($validarCuenta["numero"] ,$nuevoSaldoCuentaAtransferir);

                        $nuevoSaldo=$saldo[0]-$_POST["monto"];

                        $actualizarCuenta=ModeloCuenta::mdlActualizarCuenta($_SESSION["numero"],$nuevoSaldo);

                     if($actualizarCuenta=="ok" && $actualizarCuentaAtransferir=="ok"){

							 echo '<script>

					swal({

						type: "success",
						title: "¡Transacción exitosa!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';

				}

							}else{

								echo '<script>

					swal({

						type: "error",
						title: "¡El número de cuenta es incorrecto!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';

							}

							}else{

								echo '<script>

					swal({

						type: "error",
						title: "¡Saldo insuficiente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';

							}

								
						

				}else{

					echo '<script>

					swal({

						type: "error",
						title: "¡Contraseña incorrecta!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';

				}

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡Datos incorrectos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){


					});
				

					</script>';

			}

		}

	}



}
	


