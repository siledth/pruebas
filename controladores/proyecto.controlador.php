<?php

class Controladorproyecto{

	/*=============================================
	crear nuevo proyecto
			  
	=============================================*/

	static public function ctrCrearproyecto(){

		if(isset($_POST["nombreproyecto"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreproyecto"]) 

				){

			   		$tabla = "proyecto";
				 
				   $datos = array("id_programacion_anual"=>$_POST["id_programacion"],
									"id_entes"=>$_POST["id_entes"],
									"codigo"=>$_POST["codigo"],
									"nombreproyecto"=>$_POST["nombreproyecto"],
									"tipo"=>$_POST["tipo"],
									"id_usuario"=>$_POST["id_usuario"],
									"fecha"=>$_POST["fecha"]
								);
   		//var_dump($datos);  
//	exit($datos);
			   	$respuesta = Modeloproyecto::mdlIngresarproyecto($tabla, $datos);
		//_____________________________________REVISAR REDIRECCIONAMIENTO
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "el PROYECTO ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										window.location = "index.php?ruta=editar-cotizacion&idVenta="+idVenta;

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

								window.location = "index.php?ruta=editar-cotizacion&idVenta="+idVenta;

							}
						})

			  	</script>';



			}

		}else{
			return "error";
		}

	}
/*=============================================
	crear nuevo accion centralizada
			   	
	=============================================*/

	static public function ctrCrearaccion(){

		if(isset($_POST["id_accion_centralizada"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["id_accion_centralizada"]) 

				){

			   		$tabla = "accion_centra";
					  
				   $datos = array("id_programacion_anual"=>$_POST["id_programacion"],
									"id_entes"=>$_POST["id_entes"],
									"codigo"=>$_POST["codigo"],
									"id_accion_centralizada"=>$_POST["id_accion_centralizada"],
									"tipo"=>$_POST["tipo"],
									"id_usuario"=>$_POST["id_usuario"],
									"fecha"=>$_POST["fecha"]
								);
   		//var_dump($datos);  
//	exit($datos);
				   $respuesta = Modeloproyecto::mdlIngresaraccion($tabla, $datos);

		//_____________________________________REVISAR REDIRECCIONAMIENTO
			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;

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

								window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;

							}
						})

			  	</script>';



			}

		}else{
			return "error";
		}

	}

	/*=============================================
	  Agregar Items a un proyecto
			   	
	=============================================*/

	static public function ctrCrearitems(){

		if(isset($_POST["editarCategoria"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"]) 

				){

			   		$tabla = "programacion_compras_move";
				 
					      
				   $datos = array("id_programacion_anual"=>$_POST["editarCatego"],
									"id_proyecto"=>$_POST["idCategoria"],
									"id_accion_centra"=>$_POST["c"],
									"id_entes"=>$_POST["id_entes"],
									"id_partida_presupuestaria"=>$_POST["id_partida_presupuestaria"],
									"id_fuente_financiamiento"=>$_POST["id_fuente_financiamiento"],
									"id_actvcomercial"=>$_POST["id_actvcomercial"],
									"id_municipio"=>$_POST["id_municipio"],
									"id_estado"=>$_POST["id_estado"],
									"id_ccnu"=>$_POST["id_ccnu"],
									"especificacion"=>$_POST["especificacion"],
									"cantidad"=>$_POST["cantidad"],
									"i"=>$_POST["i"],
									"ii"=>$_POST["ii"],
									"iii"=>$_POST["iii"],
									"iv"=>$_POST["iv"],
									"und"=>$_POST["und"],
									"costo_unitario"=>$_POST["costounitarioestimado"],
									"precio_total"=>$_POST["preciounitarioestimado"],
									"alicuota_iva"=>$_POST["alicuotaivaestimada"],
									"monto_iva"=>$_POST["montoivaestimado"],
									"monto_total"=>$_POST["montototalestimado"],
									"ano"=>$_POST["fecha"],
									"tipo"=>$_POST["tipo"],
									"id_usuario"=>$_POST["id_usuario"],
									"fecha"=>$_POST["fecha"],
									"codigo"=>$_POST["codigo"]
								);
   		//var_dump($datos);  
      //exit($datos);
			   	$respuesta = Modeloproyecto::mdlIngresaritems($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "el PROYECTO ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

										window.location = "index.php?ruta=editar-cotizacion&idVenta="+idVenta;

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

							window.location = "index.php?ruta=editar-cotizacion&idVenta="+idVenta;

							}
						})

			  	</script>';



			}

		}else{
			return "error";
		}

	}
	/*=============================================
	MOSTRAR proyecto
	=============================================*/

	static public function ctrMostrarproyecto($item, $valor,$ite,$it){

		$tabla = "proyecto";
		$ite = $_SESSION["id_entes"];
		$it = $_GET["idVenta"];

		$respuesta = Modeloproyecto::mdlMostrarproyecto($tabla, $item, $valor,$ite, $it);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR Accion centralizada
	=============================================*/

	static public function ctrMostraraccioncentralizada($item, $valor,$ite,$it){

		$tabla = "view_accion_centralizada";
		$ite = $_SESSION["id_entes"];
		$it = $_GET["idVenta"];

		$respuesta = Modeloproyecto::mdlMostraraccion($tabla, $item, $valor,$ite, $it);

		return $respuesta;

	}
/*=============================================
	MOSTRAR ITEM proyecto
	=============================================*/

	static public function ctrMostraritems($item, $valor,$ite,$it){

		$tabla = "programacion_compras_move1";
		$ite = $_SESSION["id_entes"];
		$it = $_POST["iditem"];

		$respuesta = Modeloproyecto::mdlMostraritem($tabla, $item, $valor,$ite, $it);

		return $respuesta;

	}
	/*=============================================
	MOSTRAR ITEM  acciponm
	=============================================*/

	static public function ctrMostraritemsc($item, $valor,$ite,$it){

		$tabla = "programacion_accion_centralizada3";
		$ite = $_SESSION["id_entes"];
		$it = $_POST["idCategoria"];

		$respuesta = Modeloproyecto::mdlMostraritemc($tabla, $item, $valor,$ite, $it);

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

