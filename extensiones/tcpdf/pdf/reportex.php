<?php

?>

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
$iditm=$_GET["codigo"];
//echo  $iditm;

 
$res="select  nombre,id_codio_onapre, tipo_rif ,rif,status from programacionanual_accion WHERE id_programacion_anual='$iditm'    group by nombre,id_codio_onapre, tipo_rif ,rif,status ";  
                   $re = pg_query( $res );
$ress="select  nombre,id_codio_onapre, tipo_rif ,rif,status from programacionanual_accion WHERE id_programacion_anual='$iditm'    group by nombre,id_codio_onapre, tipo_rif ,rif,status ";  
                   $ret = pg_query( $ress );
		                            
?>
 
<form id="3" name="3" method="POST" action="reporteorden.php">	 
	<?php    
while($fila = pg_fetch_array($re))
									{		
?> 
	 
Pulse para Gereneral un Reporte
<input name="nombre" id="nombre" type="text" value="<?php echo $fila['nombre']?>" readonly/>
<input name="Codigo" type="text" value="<?php echo $fila['id_codio_onapre']?>" readonly/>
<input name="rif" type="text" value="<?php echo $fila['tipo_rif']; echo $fila['rif']?>" readonly/>
<input name="ano" type="hidden" value="<?php echo $fila['ano']?>" readonly/>
<input name="estatus" type="text" value="<?php echo $fila['status']?>" readonly/>


						
		<?php    
}		
?> 	
<input name="id" type="text" value="<?php echo $_GET["codigo"]?>" readonly/>	
 
 
							  <input type="submit"  value="Centralizada" style="width:180px"  > 
</form>
 
<form id="3" name="3" method="POST" action="reporteorden1.php">	 
	<?php    
while($fila = pg_fetch_array($ret))
									{		
?> 
	 
 
<input name="nombre" id="nombre" type="hidden" value="<?php echo $fila['nombre']?>" readonly/>
<input name="Codigo" type="hidden" value="<?php echo $fila['id_codio_onapre']?>" readonly/>
<input name="rif" type="hidden" value="<?php echo $fila['tipo_rif']; echo $fila['rif']?>" readonly/>
<input name="ano" type="hidden" value="<?php echo $fila['ano']?>" readonly/>
<input name="estatus" type="hidden" value="<?php echo $fila['status']?>" readonly/>

<input name="id" type="hidden" value="<?php echo $_GET["codigo"]?>" readonly/>	
						
		<?php    
}		
?> 	
<div id="paginacion">
  <span class="derecha">  <input type="submit"  value="Proyecto" style="width:180px" align="left"  > </span>
    </div>
</form>

    </div>

  </section>

</div>
<style> 
   #paginacion {
   
  
  padding: .3em;
}

.derecha   { float: right; }
.izquierda { float: left;  }
</style>