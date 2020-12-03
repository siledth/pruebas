<?php

class ControladorBitacora{



	/*=============================================
	MOSTRAR BITACORA
	=============================================*/

	static public function ctrMostrarBitacora(){

		$tabla = "bitacora";

		$respuesta = ModeloBitacora::mdlMostrarBitacora("bitacora", $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR BITACORA
	=============================================*/

	static public function ctrCrearBitacora($datos){


		$tabla = "bitacora";

		$datos = array("descripcion"=>$datos["descripcion"],
					   "usuario"=>$datos["usuario"]
					   );

		$respuesta = ModeloBitacora::mdlIngresarBitacora($tabla, $datos);

			
	}

	

}