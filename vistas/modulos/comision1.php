<?php
require_once ("class/class.php");
$tr= new Trabajo();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si") // con esto estoy enviando  al la clase informacion
{  
		$tr->add8();
		exit;
}
?>
<html lang="es">
	<head>
		<title>Solicitar Diferentes Claves que Asigna el Servicio Nacional de Contrataciones</title> 
		<meta http-equiv="content-type" content="text/html"; charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/select2.css">
	<script src="../jquery-3.1.1.min.js"></script>
	<script src="../js/select2.js"></script>
	</head>




<body>
	<header>
			<div class="alert alert-info">
			<h2>Solicitar Diferentes Claves que Asigna el Servicio Nacional de Contrataciones</h2>
			</div>
		</header>
<div class="col-md-6">
	<form name="form" action="" method="post">
<input type="text" name="numero_gac" placeholder="Ingrese Numero de Gaceta" size="25" required/>
<input type="date" name="fecha_desinacion" placeholder="Fecha de Desinación" size="10" required/>
<input type="text" name="perfil" value="clave2" readonly/>

	<table class="table">
		<tr class="info">
		<th  COLSPAN=7>Datos de los Miembros de la Comisión de Contrataciones</th>
			</tr>
			<th  COLSPAN=7>Nombres y Apellidos de las Personas que Conforman la Comisión de Contrataciones</th>
			</tr>
			<td>Área</td>
			<td>Nombre y Apelido</td>
			<td>Cedula de Identidad</td>
			<td>Cargo</td>
			<td>Correo electronico(solo institucional)</td>
			<td>Teléfono de Contacto</td>
			</tr>
			<td>Legal</td>
			<td><input type="text" name="nombrelegal1" placeholder="Nombre y Apellido" size="20" required/> </td>
			<td><input type="text" name="cedulalegal1" placeholder="cedula" size="20" required/> </td>
			<td> <select name="cargolegal1" id="cargolegal1">
			<option value="Principal">PRINCIPAL</option>
			<option value="Suplente">SUPLENTE</option>
			</select></td>
			<td >CORREO INSTITUCIONAL:<input type="email" name="correo_electronicolegal" placeholder="midireccion@armadamil.com" size="20" required/></td>
			<td >Telefono de Contacto:<input type="number" name="telefonolegal1" placeholder="04242322435" size="50" required/>			</td>
			</tr>
			
				<td>Económica Financiera</td>
			<td><input type="text" name="nombre_apellidoeco" placeholder="Nombre y Apellido" size="20" required/> </td>
			<td><input type="text" name="cedulaeco" placeholder="cedula" size="20" required/></td>
			<td> <select name="cargoeco" id="cargoeco">
			<option value="Principal">PRINCIPAL</option>
			<option value="Suplente">SUPLENTE</option>
			</select></td>
			<td >CORREO INSTITUCIONAL:<input type="correo_electronicoeco" name="correo_electronicoeco" placeholder="midireccion@armadamil.com" size="20" required/></td>
			<td >Telefono de Contacto:<input type="number" name="telefonoeco" placeholder="04242322435" size="50" required/>			</td>
			</tr>
				<td>Técnica </td>
			<td><input type="text" name="nombre_apellidotec" placeholder="Nombre y Apellido" size="20" required/> </td>
			<td><input type="text" name="cedulatec" placeholder="cedula" size="20" required/> </td>
			<td> <select name="cargotec" id="cargotec">
			<option value="Principal">PRINCIPAL</option>
			<option value="Suplente">SUPLENTE</option>
			</select></td>
			<td >CORREO INSTITUCIONAL:<input type="email" name="correo_electronicotec" placeholder="midireccion@armadamil.com" size="20" required/></td>
			<td >Telefono de Contacto:<input type="number" name="telefonotec" placeholder="04242322435" size="50" required/>			</td>
</tr>
<td>Secretario(a) </td>
			<td><input type="text" name="nombre_apellidosecr" placeholder="Nombre y Apellido" size="20" required/> </td>
			<td><input type="text" name="cedulasecre" placeholder="cedula" size="20" required/> </td>
			<td> <select name="cargosecre" id="cargosecre">
			<option value="Principal">PRINCIPAL</option>
			<option value="Suplente">SUPLENTE</option>
			</select></td>
			<td >CORREO INSTITUCIONAL:<input type="email" name="correo_electronicosecre" placeholder="midireccion@armadamil.com" size="20" required/></td>
			<td >Telefono de Contacto:<input type="number" name="telefonosecre" placeholder="04242322435" size="50" required/>			</td>


			
			</tr>
</table>


<input type="hidden" name="grabar" value="si"/>
<input type="submit" name="Crear"  title="Crear"/>			
</form>

Observaciones <br>
1. Todos los campos deben ser llenados, es requisito indispensable para poder procesar la solicitud. <br>
2. En el caso del contratante tendrá que anexar copia del nombramiento.<br>
3. Copia del RIF actualizado del Órgano y/o ente contratante.<br>

			</div>
			

</body>
</html>
