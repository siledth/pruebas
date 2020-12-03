<?php

require_once "../controladores/partidapresupuestaria.controlador.php";
require_once "../modelos/partidapresupuestaria.modelo.php";

class Ajaxfuentefinanciamiento{

	/*=============================================
	EDITAR fuentefinanciamiento
	=============================================*/	

	public $idfuentefinanciamiento;

	public function ajaxEditarfuentefinanciamiento(){

		$item = "id_fuente_financiamiento";
		$valor = $this->$idfuentefinanciamiento;

		$respuesta = Controladorfuentefinanciamiento::ctrMostrarfuentefinanciamiento($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["id_fuente_financiamiento"])){

	$fuentefinanciamiento = new Ajaxfuentefinanciamiento();
	$fuentefinanciamiento -> idfuentefinanciamiento = $_POST["id_fuente_financiamiento"];
	$fuentefinanciamiento -> ajaxEditarfuentefinanciamiento();

}