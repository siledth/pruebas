<?php
class ControladorProgramacionanual{

	/*=============================================
	
			   	
	=============================================*/

	static public function ctrCrearprogramacionanual(){

		if(isset($_POST["ano"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ano"]) 

				){
					
			   	$tabla = "programacion_compras";

				   $datos = array("codigo"=>$_POST["codigo"],
				   					"id_entes"=>$_POST["id_entes"],
									"status"=>$_POST["status"],
									"ano"=>$_POST["ano"], 
										"id_usuario"=>$_POST["id_usuario"],
										"fecha"=>$_POST["fecha"]);
   	//	var_dump($datos);
	 //exit($datos);
			   	$respuesta = Modeloprogramacionanual::mdlIngresarprogramacionanual($tabla, $datos);
				  			   	
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: " ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "programacionanual";

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

							window.location = "programacionanual";

							}
						})

			  	</script>';




			}

		}else{
			return "error";
		}

	}

	static public function ctrMostrarReporte1($item, $valor){

		$tabla = "programacionanual_accion";

		$respuesta = ModeloProgramacionanual::mdlMostrarReporte1($tabla, $item, $valor);

		return $respuesta;

    }
	/*=============================================
	MOSTRAR Programacion
	=============================================*/

	static public function ctrMostrarProgramacionanual($item, $valor){

		$tabla = "view_programaciocompra";

		$respuesta = ModeloProgramacionanual::mdlMostrarProgramacionanual($tabla, $item, $valor);

		return $respuesta;

    }
    
   
    /*=============================================
	MOSTRAR fuentes
	=============================================*/

	static public function ctrMostrarProgramacionanuals($item, $valor, $ite){

        $tabla = "view_programaciocompra";
		$ite = $_SESSION["id_entes"];
		
		$respuesta = ModeloProgramacionanual::mdlMostrarProgramacionanualente($tabla, $item, $valor, $ite);

		return $respuesta;

    }
	
	/*=============================================
	EDITAR Programacion = proyecto
	=============================================*/

	static public function ctrEditarproyecto(){

		if(isset($_POST["status"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["status"])){

				$tabla = "programacion_compras";

				$datos = array("status"=>$_POST["status"],
							   "id_programacion_anual"=>$_POST["idproyecto"]);
  //var_dump($datos);
	//      exit($datos);
				$respuesta = ModeloProgramacionanual::mdlEditarproyecto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Programación Anual ha sido Enviada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "programacionanual";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Programación Anual no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "programacionanual";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR Programacion
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="Categorias";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
			}
		}
		
	}
}
