<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		    <div class="user-panel">
		<div class="pull-left image">
		 
			  <?php

			if($_SESSION["foto"] != ""){

				echo '<img src="'.$_SESSION["foto"].'" class="img-circle" alt="User Image">';

			}else{


				echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">';

			}

			?>
			  
			  
		</div>
		<div class="pull-left info">
		  <p><?php  echo $_SESSION["nombre"]; ?></p>
		  <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
		</div>
	      </div>
			 <!-- search form -->
	      <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
		  <input type="text" name="search" id="search" class="form-control search-menu-box" placeholder="Buscar...">
		</div>
	      </form>
		
		<?php

				
		//MENU COTIZACONES
		
		if($_SESSION["menucotizaciones"] == "on"){
			echo '<li '.strMenuActivo($_GET["ruta"],"crearprogramacion").strMenuActivo($_GET["ruta"],"administrarprogramacion").' class="treeview">

					<a href="#">

						<i class="fa fa-tty"></i>
						
						<span>Programación Anual</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>
					<ul class="treeview-menu">';


					if($_SESSION["cotizaciones"] == "on"){
					echo '<li>

						<a href="programacionanual" accesskey="c">
							
							<i class="fa fa-file"></i>
							<span>Agregar Programación <br> Anual</span>

						</a>

					</li>';
				}

				if($_SESSION["administrarcotizaciones"] == "on"){
					echo '	<li>

							<a href="administrarprogamacion" accesskey="x">
								
								<i class="fa fa-check-circle"></i>
								

							</a>

						</li>';
				}
				

			echo '	
			</ul>
	
	</li>
			';
		}
		if($_SESSION["menucotizaciones"] == "on"){
			echo '<li '.strMenuActivo($_GET["ruta"],"clave").strMenuActivo($_GET["ruta"],"administrarprogramacion").' class="treeview">

					<a href="#">

						<i class="fa fa-tty"></i>
						
						<span>Solicitar clave</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>
					<ul class="treeview-menu">';


				if($_SESSION["cotizaciones"] == "on"){
					echo '<li>

						<a href="clave" accesskey="c">
							
							<i class="fa fa-file"></i>
							<span>Solicitar Clave</span>

						</a>

					</li>';
				}

				if($_SESSION["administrarcotizaciones"] == "on"){
					echo '	<li>

							<a href="administrarprogramacion" accesskey="x">
								
								<i class="fa fa-check-circle"></i>
								<span>Ver Programación</span>

							</a>

						</li>';
				}

			echo '	
			</ul>
	
	</li>
			';
		}

		if($_SESSION["menuventas"] == "on" ){

			echo '<li '.strMenuActivo($_GET["ruta"],"ventas").' class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">';
					
				if($_SESSION["administrarventas"] == "on" ){
					echo	'<li>

							<a href="ventas">
								
								<i class="fa fa-circle-o"></i>
								<span>Administrar ventas</span>

							</a>

						</li>';

				}

					
				if($_SESSION["ventas"] == "on" ){
					echo '<li>

						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear venta</span>

						</a>
						</li>';
					}
						
				if($_SESSION["facturacionelectronica"] == "on" ){
						echo '<li>
							<a href="facturacionElectronica">
							
							<i class="fa fa-circle-o"></i>
							<span>Facturación Electronica</span>

						</a>

					</li>';
				}


				if("on" == "on" ){
						echo '<li>
							<a href="ventasProductos">
							
							<i class="fa fa-circle-o"></i>
							<span>Rep Ventas por producto</span>

						</a>

					</li>';
				}

					if($_SESSION["reportesventas"] == "on"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';
		}
		




		if($_SESSION["categorias"] == "on"){

		

		}

		if($_SESSION["productos"] == "on"){

			echo '<li '.strMenuActivo($_GET["ruta"],"productos").'>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>CCNU</span>

				</a>

			</li>';
		}

	

		if($_SESSION["clientes"] == "on"){

			

		}

		if($_SESSION["menuconfiguraciones"] == "on"){
			echo '<li '.strMenuActivo($_GET["ruta"],"datosempresa").strMenuActivo($_GET["ruta"],"usuarios").' class="treeview">

					<a href="#">

						<i class="fa fa-cogs"></i> 
						<span>Configuraciones</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

				<ul class="treeview-menu">';

				if($_SESSION["datosempresa"] == "on"){
					echo '

						<li '.strMenuActivo($_GET["ruta"],"datosempresa").'>

							<a href="datosEmpresa">

								<i class="fa fa-building-o"></i>
								<span>Datos Empresa</span>
							</a>
						
						</li>';
				}



				if($_SESSION["usuarios"] == "on"){
					echo '

					 <li '.strMenuActivo($_GET["ruta"],"usuarios").'>

						<a href="usuarios">

							<i class="fa fa-user"></i>
							<span>Usuarios</span>

						</a>

					</li> ';

				}

				
				if($_SESSION["perfiles"] == "on"){
					echo '
					

					<li '.strMenuActivo($_GET["ruta"],"perfiles").'>

							<a href="perfiles">

								<i class="fa fa-users"></i>
								<span>Perfiles</span>

							</a>

						</li>';
				}


				if($_SESSION["configuracioncorreo"] == "on"){
					
					
				}

			if($_SESSION["bitacora"] == "on"){	
				echo '
					';
				}

				echo '
				</ul>' ;

		
		}


if($_SESSION["menuconfiguraciones"] == "on"){
			echo '<li '.strMenuActivo($_GET["ruta"],"datosempresa").strMenuActivo($_GET["ruta"],"usuarios").' class="treeview">

					<a href="#">

						<i class="fa fa-cogs"></i> 
						<span>Parametros</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

				<ul class="treeview-menu">';

			
				if($_SESSION["usuarios"] == "on"){
					echo '

					 <li '.strMenuActivo($_GET["ruta"],"usuarios").'>

						<a href="partidapresupuestaria">

							<i class="fa fa-user"></i>
							<span>Partida Presupuestaria</span>

						</a>

					</li> ';

				}

				if($_SESSION["usuarios"] == "on"){
					echo '

					 <li '.strMenuActivo($_GET["ruta"],"usuarios").'>

						<a href="usuarios">

							<i class="fa fa-user"></i>
							<span>Fuente Financiamiento</span>

						</a>

					</li> ';

				}
				
				if($_SESSION["perfiles"] == "on"){
					echo '
					

					<li '.strMenuActivo($_GET["ruta"],"perfiles").'>

							<a href="municipio">

								<i class="fa fa-users"></i>
								<span>Municipios</span>

							</a>

						</li>';
				}
	
				if($_SESSION["perfiles"] == "on"){
					echo '
					

					<li '.strMenuActivo($_GET["ruta"],"perfiles").'>

							<a href="perfiles">

								<i class="fa fa-users"></i>
								<span>Acción Centralizada</span>

							</a>

						</li>';
				}

	if($_SESSION["perfiles"] == "on"){
					echo '
					

					<li '.strMenuActivo($_GET["ruta"],"perfiles").'>

							<a href="perfiles">

								<i class="fa fa-users"></i>
								<span>Estados</span>

							</a>

						</li>';
				}


				
			if($_SESSION["bitacora"] == "on"){	
				echo '
					 <li '.strMenuActivo($_GET["ruta"],"bitacora").'>

						<a href="bitacora">

							<i class="fa fa-navicon"></i>
							<span>Activiad Comercial</span>

						</a>

					</li>';
				}

				echo '
				</ul>' ;

		
		}



		?>

		</ul>

	 </section>

</aside>

<script> 


	$(document).ready(function () {


	$("#search").on("keyup", function () {
	if (this.value.length > 0) {   
	  $(".sidebar-menu li").hide().filter(function () {
	    return $(this).text().toLowerCase().indexOf($("#search").val().toLowerCase()) != -1;
	  }).show(); 
	}  
	else { 
	  $(".sidebar-menu li").show();
	}
	}); 

	});

</script> 


