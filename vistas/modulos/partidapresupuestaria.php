<?php

/* if($_SESSION["clientes"] == "off"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}*/

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Partida Presupuestaria
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Partida Presupuestaria</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarpartidapresupuestaria">
          
          Agregar Partida Presupuestaria

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
		    <th style="width:10px">Código</th>
           <th>Descripción del Partida Presupuestaria</th>
           <th>Fecha </th> 
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $partidapresupuestaria = Controladorpartidapresupuestaria::ctrMostrarpartidapresupuestaria($item, $valor);

          foreach ($partidapresupuestaria as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>
					<td>'.$value["id_partida_presupuestaria"].'</td>
					<td>'.$value["codigopartida_presupuestaria"].'</td>
					<td>'.$value["desc_partida_presupuestaria"].'</td>
                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarmunicipio" data-toggle="modal" data-target="#modalEditarmunicipio" id_municipio="'.$value["id_municipio"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarmunicipio" id_municipio="'.$value["id_municipio"].'"><i class="fa fa-times"></i></button>';

                      }

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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarpartidapresupuestaria" class="modal fade" role="dialog">
 <?php
 $itemUsuario = "id"; //Usuario
 $valorUsuario = $venta["id_vendedor"]; 
 $fecha_actual = date("yy/m/d");
				?>	
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Partid Presupuestaria</h4>

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

                <input type="text" class="form-control input-lg" name="nuevopartidapresupuestaria" placeholder="Ingresar Código" required>

              </div>

            </div>
			<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

     <input type="text" class="form-control input-lg" name="desc_partida_presupuestaria" placeholder="Ingresar Descipción" required>

              </div>

            </div>
 <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control" id="id_usuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">

              </div>

            </div>
                  
      

           
             <!-- entrada de la fecha -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                 <input type="text" class="form-control pull-right" id="fecha" name="fecha" value="<?php echo $fecha_actual; ?>"  placeholder="Fecha" readonly>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Partida Presupuestaria</button>

        </div>

      </form>

      <?php
		
        $crearpartidapresupuestria = new Controladorpartidapresupuestria();
        $crearpartidapresupuestria -> ctrCrearpartidapresupuestria();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarfuentefinanciamiento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Municipio</h4>

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

                <input type="text" class="form-control input-lg" name="editarmunicipio" id="editarmunicipio" required>
                <input type="hidden" id="idmunicipio" name="idmunicipio">
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

        $editarmunicipio = new Controladormunicipio();
        $editarmunicipio -> ctrEditarmunicipio();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarmunicipio = new Controladormunicipioo();
  $eliminarmunicipio -> ctrEliminarmunicipio();

?>


