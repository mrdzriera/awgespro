<?php
@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$periodo=$_POST['periodo'];
$nomb_pnf=$_POST['nomb_pnf'];
$num_trayecto=$_POST['num_trayecto'];
$num_seccion=$_POST['num_seccion'];
$fase=$_POST['fase'];
$ci=$_POST['ci'];

$sql="SELECT proyectos.id AS'id_proyecto',
((cal_c+cal_t+cal_e)/3) AS'nota', estudiante.nombres, estudiante.apellidos, 
proyectos.codigo
FROM estudiante, proyectos, est_tiene_proy, est_cursa_proy, pnfs, trayectos, secciones, anios, evaluacion WHERE 
estudiante.id = est_tiene_proy.id_estudiante1 AND
estudiante.id = est_cursa_proy.id_estudiante AND
pnfs.id = est_cursa_proy.id_pnf AND
trayectos.id = est_cursa_proy.id_trayecto AND
secciones.id = est_cursa_proy.id_seccion AND
anios.id = est_cursa_proy.id_anio AND
proyectos.id = est_tiene_proy.id_proyecto AND
proyectos.id = evaluacion.id_proyecto AND
nomb_pnf = '".$nomb_pnf."' AND 
trayectos.num_trayecto = '".$num_trayecto."' AND
secciones.num_seccion = '".$num_seccion."' AND
anios.periodo = '".$periodo."' AND
evaluacion.fase = '".$fase."' AND 
cal_c!='0' AND
cal_t!='0' AND
cal_e!='0' 
order by codigo ";
$r=mysql_query($sql);
 
date_default_timezone_set('America/Caracas');
$sql4="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql4);
?>
<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="700px;" height="75px;"> 
</center>
<br>
<h3 align="center">CRONOGRAMA DE EVALUACI&Oacute;N DE PROYECTO TRIMESTRAL</h3>
<center>
<b>Per&iacute;odo Acad&eacute;mico:</b><?php echo $periodo;?>&nbsp;&nbsp;
<b>PNF:</b><?php echo $nomb_pnf;?>&nbsp;&nbsp;
<b>Trayecto:</b><?php echo $num_trayecto;?>&nbsp;&nbsp;
<b>Secci&oacute;n:</b><?php echo $num_seccion;?>&nbsp;&nbsp;
<b>M&oacute;dulo:</b><?php echo $fase;?>
</center>
<br>
<center>
<table border="1">
<tr>
<td><b><p align="center">Integrantes</p></b></td>
<td><b><p align="center">Tutor</p></b></td>
<td><b><p align="center">Especialista</p></b></td>
<td><b><p align="center">Calificaci&oacute;n</p></b></td>
<td><b><p align="center">C&oacute;digo</p></b></td>
</tr>
<?php
$row=mysql_fetch_array($r);
for($i=0;$i<$row;$i++){
$sql2="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante2 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."'";
$r2 = mysql_query($sql2);
//echo $sql2;
$row2 = mysql_fetch_array($r2);

$sql3="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante3 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."'";
$r3 = mysql_query($sql3);
$row3 = mysql_fetch_array($r3);

//consulta de los datos del tutor
$bus="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,tutor_tiene_proyectos WHERE
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id='".$row['id_proyecto']."' ";
$cons=mysql_query($bus);
//echo $bus;
$z=mysql_fetch_array($cons);//fin

//consulta de los datos del comite1
$bus2="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND
proyectos.id='".$row['id_proyecto']."'";
$cons2=mysql_query($bus2);
//echo $bus2;
$z2=mysql_fetch_array($cons2);//fin
?>
<tr>
<td><center><?php echo $row['nombres'].'&nbsp;'.$row['apellidos']; 
if(mysql_num_rows($r2)>0){
echo "<br>".$row2['nombres'].'&nbsp;'.$row2['apellidos']; 	
}
if(mysql_num_rows($r3)>0){
echo "<br>".$row3['nombres'].'&nbsp;'.$row3['apellidos']; 	
}
?></center></td>
<td><center><?php echo $z['nombres'].'&nbsp;'.$z['apellidos'];?></center></td>
<td><center><?php echo $z2['nombres'].'&nbsp;'.$z2['apellidos'];?></center></td>
<td><center><?php echo number_format($row['nota'],0,".",",");?></center></td>
<td><center><?php echo $row['codigo'];?></center></td>
</tr>
<?php
$row=mysql_fetch_array($r);
}
?>
</table>
</center>
