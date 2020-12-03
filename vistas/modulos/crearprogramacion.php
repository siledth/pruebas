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
$numeroprogramacion=0;
$re="select id_programacion_anual from programacion_anuales  ORDER BY id_programacion_anual ";	
		$res = pg_query($re );
		while (	$f=pg_fetch_array($res)) {
					$numeroprogramacion=$f['id_programacion_anual'];	
		}
		if($numeroprogramacion==0){
			$numeroprogramacion=1;
		}else{
			$numeroprogramacion=$numeroprogramacion+1;
		}
			function generaCeros($numeroprogramacion){
 //obtengop el largo del numero
 $largo_numero = strlen($numeroprogramacion);
 //especifico el largo maximo de la cadena
 $largo_maximo = 4;
 //tomo la cantidad de ceros a agregar
 $agregar = $largo_maximo - $largo_numero;
 //agrego los ceros
 for($i =0; $i<$agregar; $i++){
 $numeroprogramacion = "0".$numeroprogramacion;
 }
 //retorno el valor con ceros
 return $numeroprogramacion;
 }
 $p= generaCeros("$numeroprogramacion");
//FECHA ACTUAL

$fecha_actual = date("yy/m/d");
//sumo 1 día
$dteFechaVencimiento = date("yy/m/d", strtotime($fecha_actual . "+ 30 days"));
//resto 1 día
$item = null;
$valor = null;

$Empresa = new ControladorEmpresa();
$datosEmpresa = $Empresa->ctrMostrarEmpresas($item, $valor);

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

  <section class="content">

    <div class="">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-7 col-xs-12">
        <div class="box box-success">
          <div class="box-header with-border"></div>
          <form name="programacion" id="programacion" method="POST" onSubmit="return validarForm(this);" class="">
            <div class="box-body">
              <div class="box">
                <?php
                //$item = "id";
                //$valor = $_GET["idCotizacion"];
                //$venta = ControladorVentas::ctrTraerCotizacion($valor);
                //$itemUsuario = "id"; //Usuario
               // $valorUsuario = $venta["id_vendedor"];
              // $valorente= $ente["id"]; 
                //$vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                //centralizada   
                //$itemCliente = "id_accion_centralizada";
                //$valorCliente = $venta["id_accion_centralizada"];
                //$cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                //FUENTE DE FINANCIAMIENTO 
                //$itemfuentefinanciamiento = "id_fuente_financiamiento";
                //$valorfuentefinanciamiento = $venta["id_fuente_financiamiento"];
               // $fuentefinanciamiento = Controladorfuentefinanciamiento::ctrMostrarfuentefinanciamiento($itemfuentefinanciamiento, $valorfuentefinanciamiento);
                //$porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];
                ?>

                <!--=====================================
                          ENTRADA DEL ORGANISMO O ENTE
                        ======================================-->
                        <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nombrnte" value="<?php echo $_SESSION["tipo_rif"]; echo $_SESSION["rif"];?>" readonly>
                    <input type="hidden" name="nombeente" value="<?php echo $_SESSION["id"];?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nombreente" value="<?php echo $_SESSION["nombreente"];?>" readonly>
                    <input type="hidden" name="nombreente" value="<?php echo $_SESSION["id_entes"];?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i> Codigo Onapre</span>
                    <input type="text" class="form-control" id="nombeente" value="<?php echo $_SESSION["id_codio_onapre"];?>" readonly>
                    <input type="hidden" name="nombrente" value="<?php echo $_SESSION["id_codio_onapre"];?>">
                  </div>
                </div>
                <!--=====================================
                                   ENTRADA DEL Usuario
                                  ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"];?>" readonly>
                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"];?>">
					
                  </div>
                </div>
                <!--=====================================
                numero programcion
                  ======================================-->
                

                <!--=====================================
               codigo del proyecto serial
                ======================================-->
                <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $p;?>" readonly>
                 </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                              <select class="form-control select2" id="mes" name="mes" required style="width: 400%;">
                                          <option value="">Seleccione un Mes</option>
                                        <option value="ENE">ENE</option>
                                        <option value="FEB">FEB</option>
                                        <option value="MAR">MAR</option>
                                        <option value="ABR">ABR</option>
                                        <option value="MAY">MAY</option>
                                        <option value="JUN">JUN</option>
                                        <option value="JUL">JUL</option>
                                        <option value="AGO">AGO</option>
                                        <option value="SEP">SEP</option>
                                        <option value="OCT">OCT</option>
                                        <option value="NOV">NOV</option>
                                        <option value="DIC">DIC</option>

                                </select>
                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="ano" id="ano" placeholder="Ingrese el año de Partida Presupuestaria" >
                 </div>
                </div>
                <!--=====================================
                Proyecto A
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control pull-right" name="nombrep" id="nombrep" placeholder="Nombre del Proyecto:" >
                  </div>
                </div>
                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="id_accion_centralizada" name="id_accion_centralizada" required style="width: 90%;">
                      <option value=""> Seleccione Acción Centralizada</option>
                      <?php
                      if ($cliente["id_accion_centralizada"] <> 0) {
                        echo '<option value="' . $cliente["id_accion_centralizada"].'"> ' . $cliente["desc_accion_centralizada"] . '</option>';
                      }
                      $item = null;
                      $valor1 = null;
                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="' . $value["id_accion_centralizada"] . '">' . $value["desc_accion_centralizada"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!--=====================================
                ENTRADA Partida Presupuestaria
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionarpartida" name="seleccionarpartida" required style="width: 74%;">
                      <option value=""> Seleccione Partida Presupuestaria</option>
                      <?php
                      if ($cliente["id_partida_presupuestaria"] <> 0) {
                        echo '<option value="' . $cliente["id_partida_presupuestaria"] . '"> ' . $cliente["desc_partida_presupuestaria"] . '</option>';
                      }
                      $item = null;
                      $valor2 = null;
                      $categorias = Controladorpartidapresupuestaria::ctrMostrarpartidapresupuestaria($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="' . $value["id_partida_presupuestaria"] . '">' . $value["codigopartida_presupuestaria"] . '-' . $value["desc_partida_presupuestaria"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!--=====================================
                ENTRADA FUENTE DE FINANCIAMIENTO
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionarfuentefinanciamiento" name="seleccionarfuentefinanciamiento" required style="width: 100%;">
                      <option value=""> Seleccione Fuente de Financiamiento</option>
                      <?php
                      if ($fuentefinanciamiento["id_fuente_financiamiento"] <> 0) {
                        echo '<option value="' . $fuentefinanciamiento["id_fuente_financiamiento"] . '"> ' . $fuentefinanciamiento["desc_accion_centralizada"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladorfuentefinanciamiento::ctrMostrarfuentefinanciamiento($item, $valor);
                      foreach ($categorias as $key => $value) {

                        echo '<option value="' . $value["id_fuente_financiamiento"] . '">' . $value["desc_fuente_financiamiento"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!--=====================================
                ENTRADA Actividad ComEERCIAL
                    ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="id_actvcomercial" name="id_actvcomercial" style="width: 100%;" required >
                      <option value=""> Seleccione Actividad Comercial</option>
                      <?php
                      if ($fuentefinanciamiento["id_actvcomercial"] <> 0) {
                        echo '<option value="' . $fuentefinanciamiento["id_actvcomercial"] . '"> ' . $fuentefinanciamiento["desc_actvcomercial"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladoractividadcomercial::ctrMostraractividadcomercial($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="' . $value["id_actvcomercial"] . '">' . $value["desc_actvcomercial"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <!--=====================================
                MONTO PARTIDA 
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="number" step="0.001" class="form-control pull-right" name="montopartida" placeholder="Monto Partida Presupuestaria" >
                  </div>
                </div>
                <!--=====================================
                municipio
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionarmunicipio" name="seleccionarmunicipio" required style="width: 100%;">
                      <option value=""> Seleccione Municipio</option>
                      <?php
                      if ($cliente["id_municipio"] <> 0) {
                        echo '<option value="' . $cliente["id_municipio"] . '"> ' . $cliente["desc_municipio"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladormunicipio::ctrMostrarmunicipio($item, $valor);
                      foreach ($categorias as $key => $value) {

                        echo '<option value="' . $value["id_municipio"] . '">' . $value["desc_municipio"] . '</option>';
                      }

                      ?>
                    </select>
                  </div>
                </div>
                <!--=====================================
                 estado
                  ======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionarestado" name="seleccionarestado" required style="width: 100%;">
                      <option value=""> Seleccione Estado</option>
                      <?php
                      if ($cliente["id_estado"] <> 0) {
                        echo '<option value="' . $cliente["id_estado"] . '"> ' . $cliente["nombre"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladorestado::ctrMostrarestado($item, $valor);
                      foreach ($categorias as $key => $value) {

                        echo '<option value="' . $value["id_estado"] . '">' . $value["nombre"] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i>Seleccione CCNU</span>
                    <select class="form-control select2" name="palabra" id="palabra" required style="width: 40%;">
                      <?php
                      if ($producto["id"] <> 0) {
                        echo '<option value="' . $producto["id"] . '"> ' . $producto["descripcion"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladorproductos::ctrMostrarproducto($item, $valor);
                      foreach ($categorias as $key => $value) {
                        echo '<option value="' . $value["id"] . '">' . $value["descripcion"] . '</option>';
                      }
                      ?>
                    </select>

                    <input type="button" value="buscar" name="buscar" id="buscar" onClick="buscarPalabra()">
                    <input type="hidden" value="anadir" name="accion">
                    <input type="hidden" value="" name="arrayDatos" id="arrayDatos">
                  </div>
                </div>
                <div class="row">

                  <div class="col-xs-12 pull-right">
                    <table class="table" id="dataNueva">
                      <thead>
                      <TR>
                        <th style="width: 5%">Des. <br>CCNU</th>
                        <th style="width: 5%">Codigo CCNU </th>
                        <th style="width: 5%">Especificación</th>
                         <th style="width: 5%">I</th>
                        <th style="width: 5%">II</th>
                        <th style="width: 5%">III</th>
                        <th style="width: 5%">IV</th>
                        <th style="width: 5%">Cantidad</th>
                        <th style="width: 5%">Unidad de <br> Medida</th>
                        <th style="width: 5%">Costo <br>Unitario<br> Estimado</th>
                        <th style="width: 5%">Precio <br>Total<br> Estimado</th>
                        <th style="width: 5%">Alícuota <br>IVA <br>Estimada</th>
                        <th style="width: 5%">Monto <br>IVA <br>Estimado</th>
                        <th style="width: 5%">Monto <br>Total <br>Estimado</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>

              </div>

            </div>

            <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right" onclick="cambiarAction()">Guardar </button>
              
            </div>
          </form>
 
        </div>
        
      
      </div>
  </section>
</div>
<script type="text/javascript">
  function calcular() {
    try {
      var a = parseFloat(document.getElementById('valor1').value);
      var b = parseFloat(document.getElementById('valor2').value);
      var c = parseFloat(document.getElementById('valor3').value);
      var d = parseFloat(document.getElementById('valor4').value);
      document.getElementById('total').value = a + b + c + d; // suma
      var f = parseFloat(document.getElementById('total').value); //cantidas
      var g = parseFloat(document.getElementById('cunitario').value); //costo unitario
      document.getElementById('punitario').value = f * g; //precio totoal estimado
      var h = parseFloat(document.getElementById('punitario').value); //precio totoal estimado
      var i = parseFloat(document.getElementById('aliivaesti').value); //ali iva
      document.getElementById('montoiva').value = h * i; //iva estimada

      var j = parseFloat(document.getElementById('punitario').value);
      var k = parseFloat(document.getElementById('montoiva').value);
      document.getElementById('montototal').value = j + k;


    } catch (e) {}
  }
</script>


<script type="text/javascript">
  function validarForm(formulario) {
    if (formulario.palabra.value.length == 0) { //¿Tiene 0 caracteres?
      formulario.palabra.focus(); // Damos el foco al control
      alert('Debes rellenar este campo'); //Mostramos el mensaje
      return false;
    } //devolvemos el foco  
    return true; //Si ha llegado hasta aquí, es que todo es correcto 
  }

  function cambiarAction() {
    var TableData = new Array();

    $('#dataNueva tr').each(function(row, tr) {
      //alert("codigo :" + $(tr).find('td:eq(1)').text());
      TableData[row] = {
        "descripcion": $(tr).find('td:eq(0)').text(),
        "codigo": $(tr).find('td:eq(1) input').val(),
        "especificacion": $(tr).find('td:eq(2) input').val(),
        "I": $(tr).find('td:eq(3) input').val(),
        "II": $(tr).find('td:eq(4) input').val(),
        "III": $(tr).find('td:eq(5) input').val(),
        "IV": $(tr).find('td:eq(6) input').val(),
        "total": $(tr).find('td:eq(7) input').val(),
        "und": $(tr).find('td:eq(8) input').val(),
        "cunitario": $(tr).find('td:eq(9) input').val(),
        "punitario": $(tr).find('td:eq(10) input').val(),
        "alicuotaivaestimada": $(tr).find('td:eq(11) input').val(),
        "montoivaestimado": $(tr).find('td:eq(12) input').val(),
        "montototalestimado": $(tr).find('td:eq(13) input').val()

      }
    });
    TableData.shift(); // first row is the table header - so remove

    //alert("¿ esta de acuerdo ?.");
    var form = document.getElementById('programacion');
    document.getElementById('arrayDatos').value = JSON.stringify(TableData);
    form.action = 'guardarprogramacion';



  }


  function buscarPalabra() {

    var palabra = document.getElementById("palabra").value;
    var miTabla2 = document.getElementById("dataNueva");

    var palabra = document.getElementById('palabra').value;

    var miTabla2 = document.getElementById("dataNueva");
    var i = 1;
    $.ajax({
      type: 'POST',
      url: 'buscaB',
      data: {
        "resAJAX": palabra
      },
      dataType: 'json',
      success: function(response) {

        var fila2 = miTabla2.insertRow(i);



        fila2.insertCell(0).innerHTML = response[0].descripcion;
        fila2.insertCell(1).innerHTML = response[0].codigo;
        //fila2.insertCell(2).innerHTML = '<input type="text" style="width :70px; heigth : 1px" id="especificacion"  placeholder="especificacion" name="especificacion" required/>';
       
        fila2.insertCell(2).innerHTML = '<select id="producto" name="producto" style="width :70px; heigth : 1px" >'
                                  '<option value="12">Texto One </option>'
                                  '<option value="13">Texto Two</option>'
                                  '</select>';

        fila2.insertCell(3).innerHTML = '<input style="width : 25px; heigth : 1px type="number"  id="valor1"  name="I" value = 0 oninput = "calcular()" required/>';
        fila2.insertCell(4).innerHTML = '<input style="width : 30px; heigth : 1px" type="number"  id="valor2" name="II"   value = 0  oninput ="calcular()" required/>';
        fila2.insertCell(5).innerHTML = '<input style="width : 30px; heigth : 1px" type="number"  id="valor3" name="III"   value = 0  oninput ="calcular()" required/>';
        fila2.insertCell(6).innerHTML = '<input style="width : 32px; heigth : 1px" type="number"  id="valor4" name="IV"  value = 0  oninput ="calcular()" required/>';
        fila2.insertCell(7).innerHTML = '<input style="width : 40px; heigth : 1px" type="number" id="total"  name="cantidad"   oninput ="calcular()" requiredrequired/>';
        fila2.insertCell(8).innerHTML = '<input style="width : 40px; heigth : 1px" type="text"   id="und"  placeholder="UND" name="und" required>'; 
        fila2.insertCell(9).innerHTML = '<input style="width : 50px; heigth : 1px" type="number" id="cunitario" step="0.001" name="costounitarioestimado" value = 1  oninput ="calcular()" required/>';
        fila2.insertCell(10).innerHTML = '<input style="width : 50px; heigth : 1px" type="number" id="punitario" step="0.001" name="preciounitarioestimado" value = 1  oninput ="calcular()" required/>';
        fila2.insertCell(11).innerHTML = '<input style="width : 40px; heigth : 1px" type="number" id="aliivaesti" step="0.001" name="alicuotaivaestimada" value = 0  oninput ="calcular()" required/>';
        fila2.insertCell(12).innerHTML = '<input style="width : 40px; heigth : 1px" type="number" id="montoiva" step="0.001" name="montoivaestimado" value = 1  oninput ="calcular()" required/>';
        fila2.insertCell(13).innerHTML = '<input style="width : 40px; heigth : 1px" type="number" id="montototal" step="0.001" name="montototalestimado" alue = 1  oninput ="calcular()" required/>';
        fila2.insertCell(14).innerHTML = '<input style="width : 10px; heigth : 1px" type="button" class="borrar" value="X" />';

      },

      error: function(jQXHR, textStatus, errorThrown) {
        alert(jQXHR.status + " " + textStatus + " " + errorThrown);
      },

    });

  }


  $(document).on('click', '.borrar', function(event) {
    event.preventDefault();
    $(this).closest('tr').remove();
  });
</script>
