/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarfuentefinanciamiento", function(){

	var id_fuente_financiamiento = $(this).attr("id_fuente_financiamiento");

	var datos = new FormData();
    datos.append("id_fuente_financiamiento", id_fuente_financiamiento);

    $.ajax({

      url:"ajax/fuentefinanciamiento.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#id_fuente_financiamiento").val(respuesta["id_fuente_financiamiento"]);
	       $("#editarCliente").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarEmail").val(respuesta["email"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
           $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarfuentefinanciamiento", function(){

	var id_fuente_financiamiento = $(this).attr("id_fuente_financiamiento");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=fuentefinanciamiento&id_fuente_financiamiento="+id_fuente_financiamiento;
        }

  })

})