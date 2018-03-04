<?php
@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

$anio=$_POST['anio'];
$pnf=$_POST['pnf'];
$trayecto=$_POST['trayecto'];
$seccion=$_POST['seccion'];
$turno=$_POST['turno'];
$sede=$_POST['sede'];

$sql="SELECT *,sedes.nombre 
 FROM estudiante, proyectos, est_tiene_proy, est_cursa_proy, pnfs, trayectos, secciones, anios,turnos, sedes
 WHERE 
estudiante.id = est_tiene_proy.id_estudiante1 AND
proyectos.id = est_tiene_proy.id_proyecto AND
estudiante.id = est_cursa_proy.id_estudiante AND
pnfs.id = est_cursa_proy.id_pnf AND
trayectos.id = est_cursa_proy.id_trayecto AND
secciones.id = est_cursa_proy.id_seccion AND
anios.id = est_cursa_proy.id_anio AND
turnos.id = est_cursa_proy.id_turno AND
sedes.id = est_cursa_proy.id_sede AND
nomb_pnf = '".$pnf."' AND 
trayectos.num_trayecto = '".$trayecto."' AND
secciones.num_seccion = '".$seccion."' AND
anios.periodo = '".$anio."' AND
turnos.descripcion = '".$turno."' AND
sedes.nombre = '".$sede."' AND 
codigo!='' order by codigo ";
$r=mysql_query($sql);
//echo $sql;
if($sede=='Sede Victoria'){
$ubicacion='la Victoria';
}else if($sede=='Sede Maracay'){
$ubicacion='Maracay';
}else if($sede=='Sede Barbacoas'){
$ubicacion='Barbacoas';
}

?>
<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="700px;" height="75px;"> 
</center>
<br>
<h3 align="center">C&oacute;digos de proyecto</h3>
<center>
<b>Per&iacute;odo Acad&eacute;mico:</b><?php echo $anio;?>&nbsp;&nbsp;
<b>PNF:</b><?php echo $pnf;?>&nbsp;&nbsp;
<b>Trayecto:</b><?php echo $trayecto;?>&nbsp;&nbsp;
<b>Secci&oacute;n:</b><?php echo $seccion;?>&nbsp;&nbsp;
<b>Sede:</b><?php echo $ubicacion;?>
</center>
<br>
<center>
<table border="1">
<tr>
<td><b><p align="center">Integrantes</p></b></td>
<td><b><p align="center">C&oacute;digo</p></b></td>
<td><b><p align="center">Tutor</p></b></td>
<td><b><p align="center">Coordinador</p></b></td>
</tr>
<?php
$row=mysql_fetch_array($r);
if($row['sede']=='Sede Victoria'){
$ubicacion='Sede Principal la Victoria';
}else{
$ubicacion=$row['sede'];	
}
for($i=0;$i<$row;$i++){

//datos del estudiante2
$sql2="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante2 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."'";
$r2 = mysql_query($sql2);
//echo $sql2;
$row2 = mysql_fetch_array($r2);

if(mysql_num_rows($r2)==1){
$estudiante2=$row2['nombres'].$row2['apellidos'].'C.I.'.$row2['ci'];	
}else{
$estudiante2="";
}

//fin

//datos del estudiante3
$sql3="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante3 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."'";
$r3 = mysql_query($sql3);
$row3 = mysql_fetch_array($r3);

if(mysql_num_rows($r2)==1){
$estudiante3=$row3['nombres'].$row3['apellidos'].'C.I.'.$row3['ci'];	
}else{
$estudiante3="";
}
//fin

//consulta de los datos del tutor
$bus1="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,tutor_tiene_proyectos WHERE
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id='".$row['id_proyecto']."' ";
$cons1=mysql_query($bus1);
//echo $bus;
$z1=mysql_fetch_array($cons1);//fin

//consulta de los datos del tutor
$bus2="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,coord_tiene_proy WHERE
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id='".$row['id_proyecto']."' ";
$cons2=mysql_query($bus2);
//echo $bus;
$z2=mysql_fetch_array($cons2);//fin

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
<td><center><?php echo $row['codigo'];?></center></td>
<td><center><?php echo $z['nombres'].'&nbsp;'.$z['apellidos'];?></center></td>
<td><center><?php echo $z2['nombres'].'&nbsp;'.$z2['apellidos'];?></center></td>
</tr>
<?php
$row=mysql_fetch_array($r);
}
?>
</table>
</center>
