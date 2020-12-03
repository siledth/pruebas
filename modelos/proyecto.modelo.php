<?php

require_once "conexion.php";

class Modeloproyecto{

	/*=============================================
	crear Proyecto
	=============================================*/

	static public function mdlIngresarproyecto($tabla, $datos){
		
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_programacion_anual
																, id_entes
																, codigo
																,nombreproyecto
																,tipo
																,id_usuario
																,fecha ) 
																VALUES (:id_programacion_anual
																, :id_entes
																, :codigo
																, :nombreproyecto
																, :tipo
																, :id_usuario
																, :fecha
 																)");

		$stmt->bindParam(":id_programacion_anual", $datos["id_programacion_anual"], PDO::PARAM_STR);
		$stmt->bindParam(":id_entes", $datos["id_entes"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreproyecto", $datos["nombreproyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

//var_dump($datos);
//exit($datos);
		if($stmt->execute()){

			return "ok";

		}else{

			$arr=$stmt->errorInfo();
			return $arr[2];
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	crear Accion centralizada
	=============================================*/

	static public function mdlIngresaraccion($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_programacion_anual
														, id_entes
														, codigo
														,id_accion_centralizada
														,tipo
														,id_usuario
														,fecha ) 
														VALUES (:id_programacion_anual
														, :id_entes
														, :codigo
														, :id_accion_centralizada
														, :tipo
														, :id_usuario
														, :fecha
														 )");

$stmt->bindParam(":id_programacion_anual", $datos["id_programacion_anual"], PDO::PARAM_STR);
$stmt->bindParam(":id_entes", $datos["id_entes"], PDO::PARAM_STR);
$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
$stmt->bindParam(":id_accion_centralizada", $datos["id_accion_centralizada"], PDO::PARAM_STR);
$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

//var_dump($datos);
//exit($datos);
if($stmt->execute()){

	return "ok";

}else{

	$arr=$stmt->errorInfo();
	return $arr[2];

}

$stmt->close();
$stmt = null;

}

		/*=============================================
	crear  intem en Proyecto
	=============================================*/

	static public function mdlIngresaritems($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
														id_programacion_anual
														,id_proyecto
														,id_accion_centra
														,id_entes
														,id_partida_presupuestaria
														,id_fuente_financiamiento
														,id_actvcomercial
														,id_municipio
														,id_estado
														,id_ccnu
														,especificacion
														,cantidad
														,i
														,ii
														,iii
														,iv
														,und
														,costo_unitario
														,precio_total
														,alicuota_iva
														,monto_iva
														,monto_total
														,ano
														,tipo
														,id_usuario
														,fecha
														,codigo ) 
														VALUES (:id_programacion_anual
														,:id_proyecto
														,:id_accion_centra
														,:id_entes
														,:id_partida_presupuestaria
														,:id_fuente_financiamiento
														,:id_actvcomercial
														,:id_municipio
														,:id_estado
														,:id_ccnu
														,:especificacion
														,:cantidad
														,:i
														,:ii
														,:iii
														,:iv
														,:und
														,:costo_unitario
														,:precio_total
														,:alicuota_iva
														,:monto_iva
														,:monto_total
														,:ano
														,:tipo
														,:id_usuario
														,:fecha 
														,:codigo)");

$stmt->bindParam(":id_programacion_anual", $datos["id_programacion_anual"], PDO::PARAM_STR);
$stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_STR);
$stmt->bindParam(":id_accion_centra", $datos["id_accion_centra"], PDO::PARAM_STR);
$stmt->bindParam(":id_entes", $datos["id_entes"], PDO::PARAM_STR);
$stmt->bindParam(":id_partida_presupuestaria", $datos["id_partida_presupuestaria"], PDO::PARAM_STR);
$stmt->bindParam(":id_fuente_financiamiento", $datos["id_fuente_financiamiento"], PDO::PARAM_STR);
$stmt->bindParam(":id_actvcomercial", $datos["id_actvcomercial"], PDO::PARAM_STR);
$stmt->bindParam(":id_municipio", $datos["id_municipio"], PDO::PARAM_STR);
$stmt->bindParam(":id_estado", $datos["id_estado"], PDO::PARAM_STR);
$stmt->bindParam(":id_ccnu", $datos["id_ccnu"], PDO::PARAM_STR);
$stmt->bindParam(":especificacion", $datos["especificacion"], PDO::PARAM_STR);
$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
$stmt->bindParam(":i", $datos["i"], PDO::PARAM_STR);
$stmt->bindParam(":ii", $datos["ii"], PDO::PARAM_STR);
$stmt->bindParam(":iii", $datos["iii"], PDO::PARAM_STR);
$stmt->bindParam(":iv", $datos["iv"], PDO::PARAM_STR);
$stmt->bindParam(":und", $datos["und"], PDO::PARAM_STR);
$stmt->bindParam(":costo_unitario", $datos["costo_unitario"], PDO::PARAM_STR);
$stmt->bindParam(":precio_total", $datos["precio_total"], PDO::PARAM_STR);
$stmt->bindParam(":alicuota_iva", $datos["alicuota_iva"], PDO::PARAM_STR);
$stmt->bindParam(":monto_iva", $datos["monto_iva"], PDO::PARAM_STR);
$stmt->bindParam(":monto_total", $datos["monto_total"], PDO::PARAM_STR);
$stmt->bindParam(":ano", $datos["ano"], PDO::PARAM_STR);
$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
															
								
//var_dump($datos);
//exit($datos);
if($stmt->execute()){

	return "ok";

}else{

	$arr=$stmt->errorInfo();
	return $arr[2];

}

$stmt->close();
$stmt = null;

}

	/*=============================================
	MOSTRAR proyecto pro unidad
	=============================================*/

	static public function mdlMostrarproyecto($tabla, $item, $valor,$ite,$it){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entes = $ite and id_programacion_anual= $it  ORDER BY id_proyecto");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
/*=============================================
	MOSTRAR accion pro unidad
	=============================================*/

	static public function mdlMostraraccion($tabla, $item, $valor,$ite,$it){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entes = $ite and id_programacion_anual= $it  ORDER BY id_accion_centra");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

/*=============================================
	MOSTRAR item proyecto pro unidad
	=============================================*/

	static public function mdlMostraritem($tabla, $item, $valor,$ite,$it){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entes = $ite and codigo='001'  ORDER BY id_proyecto");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

/*=============================================
	MOSTRAR item accion
	=============================================*/

	static public function mdlMostraritemc($tabla, $item, $valor,$ite,$it){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entes = $ite and id_accion_centra= 1  ORDER BY id_accion_centra");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CLIENTES AJAX
	=============================================*/

	static public function mdlMostrarmunicipioAjax(){



		$stmt = Conexion::conectar()->prepare("SELECT  
		                                             id_municipio,
													 desc_municipio as text
													  FROM municipio
                                                  ");

		$stmt -> execute();

		$arr = $stmt ->errorInfo();


		if ($arr[0]>0){
				$arr[3]="ERROR";
				return $arr;
			}
			else{

			return $stmt -> fetchAll();
		}

		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarmunicipio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET desc_municipio = :desc_municipio WHERE id_municipio = :id_municipio");

		$stmt->bindParam(":id_municipio", $datos["id_municipio"], PDO::PARAM_INT);
		$stmt->bindParam(":desc_municipio", $datos["desc_municipio"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR fuentefinanciamiento
	=============================================*/

	static public function mdlEliminarfuentefinanciamiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_fuente_financiamiento = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR fuentefinanciamiento
	=============================================*/

	static public function mdlActualizarfuentefinanciamiento($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id_fuente_financiamiento = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}