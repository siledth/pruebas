/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })// 

$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );


/*=============================================
AGREGA PRODUCTO CON EL LECTOR DEL CODIGO DE BARRAS
=============================================*/

function agregarProductoCodigoBarras(valor=""){

	//console.log(valor);

	//BUSCAR ID
	var datosLector = new FormData();
	datosLector.append("buscarCodigoBarras", "buscarCodigoBarras");
	datosLector.append("codigoBarras", valor);



	var idProducto ="";
	var categoria = "";

	  $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datosLector,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      		
      	    
      	    idProducto = respuesta["id"];
          	categoria = respuesta["id_categoria"];
          	console.log("respuesta",respuesta);
          	console.log("idProducto",idProducto); 


          	if(respuesta==false){
      			swal({
			      title: "El código no existe",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
			    $("#CodigoDeBarras").val("");
          		return;
          	} 

          	var minimoCompra = $(this).attr("minimoCOmpra");

	if (minimoCompra==""){
		minimoCompra=1;
	}
    
    lngContador=lngContador+1;

	 if (totalP[idProducto] == null) {
		totalP[idProducto]=0;
	}
    




	//$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idProducto", idProducto);
    datos.append("categoria", categoria);


     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      		console.log("respuesta",respuesta);
      	    var descripcion = respuesta["descripcion"];
          	var stock = respuesta["stock"];
          	var precio = respuesta["precio_venta"];

          	stockP[idProducto]=stock;



          	/*=============================================
          	EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          	=============================================*/

          	if((stock-totalP[idProducto]) == 0 &&  document.getElementById("TipoVenta").value!="COT"){

      			swal({
			      title: "No hay stock disponible",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

			    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

			    return;

          	}


          	if(lngContador>1){

          			var contadorProductos=0;


					//NOS TRAEMOS TODA LOS PRODUCTOS QUE HEMOS AGREGADO A LA VENTA
					var jsonProductos=$("#listaProductos").val();
					
					//LO AGREGAMOS A UN ARREGLO
					var myArr = JSON.parse(jsonProductos);
					

					//RECORREMOS TODO EL ARREGLO DE LOS ṔRODUCTOS AGREGADOS A LA VENTA
					$.each(myArr, function(i, item) {
						//console.log(myArr[i].renglon);

						//HACE LA SUMA DE LA CANTIDAD SI EL PRODUCTO ES EL MISMO AL QUE ESTAMOS MODIFICANDO Y SI ESTA EN DIFIRENTE RENGLON
						if(idProducto==myArr[i].id ){
							
							contadorProductos=Number(contadorProductos)+Number(myArr[i].cantidad);

				    	}
					});

					//VALIDA STOCK CON LO YA AGREGAMOS A LA VENTA MAS
					if(stockP[idProducto]<1+contadorProductos  &&  document.getElementById("TipoVenta").value!="COT"){
						$(this).val(stockP[idProducto]-contadorProductos);


						swal({
							title: "No hay stock disponible",
							type: "error",
							confirmButtonText: "¡Cerrar!"
						});


						return;
					}
          	} 





          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px" id="row'+lngContador+'">'+
          	'<div class="'+lngContador+'" id="renglonProducto"'+






             ' </div> ' +
			  '<!-- Descripción del producto -->'+
	          
	          '  <div class="col-xs-1" style="padding-right:0px">' +
              
              '             <div class="input-group"> ' +
  
               '<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idProducto+'"><STRONG>X</STRONG></button>'+

              '             </div>'+


               '           </div>'+

	          '<div class="col-xs-5" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	           

	              '<input type="text" id="nuevaDescripcionProducto"  class="form-control nuevaDescripcionProducto" renglon="'+lngContador+'" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'"  required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-2">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" step="any" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

	          '</div>' +
			  '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-2">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" step="any" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

	           '<!-- Precio unitario -->'+


	          '<div class="col-xs-2">'+

	          

	           '<input type="number" step="any" class="form-control nuevoPrecioUnitarioProducto" name="nuevoPrecioUnitarioProducto"  value="'+precio+'"  required>'+
	                 
	              //'<input type="text" class="form-control nuevoPrecioUnitarioProducto"  name="nuevoPrecioUnitarioProducto" value="'+precio+'"  required>'+
	
	             
	          '</div>'+


	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-2 ingresoPrecio" style="padding-left:0px" >'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" readonly precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'"  required>'+
	 
	            '</div>'+
	             
	          '</div>'+
	          			//'<button class="btn btn-success btnActivar" ><strong>1</strong></button>'+
	          '</div>'+





	        '</div>') 

	        // SUMAR TOTAL DE PRECIOS

	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 2);


			localStorage.removeItem("quitarProducto");

			totalP[idProducto]=totalP[idProducto]+1;
			stockP[idProducto]=stock;

			console.log(idProducto,totalP[idProducto])
			$("#CodigoDeBarras").val("");

      	}

     })


		}
	})



	
	
}


/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var categoria = $(this).attr("categoria");

	var minimoCompra = $(this).attr("minimoCOmpra");

	if (minimoCompra==""){
		minimoCompra=1;
	}
    
    lngContador=lngContador+1;

	 if (totalP[idProducto] == null) {
		totalP[idProducto]=0;
	}
    

    console.log(idProducto,totalP[idProducto]);


	//$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idProducto", idProducto);
    datos.append("categoria", categoria);


     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      		console.log("respuesta",respuesta);
      	    var descripcion = respuesta["descripcion"];
          	var stock = respuesta["stock"];
          	var precio = respuesta["precio_venta"];

          	stockP[idProducto]=stock;



          	/*=============================================
          	EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          	=============================================*/

          	if((stock-totalP[idProducto]) == 0 &&  document.getElementById("TipoVenta").value!="COT"){

      			swal({
			      title: "No hay stock disponible",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

			    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

			    return;

          	}


          	if(lngContador>1){

          			var contadorProductos=0;


					//NOS TRAEMOS TODA LOS PRODUCTOS QUE HEMOS AGREGADO A LA VENTA
					var jsonProductos=$("#listaProductos").val();
					
					//LO AGREGAMOS A UN ARREGLO
					var myArr = JSON.parse(jsonProductos);
					

					//RECORREMOS TODO EL ARREGLO DE LOS ṔRODUCTOS AGREGADOS A LA VENTA
					$.each(myArr, function(i, item) {
						//console.log(myArr[i].renglon);

						//HACE LA SUMA DE LA CANTIDAD SI EL PRODUCTO ES EL MISMO AL QUE ESTAMOS MODIFICANDO Y SI ESTA EN DIFIRENTE RENGLON
						if(idProducto==myArr[i].id ){
							
							contadorProductos=Number(contadorProductos)+Number(myArr[i].cantidad);

				    	}
					});

					//VALIDA STOCK CON LO YA AGREGAMOS A LA VENTA MAS
					if(stockP[idProducto]<1+contadorProductos  &&  document.getElementById("TipoVenta").value!="COT"){
						$(this).val(stockP[idProducto]-contadorProductos);


						swal({
							title: "No hay stock disponible",
							type: "error",
							confirmButtonText: "¡Cerrar!"
						});


						return;
					}
          	} 





          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px" id="row'+lngContador+'">'+
          	'<div class="'+lngContador+'" id="renglonProducto"'+






             ' </div> ' +
			  '<!-- Descripción del producto -->'+
	          
	          '  <div class="col-xs-1" style="padding-right:0px">' +
              
              '             <div class="input-group"> ' +
  
               '<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idProducto+'"><STRONG>X</STRONG></button>'+

              '             </div>'+


               '           </div>'+

	          '<div class="col-xs-5" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	           

	              '<input type="text" id="nuevaDescripcionProducto"  class="form-control nuevaDescripcionProducto" renglon="'+lngContador+'" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'"  required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-2">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" step="any" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

	          '</div>' +

	           '<!-- Precio unitario -->'+


	          '<div class="col-xs-2">'+

	          

	           '<input type="number" step="any" class="form-control nuevoPrecioUnitarioProducto" name="nuevoPrecioUnitarioProducto"  value="'+precio+'"  required>'+
	                 
	              //'<input type="text" class="form-control nuevoPrecioUnitarioProducto"  name="nuevoPrecioUnitarioProducto" value="'+precio+'"  required>'+
	
	             
	          '</div>'+


	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-2 ingresoPrecio" style="padding-left:0px" >'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" readonly precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'"  required>'+
	 
	            '</div>'+
	             
	          '</div>'+
	          			//'<button class="btn btn-success btnActivar" ><strong>1</strong></button>'+
	          '</div>'+





	        '</div>') 

	        // SUMAR TOTAL DE PRECIOS

	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 2);


			localStorage.removeItem("quitarProducto");

			totalP[idProducto]=totalP[idProducto]+1;
			stockP[idProducto]=stock;

			console.log(idProducto,totalP[idProducto])

      	}

     })

});

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

$(".tablaVentas").on("draw.dt", function(){

	if(localStorage.getItem("quitarProducto") != null){

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

		}


	}


})


/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	// LE RESTA -1 AL STOCK VENDIDO DE ESTA VENTA
	totalP[idProducto]=totalP[idProducto]-1;

	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];
	
	}else{

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({"idProducto":idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

	}

})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

var numProducto = 0;

$(".btnAgregarProducto").click(function(){

	numProducto ++;

	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

		url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	    	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-6" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

	              '<select class="form-control nuevaDescripcionProducto" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>'+

	              '<option>Seleccione el producto</option>'+

	              '</select>'+  

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3 ingresoCantidad">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="0" stock nuevoStock required>'+

	          '</div>' +

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+
	 
	            '</div>'+
	             
	          '</div>'+

	        '</div>');


	        // AGREGAR LOS PRODUCTOS AL SELECT 

	         respuesta.forEach(funcionForEach);

	         function funcionForEach(item, index){

	         	if(item.stock != 0){

		         	$("#producto"+numProducto).append(

						'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
		         	)

		         
		         }	         

	         }

        	 // SUMAR TOTAL DE PRECIOS

    		sumarTotalPrecios()

    		// AGREGAR IMPUESTO
	        
	        agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 2);


      	}

	})

})

/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();

	var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");

	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);


	  $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	     $(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-nuevaCantidadProducto);
      	    $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
      	    $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);

  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

      	}

      })
      
})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta ").on("change", "input.nuevaCantidadProducto", function(){
	

	var nombreDiv = $(this).parent().parent().parent().children();

	var idProducto1 = $(".formularioVenta ." +nombreDiv.attr("class")+" input.nuevaDescripcionProducto").attr("idProducto");

	var renglon= $(".formularioVenta ." +nombreDiv.attr("class")+" input.nuevaDescripcionProducto").attr("renglon");

	var contadorProductos=0;

	console.log($("#listaProductos").val());
	//NOS TRAEMOS TODA LOS PRODUCTOS QUE HEMOS AGREGADO A LA VENTA
	var jsonProductos=$("#listaProductos").val();
	
	//LO AGREGAMOS A UN ERREGLO
	var myArr = JSON.parse(jsonProductos);
	

	//RECORREMOS TODO EL ARREGLO DE LOS ṔRODUCTOS AGREGADOS A LA VENTA
	$.each(myArr, function(i, item) {
		//console.log(myArr[i].renglon);

		//HACE LA SUMA DE LA CANTIDAD SI EL PRODUCTO ES EL MISMO AL QUE ESTAMOS MODIFICANDO Y SI ESTA EN DIFIRENTE RENGLON
		if(idProducto1==myArr[i].id && ((myArr[i].renglon)!=renglon)  ){
			
			contadorProductos=Number(contadorProductos)+Number(myArr[i].cantidad);

    	}
	});



	//VALIDA STOCK CON LO YA AGREGAMOS A LA VENTA MAS
	if(stockP[idProducto1] < Number($(this).val())+Number(contadorProductos)){
		$(this).val(Number(stockP[idProducto1])-Number(contadorProductos));
		return;
	}

	$(".formularioVenta ." +nombreDiv.attr("class")+" input.nuevoPrecioProducto").val($(this).val()*$(".formularioVenta ."+ nombreDiv.attr("class")+" input.nuevoPrecioUnitarioProducto").val());
	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()



})


/*=============================================
MODIFICAR EL PRECIO
=============================================*/

$(".formularioVenta").on("change", "input.nuevoPrecioUnitarioProducto", function(){

	var nombreDiv = $(this).parent().parent().parent().children();

    //$("#nuevoImpuestoVenta").val(0);
	$(".formularioVenta ." +nombreDiv.attr("class")+" input.nuevoPrecioProducto").val($(this).val()*$(".formularioVenta ." +nombreDiv.attr("class")+"  input.nuevaCantidadProducto").val());

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

    
})



/*=============================================
MODIFICAR LA DESCRIPCION
=============================================*/

$(".nuevaDescripcionProducto").keyup (function(){


	listarProductos()


    
})


window.addEventListener("keyup", function (event) {

  $(".nuevaDescripcionProducto").trigger("change")
  
  listarProductos()
  


},false);




/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPrecios(){

	var precioItem = $(".nuevoPrecioProducto");
	
	var arraySumaPrecio = [];  

	for(var i = 0; i < precioItem.length; i++){

		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		
		 
	}

	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);

	//SUBTOTAL
	$("#nuevoSubTotalVenta").val(Number(sumaTotalPrecio));
	$("#subTotalVenta").val(Number(sumaTotalPrecio));
	$("#nuevoSubTotalVenta").attr("total",Number(sumaTotalPrecio));

	$("#nuevoSubTotalVenta").number(true,2)


}

/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

function agregarImpuesto(){

	var impuesto = $("#nuevoImpuestoVenta").val();
	var precioTotal = $("#nuevoTotalVenta").attr("total");
	var subTotal=Number(precioTotal);

	var precioImpuesto = Number(precioTotal * impuesto/100);

	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
	
	$("#nuevoTotalVenta").val(totalConImpuesto);

	$("#totalVenta").val(totalConImpuesto);

	$("#nuevoPrecioImpuesto").val(precioImpuesto);

	$("#nuevoPrecioNeto").val(precioTotal);
}

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

$("#nuevoImpuestoVenta").change(function(){

	agregarImpuesto();

});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

$("#nuevoTotalVenta").number(true, 2);
$("#nuevoSubTotalVenta").number(true,2)
$("#nuevoImpuestoVenta").number(true,2)

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

$(function () {
  $('#modalMetodoDePago').on('shown.bs.modal', function (e) {
    $('.focus').focus();
  })
});


$("#nuevoMetodoPago").change(function(){

	var metodo = $(this).val();

	if(metodo == "Efectivo"){

		$(this).parent().parent().removeClass("col-xs-6");

		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

			 '<div class="col-xs-4">'+ 

			 	'<div class="input-group">'+ 

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

			 		'<input type="text" class="form-control focus" id="nuevoValorEfectivo"   placeholder="000000" required>'+

			 	'</div>'+

			 '</div>'+

			 '<div class="col-xs-4 " id="capturarCambioEfectivo" style="padding-left:0px">'+

			 	'<div class="input-group">'+

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+

			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="000000" readonly required>'+

			 	'</div>'+

			 '</div>'

		 )

		// Agregar formato al precio

		$('#nuevoValorEfectivo').number( true, 2);
      	$('#nuevoCambioEfectivo').number( true, 2);


      	// Listar método en la entrada
      	listarMetodos();
      	$("#nuevoValorEfectivo").focus();

	}else{

		$(this).parent().parent().removeClass('col-xs-4');

		$(this).parent().parent().addClass('col-xs-4');

		 $(this).parent().parent().parent().children('.cajasMetodoPago').html(

		 	
		 	 '<div class="col-xs-4">'+ 

			 	'<div class="input-group">'+ 

			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 

			 		'<input type="text" class="form-control focus" id="nuevoValorEfectivo" placeholder="000000" required>'+

			 	'</div>'+

			 '</div>'+

		 	'<div class="col-xs-4" style="padding-left:0px">'+
                        
                '<div class="input-group">'+
                     
                  '<input type="number" min="0" class="form-control" name="nuevoCodigoTransaccion" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
                       
                  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
                  
                '</div>'+

              '</div>')

		listarMetodos();
		$("#nuevoValorEfectivo").focus();


	}

	

})

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/
$(".metodoPago").on("keyup", "input#nuevoValorEfectivo", function(){


	
	var efectivo = $(this).val();


	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	if( Number(efectivo) < Number($('#nuevoTotalVenta').val())){
		cambio=0;
	}

	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	nuevoCambioEfectivo.val(cambio);



})

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/
$(".metodoPago").on("change", "input#nuevoCodigoTransaccion", function(){

	// Listar método en la entrada
     listarMetodos()


})


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	var precioUnitario = $(".nuevoPrecioUnitarioProducto");

	

	var renglon=  $(this).parent().parent().parent().children();

	for(var i = 0; i < descripcion.length; i++){



		listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
							  "renglon" :  $(descripcion[i]).attr("renglon"), 	
							  "descripcion" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "stock" : $(cantidad[i]).attr("nuevoStock"),
							  "precio" : $(precioUnitario[i]).val(),
							  "total" : $(precio[i]).val()})

	}

	$("#listaProductos").val(JSON.stringify(listaProductos)); 

}

/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

function listarMetodos(){

	var listaMetodos = "";

	if($("#nuevoMetodoPago").val() == "Efectivo"){

		$("#listaMetodoPago").val("Efectivo");

	}else{

	

		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

	}

}

/*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEditarVenta", function(){

	var idVenta = $(this).attr("idVenta");

	window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;


})

/*=============================================
BOTON EDITAR COTIZACION
=============================================*/
$(".tablas").on("click", ".btnEditarCotizacion", function(){

	var idVenta = $(this).attr("idVenta");



	window.location = "index.php?ruta=editar-cotizacion&idVenta="+idVenta;


})

/*=============================================
BOTON item
=============================================*/
$(".tablas").on("click", ".btnitem", function(){

	var iditem = $(this).attr("iditem");



	window.location = "index.php?ruta=item&iditem="+iditem;


})
/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

function quitarAgregarProducto(){

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductos = $(".quitarProducto");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaVentas tbody button.agregarProducto");




	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for(var i = 0; i < idProductos.length; i++){

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idProductos[i]).attr("idProducto");
		
		//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
		for(var j = 0; j < botonesTabla.length; j ++){

			if($(botonesTabla[j]).attr("idProducto") == boton){

				$(botonesTabla[j]).removeClass("btn-primary agregarProducto");
				$(botonesTabla[j]).addClass("btn-default");

			}
		}

	}
	
}

/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

$('.tablaVentas').on( 'draw.dt', function(){

	quitarAgregarProducto();

})


/*=============================================
BORRAR VENTA
=============================================*/
$(".tablas").on("click", ".btnEliminarVenta", function(){

  var idVenta = $(this).attr("idVenta");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
        }

  })

})

/*=============================================
BORRAR COTIZACION
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacion", function(){

  var idVenta = $(this).attr("idVenta");

  swal({
        title: '¿Está seguro de borrar la cotizacion?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cotizacion!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=administrarcotizaciones&idVenta="+idVenta;
        }

  })

})


/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function(){

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta, "_blank");

})


/*=============================================
IMPRIMIR COTIZACIONES
=============================================*/

$(".tablas").on("click", ".btnImprimirCotizacion", function(){

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/reportex.php?codigo="+codigoVenta, "_blank");

})



/*=============================================
ABRIR ARCHIVO XML EN NUEVA PESTAÑA
=============================================*/

$(".abrirXML").click(function(){

	var archivo = $(this).attr("archivo");
	window.open(archivo, "_blank");


})


