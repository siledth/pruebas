<?php
if ($_SESSION["cotizaciones"] == "off") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}
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
                  <form name="programacion" id="programacion" method="POST" onSubmit="return validarForm(this);"  method="post" class="">
                     <div class="box-body">
                         <div class="box">
                              <?php
                              $item = "id";
                              $valor = $_GET["idCotizacion"];
                              //$venta = ControladorVentas::ctrTraerCotizacion($valor);
                              $itemUsuario = "id"; //Usuario
                              $valorUsuario = $venta["id_vendedor"];
                              $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                              //centralizada   
                              $itemCliente = "id_accion_centralizada";
                              $valorCliente = $venta["id_accion_centralizada"];
                              $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                              //FUENTE DE FINANCIAMIENTO 
                              $itemfuentefinanciamiento = "id_fuente_financiamiento";
                              $valorfuentefinanciamiento = $venta["id_fuente_financiamiento"];
                              $fuentefinanciamiento = Controladorfuentefinanciamiento::ctrMostrarfuentefinanciamiento($itemfuentefinanciamiento, $valorfuentefinanciamiento);
                              //$porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];
                              ?>

                        <!--=====================================
                          ENTRADA DEL ORGANISMO O ENTE
                        ======================================-->
                                  <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="nuevoVendedor" value="ORGANISMO" readonly>
                                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                                  </div>
                                </div>
                                <!--=====================================
                                   ENTRADA DEL Usuario
                                  ======================================-->

                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                                          <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                                        </div>
                                      </div>
                                  <!--=====================================
                TIPO VENTA
======================================-->
                <div class="form-group" hidden>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="TipoVenta" id="TipoVenta" value="COT">
                  </div>
                </div>


                <!--=====================================
                ENTRADA DEL CÓDIGO CAMBIARRRRR
======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <?php
                    $item = null;
                    $valor = null;
                    $ventas = ControladorVentas::ctrMostrarUltimoFolio("COT");
                    if (!$ventas) {
                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="00001" readonly>';
                    } else {
                      foreach ($ventas as $key => $value) {
                      }
                      $codigo = $value["codigo"] + 1;
                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '" readonly>';
                    }

                    ?>
                  </div>
                </div>
                <!--=====================================
                Proyecto A
======================================-->
<div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                    <input type="text" class="form-control pull-right" name="cotizarA" id="cotizarA" placeholder="Nombre del Proyecto:" value="<?php echo $venta["cotizarA"]; ?>">
                  </div>
                </div>
                <!--=====================================
                ENTRADA DEL CLIENTE
======================================-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionarCliente" name="seleccionarCliente" required style="width: 90%;">
                      <option value=""> Seleccione Acción Centralizada</option>
                      <?php
                      if ($cliente["id_accion_centralizada"] <> 0) {
                        echo '<option value="' . $cliente["id_accion_centralizada"] . '"> ' . $cliente["desc_accion_centralizada"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
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
                      $valor = null;
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
                ENTRADA Actividad Comprecia
 ======================================-->

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control select2" id="seleccionaractividad" name="seleccionaractividad" required style="width: 100%;">
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
                    <input type="text" class="form-control pull-right" name="Observaciones" placeholder="Monto Partida Presupuestaria" value="<?php echo $venta["Observaciones"]; ?>">
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
                                                          <th style="width: 10%">Descripción CCNU</th>
                                                          <th style="width: 10%">Codigo CCNU </th>
                                                          <th>Especificación</th>
                                                          <th>I</th>
                                                          <th>II</th>
                                                          <th>III</th>
                                                          <th>IV</th>
                                                          <th>Cantidad</th>
                                                          <th>Unidad de <br> Medida</th>
                                                          <th>Precio <br>Unitario<br> Estimado</th>
                                                          <th>Alícuota <br>IVA <br>Estimada</th>
                                                          <th>Monto <br>IVA <br>Estimado</th>
                                                          <th>Monto <br>Total <br>Estimado</th>
                                                          </tr>
                                                        </thead>
                                                      </table>
                                                </div>
                                              </div>

                                      </div>

                                </div>   
            
                                    <div class="box-footer">

                                      <input type="submit" name="submit" value="Guardar" onclick="cambiarAction()">
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
                    var g = parseFloat(document.getElementById('Cunitario').value); //costo unitario
                    document.getElementById('Punitario').value = f * g; //precio totoal estimado
                    var h = parseFloat(document.getElementById('Punitario').value); //precio totoal estimado
                    var i = parseFloat(document.getElementById('aliivaesti').value); //ali iva
                    document.getElementById('montoiva').value = h * i; //iva estimada

                    var j = parseFloat(document.getElementById('Punitario').value);
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
                    alert("descripcion :" + $(tr).find('td:eq(0)').text());
                    TableData[row] = {
                      "descripcion": $(tr).find('td:eq(0)').text(),
                      "codigo": $(tr).find('td:eq(1) input').val(),
                      "I": $(tr).find('td:eq(2) input').val(),
                      "II": $(tr).find('td:eq(3) input').val(),
                      "III": $(tr).find('td:eq(4) input').val(),
                      "IV": $(tr).find('td:eq(5) input').val(),
                      "cantidad": $(tr).find('td:eq(6) input').val(),
                      "und": $(tr).find('td:eq(7) input').val(),
                      "costounitarioestimado": $(tr).find('td:eq(8) input').val(),
                      "preciounitarioestimado": $(tr).find('td:eq(9) input').val(),
                      "alicuotaivaestimada": $(tr).find('td:eq(10) input').val(),
                      "montoivaestimado": $(tr).find('td:eq(11) input').val(),
                      "montototalestimado": $(tr).find('td:eq(12) input').val()

                    }
                  });
                  TableData.shift(); // first row is the table header - so remove

                  //alert("¿ esta de acuerdo ?.");
                  var form = document.getElementById('programacion');
                  document.getElementById('arrayDatos').value = JSON.stringify(TableData);
                  form.action = '?mod=guardarprogramacion';



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
                      fila2.insertCell(2).innerHTML = '<input type="text" style="width :90px; heigth : 1px" name="especificacion"  placeholder="especificacion" name="especificacion" required>';
                      fila2.insertCell(3).innerHTML = '<input style="width : 25px; heigth : 1px type="number"  id="valor1"  name="I" value = 0 oninput = "calcular()" required>';
                      fila2.insertCell(4).innerHTML = '<input style="width : 30px; heigth : 1px" type="number"  id="valor2" name="II"   value = 0  oninput ="calcular()" required> ';
                      fila2.insertCell(6).innerHTML = '<input style="width : 35px; heigth : 1px" type="number"  id="valor4" name="IV"  value = 0  oninput ="calcular()" required> ';
                      fila2.insertCell(7).innerHTML = '<input style="width : 50px; heigth : 1px" type="number" id="total"  name="cantidad"   oninput ="calcular()" requiredrequired>';
                      fila2.insertCell(8).innerHTML = '<input style="width : 55px; heigth : 1px" type="text"    placeholder="UND" name="und" required>';
                      fila2.insertCell(9).innerHTML = '<input style="width : 35px; heigth : 1px" type="number" id="Cunitario" step="0.001" name="costounitarioestimado" value = 1  oninput ="calcular()" required>';
                      fila2.insertCell(10).innerHTML = '<input style="width : 35px; heigth : 1px" type="number" id="Punitario" step="0.001" name="preciounitarioestimado" value = 1  oninput ="calcular()" required>';
                      fila2.insertCell(11).innerHTML = '<input style="width : 35px; heigth : 1px" type="number" id="aliivaesti" step="0.001" name="alicuotaivaestimada" value = 0  oninput ="calcular()" required>';
                      fila2.insertCell(12).innerHTML = '<input style="width : 35x; heigth : 1px" type="number" id="montoiva" step="0.001" name="montoivaestimado" value = 1  oninput ="calcular()" required>';
                      fila2.insertCell(13).innerHTML = '<input style="width : 35px; heigth : 1px" type="number" id="montototal" step="0.001" name="montototalestimado" alue = 1  oninput ="calcular()" required>';
                      fila2.insertCell(14).innerHTML = '<input type="button" class="borrar" value="Eliminar" />';

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
