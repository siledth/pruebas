<?php

class Controladorpartidapresupuestaria{

	/*=============================================
	
			   	
	=============================================*/

	static public function ctrCrearpartidapresupuestaria(){

		if(isset($_POST["nuevopartidapresupuestria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevopartidapresupuestria"]) 

				){

			   	$tabla = "partida_presupuestaria";

			   	$datos = array("desc_fuente_financiamiento"=>$_POST["nuevofuentefinanciamiento"],
					           "usuario"=>$_POST["nuevousuario"],
					           "fecha"=>$_POST["nuevaFecha"]);
   		//var_dump($datos);
	// exit($datos);
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

	static public function ctrMostrarpartidapresupuestaria($item, $valor){

		$tabla = "partida_presupuestaria";

		$respuesta = Modelopartidapresupuestaria::mdlMostrarpartidapresupuestaria($tabla, $item, $valor);

		return $respuesta;

	}

/*=============================================
	MOSTRAR fuentes
	=============================================*/

	static public function ctrMostrarproduc($item, $valor){

		$tabla = "productos";

		$respuesta = Modelopartidapresupuestaria::mdlMostrarproduc($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR fuentes AJAX
	=============================================*/

	static public function ctrMostrarpartidapresupuestariaAjax(){

		$tabla = "partida_presupuestaria";

		$respuesta = Modelopartidapresupuestaria::mdlMostrarpartidapresupestriaAjax();

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


  require_once "../modelos/fuentefinanciamiento.modelo.php";
 
					
  $crearfuentefinanciamiento = new Controladorfuentefinanciamiento();
  $respuesta=$crearfuentefinanciamiento-> ctrCrearfuentefinanciamiento();

  echo  $respuesta;

}

/*=============================================
LEER CLIENTES AJAX
=============================================*/



if(isset($_POST["ajaxfuentefinanciamiento"])){

  require_once "../modelos/fuentefinanciamiento.modelo.php";
 
  $leerfuentefinanciamiento = new Controladorfuentefinanciamiento();
  $respuesta=$leerfuentefinanciamiento-> ctrMostrarfuentefinanciamientoAjax();

  echo json_encode($respuesta);

}

