<?php
$user = 'postgres';
$passwd = '123';
$db = 'contrata';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";

$connexion = pg_connect("host=localhost dbname=contrata user=postgres password=123")
or die ('no hay conxeion:' .pg_last_error());
$x1=$_GET['codigo'];
$x2=$_GET['variable2'];
//echo $x2;


$sql="delete from programacion_compras_move1 where id_programacion_anual_move = '$x1'";
							 //var_dump($sql);
   // exit($sql);
							
														
							$stmt = pg_query($sql);  
               				if($stmt) {             //que te guarde cada valor
							//echo 'Location: http://localhost:8080/asnc/index.php?ruta=item&iditem=20';
                             echo'<script>

				swal({
					  type: "success",
					  title: " ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "index.php?ruta=veritemaccion&iditem=+'.$_GET['variable2'].'";

								}
							})

				</script>';

                } else{
                    echo '<div class="alert alert-danger"><strong>Oh no Error!</strong>Registro no Guardado</div>'; 
                    die( print_r( pg_last_error(), true));
                }           
                 
			                     
?> 

