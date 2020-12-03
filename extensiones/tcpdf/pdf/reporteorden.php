<?php
$user = 'postgres';
$passwd = '123';
$db = 'contrata';
$port = 5432;
$host = 'localhost';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
//?&gt;
$connexion = pg_connect("host=localhost dbname=contrata user=postgres password=123")
or die ('no hay conxeion:' .pg_last_error());
require("fpdf/fpdf.php");
$nombre=$_POST['nombre'];
$codigo=$_POST['Codigo'];
$iditm=$_POST['id'];
//$numerocompra=$_POST['numerocompra'];


//$referencia1 = $_POST['referencia'];
//$referencia = utf8_decode($referencia1);

class PDF extends FPDF
{

//El metodo para crear el encabezado
function Header()
  {
  global $referencia;
  
    //Logo
	
     // $this->Image("454.jpg" , 10 ,22, 20 , 20 , "jpg" );
	
    //Arial bold 15
    $this->SetFont('Arial','B',9);
    //Movernos a la derecha
    $this->Cell(90);
    //Título 
     $this->Cell(30,30,'Nombre del Organismo o Ente:     '.$_POST['nombre'],0,0,'L');   $this->Ln(1);

	$this->Ln(4);
	$this->Cell(100);
	$this->Cell(60,30,'Codigo ONAPRE:     '.$_POST['Codigo'],0,0,'L');           
	$this->Ln(4);    
	 $this->Cell(90);
		 $this->Cell(60,30,'Rif del Organismo o Ente:     '.$_POST['rif'],0,0,'L');       
		 $this->Ln(4);
	  $this->Cell(100);
	 	 $this->Cell(60,30,'Estatus:     '.$_POST['estatus'],0,0,'L'); 
	      
	 $this->Ln(4);

	
	 $this->Ln(4); $this->Cell(200); $this->Cell(30,30,"FECHA DE IMPRESIÓN: ".date("j-m-Y"),0,0,'L');   
	       $this->Cell(100);
	$this->Ln(4); $this->Cell(100);  $this->Cell(30,30,' Reporte de Acción Centralizadas  ' ,0,0,'L');   
	//$this->Cell(60,30, .$_POST['ano'],0); 
	
	$this->Ln(4);
    //Salto de línea
 $this->Ln(-1);
 $this->SetFont('Arial','',10);

 $this->Cell(150, 205, '   ', 0);$this->Ln(4);                                      
 $this->Cell(150, 205, '  , ', 0); 
 $this->Ln(3);
 $this->Ln(1);
 $this->Cell(150, 205, ' ', 0);
 $this->Ln(4);
 $this->Cell(150, 205, '  ', 0);
 $this->Ln(2);
$this->Cell(160); $this->Cell(30,178,' ',0);   $this->Ln(0);  $this->Ln(1);
$this->Cell(160); $this->Cell(30,189,' ',0);   $this->Ln(1);
$this->Cell(160); $this->Cell(30,200,' ',0);   $this->Ln(1);  $this->Ln(1);
 $this->Ln(1);
//Encabezado de la tabla
    $this->Ln(0);
 }
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8,'C');
    // Número de página
  $this->Cell(80);
    $this->Cell(100,10,'Pag '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
//ahora instanseamos un objeto de la clase fpdf para empezar a armar el PDF con orientacion vertical, margenes en milimetros y tamaño de papel carta
$pdf = new PDF('L','mm','Letter');
//Utilizamos el siguiente metodo para cargar una nueva pagina en el PDF
$pdf->AddPage();
$pdf->AliasNbPages();
//Asiganamos el tipo de fuente, el estilo y el tamaño de letra
$pdf->SetFont('Arial','',9);
//Definimos el color de la letra
$pdf->SetTextColor(0x00,0x00,0x00);
//Utilizamos el siguiente metodo para cargar una nueva pagina en el PDF
//$pdf = new PDF(); 
$pdf->AliasNbPages();
     //ancho,alto,dato,borde,salto,alineacion centrado**
  
	
$rest="SELECT * FROM programacionanual_accion WHERE id_programacion_anual='".$iditm."'";		
 $re = pg_query($rest);
$i = 1;  
while($f1 = pg_fetch_array($re))
 {    $pdf->Cell(10); $pdf->Cell(60,5,'Partida Presupuestaria',0,0,'D');
     $pdf->MultiCell(120, 4,$f1['codigopartida_presupuestaria'] . "/" . $f1['desc_partida_presupuestaria'], 0, 'L');
	//$pdf->Cell(90,5,$f1['codigopartida_presupuestaria'] . "/" . $f1['desc_partida_presupuestaria'],1,0,'D');
	//$pdf->Line(30, 67, 30, 82);      //    ,tamaño,   ,      linea vertical
	//$pdf->Line(55, 70 , 155, 70); //linea horizontal
    $pdf->Cell(10); $pdf->Cell(60,5,'Fuentes de Financiamientos',0,0,'D');
	 $pdf->Cell(1); $pdf->Cell(60,5,'Porcentaje',0,1,'D');
	$pdf->Cell(10);$pdf->Cell(60,5, utf8_decode($f1['id_fuente_financiamiento']),1,0,'D'); //Celda con ancho de 50, alto de 10, el dato, borde 1, sin salto de linea**
	$pdf->Cell(20,5,$f1['id_municipio'],1,1,'C');
	$pdf->Cell(10); $pdf->Cell(60,5,'Actividad Comercial',0,0,'D');
	$pdf->Cell(20,5,$f1['desc_actvcomercial'],1,1,'C');
	$pdf->Cell(10); $pdf->Cell(60,5,'Estado',0,0,'D');
	$pdf->Cell(20,5,utf8_decode($f1['id_estado']),1,1,'C');
	
	
	$pdf->Cell(20); $pdf->Cell(60,5,'id_ccnu',0,0,'D');
	$pdf->Cell(-30); $pdf->Cell(60,5,'especificacion',0,0,'D');
	$pdf->Cell(-30); $pdf->Cell(60,5,'cantidad',0,0,'D');
	$pdf->Cell(-40); $pdf->Cell(60,5,'und',0,0,'D'); //**
	
	$pdf->Cell(-45); $pdf->Cell(60,5,'i',0,0,'D');
	$pdf->Cell(-50); $pdf->Cell(60,5,'ii',0,0,'D');
	$pdf->Cell(-50); $pdf->Cell(60,5,'iii',0,0,'D');
	$pdf->Cell(-50); $pdf->Cell(60,5,'iv',0,0,'D');
	$pdf->Cell(-50); $pdf->Cell(60,5,'costo_unitario',0,0,'D');
	$pdf->Cell(-35); $pdf->Cell(60,5,'precio_total',0,0,'D');
	$pdf->Cell(-40); $pdf->Cell(60,5,'alicuota_iva',0,0,'D');
	$pdf->Cell(-40); $pdf->Cell(60,5,'monto_iva',0,0,'D');
	$pdf->Cell(-40); $pdf->Cell(60,5,'monto_total',0,1,'D');
	
	
	$pdf->Cell(10);$pdf->Cell(40,5,utf8_decode($f1['id_ccnu']),0,0,'C');
    $pdf->Cell(3); $pdf->Cell(20,5,utf8_decode($f1['especificacion']),0,0,'C');
	$pdf->Cell(4);$pdf->Cell(20,5,$f1['cantidad'],0,0,'C'); //**
	$pdf->Cell(-3);$pdf->Cell(20,5,utf8_decode($f1['und']),0,0,'C');
	$pdf->Cell(-10);$pdf->Cell(18,5,number_format($f1['i'], 2, ",", "."),0,0,'R');
	$pdf->Cell(-10);$pdf->Cell(18,5,number_format($f1['ii'], 2, ",", "."),0,0,'R');
	$pdf->Cell(-10);$pdf->Cell(18,5,number_format($f1['iii'], 2, ",", "."),0,0,'R');
	$pdf->Cell(-5); $pdf->Cell(18,5,number_format($f1['iv'], 2, ",", "."),0,0,'R');
	$pdf->Cell(-5); $pdf->Cell(18,5,number_format($f1['costo_unitario'], 2, ",", "."),0,0,'R');
	$pdf->Cell(-5); $pdf->Cell(30,5,number_format($f1['precio_total'], 2, ",", "."),0,0,'R'); //**
	$pdf->Cell(-5); $pdf->Cell(30,5, $f1['alicuota_iva'] ,0,0,'R'); //**
	$pdf->Cell(-10); $pdf->Cell(35,5,$f1['monto_iva'], 0,0,'R');
	$pdf->Cell(-15); $pdf->Cell(35,5,number_format($f1['monto_total'], 2, ",", "."),0,1,'R');//darformatode miles en fpdf
	//$pdf->Cell(40,5,$_POST['subtotal'],1,1,'R');
	$pdf->Ln(5);
	$i++;
	//$i+=1; 
//Hacer el salto de linea para la siguiente fila del registro
 
  }
  
 

    $pdf->Ln(100); //Hacer el salto de linea para la siguiente fila del registro
			
				

		$pdf->Output('REPORTE COMPRA','I');
	?>

