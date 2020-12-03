/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarproyecto", function(){

	var idproyecto = $(this).attr("idproyecto");

	var datos = new FormData();
	datos.append("idproyecto", idproyecto);

	$.ajax({
		url: "ajax/proyecto.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#Editarproyecto").val(respuesta["nombre"]);
			$("#idproyecto").val(respuesta["id_programacion_anual"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

	 var idCategoria = $(this).attr("idCategoria");

	 swal({
	 	title: '�Est� seguro de borrar la categor�a?',
	 	text: "�Si no lo est� puede cancelar la acci�n!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categor�a!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

	 	}

	 })

})