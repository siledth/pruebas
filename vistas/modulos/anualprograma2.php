<?php
if ($_SESSION["modificarCotizaciones"] == "off") {

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
	or die('no hay conxeion:' . pg_last_error());


$id_programacion_anual = $_POST["editarCatego"];
$id_proyecto = 0;
$id_accion_centralizada= $_POST["id_accion_centralizada"];
$id_accion_centra = $_POST["id_accion_centra"];
$id_entes = $_POST["id_entes"];
$id_partida_presupuestaria=$_POST['id_partida_presupuestaria'];
$id_actvcomercial = $_POST["id_actvcomercial"];
//echo $bt;

$id_ccnu = $_POST["id_ccnu"];
$especificacion = $_POST["especificacion"];
$cantidad = $_POST["cantidad"];
$i = $_POST["i"];
$ii = $_POST["ii"];
$iii = $_POST["iii"];
$iv = $_POST["iv"];
$und = $_POST["und"];
$costo_unitario = $_POST["costounitarioestimado"];
$precio_total = $_POST["preciounitarioestimado"];
$alicuota_iva = $_POST["alicuotaivaestimada"];
$monto_iva = $_POST["montoivaestimado"];
$monto_total = $_POST["montototalestimado"];
$ano = $_POST["fecha"];
$tipo = "c";
$id_usuario = $_POST["id_usuario"];
$fecha = $_POST["fecha"];
$codigo = $_POST["codigo"];



$y = date("Y-m-d", $date);
//var_dump($valor4);
//exit ($valor4);
?>
<div class="content-wrapper">

	<section class="content-header">

		<h1>

			Administrar Proyectos

		</h1>

		<ol class="breadcrumb">

			<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Administrar Proyectos</li>

		</ol>

	</section>

	<section class="content">

		<div class="box">

			<div class="box-header with-border">

				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

					Agregar Un Proyecto

				</button>

			</div>

			<div class="box-body">

				<?php

$id_fuente_financiamiento=$_POST['id_fuente_financiamiento'];
$bd=implode(',',$id_fuente_financiamiento); 
$porcentaje = $_POST["porcentaje"];
$btrt=implode(',',$porcentaje); 
$id_estado=$_POST['id_estado'];
$bt=implode(',',$id_estado); 
//echo $bt;

				$t = 0;
				for ($i = 0; $i < count($bd); $i++) {
					
					$sql =  "INSERT into programacion_compras_move1(id_programacion_anual, id_proyecto, 
					id_accion_centra, id_entes, id_partida_presupuestaria, id_fuente_financiamiento, 
					id_actvcomercial, id_municipio, id_estado, id_ccnu, especificacion, 
					cantidad, i, ii, iii, iv, und, costo_unitario, precio_total, 
					alicuota_iva, monto_iva, monto_total, ano, tipo, id_usuario, 
					fecha, codigo,id_accion_centralizada)
							            VALUES ('$id_programacion_anual','$id_proyecto',
										'$id_accion_centra',
										'$id_entes',
										'$id_partida_presupuestaria',
										'$bd',
										'$id_actvcomercial',
										'$btrt',
										'$bt',
										'$id_ccnu',
										'$especificacion',
										'$cantidad',
										'$i',
										'$ii',
										'$iii',
										'$iv',
										'$und',
										'$costo_unitario',
										'$precio_total',
										'$alicuota_iva',
										'$monto_iva',
										'$monto_total',
										'$ano',
										'$tipo',
										'$id_usuario',
										'$fecha',
										'$codigo',
										'$id_accion_centralizada');";





	//	echo $sql;
					if (pg_query($connexion,$sql)) { //jiji se me paso colocar $sql
						
						$t++;
					echo'<script>

				swal({
					  type: "success",
					  title: " ha sido Guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?ruta=editar-venta&idVenta='.$_POST["editarCatego"].'";

								}
							})

				</script>';
					} else {
						echo '<div class="alert alert-success">
											<strong>Guardado mall </strong> la Programacion</div>';
						die(print_r(pg_last_error(), true));
					}
					
				}



				?>

			</div>

		</div>

	</section>

</div>