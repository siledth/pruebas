<?php

require_once "../controladores/programacionanual.controlador.php";
require_once "../modelos/programacionanual.modelo.php";

class Ajaxprogramacionanual{

	/*=============================================
	EDITAR CATEGOR�A
	=============================================*/	

	public $idproyecto;

	public function ajaxEditarproyecto(){

		$item = "id_programacion_anual";
		$valor = $this->idproyecto;

		$respuesta = ControladorProgramacionanual::ctrMostrarProgramacionanual($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGOR�A
=============================================*/	
if(isset($_POST["idproyecto"])){

	$proyecto = new Ajaxprogramacionanual();
	$proyecto -> idproyecto = $_POST["idproyecto"];
	$proyecto -> ajaxEditarproyecto();
}
