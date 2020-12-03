<?php
require_once ("../class/class1.php");
$tra= new Trabajo();
$result12=$tra->ente2();

if(isset($_GET['opcion'])){  //nos recoge los datos del select y los mete en los imput
	
	}
$datos=$tra->ente();   //consulta  postgre para llenar el select entes descomentar
for ($i=0;$i<sizeof($datos);$i++)
{// echo $datos[$i] ["desc_ente"];
}

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{  
		$tra->add();
		exit;
}
?>
<div class="content-wrapper">

<section class="content-header">

  <h1>

    Crear Programación Anual

  </h1>

  <ol class="breadcrumb">

    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

    <li class="active">Crear Programación Anual</li>

  </ol>

</section>
<html lang="es">
	<head>
		<title>Solicitar Diferentes Claves que Asigna el Servicio Nacional de Contrataciones</title> 
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="../css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/select2.css">
	<script src="jquery-3.1.1.min.js"></script>
	<script src="../js/select2.js"></script>
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Solicitar Diferentes Claves que Asigna el Servicio Nacional de Contrataciones</h2>
			</div>
		</header>


<div class="col-md-6">

				<h5 class="text-center">DATOS GENERALES PARA SOLICITAR LAS DIFERENTES CLAVES QUE ASIGNA EL SERVICIO NACIONAL DE CONTRATCIONES A LOS ORAGANOS  Y/O ENTES CONTRATANTES</h5>
		<form name="form" action="" method="post">
<table class="table">
		<tr class="info">
			<th COLSPAN=3>Por favor ingrese todos los datos solicitados</th>
			</tr>
			<th COLSPAN=3>Datos Organos</th>
			</tr>			
			<th COLSPAN=3>Seleccione el Nombre del Ente: 
			<select id="mibuscador" name="autoLlenar" onChange="return buscar();" method="post" style="width: 50%">     
                    
                    <option value=""></option>
					
					<?php
					for ($i=0;$i<sizeof($datos);$i++)
						{
					?>
                    <option value="<?php echo $datos[$i] ["id_entes"];?>"><?php echo $datos[$i]                                    ["nombre"];?></option>
                    <?php
                        }
                    ?>
							
						</select>		</th>
			</tr>
			<th  COLSPAN=3>
					Nombre del Ente y/o Organismo: 
						<?php
                 
                if(isset($result12)){?>
                         <input style="width:0px" type="text" name="id" value="<?php echo $result12[0]['id_entes']?>" readonly/>
					<input style="width:233px" type="text" name="names" value="<?php echo $result12[0]['nombre']?>" readonly/>
					
                <?php
                    
                }else{?>
                    <input type="text" name="names" value="" readonly/>
                <?php
                    
                }
                
                ?> </th>
			</tr>
			<TD>RIF:<?php
                
                if(isset($result12)){?>
                    <input type="text" name="rif" value="<?php echo $result12[0]['rif']?>"readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="rif" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
		  	<TD>SIGLAS:<?php
                 
                if(isset($result12)){?>
                    <input type="text" name="siglas" value="<?php echo $result12[0]['siglas']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="siglas" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
			<TD>Codigo ONAPRE: <br> <?php
                 
                if(isset($result12)){?>
                    <input  type="text" name="siglas" value="<?php echo $result12[0]['id_codio_onapre']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="siglas" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
		    </tr>
			<TD>Ente Adscrito: <?php
                 
                if(isset($result12)){?>
                    <input type="text" name="enteads" value="<?php echo $result12[0]['id_ente_adscrito']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="enteads" value="" readonly/>
                <?php
                    
                }
                
                ?></TD> 
			<TD>Clasificación:<?php
                 
                if(isset($result12)){?>
                    <input type="text" name="clasificacion" value="<?php echo $result12[0]['id_clasificacion']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="direccionf" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
			<TD>Correo: <br> 					<?php
                 
                if(isset($result12)){?>
                    <input type="text" name="direccionf" value="<?php echo $result12[0]['correo']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="direccionf" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
		    </tr>
			<TD>DIRECCIÓN FISCAL:<?php
                 
                if(isset($result12)){?>
                    <input type="text" name="direccionf" value="<?php echo $result12[0]['direccion_fiscal']?>" readonly/>
                <?php
                    
                }else{?>
                    <input type="text" name="direccionf" value="" readonly/>
                <?php
                    
                }
                
                ?></TD>
			</tr>
			
<th  COLSPAN=2>Nombre y Apellido de la Maxima Autoridad: 
			  <input type="text" style="width:333px"  name="maxauto" placeholder="Nombre y Apellido" onKeyUp="mayus(this);" required/> </th>
			<th> Cargo de la Maxima Autoridad: <br> <input type="text" style="width:233px" name="maxcargo" placeholder="Cargo Maxima Autoridad" onKeyUp="mayus(this);" required/> </th>
			</tr>
	        <th> Nombre y Apellido de Funcionario Representante ante el SNC (CUENTADANTE): <input type="text"  style="text-transform:uppercase" name="nombre" placeholder="Nombre y Apellido" onKeyUp="mayus(this);" required/></th>
			<th>Cédula de identidad(CUENTADANTE): <br>  <input type="number" name="cedula" placeholder="Cedula de Identidad" required/></th>
            <th>CARGO <br> (CUENTADANTE): <br> <input type="text" name="cargo" placeholder="Cargo "  style="text-transform:uppercase" onKeyUp="mayus(this);" required/></th>
			</tr>
			<td>OFICINA <br> (CUENTADANTE): <input type="text" style="width:383px" name="oficina" placeholder="Oficina" onKeyUp="mayus(this);" required/></td>
	        <td>TELÉFONO (CUENTADANTE): <input type="number" name="telefono"  placeholder=" 04148599876" required/></td>
<td >CORREO INSTITUCIONAL (CUENTADANTE):<input type="email" name="correo" placeholder="midireccion@armadamil.com" size="25" onKeyUp="mayus(this);" required/>			</td>
			</tr>
			
	        <td>Fecha de la Desinación:<input type="date" name="fechadesin" required/></td>
			<TD>Número de la Gaceta o la Resolución:<input type="number" name="numergacet" required/></TD>
			<td>Observación:<input type="text" name="observ1" onKeyUp="mayus(this);" required/></td>
			</tr>
			<td>Ingrese una Clave: <input type="password" name="clave" required/></td>
			</tr>
			<th>Importante: Los datos suministrados seran validados por nuestros Analistas.</th>
			</tr>
			</table>
			
  
<input type="hidden" name="grabar" value="si"/>
<input type="submit" name="Crear"  title="Crear"/>			
</form>
			</div>

            </section>
</div>	

</html>
<script type="text/javascript">
	$(document).ready(function(){
			$('#mibuscador').select2();
	});
	

</script>
<script type="text/javascript">
	function buscar(){
            var opcion = document.getElementById('mibuscador').value;
            window.location.href = 'clave.php?opcion='+opcion;
        }
		
</script>
<script>
function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>