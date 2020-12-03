<?php

require_once "../controladores/municipio.controlador.php";
require_once "../modelos/municipio.modelo.php";

class Ajaxmunicipio{

	/*=============================================
	EDITAR 
	=============================================*/	

	public $idmunicipio;

	public function ajaxEditarmunicipio(){

		$item = "id_municipio";
		$valor = $this->$idmunicipio;

		$respuesta = Controladormunicipio::ctrMostrarmunicipio($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR 
=============================================*/	

if(isset($_POST["id_municipio"])){

	$municipio = new Ajaxmunicipio();
	$municipio -> idmunicipio = $_POST["id_municipio"];
	$municipio -> ajaxEditarmunicipio();

}