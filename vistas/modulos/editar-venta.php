<?php

if($_SESSION["modificarCotizaciones"] == "off"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}


?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Proyectos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Acción Centralizada</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          
          Agregar Una Acción Centralizada

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Acción Centralizada</th>
          <?php // echo $_GET["idVenta"];    ?>

         </tr> 

        </thead>

        <tbody>

       <?php
	    
          $it = $_GET["idVenta"];
          $item = null;
          $valor = null;

          $categorias = Controladorclientes::ctrMostraraccioncentralizada($item, $valor,$ite,$it);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["desc_accion_centralizada"].'</td>
					
                  
					
                    <td>


                      <div class="btn-group">
                          
                            <a href=index.php?ruta=itemcentralizado&iditem='.$value['id_accion_centra'].'&variable2='.$value['id_programacion_anual'].'&variable3='.$value['id_accion_centralizada'].'>Agregar items</a> 
						';
						
						// if($_SESSION["perfil"] == "1"){
                
                          echo  '<a href="index.php?ruta=veritemaccion&iditem='.$value["id_accion_centra"].'">Ver items</a> ';
                         
                         
                       // }

                      

                      echo '</div>  
   <a href=index.php?ruta=reportex&iditem='.$value['id_programacion_anual'].'>Imprimir</a> 
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
	$user = 'postgres';
$passwd = '123';
$db = 'contrata';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
//?&gt;
$connexion = pg_connect("host=localhost dbname=contrata user=postgres password=123")
or die ('no hay conxeion:' .pg_last_error());
$ente=$_SESSION["id_entes"];
$c= $_GET["idVenta"];



$codigo=0;
$re="select codigo from accion_centra  WHERE id_entes = '".$ente."' and id_programacion_anual= '".$c."'  ORDER BY id_accion_centra";	
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
              
                <span class="input-group-addon">Elegir una acción centralizada</span> 

             <select class="form-control select2" id="id_accion_centralizada" name="id_accion_centralizada" required style="width:30vmax"/>
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
			   <div class="input-group">
              
                
                 
                <input type="hidden"  name="codigo" id="codigo" value="<?php echo $p;?>" readonly>
				 <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"];?>">
				 <input type="hidden" name="id_entes" value="<?php echo $_SESSION["id_entes"];?>">
				 <input type="hidden" name="tipo" value="c">
				 <input type="hidden" name="id_programacion" value="<?php echo $programacion;?>">
				 <input type="hidden" name="fecha" value="<?php echo $fecha_actual;?>">

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Acción Centralizada</button>

        </div>

        <?php

          $crearproyecto = new Controladorproyecto();
          $crearproyecto -> ctrCrearaccion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
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

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

















<!--=====================================
MODAL EDITAR Nombre de Proyecto
======================================-->
     

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar items</h4>
 
        </div>
		
		<!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
 <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Items cargados</th>
           

         </tr> 

        </thead>

        <tbody>

       <?php
         $it= $_POST["idCategoria"];
          $item = null;
          $valor = null;
           
          $categorias = Controladorproyecto::ctrMostraritemsc($item, $valor, it);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["id_ccnu"].'</td>
					<td class="text-uppercase">'.$value["id_programacion_anual_move"].'</td>
                    
                    <td>


                      <div class="btn-group">
                          ';
						  if($_SESSION["perfil"] == "1"){

                          echo ' ';

                        }

                        if($_SESSION["perfil"] == "1"){

                          echo '<button class="btn btn-danger btnEliminar" idCategoia="'.$value["id_programacion_anual_move"].'"><i class="fa fa-times"></i></button>';

                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
				<input type="hidden" class="form-control input-lg" name="editarCatego" id="editarCatego" required>
                  <input type="hidden"  name="idCategoria" id="idCategoria" required>
				  <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"];?>">
				 <input type="hidden" name="id_entes" value="<?php echo $_SESSION["id_entes"];?>">
				 <input type="hidden" name="tipo" value="p">
				  <input type="hidden" name="fecha" value="<?php echo $fecha_actual;?>">

              </div>
		  <div class="input-group">
						<select class="form-control select2" id="id_partida_presupuestaria" name="id_partida_presupuestaria" required style="width: 60%;">
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
					<select class="form-control select2" id="id_fuente_financiamiento" name="id_fuente_financiamiento" required style="width: 60%;">
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
					 <select class="form-control select2" id="id_actvcomercial" name="id_actvcomercial" style="width: 60%;" required >
                      <option value=""> Seleccione Objeto de Contratación </option>
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
					<select class="form-control select2" id="id_estado" name="id_estado" required style="width: 60%;">
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
					<select class="form-control select2" id="id_municipio" name="id_municipio" required style="width: 60%;">
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
					<select class="form-control select2" name="id_ccnu" id="id_ccnu" required style="width: 60%;">
                      <option value=""> Seleccione CCNU</option>
					  <?php
                      if ($producto["id"] <> 0) {
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
		<TD><input type="text" style="width :200px; heigth : 1px" id="especificacion"  placeholder="especificacion" name="especificacion" required/></TD>
		 <TD><input style="width : 200px; heigth : 1px" type="number" id="total"  name="cantidad"   oninput ="calcular()" required/></TD> 	
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
		<TD>   <input style="width : 100px; heigth : 1px" type="number"  id="valor1"  name="i" value = 0 oninput = "calcular()" required/>		</TD>
		<TD><input style="width : 100px; heigth : 1px" type="number"  id="valor2" name="ii"   value = 0  oninput ="calcular()" required/> </TD>
		<TD><input style="width : 100px; heigth : 1px" type="number"  id="valor3" name="iii"   value = 0  oninput ="calcular()" required/> </TD>
				<TD>	<input  style="width : 100px; heigth : 1px" type="number"  id="valor4" name="iv"  value = 0  oninput ="calcular()" required/>  </TD>
					<TD>
					<input  style="width : 100px; heigth : 1px" type="number"  id="variable" name="variable"  value = 0  oninput ="calcular()" required/>  </TD>
	</TR>
</TABLE>  <TABLE  >
<TR>
                        <TD>Unidad de <br> Medida </TD>
                        <TD>Costo <br>Unitario<br> Estimado </TD>
                       <TD>Precio <br>Total<br> Estimado </TD>
                        <TD>Alícuota <br>IVA <br>Estimada </TD>
                        <TD>Monto <br>IVA <br>Estimado </TD>
                        <TD>Monto <br>Total <br>Estimado </TD>
</TR>
  <TR>
 <TD> <input style="width : 100px; heigth : 1px" type="text"   id="und"  placeholder="UND" name="und" required></TD>
		<TD>	<input style="width : 100px; heigth : 1px" type="number" id="cunitario" step="0.001" name="costounitarioestimado" value = 1  oninput ="calcular()" required/></TD>
		<TD>	<input style="width : 100px; heigth : 1px" type="number" id="punitario" step="0.001" name="preciounitarioestimado" value = 1  oninput ="calcular()" required/></TD>
		<TD>	<input style="width : 100px; heigth : 1px" type="number" id="aliivaesti" step="0.001" name="alicuotaivaestimada" value = 0  oninput ="calcular()" required/></TD>
		<TD>	<input style="width : 100px; heigth : 1px" type="number" id="montoiva" step="0.001" name="montoivaestimado" value = 1  oninput ="calcular()" required/></TD>
			<TD><input style="width : 100px; heigth : 1px" type="number" id="montototal" step="0.001" name="montototalestimado" alue = 1  oninput ="calcular()" required/>	</TD>
  </TR>
  </TABLE>
  
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

          //$editarCategoria = new ControladorCategorias();
          //$editarCategoria -> ctrEditarCategoria();
          $crearitems = new Controladorproyecto();
          $crearitems -> ctrCrearitems();
        ?> 

      </form>

    </div>

  </div>

</div>


<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>
<!--=====================================
AgregarITEMs
======================================-->

<div id="modalIngresarITEMS" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ingresar Items a un Proyecto</h4>

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

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
                
                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>
			  <div class="input-group">
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

         //// $editarCategoria = new ControladorCategorias();
          //$editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>
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
