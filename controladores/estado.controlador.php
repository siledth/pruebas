<?php

class Controladorestado{

	/*=============================================
	CREAR fuente  financiamiento
	$tabla = "accion_centralizada";

			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
			   	
	=============================================*/

	static public function ctrCrearfuentefinanciamiento(){

		if(isset($_POST["nuevofuentefinanciamiento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevofuentefinanciamiento"]) 

				){

			   	$tabla = "fuente_financiamiento";

			   	$datos = array("desc_fuente_financiamiento"=>$_POST["nuevofuentefinanciamiento"],
					           "usuario"=>$_POST["nuevousuario"],
					           "fecha"=>$_POST["nuevaFecha"]);
   		var_dump($datos);
	 exit($datos);
			   	$respuesta = Modelofuentefinanciamiento::mdlIngresarfuentefinanciamiento($tabla, $datos);
		
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "la fuente de financiamiento ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "fuentefinanciamiento";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡'.$respuesta[2].' no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "fuentefinanciamiento";

							}
						})

			  	</script>';



			}

		}else{
			return "error";
		}

	}

	/*=============================================
	MOSTRAR fuentes
	=============================================*/

	static public function ctrMostrarestado($item, $valor){

		$tabla = "estado";

		$respuesta = Modeloestado::mdlMostrarestado($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
	MOSTRAR alicuotaiva
	=============================================*/

	static public function ctrMostraralicuota($item, $valor){

		$tabla = "alicuota_iva";

		$respuesta = Modeloestado::mdlMostraralicuota($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
	MOSTRAR unidad de medida
	=============================================*/

	static public function ctrMostrarund($item, $valor){

		$tabla = "unidad_medida";

		$respuesta = Modeloestado::mdlMostrarund($tabla, $item, $valor);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR fuentes AJAX
	=============================================*/

	static public function ctrMostrarestadoAjax(){

		$tabla = "estado";

		$respuesta = Modeloestado::mdlMostrarestadoAjax();

		return $respuesta;

	}

	/*=============================================
	EDITAR fuentes
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) /*&&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])*/){

			   	$tabla = "clientes";

			   	$datos = array("id"=>$_POST["idCliente"],
			   				   "nombre"=>$_POST["editarCliente"],
					           "documento"=>$_POST["editarDocumentoId"],
					           "email"=>$_POST["editarEmail"],
					           "telefono"=>$_POST["editarTelefono"],
					           "direccion"=>$_POST["editarDireccion"],
					           "fecha_nacimiento"=>$_POST["editarFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR fuentes
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}


}


/*=============================================
CREAR fuent
=============================================*/


if(isset($_POST["guardarAjax"])){


  require_once "../modelos/estado.modelo.php";
 
					
  $crearestado = new Controladorestado();
  $respuesta=$crearestado-> ctrCrearestado();

  echo  $respuesta;

}

/*=============================================
LEER CLIENTES AJAX
=============================================*/



if(isset($_POST["ajaxestado"])){

  require_once "../modelos/estado.modelo.php";
 
  $leerestado = new Controladorfuentefinanciamiento();
  $respuesta=$leerestado-> ctrMostrarestadoAjax();

  echo json_encode($respuesta);

}

