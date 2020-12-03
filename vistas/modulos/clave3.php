<?php
require_once ("class/class.php");
$tr= new Trabajo();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si") // con esto estoy enviando  al la clase informacion
{  
		$tr->add2();
		exit;
}

?>


<html lang="es">
	<head>
		<title>Solicitud de claves para la Carga de Programacion Anual de Compras Rendicion Trimestral por parte de los orgamos y/o Entes de la Administracion Publica</title> 
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/select2.css">
	<script src="jquery-3.1.1.min.js"></script>
	<script src="js/select2.js"></script>
	</head>




<body>
	<header>
			<div class="alert alert-info">
			<h2>Solicitar Diferentes Claves que Asigna el Servicio Nacional de Contrataciones</h2>
			</div>
		</header>
<div class="col-md-6">
	<form name="form" action="" method="post">
<input type="text" name="numergacet" placeholder="Ingrese Numero de Gaceta" size="10" required/>
<input type="date" name="fechadesin" placeholder="fecha de desinacion" size="10" required/>
<input type="text" name="perfil" value="clave3" readonly/>
	<table class="table">
		<tr class="info">
		<th  COLSPAN=7>Datos de los Funcionarios que se le asignaran claves</th>
			</tr>
			<th  COLSPAN=7>Nombres y Apellidos del funcionario a quien se le va asignar clave </th>
			</tr>
			<td>Nombre y Apelido</td>
			<td>Cedula de Identidad</td>
			<td>Cargo</td>
			<td>Correo electronico(solo institucional)</td>
			<td>Teléfono de Contacto</td>
			</tr>
			<?php for ( $i=1; $i<=3; $i++) 
{?>
			<td><input type="text" name="nombre[]" placeholder="Nombre y Apellido" size="40" required/></td>
			<td><input type="number" name="cedula[]" placeholder="Cedula" size="10" required/></td>
			<td><input type="text" name="cargo[]" placeholder="Cargo" size="10" required/></td>
			<td><input type="email" name="Correo[]" placeholder="siled@armadamil.com.ve" size="20" required/></td>
			<td><input type="number" name="telefono[]" placeholder="41484858" size="10" required/></td>
            </tr>
<?php }?>
	
</table>


<input type="hidden" name="grabar" value="si"/>
<input type="submit" name="Crear"  title="Crear"/>			
</form>

Observaciones <br>
1. Todos los campos deben ser llenados, es requisito indispensable para poder procesar la solicitud. <br>
2. LA INFORMACIÓN SUMINISTRADA SERA VALIDADA POR EL PERSONAL DEL RNC.<br>

			</div>
			

</body>
</html>