<?php
if ($_SESSION["cotizaciones"] == "off") {

	echo '<script>
  
	  window.location = "inicio";
  
	</script>';
  
	return;
  }

$user = 'postgres';
$passwd = '123';
$db = 'contrata';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
//?&gt;


$connexion = pg_connect("host=localhost dbname=contrata user=postgres password=123")
or die ('no hay conxeion:' .pg_last_error());

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
//var_dump($valor4);
//exit ($valor4);
?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear Programación Anual

	</h1>
	<?php
$datosTabla = stripcslashes($_POST['arrayDatos']);
//var_dump($datosTabla);
//exit ($datosTabla);

$datosTabla = json_decode($datosTabla,TRUE);
//echo $datosTabla[0]['descripcion'];

//var_dump($datosTabla[0]['descripcion']);
//exit ($datosTabla[0]['descripcion']);
 $t=0;
       				
		for($i=0; $i<$datosTabla;$i++){
		$sql=   "INSERT into programacion_anuales  (  codigo_anual, id_entes, id_accion_centralizada, 
		id_partida_presupuestaria, id_fuente_financiamiento, id_actvcomercial, 
		id_ccnu, codigo_onapre, name_proyecto, monto_partida, cantidad, 
		und, costo_unitario, precio_total, alicuota_iva, monto_iva, monto_total, 
		mes_contratacion, ano, trimestre, id_municipio, id_estado, id_usuario, 
		fecha, ii, iii, iv, especificacion) 
		 VALUES ('".$valor15."',
		         '".$valor13."',
				 '".$valor2."',
				 '".$valor1."',
				 '".$valor3."',
				 '".$valor4."',
				 '".$datosTabla[$i]["descripcion"]."',
				 '".$valor15."',
				 '".$valor8."',
				 '".$valor9."',
				 '".$datosTabla[$i]["total"]."',
				 '".$datosTabla[$i]["und"]."',
				 '".$datosTabla[$i]["cunitario"]."',
				 '".$datosTabla[$i]["punitario"]."',
				 '".$datosTabla[$i]["alicuotaivaestimada"]."',
				 '".$datosTabla[$i]["montoivaestimado"]."',
				 '".$datosTabla[$i]["montototalestimado"]."',
				 '".$valor10."',
				 '".$valor11."',
				 '".$datosTabla[$i]["I"]."',
				 '".$valor6."',
				 '".$valor7."',
				 '".$valor14."',
				 '".$y."',
				 '".$datosTabla[$i]["II"]."',
				 '".$datosTabla[$i]["III"]."',
				 '".$datosTabla[$i]["IV"]."',
				 '".$datosTabla[$i]["especificacion"]."')";
					
//var_dump($sql);
//	exit($sql);
				$stmt = pg_query ($sql);  
				if( pg_execute ($connexion,$stmt)) { 
					echo '<div class="alert alert-success"><strong>Se guardo el Registo!</strong> Puede Continuar.</div>';
					$t++;
					
                } else {
					echo '<div class="alert alert-success"><strong>Guardado con Exito</strong> la Programación</div>'; 
                    die( print_r( pg_last_error(), true));
			
				}
				
				setcookie($datosTabla, 0, 1 , ini_get("session.cookie_path"));    // Eliminar la cookie
                 //session_destroy();          
				 

header("Location:crearprogramacion.php");  
			}

			

			
?>
 </section>
</div>
</body>
</html>
