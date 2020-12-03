<?php
class ControladorProgramacion{
static public function ctrCrearprogramacion(){
$fecha_actual = date("yy/m/d");
$valor1 = $_POST["seleccionarpartida"];
$valor2 = $_POST["id_accion_centralizada"];
$valor3 = $_POST["seleccionarfuentefinanciamiento"];
$valor4 = $_POST["id_actvcomercial"];
$valor5 = $_POST["montopartida"];
$valor6 = $_POST["seleccionarmunicipio"];
$valor7 = $_POST["seleccionarestado"];
$valor8 = $_POST["nombrep"];
$valor9 = $_POST["montopartida"];
$valor10 = $_POST["mes"];
$valor11 = $_POST["ano"];
$valor13= $_POST["nombreente"];
$valor14= $_POST["idVendedor"];
$valor15= $_POST["codigo"];
$valor16= 20;
$date=time();
$y=date("Y-m-d",$date);
$contadorProducto=0;
$datosTabla = stripcslashes($_POST['arrayDatos']);
//var_dump($datosTabla);
//exit ($datosTabla);
$datosTabla = json_decode($datosTabla,TRUE);
		
//$listaProductos = json_decode($_POST["listaProductos"], true);
//$tablaClientes = "clientes";

			//$item = "id";
			//$valor = $_POST["seleccionarCliente"];

			//$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);
			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	
 
			$tabla = "programacion_anuales";

			$datos = array("id_usuario"=>$_POST["idVendedor"],
			               "id_entes"=>$_POST["nombreente"],
						   "id_accion_centralizada"=>$_POST["id_accion_centralizada"],
						   "id_partida_presupuestaria"=>$_POST["seleccionarpartida"],
						   "id_fuente_financiamiento"=>$_POST["seleccionarfuentefinanciamiento"],
						   "id_actvcomercial"=>$_POST["id_actvcomercial"],
						   "id_municipio"=>$_POST["seleccionarmunicipio"],
						   "id_estado"=>$_POST["seleccionarestado"],
						   "trimestre"=>$datosTabla[0]['descripcion']);
						   
			var_dump($datos);
	     exit($datos);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

			


		}

	}
