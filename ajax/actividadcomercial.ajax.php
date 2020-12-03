<?php

require_once "../controladores/actividadcomercial.controlador.php";
require_once "../modelos/actividadcomercial.modelo.php";

class Ajaxactividadcomercial{

	/*=============================================
	EDITAR fuentefinanciamiento
	=============================================*/	

	public $idfuentefinanciamiento;

	public function ajaxEditaractividadcomercial(){

		$item = "id_fuente_financiamiento";
		$valor = $this->$idfuentefinanciamiento;

		$respuesta = Controladoractividadcomercial::ctrMostraractividadcomercial($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["id_fuente_financiamiento"])){

	$actividadcomercial = new Ajaxactividadcomercial();
	$actividadcomercial -> idactividadcomercial = $_POST["id_fuente_financiamiento"];
	$actividadcomercial -> ajaxEditaractividadcomercial();

}