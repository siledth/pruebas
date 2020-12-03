<?php
error_reporting(E_ERROR | E_PARSE);
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/programacion.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/programacionanual.controlador.php";
require_once "controladores/fuentefinanciamiento.controlador.php";
require_once "controladores/partidapresupuestaria.controlador.php";
require_once "controladores/actividadcomercial.controlador.php";
require_once "controladores/estado.controlador.php";
require_once "controladores/municipio.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/utilerias.controlador.php";
require_once "controladores/empresa.controlador.php";
require_once "controladores/perfiles.controlador.php";
require_once "controladores/CorreoSaliente.controlador.php";
require_once "controladores/pagos.controlador.php";
require_once "controladores/bitacora.controlador.php";
require_once "controladores/proyecto.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/fuentefinanciamiento.modelo.php";
require_once "modelos/programacionanual.modelo.php";
require_once "modelos/partidapresupuestaria.modelo.php";
require_once "modelos/actividadcomercial.modelo.php";
require_once "modelos/estado.modelo.php";
require_once "modelos/municipio.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/empresa.modelo.php";
require_once "modelos/correo.modelo.php";
require_once "modelos/perfiles.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/pagos.modelo.php";
require_once "modelos/persona.modelo.php";
require_once "modelos/proyecto.modelo.php";
//require_once "modelos/anualprograma.php";
require_once "extensiones/vendor/autoload.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
