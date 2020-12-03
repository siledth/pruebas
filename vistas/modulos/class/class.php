 <?php 
class Trabajo
{
	private $dbh;
	private $n;
	private $k;
	private $p;
	private $e;
	private $m;
	private $a;
	private $b;//consultar los iten que se estan evluando
	private $c;//consultar los iten que se estan evluando
	private $d;//consultar los iten que se estan evluando
	private $f; //consultar los iten que se estan evluando contratista
	private $cla; //consultar las clasificaciones.
	private $trif; //consultar las TIPORIF.
	private $onapre; //consultar las onaprecode
	private $desorg;
	public function __construct()
	{
	
	$this->dbh=new PDO('pgsql:host=localhost;port=5432;dbname=contrata',"postgres","123");
	$this->n=array();
	}
 public function validar() //consultar validar
{	
$username = $_GET['opcion'];
	$sql= "select id_entes  from  consul_dante WHERE id_entes = '".$username."';";
		foreach ($this->dbh->query($sql)as $row)
		{
			$this->n[]=$row;
			
		}
	
	
	 		return $this->n;
			$this->dbh=null;
	}	/*$nombre=$_POST["nombre"];
$res="SELECT * FROM ORCM_Prod_Producto where nombre='".$_POST["nombre"]."'";
		$re = sqlsrv_query($conn, $res );
		while ($f=sqlsrv_fetch_array( $re)) {
		$arreglo[]=array('nombre'=>$f['nombre']);
	}
	if(isset($arreglo)){
		$_SESSION['nombre']=$arreglo;
		header("Location: ./agregarproducto.php?error=datos no validos");
	}else{
		
		
	{	//self::set_names (); consulta de ente postgresql
		$sql= "select id_entes  from  consul_dante ;";
		foreach ($this->dbh->query($sql)as $row)
		{
			$this->n[]=$row;
			
		}
	 		return $this->n;
			$this->dbh=null;
	}
*/
	public function ente() //consultar ente 
	{
		//self::set_names (); consulta de ente postgresql
		$sql= "select id_entes, nombre from entes;";
		foreach ($this->dbh->query($sql)as $row)
		{
			$this->n[]=$row;
			
		}
	 		return $this->n;
			$this->dbh=null;
	}

public function ente2() 
	{
	if(isset($_GET['opcion'])){  //nos recoge los datos del select y los mete en los imput
	
	
	$DOC = $_GET['opcion'];
	
	//$h=$_GET;
 //print_r($DOC);
 $sql1= "select * from entes  WHERE id_entes = '".$DOC."';";
		foreach ($this->dbh->query($sql1)as $row1)
		{
			$this->p[]=$row1;
			
		}
	 		return $this->p;
			$this->dbh=null;
			}
		
		
 }
 
 	public function enteydante() //consultar ente y dante para evaluacion
	{
		//self::set_names (); consulta de ente postgresql
		$sql= "select id_entes, nombre from  consul_dante ;";
		foreach ($this->dbh->query($sql)as $row)
		{
			$this->n[]=$row;
			
		}
	 		return $this->n;
			$this->dbh=null;
	}

public function enteydate2() 
	{
	if(isset($_POST['opcion'])){  //nos recoge los datos del select y los mete en los imput
	
	
	$DOC = $_POST['opcion'];
//var_dump($DOC);
	  // exit($DOC);
	//$h=$_GET;
 print_r($DOC);
 $sql1= "select * from consul_dante  WHERE id_entes = '".$DOC."';";
		foreach ($this->dbh->query($sql1)as $row1)
		{
			$this->p[]=$row1;
			
		}
	 		return $this->p;
			$this->dbh=null;
			}
		
		
 }
	public function estado() //consultar estado 
	{
		//self::set_names (); consulta de ente postgresql
		$sql5= "select id_estado, nombre from estado;";
		foreach ($this->dbh->query($sql5)as $row3)
		{
			$this->e[]=$row3;
			
		}
	 		return $this->e;
			$this->dbh=null;
	}
	
	public function clasificacion() //consultar clasificacion  
	{
		//self::set_names (); consulta de ente postgresql
		$sql14= "select id_clasificacion, desc_clasificacion from clasificacion;";
		foreach ($this->dbh->query($sql14)as $row14)
		{
			$this->cla[]=$row14;
			
		}
	 		return $this->cla;
			$this->dbh=null;
	}
	
	public function modalidad_contratacion() //consultar modalidad_contratacion clave 2  
	{
		//self::set_names (); consulta de ente postgresql
		$sql6= "select id_modalidad_contratacion, desc_modalidad_contratacion from modalidad_contratacion;";
		foreach ($this->dbh->query($sql6)as $row6)
		{
			$this->m[]=$row6;
			
		}
	 		return $this->m;
			$this->dbh=null;
	}
	public function actvcomercial() //consultar actvcomercial clave 2  
	{
		//self::set_names (); consulta de ente postgresql
		$sql7= "select id_actvcomercial, desc_actvcomercial from actvcomercial;";
		foreach ($this->dbh->query($sql7)as $row7)
		{
			$this->a[]=$row7;
			
		}
	 		return $this->a;
			$this->dbh=null;
	}
		public function contenido_evaluacion_desempeno1() //consultar los iten que se estan evluando   
	{
		$sql8= "select desc_contenido_evaluacion_desempeno from  contenido_evaluacion_desempeno
where id_contenido_evaluacion_desempeno='4';";
		foreach ($this->dbh->query($sql8)as $row8)
		{
			$this->b[]=$row8;
			
		}
	 		return $this->b;
			$this->dbh=null;
	}
		public function contenido_evaluacion_desempeno2() //consultar los iten que se estan evluando   
	{
		$sql9= "select desc_contenido_evaluacion_desempeno from  contenido_evaluacion_desempeno
where id_contenido_evaluacion_desempeno='1';";
		foreach ($this->dbh->query($sql9)as $row9)
		{
			$this->c[]=$row9;
			
		}
	 		return $this->c;
			$this->dbh=null;
	}
		public function contenido_evaluacion_desempeno3() //consultar los iten que se estan evluando   
	{
		$sql10= "select desc_contenido_evaluacion_desempeno from  contenido_evaluacion_desempeno
where id_contenido_evaluacion_desempeno='2';";
		foreach ($this->dbh->query($sql10)as $row10)
		{
			$this->d[]=$row10;
			
		}
	 		return $this->d;
			$this->dbh=null;
	}
		public function contenido_evaluacion_desempeno4() //consultar los iten que se estan evluando   
	{
		$sql11= "select desc_contenido_evaluacion_desempeno from  contenido_evaluacion_desempeno
where id_contenido_evaluacion_desempeno='3';";
		foreach ($this->dbh->query($sql11)as $row11)
		{
			$this->f[]=$row11;
			
		}
	 		return $this->f;
			$this->dbh=null;
	}
		public function trif() //consultar los iten rif   
	{
		$sql15= "select id_rif, desc_rif from tipo_rif;";
		foreach ($this->dbh->query($sql15)as $row15)
		{
			$this->trif[]=$row15;
			
		}
	 		return $this->trif;
			$this->dbh=null;
	}
		public function onapre() //consultar los onapre   
	{
		$sql16= "select id_codigo_onapre, cod_onapre from codigo_onapre;";
		foreach ($this->dbh->query($sql16)as $row16)
		{
			$this->onapre[]=$row16;
			
		}
	 		return $this->onapre;
			$this->dbh=null;
	}
	
			public function desorg() //consultar los iten rif   
	{
		$sql17= "select id_ente_adscrito, desc_organo_adscrito from organo_adscrito;";
		foreach ($this->dbh->query($sql17)as $row17)
		{
			$this->desorg[]=$row17;
			
		}
	 		return $this->desorg;
			$this->dbh=null;
	}

	public function add()//solicitud cuenta dante nuevo
		{
			//insert postgresql
		//print_r($_POST); // pruebo que recoge datos
		
		if(empty($_POST["maxauto"]) or empty($_POST["maxcargo"]))
		{
		     header("location: clave.php?m=1");
			 exit;
		}
		//echo "hola"; //traza aca veo si la validacion de campos anterior se cumple.
		$sql="insert into reg values (default,?,?,?,?,?,?,?,?,?,?,?,?,?,'cuentadante',1,2,1,now());";
		   $stmt=$this->dbh->prepare($sql);
		   $stmt->bindValue(1,$_POST["id"], PDO::PARAM_STR);
		   $stmt->bindValue(2,$_POST["maxauto"], PDO::PARAM_STR);
		   $stmt->bindValue(3,$_POST["maxcargo"], PDO::PARAM_STR);
		   $stmt->bindValue(4,$_POST["nombre"], PDO::PARAM_STR);
		   $stmt->bindValue(5,$_POST["cedula"], PDO::PARAM_STR);
		   $stmt->bindValue(6,$_POST["cargo"], PDO::PARAM_STR);
		   $stmt->bindValue(7,$_POST["telefono"], PDO::PARAM_STR);
		   $stmt->bindValue(8,$_POST["correo"], PDO::PARAM_STR);
		   $stmt->bindValue(9,$_POST["oficina"], PDO::PARAM_STR);
		   $stmt->bindValue(10,$_POST["fechadesin"], PDO::PARAM_STR);
		   $stmt->bindValue(11,$_POST["numergacet"], PDO::PARAM_STR);
		   $stmt->bindValue(12,$_POST["observ1"], PDO::PARAM_STR);
		   $stmt->bindValue(13,$_POST["clave"], PDO::PARAM_STR);
		   $stmt->bindValue(14,$_POST["perfil"], PDO::PARAM_STR);
		   $stmt->execute();
		   $this->dbh=null;
		   header("location: index.php");
		 }
		 
		 
		public function add2() // ingresa funcionarios claves
		{
			//insert postgresql
		//print_r($_POST); // pruebo que recoge datos
	
		if(empty($_POST["numergacet"]) or empty($_POST["fechadesin"]))
		{
		     header("location: clavle1.php?m=1");
			 exit;
		}// 4, 1, 'd', 'd', 'd', 3, 's', 3, 'c', 's', ?, ?, 'a', 22, 1, 1, 1, '1-1-2020'
		//echo "hola"; //traza aca veo si la validacion de campos anterior se cumple.
		  $t=0;
        for($i=0; $i<3;$i++){
		//print_r($_POST["nombre"][$i]);
		//.$_SESSION['datos'][$i][1].
		$sql2="insert into reg values (default, 2, 'd', 'd', ?, ?, ?, 3, 'c', 's', ?, ?, 'a', 22, ?,1,2,1,now());";
		   $stmt=$this->dbh->prepare($sql2);
		   $stmt->bindValue(1,$_POST["nombre"][$i], PDO::PARAM_STR);
		   $stmt->bindValue(1,$_POST["cedula"][$i], PDO::PARAM_STR);
		   $stmt->bindValue(1,$_POST["cargo"][$i], PDO::PARAM_STR);
		   $stmt->bindValue(1,$_POST["correo"][$i], PDO::PARAM_STR);
		   $stmt->bindValue(1,$_POST["telefono"][$i], PDO::PARAM_STR);
		   $stmt->bindValue(2,$_POST["fechadesin"], PDO::PARAM_STR);
		   $stmt->bindValue(3,$_POST["numergacet"], PDO::PARAM_STR);
		   $stmt->bindValue(14,$_POST["perfil"], PDO::PARAM_STR);
		  //var_dump($stmt);
	     // exit($stmt);
		   $stmt->execute();
		   $t++;
		   
		                 }
		   $this->dbh=null;
		   //header("location: clavle1.php?=2");*/
		 }
		  
		 
		 	 public function add4()// agrego entes nuevos 
		{
			//insert postgresql
	//print_r($_POST); // pruebo que recoge datos
	
		/*if(empty($_POST["nombre"]) or empty($_POST["id_clasificacion"]))
		{
		     header("location: reistroente.php?m=1");
			 exit;
		}*/
		
		$sql3="insert into entes values (default, ?, ?, ?, ?, 1, ?, ?, ?, ?, 'usuario', ?, ?, ?);";
		   $stmt=$this->dbh->prepare($sql3);
		    $stmt->bindValue(1,$_POST["nombre"], PDO::PARAM_STR);
           $stmt->bindValue(2,$_POST["id_clasificacion"], PDO::PARAM_STR);
		   $stmt->bindValue(3,$_POST["id_codio_onapre"], PDO::PARAM_STR);
		   $stmt->bindValue(4,$_POST["id_ente_adscrito"], PDO::PARAM_STR);
		   //$stmt->bindValue(5,$_POST["id_estado"], PDO::PARAM_STR);
		   $stmt->bindValue(5,$_POST["id_municipio"], PDO::PARAM_STR);
		   $stmt->bindValue(6,$_POST["rif"], PDO::PARAM_STR);
		   $stmt->bindValue(7,$_POST["tipo_rif"], PDO::PARAM_STR);
		   $stmt->bindValue(8,$_POST["siglas"], PDO::PARAM_STR);
		  // $stmt->bindValue(10,$_POST["desc_ente"], PDO::PARAM_STR);
		   $stmt->bindValue(9,$_POST["direccion_fiscal"], PDO::PARAM_STR);
		   $stmt->bindValue(10,$_POST["pagina_web"], PDO::PARAM_STR);
		   $stmt->bindValue(11,$_POST["correo"], PDO::PARAM_STR);
		    $stmt->execute();
		  // $t++;
		   $this->dbh=null;
		  // header("location: http://localhost/acontratarcn/index.php?mod=reistroente");
		 }
		  public function add5()// agrego evaluacion 
		{
		//print_r($_POST["id_entes"]);
			//insert postgresql
	//print_r($_POST); // pruebo que recoge datos
	
		/*if(empty($_POST["nombre"]) or empty($_POST["id_clasificacion"]))
		{
		     header("location: reistroente.php?m=1");
			 exit;
		}*/
		
		$sqla3="insert into evaluacion_desempeno values (default, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,now());";
		  
		   $stmt=$this->dbh->prepare($sqla3);
		   $stmt->bindValue(1,$_POST["id_entes"], PDO::PARAM_STR);
           $stmt->bindValue(2,$_POST["id_modalidad_contratacion"], PDO::PARAM_STR);
		   $stmt->bindValue(3,$_POST["fechainicio"], PDO::PARAM_STR);
		   $stmt->bindValue(4,$_POST["fechafin"], PDO::PARAM_STR);
		   $stmt->bindValue(5,$_POST["numprocedimiento"], PDO::PARAM_STR);
		   $stmt->bindValue(6,$_POST["numcontrato"], PDO::PARAM_STR);	  
		   $stmt->bindValue(7,$_POST["estado"], PDO::PARAM_STR);
		   $stmt->bindValue(8,$_POST["objprocedimiento"], PDO::PARAM_STR);
		   $stmt->bindValue(9,$_POST["id_actvcomercial"], PDO::PARAM_STR);
		   $stmt->bindValue(10,$_POST["monto"], PDO::PARAM_STR);
		   $stmt->bindValue(11,$_POST["desc_contenido_evaluacion_desempeno1"], PDO::PARAM_STR);
		   $stmt->bindValue(12,$_POST["a"], PDO::PARAM_STR);
		   $stmt->bindValue(13,$_POST["b"], PDO::PARAM_STR);
		   $stmt->bindValue(14,$_POST["r1"], PDO::PARAM_STR);
		   $stmt->bindValue(15,$_POST["observacion1"], PDO::PARAM_STR);
		   $stmt->bindValue(16,$_POST["desc_contenido_evaluacion_desempeno2"], PDO::PARAM_STR);
		   $stmt->bindValue(17,$_POST["c"], PDO::PARAM_STR);
		   $stmt->bindValue(18,$_POST["d"], PDO::PARAM_STR);
		   $stmt->bindValue(19,$_POST["r2"], PDO::PARAM_STR);
		   $stmt->bindValue(20,$_POST["observacion2"], PDO::PARAM_STR);
		   $stmt->bindValue(21,$_POST["desc_contenido_evaluacion_desempeno3"], PDO::PARAM_STR);
		   $stmt->bindValue(22,$_POST["e"], PDO::PARAM_STR);
		   $stmt->bindValue(23,$_POST["f"], PDO::PARAM_STR);
		   $stmt->bindValue(24,$_POST["r3"], PDO::PARAM_STR);
		   $stmt->bindValue(25,$_POST["observacion3"], PDO::PARAM_STR);
		   $stmt->bindValue(26,$_POST["desc_contenido_evaluacion_desempeno4"], PDO::PARAM_STR);
		   $stmt->bindValue(27,$_POST["g"], PDO::PARAM_STR);
		   $stmt->bindValue(28,$_POST["h"], PDO::PARAM_STR);
		   $stmt->bindValue(29,$_POST["r4"], PDO::PARAM_STR);
		   $stmt->bindValue(30,$_POST["observacion4"], PDO::PARAM_STR);
		   $stmt->bindValue(31,$_POST["m11"], PDO::PARAM_STR);
		   $stmt->bindValue(32,$_POST["m12"], PDO::PARAM_STR);
		   $stmt->bindValue(33,$_POST["notificacion"], PDO::PARAM_STR);
		   $stmt->bindValue(34,$_POST["medio"], PDO::PARAM_STR);
		   $stmt->bindValue(35,$_POST["numnotificacion"], PDO::PARAM_STR);
		   $stmt->bindValue(36,$_POST["fechanotificacion"], PDO::PARAM_STR);
		 
		   
		   
		//  var_dump($stmt);
	    //  exit($stmt);
		   $stmt->execute();
		  // $t++;
		   
		               
		   $this->dbh=null;
		  // header("location: http://localhost:8080/contrataciones1/reistroente.php");
		 }


 public function add8()// agrego comision
		{
			//insert postgresql
	//print_r($_POST); // pruebo que recoge datos
	
		/*if(empty($_POST["nombre"]) or empty($_POST["id_clasificacion"]))
		{
		     header("location: reistroente.php?m=1");
			 exit;
		}*/
		
		$sql33="insert into comision2 values (default, 1, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, now());";
		   $stmt=$this->dbh->prepare($sql33);
		    $stmt->bindValue(1,$_POST["nombrelegal1"], PDO::PARAM_STR);
           $stmt->bindValue(2,$_POST["cedulalegal1"], PDO::PARAM_STR);
		   $stmt->bindValue(3,$_POST["cargolegal1"], PDO::PARAM_STR);
		   $stmt->bindValue(4,$_POST["telefonolegal"], PDO::PARAM_STR);
		   $stmt->bindValue(5,$_POST["correo_electronicolegal"], PDO::PARAM_STR);
		   $stmt->bindValue(6,$_POST["nombre_apellidoeco"], PDO::PARAM_STR);
		   $stmt->bindValue(7,$_POST["cedulaeco"], PDO::PARAM_STR);
		   $stmt->bindValue(8,$_POST["cargoeco"], PDO::PARAM_STR);
		   $stmt->bindValue(9,$_POST["telefonoeco"], PDO::PARAM_STR);
		   $stmt->bindValue(10,$_POST["correo_electronicoeco"], PDO::PARAM_STR);
		   $stmt->bindValue(11,$_POST["nombre_apellidotec"], PDO::PARAM_STR);
		   $stmt->bindValue(12,$_POST["cedulatec"], PDO::PARAM_STR);
		   $stmt->bindValue(13,$_POST["cargotec"], PDO::PARAM_STR);
		   $stmt->bindValue(14,$_POST["telefonotec"], PDO::PARAM_STR);
		   $stmt->bindValue(15,$_POST["correo_electronicotec"], PDO::PARAM_STR);
		   $stmt->bindValue(16,$_POST["nombre_apellidosecr"], PDO::PARAM_STR);
		   $stmt->bindValue(17,$_POST["cedulasecre"], PDO::PARAM_STR);
		   $stmt->bindValue(18,$_POST["cargosecre"], PDO::PARAM_STR);
		   $stmt->bindValue(19,$_POST["telefonosecre"], PDO::PARAM_STR);
		   $stmt->bindValue(20,$_POST["correo_electronicosecre"], PDO::PARAM_STR);
		   $stmt->bindValue(21,$_POST["fecha_desinacion"], PDO::PARAM_STR);
		   $stmt->bindValue(22,$_POST["numero_gac"], PDO::PARAM_STR);
		    $stmt->execute();
		  // $t++;
		   $this->dbh=null;
		   header("location: http://localhost/acontratarcn/index.php?mod=index");
		 }



}
?>

