<?php

class Controladormunicipio{

	/*=============================================
	
			   	
	=============================================*/

	static public function ctrCrearmunicipio(){

		if(isset($_POST["nuevomunicipio"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevomunicipio"]) 

				){

			   	$tabla = "municipio";

			   	$datos = array("desc_municipio"=>$_POST["nuevomunicipio"],
					           "id_usuario"=>$_POST["id_usuario"],
					           "fecha"=>$_POST["fecha"]);
   		//var_dump($datos);
	 //exit($datos);
			   	$respuesta = Modelomunicipio::mdlIngresarmunicipio($tabla, $datos);
		
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "el Municipio ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "municipio";

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

							window.location = "municipio";

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

	static public function ctrMostrarmunicipio($item, $valor){

		$tabla = "municipio";

		$respuesta = Modelomunicipio::mdlMostrarmunicipio($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR municipio AJAX
	=============================================*/

	static public function ctrMostrarmunicipioAjax(){

		$tabla = "municipio";

		$respuesta = Modelomunicipio::mdlMostrarmunicipioAjax();

		return $respuesta;

	}

	/*=============================================
	EDITAR fuentes
	=============================================*/

	static public function ctrEditarmunicipio(){

		if(isset($_POST["editarmunicipio"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarmunicipio"]) /*&&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])*/){

			   	$tabla = "municipio";

			   	$datos = array("id_municipio"=>$_POST["id_municipio"],
			   				   "desc_municipio"=>$_POST["editardesc_municipio"]
					            );
var_dump($datos);
exit($datos);
			   	$respuesta = Modelomunicipio::mdlEditarmunicipio($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Municipio ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "municipio";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Municipio no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "municipio";

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

			$tabla ="municipio";
			$datos = $_GET["idCliente"];

			$respuesta = Modelomunicipio::mdlEliminarCliente($tabla, $datos);

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

								window.location = "municipio";

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


  require_once "../modelos/municipio.modelo.php";
 
					
  $crearmunicipio = new Controladormunicipio();
  $respuesta=$crearmunicipio-> ctrCrearmunicipio();

  echo  $respuesta;

}

/*=============================================
LEER municipio AJAX
=============================================*/



if(isset($_POST["ajaxmunicipio"])){

  require_once "../modelos/municipio.modelo.php";
 
  $leermunicipio = new Controladormunicipio();
  $respuesta=$leermunicipio-> ctrMostrarmunicipioAjax();

  echo json_encode($respuesta);

}

