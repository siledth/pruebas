<?php

require_once "conexion.php";

class Modeloestado{

	/*=============================================
	CREAR CLIENTE
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre
																, documento
																, email
																, telefono
																, direccion
																, fecha_nacimiento

																) 
																VALUES (:nombre
																, :documento
																, :email
																, :telefono
																, :direccion
																, :fecha_nacimiento

																)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
	=============================================*/

	static public function mdlIngresarfuentefinanciamiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(desc_fuente_financiamiento
																, usuario
																, fecha

																) 
																VALUES (:desc_fuente_financiamiento
																, :usuario
																, :fecha

																)");

		$stmt->bindParam(":desc_fuente_financiamiento", $datos["desc_fuente_financiamiento"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

//	var_dump($datos);
	//    exit($datos);
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
	MOSTRAR estado
	=============================================*/

	static public function mdlMostrarestado($tabla, $item, $valor){

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
	MOSTRAR alicuota iva
	=============================================*/

	static public function mdlMostraralicuota($tabla, $item, $valor){

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
	MOSTRAR unidad de medida
	=============================================*/

	static public function mdlMostrarund($tabla, $item, $valor){

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

	static public function mdlMostrarestadoAjax(){



		$stmt = Conexion::conectar()->prepare("SELECT  
		                                             id_estado,
													 nombre as text
													  FROM estado
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

	static public function mdlEditarfuentefinanciamiento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);

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