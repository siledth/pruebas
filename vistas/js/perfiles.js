/*=============================================
EDITAR PERFIL
=============================================*/
$(".tablas").on("click", ".btnEditarPerfil", function(){

	var idPerfil= $(this).attr("idPerfil");
	

	
	var datos = new FormData();
	datos.append("idPerfil", idPerfil);

	console.log(idPerfil);

	$.ajax({

		url:"ajax/perfiles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			
			$("#editarDescripcion").val(respuesta["descripcion"]);
			$("#idPerfil").val(respuesta["perfil"]);

			$('#editarmConfiguraciones').bootstrapToggle(respuesta["menuconfiguraciones"]);
			$('#editarsmDatosEmpresa').bootstrapToggle(respuesta["datosempresa"]);
			$('#editarsmUsuarios').bootstrapToggle(respuesta["usuarios"]);
			$('#editarsmPerfiles').bootstrapToggle(respuesta["perfiles"]);
			$('#editarsmConfiguracionCorreo').bootstrapToggle(respuesta["configuracioncorreo"]);
			$('#editarsmBitacora').bootstrapToggle(respuesta["bitacora"]);

			$('#editarsmClientes').bootstrapToggle(respuesta["clientes"]);
			$('#editarsmProductos').bootstrapToggle(respuesta["productos"]);
			$('#editarsmCategorias').bootstrapToggle(respuesta["categorias"]);

			$('#editarmCotizaciones').bootstrapToggle(respuesta["menucotizaciones"]);
			$('#editarsmCotizaciones').bootstrapToggle(respuesta["cotizaciones"]);
			$('#editarsmAdministraCotizaciones').bootstrapToggle(respuesta["administrarcotizaciones"]);
			$('#editarsmModificarCotizaciones').bootstrapToggle(respuesta["modificarcotizaciones"]);
			$('#editarsmEliminarCotizaciones').bootstrapToggle(respuesta["eliminarcotizaciones"]);

			$('#editarmVentas').bootstrapToggle(respuesta["menuventas"]);
			$('#editarsmVentas').bootstrapToggle(respuesta["ventas"]);
			$('#editarsmAdministraVentas').bootstrapToggle(respuesta["administrarventas"]);
			$('#editarsmModificarVentas').bootstrapToggle(respuesta["modificarventas"]);
			$('#editarsmEliminarVentas').bootstrapToggle(respuesta["eliminarventas"]);
			$('#editarsFacturacionElectronica').bootstrapToggle(respuesta["facturacionelectronica"]);
			$('#editarsmReportesVentas').bootstrapToggle(respuesta["reportesventas"]);

			$('#smEditarPagos').bootstrapToggle(respuesta["pagos"]);
			$('#smEditarHistoricoPagos').bootstrapToggle(respuesta["historicopagos"]);
			$('#smEditarImprimirPagos').bootstrapToggle(respuesta["imprimirpagos"]);
			$('#smEditarEliminarPagos').bootstrapToggle(respuesta["eliminarpagos"]);

			$('#editarCajasSuperiores').bootstrapToggle(respuesta["cajassuperiores"]);
			$('#editarGraficoGanancias').bootstrapToggle(respuesta["graficoganancias"]);
			$('#editarProductosMasVendidos').bootstrapToggle(respuesta["productosmasvendidos"]);
			$('#editarroductosAgregadosRecienteMente').bootstrapToggle(respuesta["productosagregadosrecientemente"]);

			$('#editarsmCostoProductos').bootstrapToggle(respuesta["costoproductos"]);

	





		}

	});

})



/*=============================================
ELIMINAR PERFIL
=============================================*/
$(".tablas").on("click", ".btnEliminarPerfil", function(){

  var idPerfil = $(this).attr("idPerfil");

  swal({
    title: '¿Está seguro de borrar el Perfil?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar perfil!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=perfiles&idPerfil="+idPerfil+"&eliminar=si";

    }

  })

})




