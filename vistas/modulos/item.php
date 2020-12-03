<?php

if ($_SESSION["modificarCotizaciones"] == "off") {
    echo '<script>

    window.location = "inicio";

  </script>';

    return;
} ?>

                           




 

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
  
        <a href="programacionanual">Volver</a>

      </div>
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
$iditm=$_GET["iditem"];
?>
      <div class="box-body">
	 <?php // echo $_GET["iditem"];
	 echo '<FORM METHOD="POST" ACTION="eliminar">Nombre<br>'; 
	 ?> 
  <br>
  
<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>                                               
                                                <th>CCNU </th>
                                                 <th>Partida Presupuestaria</th>
												 <th>Fuente de Finaciamiento</th>
												 <th>Objeto de Contratacion</th>
												 <th>Especificacion</th>
												 <th>cantidad</th>
												 <th>und</th>
												 <th>costo <br>unitario</th>
												 <th>precio <br>total</th>
												 <th>alicuota <br>iva</th>
												 <th>monto<br>iva</th>
												 <th>monto<br>total</th>
                                               	 <th>Opciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                      <?php
                                            
											
									 // $res="SELECT * FROM programacionproyecto3 WHERE codigo='001' ORDER BY id_programacion_anual_move ASC ";
                   $res="SELECT * FROM programacion_compras_move1 WHERE id_proyecto='$iditm' ORDER BY id_programacion_anual_move ASC ";  
                   $re = pg_query( $res );
		                            while($fila = pg_fetch_array($re))
									{		
									echo "<tr>
                                                         <td>
                                                           
                                                              $fila[id_ccnu]
                                                            
                                                        </td>
                                                         <td>
                                                            $fila[id_partida_presupuestaria]
                                                        </td>
                                                       <td>
                                                            $fila[id_fuente_financiamiento]
                                                        </td>
														<td>
                                                            $fila[id_municipio]
                                                        </td>
														<td>
                                                            $fila[especificacion]
                                                        </td>
														<td>
                                                            $fila[cantidad]
                                                        </td>
														<td>
                                                            $fila[und]
                                                        </td>
														<td>
                                                            $fila[costo_unitario]
                                                        </td>
														<td>
                                                            $fila[precio_total]
                                                        </td>
														<td>
                                                            $fila[alicuota_iva]
                                                        </td>
														<td>
                                                            $fila[monto_iva]
                                                        </td>
														<td>
                                                            $fila[monto_total]
                                                        </td>
                                                         <td><center>
                                                            ";		
	

     // if($_SESSION["perfil"] == "1"){ 

                        echo '<a href=index.php?ruta=eliminar&codigo='.$fila['id_programacion_anual_move'].'&variable2='.$fila['id_proyecto'].'>eliminar</a>';
            // }
                                          echo "    </center>     </td>
                                                    </tr>";


                                        
                                        } ?>                                            
                                        </tbody>
                                        
                                    </table>


						
		<?php

     if (isset($_GET['eliminar'])) { 

//codigo que viene de la lista
								echo	$x1=$_GET['codigo'];
                        						if (isset($_POST['eliminar'])) {
																			$nombre=strtoupper($_POST["id_programacion_anual_move"]);
																			$id_estado=strtoupper($_POST["id_ccnu"]);
																					  if( $nombre=="" )
																							{
																									
																										echo "
																					   <script> alert('campos vacios')</script>
																					   ";
                   																			 echo "<br>";
                    
																								}
        																			else
           																					{

							$sql="delete from programacion_compras_move1 where id_programacion_anual_move='$x1'";
															$stmt = pg_query($sql);  
               														if( $stmt) {             //que te guarde cada valor
															echo '<div class="alert alert-success alert-dismissable">
																					<i class="fa fa-check"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<b>Bien!</b> Datos Editados Correctamente... ';



				   
                } else{
                    echo '<div class="alert alert-danger"><strong>Oh no Error!</strong>Registro no Guardado</div>'; 
                    die( print_r( pg_last_error(), true));
                }           
                            
                              echo '   </div>';
                           
                            
                        



}
   
}


                                        
   $consulta="SELECT * FROM programacion_compras_move1 where id_programacion_anual_move='$x1'";
     $re = pg_query( $consulta );
	  while($fila = pg_fetch_array($re))
									{	


?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar </h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=item&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Codigo</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo  $fila[id_ccnu] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Descripción</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="siglas" class="form-control" value="<?php echo  $fila[id_ccnu] ?>" id="exampleInputEmail1" placeholder="Siglas">
                                    
                                            
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                  <input type=submit  class="btn btn-primary btn-lg" name="eliminar" id="eliminar" value="ELIMINAR">
                                        
                                    
 

                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php


}




}
?>
			
				

</div>


    </div>

  </section>

</div>
  