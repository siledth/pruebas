<?php

class ControladorPerfiles{

	
	/*=============================================
	REGISTRO DE PERFILES
	=============================================*/

	static public function ctrCrearPerfil(){
		echo $_POST["nuevoDescripcionPerfil"];
		if(isset($_POST["nuevoDescripcionPerfil"])){

			

		//aca guarda el registo de nuevos perfiles
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDescripcionPerfil"]) 
			   ){

				$tabla = "perfiles";




				$datos = array("descripcion" => $_POST["nuevoDescripcionPerfil"]


							   ,"menuconfiguraciones" => $_POST["mConfiguraciones"]
							   ,"datosempresa" => $_POST["smDatosEmpresa"]
							   ,"usuarios" => $_POST["smUsuarios"]
							   ,"perfiles" => $_POST["smPerfiles"]
							   ,"configuracioncorreo" => $_POST["smConfiguracionCorreo"]

							   ,"clientes" => $_POST["smClientes"]
							   ,"productos" => $_POST["smProductos"]
							   ,"categorias" => $_POST["smCategorias"]

   							   ,"menucotizaciones" => $_POST["mCotizaciones"]
   							   ,"cotizaciones" => $_POST["smCotizaciones"]
							   ,"administrarcotizaciones" => $_POST["smAdministraCotizaciones"]
							   ,"modificarcotizaciones" => $_POST["smModificarCotizaciones"]
							   ,"eliminarcotizaciones" => $_POST["smEliminarCotizaciones"]

  							   ,"menuventas" => $_POST["mVentas"]
   							   ,"ventas" => $_POST["smVentas"]
							   ,"administrarventas" => $_POST["smAdministraVentas"]
							   ,"modificarventas" => $_POST["smModificarVentas"]
							   ,"eliminarventas" => $_POST["smEliminarVentas"]
   							   ,"facturacionelectronica" => $_POST["smFacturacionElectronica"]
							   ,"reportesventas" => $_POST["smReportesVentas"]

   							   ,"cajassuperiores" => $_POST["CajasSuperiores"]
							   ,"graficoganancias" => $_POST["GraficoGanancias"]
   							   ,"productosmasvendidos" => $_POST["ProductosMasVendidos"]
   							   ,"bitacora" => $_POST["smBitacora"]
							   ,"productosagregadosrecientemente" => $_POST["ProductosAgregadosRecienteMente"]


   							   ,"pagos" => $_POST["smPagos"]
							   ,"historicopagos" => $_POST["smHistoricoPagos"]
   							   ,"imprimirpagos" => $_POST["smImprimirPagos"]
							   ,"eliminarpagos" => $_POST["smEliminarPagos"]

							   ,"costopoductos" => $_POST["smCostoProductos"]
							);

				

				$respuesta = ModeloPerfiles::mdlIngresarPerfil($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡La discrición del perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR PERFILES
	=============================================*/

	static public function ctrMostrarPerfiles($item, $valor){

		$tabla = "perfiles";

		$respuesta = ModeloPerfiles::mdlMostrarPerfiles($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR PERFILES para crear usuarios
	=============================================*/

	static public function ctrMostrarPerfile($item, $valor){

		$tabla = "perfiles";

		$respuesta = ModeloPerfiles::mdlMostrarperfile($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditarPerfil(){

		if(isset($_POST["idPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idPerfil"])){

				
				$tabla = "perfiles";

				$datos = array("perfil" => $_POST["idPerfil"]
							   ,"descripcion" => $_POST["editarDescripcion"]

							   ,"menuconfiguraciones" => $_POST["editarmConfiguraciones"]
							   ,"datosempresa" => $_POST["editarsmDatosEmpresa"]
							   ,"usuarios" => $_POST["editarsmUsuarios"]
							   ,"perfiles" => $_POST["editarsmPerfiles"]
							   ,"configuracioncorreo" => $_POST["editarsmConfiguracionCorreo"]

   							   ,"clientes" => $_POST["editarsmClientes"]
							   ,"productos" => $_POST["editarsmProductos"]
							   ,"categorias" => $_POST["editarsmCategorias"]

							   ,"menucotizaciones" => $_POST["editarmCotizaciones"]
  							   ,"cotizaciones" => $_POST["editarsmCotizaciones"]
							   ,"administrarcotizaciones" => $_POST["editarsmAdministraCotizaciones"]
							   ,"modificarcotizaciones" => $_POST["editarsmModificarCotizaciones"]
							   ,"eliminarcotizaciones" => $_POST["editarsmEliminarCotizaciones"]



  							   ,"menuventas" => $_POST["editarmVentas"]
   							   ,"ventas" => $_POST["editarsmVentas"]
							   ,"administrarventas" => $_POST["editarsmAdministraVentas"]
							   ,"modificarventas" => $_POST["editarsmModificarVentas"]
							   ,"eliminarventas" => $_POST["editarsmEliminarVentas"]
   							   ,"facturacionelectronica" => $_POST["editarsFacturacionElectronica"]
							   ,"reportesventas" => $_POST["editarsmReportesVentas"]

							   ,"cajassuperiores" => $_POST["editarCajasSuperiores"]
							   ,"graficoganancias" => $_POST["editarGraficoGanancias"]
   							   ,"productosmasvendidos" => $_POST["editarProductosMasVendidos"]
							   ,"productosagregadosrecientemente" => $_POST["editarroductosAgregadosRecienteMente"]
							   ,"bitacora" => $_POST["editarsmBitacora"] 

  							   ,"pagos" => $_POST["smEditarPagos"]
							   ,"historicopagos" => $_POST["smEditarHistoricoPagos"]
   							   ,"imprimirpagos" => $_POST["smEditarImprimirPagos"]
							   ,"eliminarpagos" => $_POST["smEditarEliminarPagos"]

							   ,"costoproductos" => $_POST["editarsmCostoProductos"]


								);

				$respuesta = ModeloPerfiles::mdlEditarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El perfil ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "perfiles";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "perfiles";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR PERFIL
	=============================================*/

	static public function ctrBorrarPerfil(){

		if(isset($_GET["idPerfil"]) && isset($_GET["eliminar"])){

			$tabla ="perfiles";
			$datos = $_GET["idPerfil"];



			$respuesta = ModeloPerfiles::mdlBorrarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "perfiles";

								}
							})

				</script>';

			}		

		}

	}


}
	



