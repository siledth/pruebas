<?php

require_once "conexion.php";

class Modelomunicipio{

	/*=============================================
	crear municipio
	=============================================*/

	static public function mdlIngresarmunicipio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (desc_municipio
																, id_usuario
																, fecha

																) 
																VALUES (:desc_municipio
																, :id_usuario
																, :fecha

																)");

		$stmt->bindParam(":desc_municipio", $datos["desc_municipio"], PDO::PARAM_STR);
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
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarmunicipio($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

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