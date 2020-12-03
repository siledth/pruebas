<?php

require_once "conexion.php";


class ModeloPerfiles{
 
	/*=============================================
	MOSTRAR perfil para usuarios
	=============================================*/
	

	static public function mdlMostrarperfile($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * 
                                                     
													FROM perfiles");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * 

													FROM usuario_perfil_organos");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarPerfiles($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT perfil
														 ,descripcion

														  ,(case when menuconfiguraciones='on' then 'on'
														  		else 'off' 
														  		end) as menuConfiguraciones
														  
														  ,(case when datosempresa='on' then 'on'
														  		else 'off' 
														  		end ) as datosEmpresa
														  
														  ,(case when usuarios='on' then 'on'
														  	else 'off'
														  	end) as usuarios
														  
														  ,(case when perfiles='on' then 'on'
														  		 else 'off'
														  		 end) as perfiles
														  
														  ,(case when configuracioncorreo='on' then 'on' else 'off' 
														  		end )as configuracionCorreo




												  		  ,(case when clientes='on' then 'on' else 'off' 
														  		end )as clientes

														  ,(case when productos='on' then 'on' else 'off' 
														  		 end )as productos

														  ,(case when categorias='on' then 'on' else 'off' 
														  		  end )as categorias


											  		  	,(case when menucotizaciones='on' then 'on' else 'off' 
														  		end )as menuCotizaciones

												  		  ,(case when cotizaciones='on' then 'on' else 'off' 
														  		end )as cotizaciones

														  ,(case when administrarcotizaciones='on' then 'on' else 'off' 
														  		 end )as administrarCotizaciones

														  ,(case when modificarcotizaciones='on' then 'on' else 'off' 
														  		  end )as modificarCotizaciones

														  ,(case when eliminarcotizaciones='on' then 'on' else 'off' 
														  		  end )as eliminarCotizaciones






														,(case when menuventas='on' then 'on' else 'off' 
														  		 end )as menuVentas

														,(case when ventas='on' then 'on' else 'off' 
														  		  end )as ventas


											  		  	,(case when administrarventas='on' then 'on' else 'off' 
														  		end )as administrarVentas

												  		  ,(case when modificarventas='on' then 'on' else 'off' 
														  		end )as modificarventas

														  ,(case when eliminarventas='on' then 'on' else 'off' 
														  		 end )as eliminarVentas

														  ,(case when facturacionelectronica='on' then 'on' else 'off' 
														  		  end )as facturacionElectronica

														  ,(case when reportesventas='on' then 'on' else 'off' 
														  		  end )as reportesVentas




  												  		  ,(case when cajassuperiores='on' then 'on' else 'off' 
														  		end )as cajasSuperiores

														  ,(case when graficoganancias='on' then 'on' else 'off' 
														  		 end )as graficoGanancias

														  ,(case when productosmasvendidos='on' then 'on' else 'off' 
														  		  end )as productosMasVendidos

														  ,(case when productosagregadosrecientemente='on' then 'on' else 'off' 
														  		  end )as productosAgregadosRecientemente



														  ,(case when bitacora='on' then 'on' else 'off' 
														  		  end )as bitacora


														  ,(case when pagos='on' then 'on' else 'off' 
														  		 end )as pagos

														  ,(case when historicopagos='on' then 'on' else 'off' 
														  		  end )as historicoPagos

														  ,(case when imprimirpagos='on' then 'on' else 'off' 
														  		  end )as imprimirPagos



														  ,(case when eliminarpagos='on' then 'on' else 'off' 
														  		  end )as eliminarPagos


														  ,(case when costoproductos='on' then 'on' else 'off' 
														  		  end )as costoProductos







													FROM $tabla 

													WHERE $item = :$item");
//print_r($stmt);
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT perfil
														  ,descripcion
														  
														  ,(case when menuconfiguraciones='on' then 'on'
														  		else 'off' 
														  		end) as menuConfiguraciones
														  
														  ,(case when datosempresa='on' then 'on'
														  		else 'off' 
														  		end ) as datosempresa
														  
														  ,(case when usuarios='on' then 'on'
														  	else 'off'
														  	end) as usuarios
														  
														  ,(case when perfiles='on' then 'on'
														  		 else 'off'
														  		 end) as perfiles
														  
														  ,(case when configuracioncorreo='on' then 'on' else 'off' 
														  		end )as configuracionCorreo



												  		  ,(case when clientes='on' then 'on' else 'off' 
														  		end )as clientes

														  ,(case when productos='on' then 'on' else 'off' 
														  		 end )as productos

														  ,(case when categorias='on' then 'on' else 'off' 
														  		  end )as categorias


											  		  	,(case when menucotizaciones='on' then 'on' else 'off' 
														  		end )as menuCotizaciones

 												  		  ,(case when cotizaciones='on' then 'on' else 'off' 
														  		end )as cotizaciones

														  ,(case when administrarcotizaciones='on' then 'on' else 'off' 
														  		 end )as administrarCotizaciones

														  ,(case when modificarcotizaciones='on' then 'on' else 'off' 
														  		  end )as modificarCotizaciones

														  ,(case when eliminarcotizaciones='on' then 'on' else 'off' 
														  		  end )as eliminarCotizaciones

														


														,(case when menuventas='on' then 'on' else 'off' 
														  		 end )as menuVentas

														,(case when ventas='on' then 'on' else 'off' 
														  		  end )as ventas


											  		  	,(case when administrarventas='on' then 'on' else 'off' 
														  		end )as administrarVentas

												  		  ,(case when modificarventas='on' then 'on' else 'off' 
														  		end )as modificarVentas

														  ,(case when eliminarventas='on' then 'on' else 'off' 
														  		 end )as eliminarVentas

														  ,(case when facturacionelectronica='on' then 'on' else 'off' 
														  		  end )as facturacionElectronica

														  ,(case when reportesventas='on' then 'on' else 'off' 
														  		  end )as reportesVentas



												  		  ,(case when cajasduperiores='on' then 'on' else 'off' 
														  		end )as cajasSuperiores

														  ,(case when graficoganancias='on' then 'on' else 'off' 
														  		 end )as graficoganancias

														  ,(case when productosmasvendidos='on' then 'on' else 'off' 
														  		  end )as productosMasVendidos

														  ,(case when productosagregadosrecientemente='on' then 'on' else 'off' 
														  		  end )as productosAgregadosRecientemente

														  ,(case when bitacora='on' then 'on' else 'off' 
														  		  end )as bitacora


														  ,(case when bitacora='on' then 'on' else 'off' 
														  		  end )as bitacora


														  ,(case when pagos='on' then 'on' else 'off' 
														  		 end )as pagos

														  ,(case when historicopagos='on' then 'on' else 'off' 
														  		  end )as historicoPagos

														  ,(case when imprimirpagos='on' then 'on' else 'off' 
														  		  end )as imprimirPagos



														  ,(case when eliminarpagos='on' then 'on' else 'off' 
														  		  end )as eliminarPagos


														  ,(case when costoproductos='on' then 'on' else 'off' 
														  		  end )as costoProductos


														  		
												   FROM 
												   $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PERFIL
	=============================================*/

	static public function mdlIngresarPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion
																
																,menuconfiguraciones
																,datosempresa
																,usuarios
																,perfiles
																,configuracioncorreo

																,clientes
																,productos
																,categorias

																,menucotizaciones
																,cotizaciones
																,administrarcotizaciones
																,modificarcotizaciones
																,eliminarcotizaciones


																,menuventas
																,ventas
																,administrarventas
																,modificarventas
																,eliminarventas
																,facturacionelectronica
																,reportesventas

																,cajassuperiores
																,graficoganancias
																,productosmasvendidos
																,productosagregadosrecientemente			
																,bitacora	

																,pagos
																,historicopagos
																,imprimirpagos			
																,eliminarpagos	
																,costoproductos	



																) 
														VALUES (:descripcion
																
																,:menuConfiguraciones
																,:datosEmpresa
																,:usuarios
																,:perfiles
																,:configuracionCorreo

																,:clientes
																,:productos
																,:categorias

																,:menuCotizaciones
																,:cotizaciones
																,:administrarCotizaciones
																,:modificarCotizaciones
																,:eliminarCotizaciones

																,:menuVentas
																,:ventas
																,:administrarVentas
																,:modificarVentas
																,:eliminarVentas
																,:facturacionElectronica
																,:reportesVentas

																,:cajasSuperiores
																,:graficoGanancias
																,:productosMasVendidos
																,:productosAgregadosRecientemente	
																,:bitacora

																,:pagos
																,:historicoPagos
																,:imprimirPagos	
																,:eliminarPagos	
																,:costoProductos	

															)");
//IMPORTANTES EN EL INSER DE LOS PERFILES LAS VARIABLES
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		
		$stmt->bindParam(":menuConfiguraciones", $datos["menuconfiguraciones"], PDO::PARAM_STR);
		$stmt->bindParam(":datosEmpresa", $datos["datosempresa"], PDO::PARAM_STR);
		$stmt->bindParam(":usuarios", $datos["usuarios"], PDO::PARAM_STR);
		$stmt->bindParam(":perfiles", $datos["perfiles"], PDO::PARAM_STR);
		$stmt->bindParam(":configuracionCorreo", $datos["configuracioncorreo"], PDO::PARAM_STR);

		$stmt->bindParam(":clientes", $datos["clientes"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":categorias", $datos["categorias"], PDO::PARAM_STR);

		$stmt->bindParam(":menuCotizaciones", $datos["menucotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":cotizaciones", $datos["cotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":administrarCotizaciones", $datos["administrarcotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":modificarCotizaciones", $datos["modificarcotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarCotizaciones", $datos["eliminarcotizaciones"], PDO::PARAM_STR);

		$stmt->bindParam(":menuVentas", $datos["menuventas"], PDO::PARAM_STR);
		$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
		$stmt->bindParam(":administrarVentas", $datos["administrarventas"], PDO::PARAM_STR);
		$stmt->bindParam(":modificarVentas", $datos["modificarventas"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarVentas", $datos["eliminarventas"], PDO::PARAM_STR);
		$stmt->bindParam(":facturacionElectronica", $datos["facturacionelectronica"], PDO::PARAM_STR);
		$stmt->bindParam(":reportesVentas", $datos["reportesVentas"], PDO::PARAM_STR);

		$stmt->bindParam(":cajasSuperiores", $datos["cajassuperiores"], PDO::PARAM_STR);
		$stmt->bindParam(":graficoGanancias", $datos["graficoganancias"], PDO::PARAM_STR);
		$stmt->bindParam(":productosMasVendidos", $datos["productosmasvendidos"], PDO::PARAM_STR);
		$stmt->bindParam(":productosAgregadosRecientemente", $datos["productosagregadosrecientemente"], PDO::PARAM_STR);
		$stmt->bindParam(":bitacora", $datos["bitacora"], PDO::PARAM_STR);


		$stmt->bindParam(":pagos", $datos["pagos"], PDO::PARAM_STR);
		$stmt->bindParam(":historicoPagos", $datos["historicopagos"], PDO::PARAM_STR);
		$stmt->bindParam(":imprimirPagos", $datos["imprimirpagos"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarPagos", $datos["eliminarpagos"], PDO::PARAM_STR);
		$stmt->bindParam(":costoProductos", $datos["costoproductos"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function mdlEditarPerfil($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 
												SET descripcion = :descripcion
													
													,menuConfiguraciones = :menuConfiguraciones
													,datosEmpresa = :datosEmpresa
													,usuarios = :usuarios
													,perfiles = :perfiles
													,configuracionCorreo = :configuracionCorreo

													,clientes= :clientes
													,productos= :productos
													,categorias= :categorias

													,menuCotizaciones= :menuCotizaciones
													,cotizaciones= :cotizaciones
													,administrarCotizaciones= :administrarCotizaciones
													,modificarCotizaciones= :modificarCotizaciones
													,eliminarCotizaciones= :eliminarCotizaciones

													,menuVentas= :menuVentas
													,ventas= :ventas
													,administrarVentas= :administrarVentas
													,modificarVentas= :modificarVentas
													,eliminarVentas= :eliminarVentas
													,facturacionElectronica= :facturacionElectronica
													,reportesVentas= :reportesVentas

													,cajasSuperiores= :cajasSuperiores
													,graficoGanancias= :graficoGanancias
													,productosMasVendidos= :productosMasVendidos
													,productosAgregadosRecientemente= :productosAgregadosRecientemente
													,bitacora= :bitacora


													,pagos= :pagos
													,historicoPagos= :historicoPagos
													,imprimirPagos= :imprimirPagos
													,eliminarPagos= :eliminarPagos

													,costoProductos= :costoProductos

												WHERE perfil = :perfil"
												);

		
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":menuConfiguraciones", $datos["menuConfiguraciones"], PDO::PARAM_STR);
		$stmt->bindParam(":datosEmpresa", $datos["datosEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":usuarios", $datos["usuarios"], PDO::PARAM_STR);
		$stmt->bindParam(":perfiles", $datos["perfiles"], PDO::PARAM_STR);
		$stmt->bindParam(":configuracionCorreo", $datos["configuracionCorreo"], PDO::PARAM_STR);

		$stmt->bindParam(":clientes", $datos["clientes"], PDO::PARAM_STR);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":categorias", $datos["categorias"], PDO::PARAM_STR);

		
		$stmt->bindParam(":menuCotizaciones", $datos["menuCotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":cotizaciones", $datos["cotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":administrarCotizaciones", $datos["administrarCotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":modificarCotizaciones", $datos["modificarCotizaciones"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarCotizaciones", $datos["eliminarCotizaciones"], PDO::PARAM_STR);

		$stmt->bindParam(":menuVentas", $datos["menuVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
		$stmt->bindParam(":administrarVentas", $datos["administrarVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":modificarVentas", $datos["modificarVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarVentas", $datos["eliminarVentas"], PDO::PARAM_STR);
		$stmt->bindParam(":facturacionElectronica", $datos["facturacionElectronica"], PDO::PARAM_STR);
		$stmt->bindParam(":reportesVentas", $datos["reportesVentas"], PDO::PARAM_STR);

		$stmt->bindParam(":cajasSuperiores", $datos["cajasSuperiores"], PDO::PARAM_STR);
		$stmt->bindParam(":graficoGanancias", $datos["graficoGanancias"], PDO::PARAM_STR);
		$stmt->bindParam(":productosMasVendidos", $datos["productosMasVendidos"], PDO::PARAM_STR);
		$stmt->bindParam(":productosAgregadosRecientemente", $datos["productosAgregadosRecientemente"], PDO::PARAM_STR);
		$stmt->bindParam(":bitacora", $datos["bitacora"], PDO::PARAM_STR);

		$stmt->bindParam(":pagos", $datos["pagos"], PDO::PARAM_STR);
		$stmt->bindParam(":historicoPagos", $datos["historicoPagos"], PDO::PARAM_STR);
		$stmt->bindParam(":imprimirPagos", $datos["imprimirPagos"], PDO::PARAM_STR);
		$stmt->bindParam(":eliminarPagos", $datos["eliminarPagos"], PDO::PARAM_STR);
		$stmt->bindParam(":costoProductos", $datos["costoProductos"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	BORRAR PERFIL
	=============================================*/

	static public function mdlBorrarPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE perfil = :id");

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