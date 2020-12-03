<?php

if($_SESSION["administrarCotizaciones"] == "off"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

$xml = ControladorVentas::ctrDescargarXML();

if($xml){

  rename("xml/".$_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

  echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Programación Anual
  
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Programación Anual</li>
 
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarprogramacion">
          
          Agregar Una Programación

        </button>

        
      </div>

      <div class="box-body">
        
  		<table class="table table-bordered table-striped dt-responsive tablas" width="100%">
			<thead>
				<tr>
					<th style="width: 10px;">#</th>
					<th>Nombre del Organismo o Ente</th>
					<th>Rif del Organismo o Ente</th>
					<th>Codigo ONAPRE del Organismo o Ente</th>
					<th>Status</th>
					<th>Año estimado</th>
					<th>Selecione una Acción</th>
				</tr>
			</thead>
		
			<tbody>


        <?php

        $item = null;
        $valor = null;

        $partidapresupuestaria = Controladorprogramacionanual::ctrMostrarprogramacionanuals($item, $valor,$ite);

        foreach ($partidapresupuestaria as $key => $value) {
          

          echo '<tr>

                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["tipo_rif"].''.$value["rif"].'</td>
                  <td>'.$value["id_codio_onapre"].'</td>
                  <td>'.$value["status"].'</td>
                  <td>'.$value["ano"].'</td>
                  <td>

                      <div class="btn-group">
					  <button class="btn btn-xs btnImprimirCotizacion" 
                          required data-toggle="tooltip" data-placement="top" title="Imprimir Cotizaciones"
                        codigoVenta="'.$value["id_programacion_anual"].'">

                        <i class="fa fa-print"></i>

                      </button>
					 ';
					if($value["status"] == "no enviado")
					{
					echo '   <button class="btn  btn-xs btnEditarproyecto" idproyecto="'.$value["id_programacion_anual"].'" data-toggle="modal" data-target="#modalEditarproyecto" title="Enviar"><i class="fa fa-envelope"></i></button>';
                     
                   // if($_SESSION["modificarCotizaciones"] == "on"){

                         echo '<button class="btn  btn-xs btnEditarCotizacion" 
                                required data-toggle="tooltip" data-placement="top" title="Nuevo Proyecto"
                                idVenta="'.$value["id_programacion_anual"].'"> <i class="fa fa-pencil"></i></button>';
                    //}
                   
                    
                    //if($_SESSION["eliminarCotizaciones"] == "on"){
                      echo '<button class="btn  btn-xs btnEditarVenta" 
                      required data-toggle="tooltip" data-placement="top" title="Nuevo Acción Centralizada"
                      idVenta="'.$value["id_programacion_anual"].'"><i class="fa fa-pencil"></i></button> ';
                    //}
                      
                     } 
                                            
                      echo '


                      
                      
                      ';

                    }

                    echo '</div>  

                  </td>

                </tr>';
            

        ?>

               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>



  </section>

</div>


<!--=====================================
MODAL AGREGAR proyecto
======================================-->
<div id="modalAgregarprogramacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">
	<?php

$ente=$_SESSION["id_entes"];
$c= $_GET["idVenta"];



$codigo=0;
$re="select codigo from programacion_compras  WHERE id_entes = '".$ente."' and id_programacion_anual= '".$c."'  ORDER BY id_programacion_anual";	
	                     	$res = pg_query($re );
		                    while (	$f=pg_fetch_array($res)) {
					        $codigo=$f['codigo'];	
		                                                          }
	                     	if($codigo==0){
			                $codigo=1;
		                                         }else{
			                 $codigo=$codigo+1;
		                    }		

function generaCeros($codigo){
 //obtengop el largo del numero
 $largo_numero = strlen($codigo);
 //especifico el largo maximo de la cadena
 $largo_maximo = 4;
 //tomo la cantidad de ceros a agregar
 $agregar = $largo_maximo - $largo_numero;
 //agrego los ceros
 for($i =0; $i<$agregar; $i++){
 $codigo = "0".$codigo;
 }
 //retorno el valor con ceros
 return $codigo;
 }
 $p= generaCeros("$codigo");
 $fecha_actual = date("yy/m/d");
 $programacion= $_GET["idVenta"]; 
 ?>
 
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar </h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">Nombre del Organismo o Ente</span> 

                <input type="text" class="form-control" id="nombreente" value="<?php echo $_SESSION["nombreente"];?>" readonly>
                    <input type="hidden" name="id_entes" value="<?php echo $_SESSION["id_entes"];?>">

              </div>
              <div class="input-group">
              
                <span class="input-group-addon">Rif del Organismo o Ente</span> 

                <input type="text" class="form-control" id="nombrnte" value="<?php echo $_SESSION["tipo_rif"]; echo $_SESSION["rif"];?>" readonly>
                    <input type="hidden" name="idrif" value="<?php echo $_SESSION["id"];?>">

              </div>
              <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i> Codigo Onapre</span>
                    <input type="text" class="form-control" id="nombeente" value="<?php echo $_SESSION["id_codio_onapre"];?>" readonly>
                    <input type="hidden" name="nombrente" value="<?php echo $_SESSION["id_codio_onapre"];?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i> Año estimado</span>
                    <input type="text" class="form-control input-lg" name="ano" placeholder="Ingrese el año estimado" required>
                    
                  </div>
                </div>
			   <div class="input-group">
          			<input type="hidden"  name="codigo" id="codigo" value="<?php echo $p;?>" readonly>
				  	<input type="hidden" name="status" value="no enviado">
				 	     <input type="hidden" name="fecha" value="<?php echo $fecha_actual;?>">
            			<input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"];?>">
              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Proyecto</button>

        </div>

        <?php

          $crearproyecto = new ControladorProgramacionanual();
          $crearproyecto -> ctrCrearprogramacionanual();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->
<div id="modalEditarproyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Enviar Programacion Anual</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
				Enviar la Programación Anual de :
				<input type="text" class="form-control input-lg" name="Editarproyecto" id="Editarproyecto" readonly >
                <input type="hidden" class="form-control input-lg" name="status" id="status" value="Enviado" required>
                 <input type="hidden"  name="idproyecto" id="idproyecto" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php
         
          $Editarproyecto = new ControladorProgramacionanual();
          $Editarproyecto -> ctrEditarproyecto();

        ?> 

      </form>

    </div>

  </div>

</div>


<script type="text/javascript">
  

/*=============================================
BOTON TRAER INFORMACION DEL CORREO
=============================================*/
$(".tablas").on("click", ".btnEnviarCorreo", function(){

  var idVenta = $(this).attr("codigoVenta");
  var nombreCliente = $(this).attr("nombreCliente");
  var correoCliente = $(this).attr("correoCliente");

  //var correoCliente = $(this).attr("mensajeCorreo");
console.log("correo");

$("#idContactoCorreo").val(nombreCliente);
$("#correoElectronico").val(correoCliente);
$("#codigoCotizacion").val(idVenta);




})


/*=============================================
GENERAR ARCHIVO Y ENVIAR CORREO
=============================================*/
$(".modal-footer").on("click", ".btnEnviarCorreo2", function(){

  var codigo= $("#codigoCotizacion").val();
  var correoCliente= $("#correoElectronico").val();
  var firmaCorreo= $("#mensajeCorreo").val();

  var datos = new FormData();
  datos.append("codigo", codigo);

  var datosCorreo = new FormData();
  datosCorreo.append("codigo", codigo);
  datosCorreo.append("correoCliente", correoCliente);
  datosCorreo.append("firmaCorreo", firmaCorreo);



  window.open("extensiones/tcpdf/pdf/cotizacion.php?codigo="+codigo, "_blank");

$.ajax({

      url:"extensiones/tcpdf/pdf/cotizacion.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",

      }
      )

            $.ajax({

                  url:"ajax/enviarCorreoCotizacion.php",
                    method: "POST",
                    data: datosCorreo,
                    cache: false,
                    contentType: false,
                    processData: false,
                    //dataType:"json",
                    success:function(respuesta){
                      console.log("respuesta",respuesta);


                      if (respuesta.match(/Message has been sent*/)){


                              swal({
                                  type: "success",
                                  title: "La cotizacion ha sido enviada correctamente",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                      if (result.value) {

                                    

                                      }
                                    })

                        }
                      else{

                              swal({
                                  type: "error",
                                  title: ""+respuesta+"",
                                  showConfirmButton: true,
                                  confirmButtonText: "Cerrar"
                                  }).then(function(result){
                                      if (result.value) {

                                    

                                      }
                                    })

                      }
                    $('.cerrarModal').click ();
                    

                  }
              })

})

/*=============================================
BOTON CREA VENTA DESDE COTIZACION
=============================================*/
$(".tablas").on("click", ".btnCrearVentaCotizacion", function(){

  var idCotizacion = $(this).attr("idVenta");



  window.location = "index.php?ruta=crear-programacio="+idCotizacion;


})


/*=============================================
BOTON PARA COPIAR LA COTIZACION
=============================================*/
$(".tablas").on("click", ".btnCopiarCotizacion", function(){

  var idCotizacion = $(this).attr("idCotizacion");



  window.location = "index.php?ruta=crearcotizacion&idCotizacion="+idCotizacion;


})

/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn span").html();
   
    localStorage.setItem("capturarRango", capturarRango);

    window.location = "index.php?ruta=administrarcotizaciones&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

  localStorage.removeItem("capturarRango");
  localStorage.clear();
  window.location = "administrarcotizaciones";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){

  var textoHoy = $(this).attr("data-range-key");

  if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

    // if(mes < 10){

    //  var fechaInicial = año+"-0"+mes+"-"+dia;
    //  var fechaFinal = año+"-0"+mes+"-"+dia;

    // }else if(dia < 10){

    //  var fechaInicial = año+"-"+mes+"-0"+dia;
    //  var fechaFinal = año+"-"+mes+"-0"+dia;

    // }else if(mes < 10 && dia < 10){

    //  var fechaInicial = año+"-0"+mes+"-0"+dia;
    //  var fechaFinal = año+"-0"+mes+"-0"+dia;

    // }else{

    //  var fechaInicial = año+"-"+mes+"-"+dia;
   //     var fechaFinal = año+"-"+mes+"-"+dia;

    // }

    dia = ("0"+dia).slice(-2);
    mes = ("0"+mes).slice(-2);

    var fechaInicial = año+"-"+mes+"-"+dia;
    var fechaFinal = año+"-"+mes+"-"+dia; 

      localStorage.setItem("capturarRango", "Hoy");

      window.location = "index.php?ruta=administrarcotizaciones&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

})

</script>

