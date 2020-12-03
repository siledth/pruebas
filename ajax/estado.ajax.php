<?php

require_once "../controladores/estado.controlador.php";
require_once "../modelos/estado.modelo.php";

class Ajaxestado{

	/*=============================================
	EDITAR fuentefinanciamiento
	=============================================*/	

	public $idestado;

	public function ajaxEditarestado(){

		$item = "id_estado";
		$valor = $this->$idestado;

		$respuesta = Controladorestado::ctrMostrarestado($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["id_fuente_financiamiento"])){

	$estado = new Ajaxestado();
	$estado -> idestado = $_POST["id_fuente_financiamiento"];
	$estado -> ajaxEditarestado();

}