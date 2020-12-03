<?php

if ($_SESSION["modificarCotizaciones"] == "off") {
    echo '<script>

    window.location = "inicio";

  </script>';

    return;
} ?>
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
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre los Proyectos</th>
           

         </tr> 

        </thead>

        <tbody>

       <?php
       $it = $_GET["idVenta"];
       $item = null;
       $valor = null;

       $categorias = Controladorproyecto::ctrMostrarproyecto($item, $valor, $ite, $it);

       foreach ($categorias as $key => $value) {
           echo ' <tr>

                    <td>' .
               ($key + 1) .
               '</td>

                    <td class="text-uppercase">' .
               $value["nombreproyecto"] .
               '</td>
                
                    <td>


                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="' .
               $value["id_proyecto"] .
               '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil">Agregar Items</i></button>
						
						 ';
          
               echo '<a href="index.php?ruta=item&iditem=' . $value["id_proyecto"] . '">Ver items</a> ';
             echo '<a href=index.php?ruta=itemcentralizado&iditem='.$value['id_programacion_anual'].'>Imprimir</a>';

           echo '</div>  

                    </td>

                  </tr>';
       }
       ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
<!--=====================================
MODAL AGREGAR proyecto
======================================-->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">
	<?php
 $ente = $_SESSION["id_entes"];
 $c = $_GET["idVenta"];

 $codigo = 0;
 $re = "select codigo from proyecto  WHERE id_entes = '" . $ente . "' and id_programacion_anual= '" . $c . "'  ORDER BY id_programacion_anual";
 $res = pg_query($re);
 while ($f = pg_fetch_array($res)) {
     $codigo = $f['codigo'];
 }
 if ($codigo == 0) {
     $codigo = 1;
 } else {
     $codigo = $codigo + 1;
 }

 function generaCeros($codigo)
 {
     //obtengop el largo del numero
     $largo_numero = strlen($codigo);
     //especifico el largo maximo de la cadena
     $largo_maximo = 4;
     //tomo la cantidad de ceros a agregar
     $agregar = $largo_maximo - $largo_numero;
     //agrego los ceros
     for ($i = 0; $i < $agregar; $i++) {
         $codigo = "0" . $codigo;
     }
     //retorno el valor con ceros
     return $codigo;
 }
 $p = generaCeros("$codigo");
 $fecha_actual = date("yy/m/d");
 $programacion = $_GET["idVenta"];
 ?>
 
      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Proyecto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon">Nombre de Proyecto</span> 

                <input type="text" class="form-control input-lg" name="nombreproyecto" placeholder="Ingrese el Nombre del Proyecto" required>

              </div>
			   <div class="input-group">
              
                
                 
            <input type="hidden"  name="codigo" id="codigo" value="001" readonly>
				 <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
				 <input type="hidden" name="id_entes" value="<?php echo $_SESSION["id_entes"]; ?>">
				 <input type="hidden" name="tipo" value="p">
				 <input type="hidden" name="id_programacion" value="<?php echo $programacion; ?>">
				 <input type="hidden" name="fecha" value="<?php echo $fecha_actual; ?>">

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
        $crearproyecto = new Controladorproyecto();
        $crearproyecto->ctrCrearproyecto();
        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Nombre de Proyecto
======================================-->
     

<div id="modalEditarCategoria" class="modal fade" role="dialog">
 
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" action="anualprograma">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Productos al  Proyecto</h4>
 
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

                  <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" readonly>
                  <input type="hidden"  name="codigo" id="codigo" value="001" readonly>
                 <input type="hidden" class="form-control input-lg" name="editarCatego" id="editarCatego" required>
                  <input type="hidden"  name="idCategoria" id="idCategoria" required>
                  <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
                  <input type="hidden" name="id_entes" value="<?php echo $_SESSION["id_entes"]; ?>">
                  <input type="hidden" name="tipo" value="p">
                  <input type="hidden" name="fecha" value="<?php echo $fecha_actual; ?>">

              </div>
		  <div class="input-group">
					Seleccione Partida Presupuestaria   <br /><select class="form-control select2" id="id_partida_presupuestaria" name="id_partida_presupuestaria" required style="width:40vmax">
                      <option value=""> Seleccione Partida Presupuestaria</option>
                      <?php
                      if ($cliente["id_partida_presupuestaria"] != 0) {
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
					<br />Seleccione Fuente de Financiamiento <br/>
          <select class="form-control select2" id="id_fuente_financiamiento" name="id_fuente_financiamiento[]" multiple="multiple"  required style="width:40vmax">
                      <option value=""> Seleccione Fuente de Financiamiento</option>
                      <?php
                      if ($fuentefinanciamiento["desc_fuente_financiamiento"] != 0) {
                          echo '<option value="' . $fuentefinanciamiento["desc_fuente_financiamiento"] . '"> ' . $fuentefinanciamiento["desc_accion_centralizada"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladorfuentefinanciamiento::ctrMostrarfuentefinanciamiento($item, $valor);
                      foreach ($categorias as $key => $value) {
                          echo '<option value="' . $value["desc_fuente_financiamiento"] . '">' . $value["desc_fuente_financiamiento"] . '</option>';
                      }
                      ?>
                    </select>
					<div class="field_wrapper">
    <div><br />Ingrese el porcentaje de la Fuente de Financiamiento <br/>
        <input type="text" name="porcentaje[]" value="0"/>
        <a href="javascript:void(0);" class="add_button " title="Add field"><img src="add-icon.png"/></a>
    </div>
</div>
                	<br />Seleccione Objeto de Contratación <br /> <select class="form-control select2" id="id_actvcomercial" name="id_actvcomercial" style="width: 80%;" required >
                      <option value=""> Seleccione Objeto de Contratación </option>
                      <?php
                      if ($fuente["id_actvcomercial"] != 0) {
                          echo '<option value="' . $fuente["id_actvcomercial"] . '"> ' . $fuente["desc_actvcomercial"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladoractividadcomercial::ctrMostraractividadcomercial($item, $valor);
                      foreach ($categorias as $key => $value) {
                          echo '<option value="' . $value["id_actvcomercial"] . '">' . $value["desc_actvcomercial"] . '</option>';
                      }
                      ?>
                    </select>
					<br/>Seleccione Estado <br /> <select class="form-control select2" id="id_estado" name="id_estado[]" multiple="multiple" required style="width: 80%;">
                      <option value=""> Seleccione Estado</option>
                      <?php
                      if ($cliente["nombre"] != 0) {
                          echo '<option value="' . $cliente["nombre"] . '"> ' . $cliente["nombre"] . '</option>';
                      }
                      $item = null;
                      $valor = null;
                      $categorias = Controladorestado::ctrMostrarestado($item, $valor);
                      foreach ($categorias as $key => $value) {
                          echo '<option value="' . $value["nombre"] . '">' . $value["nombre"] . '</option>';
                      }
                      ?>
                    </select>
					
					<br />Seleccione CCNU <br /> <select class="form-control select2" name="id_ccnu" id="id_ccnu" required style="width: 60%;">
                      <option value=""> Seleccione CCNU</option>
					  <?php
       if ($producto["id"] != 0) {
           echo '<option value="' . $producto["descripcion"] . '"> ' . $producto["descripcion"] . '</option>';
       }
       $item = null;
       $valor = null;
       $categorias = Controladorproductos::ctrMostrarproducto($item, $valor);
       foreach ($categorias as $key => $value) {
           echo '<option value="' . $value["descripcion"] . '">' . $value["descripcion"] . '</option>';
       }
       ?>
                    </select>
				
					
					</div>
				
					
            </div>
  <div class="input-group">
            <TABLE >
                  <TR>
                    <TD style="width : 1000px;" >Indique Una Especificación  </TD>
                    <TD style="width : 1000px;" >Ingrese Una Cantidad  </TD>
                  </TR>
                  <TR>
                    <TD><input type="text" style="width :200px;" id="especificacion"  placeholder="especificacion" name="especificacion" required/></TD>
                    <TD><input style="width : 200px; " type="number" id="total"  name="cantidad"  step="0.001"  oninput ="calcular()" required/></TD> 	
                  </TR>
	            </TABLE>
	              <TABLE >
                        <TR>
                        <TD>Trimestre I </TD>
                        <TD>Trimestre II  </TD>
                        <TD> Trimestre III  </TD>
                        <TD> Trimestre IV  </TD>
                        <TD> Cantidad por distribuir  </TD>
                      </TR>
                      <TR>
                        <TD>   <input style="width : 100px; " type="number"  id="valor1"  name="i"  step="0.001" value = 0 oninput = "calcular()" required/>		</TD>
                        <TD><input style="width : 100px; " type="number"  id="valor2" name="ii"    step="0.001" value = 0  oninput ="calcular()" required/> </TD>
                        <TD><input style="width : 100px; " type="number"  id="valor3" name="iii"   step="0.001"  value = 0  oninput ="calcular()" required/> </TD>
                            <TD>	<input  style="width : 100px; " type="number"  id="valor4" name="iv"   step="0.001" value = 0  oninput ="calcular()" required/>  </TD>
                              <TD>
                              <input  style="width : 100px; " type="number"  id="variable"  step="0.001" name="variable"  value = 0  oninput ="calcular()" required/>  </TD>
                      </TR>
                  </TABLE> 
                  <TABLE  >
                            <TR>
                                                    <TD>Unidad de <br> Medida </TD>
                                                    <TD>Costo <br>Unitario<br> Estimado </TD>
                                                   <TD>Precio <br>Total<br> Estimado </TD>
                                                   
                            </TR>
                            <TR>
                              <TD>    <select class="form-control select2" id="und" name="und" required style="width: 100%;">
                                            <option value=""> Seleccione UND</option>
                                            <?php
                                            if ($cliente["desc_unidad_medida"] != 0) {
                                                echo '<option value="' . $cliente["desc_unidad_medida"] . '"> ' . $cliente["desc_unidad_medida"] . '</option>';
                                            }
                                            $item = null;
                                            $valor = null;
                                            $categorias = Controladorestado::ctrMostrarund($item, $valor);
                                            foreach ($categorias as $key => $value) {
                                                echo '<option value="' . $value["desc_unidad_medida"] . '">' . $value["desc_unidad_medida"] . '</option>';
                                            }
                                            ?>
                                          </select>
                            
                            
                            </TD>
                              <TD>	<input style="width : 100px; " type="number" id="cunitario" step="0.001" name="costounitarioestimado" value = 1  oninput ="calcular()" required/></TD>
                              <TD>	<input style="width : 100px; " type="number" id="punitario" step="0.001" name="preciounitarioestimado" value = 1  oninput ="calcular()" required/></TD>
                              </TR>
                              <TD>Alícuota <br>IVA <br>Estimada </TD>
                                                    <TD>Monto <br>IVA <br>Estimado </TD>
                                                    <TD>Monto <br>Total <br>Estimado </TD>
                                                    </TR>
                              <TD style="width:fit-content">	
                              <select class="form-control select2" id="aliivaesti" name="alicuotaivaestimada" oninput ="calcular()"  required style="width: 100%;">
                                            <option value=""> Seleccione Alicuotaiva Estimada</option>
                                            <?php
                                            if ($cliente["desc_alicuota_iva"] != 0) {
                                                echo '<option value="' . $cliente["desc_alicuota_iva"] . '"> ' . $cliente["desc_alicuota_iva"] . '</option>';
                                            }
                                            $item = null;
                                            $valor = null;
                                            $categorias = Controladorestado::ctrMostraralicuota($item, $valor);
                                            foreach ($categorias as $key => $value) {
                                                echo '<option value="' . $value["desc_alicuota_iva"] . '">' . $value["desc_alicuota_iva"] . '</option>';
                                            }
                                            ?>
                                          </select>
                            
                            
                            
                            </TD>
                              <TD>	<input style="width : 100px;  " type="number" id="montoiva" step="0.001" name="montoivaestimado" value = 1  oninput ="calcular()" required/></TD>
                                <TD><input style="width : 100px;  " type="number" id="montototal" step="0.001" name="montototalestimado" alue = 1  oninput ="calcular()" required/>	</TD>
                            </TR>
                      </TABLE>
  
							</div>
	
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

         <input type="hidden" name="grabar" value="si"/>
<input type="submit" name="Crear"  title="Crear"/>

        </div>

      <?php
//$editarCategoria = new ControladorCategorias();
//$editarCategoria -> ctrEditarCategoria();
//$crearitems = new Controladorproyecto();
//$crearitems -> ctrCrearitems();
?> 

      </form>

    </div>

  </div>

</div>


<?php
$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();
?>
<!--=====================================
AgregarITEMs
======================================-->


<script type="text/javascript">
  function calcular() {
    try {
	   var cantidad = (document.getElementById('total').value);
      var a = (document.getElementById('valor1').value);
	  var b = (document.getElementById('valor2').value);
      var c = (document.getElementById('valor3').value);
      var d = (document.getElementById('valor4').value);
	  
	   document.getElementById('variable').value = cantidad -a-b-c-d;
      //document.getElementById('total').value = a + b + c + d; // suma
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
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="porcentaje[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>