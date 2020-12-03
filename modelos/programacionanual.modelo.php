<?php

require_once "conexion.php";
class ModeloProgramacionanual{

	/*=============================================
	CREAR programacionanual
	
	=============================================*/

	static public function mdlIngresarprogramacionanual($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo
																,id_entes
																,status
																,ano
																,id_usuario
																,fecha

																) 
																VALUES (:codigo
																,:id_entes
																,:status
																,:ano
																, :id_usuario
																, :fecha)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_entes", $datos["id_entes"], PDO::PARAM_STR);
		$stmt->bindParam(":status", $datos["status"], PDO::PARAM_STR);
		$stmt->bindParam(":ano", $datos["ano"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
//var_dump($datos);
///	  exit($datos);
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
	MOSTRAR reporte acciion
	=============================================*/
static public function mdlMostrarReporte1($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	MOSTRAR programacion
	=============================================*/
static public function mdlMostrarProgramacionanual($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
    MOSTRAR proyecto
    ======================*/

	static public function mdlMostrarprogramacionanualente($tabla, $item, $valor, $ite){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
														
														FROM 
														$tabla 
														WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

        }
        else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_entes = $ite");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	EDITAR Status del la programacion
	=============================================*/

	static public function mdlEditarproyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET status = :status WHERE id_programacion_anual = :id_programacion_anual");

		$stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_programacion_anual", $datos["id_programacion_anual"], PDO::PARAM_INT);
 //var_dump($stmt);
	//      exit($stmt);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

