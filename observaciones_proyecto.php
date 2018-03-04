<?php

@session_start();

require_once('./fpdef/fpdf.php');
	
$pdf = new FPDF('L','mm','A4');

$pdf->AddPage();


require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

$pnf=$_GET['pnf'];
$trayecto=$_GET['trayecto'];
$seccion=$_GET['seccion'];
$anio=$_GET['anio'];
$turno=$_GET['turno'];
$sede=$_GET['sede'];
$accion=$_GET['accion'];

if($sede=='Sede Victoria'){
$sedep="La Victoria";	
}else if($sede=='Sede Maracay'){
$sedep="Maracay";	
}else if($sede=='Sede Barbacoas'){
$sedep="Barbacoas";	
}
           
$sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,proyectos.factibilidad,obs_coord,obs_tutor,
obs_esp1,obs_esp2,obs_esp3
FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
est_tiene_proy,proyectos,coord_tiene_proy,profesores,proyectos_tiene_opinion WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id=coord_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
obs_coord!='' AND
obs_tutor!='' AND
obs_esp1!='' AND
obs_esp2!='' AND
obs_esp3!='' AND
pnfs.nomb_pnf='".$pnf."' AND 
trayectos.num_trayecto='".$trayecto."' AND 
secciones.num_seccion='".$seccion."' AND 
anios.periodo='".$anio."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
profesores.ci='".$_SESSION['cedula_usu']."' ";

$r=mysql_query($sql);// FIN DE LA CONSULTA 


$n='76';
//$row=mysql_fetch_array($r);
while($row=mysql_fetch_array($r)) {

 $sql2="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante2 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id']."'";

$r2 = mysql_query($sql2);
//echo $sql2;
$row2 = mysql_fetch_array($r2);

$sql3="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante3 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id']."'";

$r3 = mysql_query($sql3);
$row3 = mysql_fetch_array($r3);

$sql4="SELECT *  FROM profesores,proyectos,tutor_tiene_proyectos WHERE
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id=tutor_tiene_proyectos.id_proyecto AND 
proyectos.id='".$row['id']."' ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);

 
$pdf->SetFont('Arial','I',10);
$pdf->SetXY(70, 8);
$pdf->MultiCell(40, 20, utf8_decode($pdf->Image("logo-upta.png",29,14,42,38,'png')), 0, 'L');
$pdf->SetXY(120, 12);
$pdf->MultiCell(120, 4, '         REPUBLICA BOLIVARIANA DE VENEZUELA ' , 0, 'L');  
$pdf->SetXY(60, 17);
$pdf->MultiCell(200, 4, '    MINISTERIO DEL PODER POPULAR PARA LA EDUCACION UNIVERSITARIA, CIENCIA TECNOLOGIA ' , 0, 'C'); 
$pdf->SetXY(62, 22);
$pdf->MultiCell(200, 4, '              UNIVERSIDAD POLITECNICA TERRITORIAL DEL ESTADO ARAGUA ' , 0, 'C'); 
$pdf->SetXY(42, 27);
$pdf->MultiCell(200, 4, '                                            "FEDERICO BRITO FIGUEROA" ' , 0, 'C'); 

$pdf->SetFont('Arial','I',10);
$pdf->SetXY(54, 46);
$pdf->MultiCell(200, 4, 'Observaciones de Proyectos ', 0, 'C'); 


$pdf->SetXY(32, 60);
$pdf->MultiCell(200, 4, 'Periodo Academico:'.$anio , 0, 'L'); 
$pdf->SetXY(90, 60);
$pdf->MultiCell(200, 4, 'PNF:'.$pnf , 0, 'L'); 
$pdf->SetXY(150, 60);
$pdf->MultiCell(200, 4, 'Trayecto:'.$trayecto , 0, 'L'); 
$pdf->SetXY(180, 60);
$pdf->MultiCell(200, 4, 'Seccion:'.$seccion , 0, 'L'); 
$pdf->SetXY(205, 60);
$pdf->MultiCell(200, 4, 'Turno:'.$turno , 0, 'L'); 
$pdf->SetXY(240, 60);
$pdf->MultiCell(200, 4, 'Sede:'.$sedep , 0, 'L'); 


$pdf->SetXY(19, 70);
$pdf->MultiCell(90, 6, 'Integrantes:' , 1, 'C');
$pdf->SetXY(109, 70);
$pdf->MultiCell(30, 6, 'Tutor:' , 1, 'C'); 
$pdf->SetXY(139, 70);
$pdf->MultiCell(140, 6, 'Observaciones:' , 1, 'C'); 
      

$pdf->SetFont('Arial','B',9);
$pdf->SetXY(19, $n);
$pdf->MultiCell(30, 12,$row['nombres'].$row['apellidos'], 1, 'L');
$pdf->SetXY(49, $n);
$pdf->MultiCell(30, 12,$row2['nombres'].$row2['apellidos'], 1, 'L');
$pdf->SetXY(79, $n);
$pdf->MultiCell(30, 12,$row3['nombres'].$row3['apellidos'], 1, 'L');
$pdf->SetXY(109, $n);
$pdf->MultiCell(30, 12,$row4['nombres'].$row4['apellidos'], 1, 'C');
$pdf->SetXY(139, $n);
$pdf->MultiCell(140, 12,$row['obs_coord'].','.$row['obs_tutor'].','.$row['obs_esp1'].','.$row['obs_esp2'].','.$row['obs_esp3'], 1, 'C');

$n=$n+12;

} 
$pdf->Output();

	date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OBSERVO LA PLANILLA DE OBSERVACION DE PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);
?>

