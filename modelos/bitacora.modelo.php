<?php

require_once "conexion.php";

class ModeloBitacora{

	/*=============================================
	MOSTRAR BITACORA
	=============================================*/

	static public function mdlMostrarBitacora($tabla, $valor){
		

		$stmt = Conexion::conectar()->prepare("select id
													,descripcion
													,fecha
													,usuario 

													from $tabla 
													");

		if($stmt->execute()){
			return $stmt -> fetchAll();
			$stmt -> close();

			$stmt = null;

		}
		else{
			$arr = $stmt ->errorInfo();
			$arr[3]="ERROR";
			return $arr[2];
		}

	}

	/*=============================================
	REGISTRO DE BITACORA
	=============================================*/

	static public function mdlIngresarBitacora($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
			 descripcion
			, usuario
			) 
			VALUES (:descripcion
			, :usuario
		)");

		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			$arr = $stmt ->errorInfo();
			$arr[3]="ERROR";
			return $arr[2];
		
		
		}

		$stmt->close();
		$stmt = null;

	}

	
	
}