<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CLIENTE  este es el que edito
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id_accion_centra";
		$valor = $this->idCliente;

		$respuesta = ModeloClientes::ctrMostrarCentralizada($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}