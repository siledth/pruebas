<?php 
$user = 'postgres';
$passwd = '123';
$db = 'contrata';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
//?&gt;


$connexion = pg_connect("host=localhost dbname=contrata user=postgres password=123")
or die ('no hay conxeion:' .pg_last_error());


if($_POST['resAJAX']!=""){

//var_dump($_POST['resAJAX']]);
	//exit($_POST['resAJAX']);
//$consulta_mysql= utf8_encode ($consulta_mysql);
       $buscar =$_POST['resAJAX'];

       $consulta_mysql= "SELECT codigo, descripcion FROM productos WHERE id='$buscar'";
	   $re = pg_query($consulta_mysql);
	      
	   $filas = array(); 
	 
	 
	
		   
	    while($registro = pg_fetch_array($re)){
	 //if ($filas === null) { 
	//no inserta las q no existe pero aquellas ordenes con dos rubros no lo inserta
	//$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
	//} else {
		
		$filas[] =  $registro;
	  // utf8_encode ($filas);
	  // utf8_decode($filas);
	  // print_r($filas);
	                                        }
	 $json = json_encode($filas);

	   echo $json; 
	// }
	
	// }
	 }
 
	//else {
		//header("Location: ../pruebasiadra.php?error=datos no validos");
	
//	}


   


?>