<link rel="stylesheet" type="text/css" href="../css/select2.css">
<script src="jquery-3.1.1.min.js"></script>
<script src="../js/select2.js"></script>
<?php
require_once ("class/class.php");
$tran= new Trabajo();
$datos=$tran->enteydante();   //consulta  postgre para llenar el select entes descomentar
for ($i=0;$i<sizeof($datos);$i++)
{ //echo $datos[$i] ["nombre"];
}

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{  
		$tran->add5();
		exit;
}

?>
 <title>Evaluación de Desempeño</title>
</head>

<body>

	 
<form name="form" action="" method="post">
<table class="table">
		<tr class="info">
			<th COLSPAN=3>Por favor ingrese todos los datos solicitados</th>
	  </tr>
			<th COLSPAN=3>Datos Organos</th>
			</tr>			
			<th COLSPAN=3>Seleccione el Nombre del Ente: 
			<select id="mibuscador" name="autoLlenar" onChange="return buscar();" method="post" style="width: 50%">     
              <option value=""></option>
					<?php
					for ($i=0;$i<sizeof($datos);$i++)
						{?>
                    <option value="<?php echo $datos[$i] ["id_entes"];?>"><?php echo $datos[$i]                                    ["nombre"];?></option>
                    <?php }?>
							
			  </select>		</th>
			</tr>
			<div> 
 <table width="61%" id="resultadoBusqueda" border="0" align="center" cellpadding="1" cellspacing="1">
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Proveedor</strong></td>
            <td width="100" align="center"><strong>Monto</strong></td>
			<td width="100" align="center"><strong>Forma de Pago</strong></td>
			<td colspan="2" width="100" align="center"><div align="center"><strong>Consumo</strong></div></td>
       </tr>        
</table>
</div> 


<script type="text/javascript">
	$(document).ready(function(){
			$('#mibuscador').select2();
	});
	

</script>
<script type="text/javascript">
	//function buscar(){
      //      var opcion = document.getElementById('mibuscador').value;
        ///    window.location.href = 'Evalclv1.php?op='+opcion;
        //}
		
</script>
<script type="text/javascript">
	function buscar(){
	//id=mibuscador
            var opcion = $('#mibuscador').val(); 
            //alert("hola select = "+opcion);
        }
function buscar(){
 	  var opcion = $('#mibuscador').val();
	// alert("hola select = "+opcion);
	 var miTabla =document.getElementById("resultadoBusqueda");
	 var i = 1;
	 var ob = {opcion:opcion};
	 $.ajax({
	 	type:"POST",
		url: "buscaBD.php",//"?mod=buscaBD",
		data: ob,//{"resAJAX":opcion},
		dataType: 'json',
		success: function(response){
		
		var fila = miTabla.insertRow(i);
		fila.insertCell(0).innerHTML = response[0].nombre ;

			},
	error : function (jQXHR,textStatus,errorThrown){
			alert(jQXHR.status + " "+textStatus+" "+errorThrown);
		},
			
	 });
     
}

</script>

