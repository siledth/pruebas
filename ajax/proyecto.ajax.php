<?php

require_once "../controladores/programacionanual.controlador.php";
require_once "../modelos/programacionanual.modelo.php";

class Ajaxprogramacionanual{

	/*=============================================
	EDITAR CATEGORÍA
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
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idproyecto"])){

	$proyecto = new Ajaxprogramacionanual();
	$proyecto -> idproyecto = $_POST["idproyecto"];
	$proyecto -> ajaxEditarproyecto();
}
