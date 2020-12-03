$(document).ready(function(){
  
 $('.dltBtn').click(function(e){
   
  e.preventDefault();
   
  var id = $(this).attr('data-id');
  var parent = $(this).parent("td").parent("tr");
   
  bootbox.dialog({
    message: "�Est�s seguro de eliminar el registro?",
    title: "<i class='fa fa-trash-o'></i> �Atenci�n!",
    buttons: {
    cancel: {
     label: "No",
     className: "btn-success",
     callback: function() {
     $('.bootbox').modal('hide');
     }
   },
    confirm: {
     label: "Eliminar",
     className: "btn-danger",
     callback: function() {
       
       
      $.ajax({
        
         
       url: 'eliminar',
       data: 'eliminar='+id
        
      })
      //Si todo ha ido bien...
      .done(function(response){
        
       bootbox.alert(response);
       parent.fadeOut('slow'); //Borra la fila afectada
        
      })
      .fail(function(){
        
       bootbox.alert('Algo ha ido mal. No se ha podido completar la acci�n.');
                
      })
              
     }
   }
    }
  });
   
   
 });
  
});