<?php

@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

$nomb_pnf=$_GET['pnf'];
$num_trayecto=$_GET['trayecto'];
$num_seccion=$_GET['seccion'];
$anio=$_GET['anio'];
$turno=$_GET['turno'];
$sede=$_GET['sede'];
$accion=$_GET['accion'];
$forma=$_GET['forma'];

if($sede=='Sede Victoria'){
$sedep="La Victoria";	
}else if($sede=='Sede Maracay'){
$sedep="Maracay";	
}else if($sede=='Sede Barbacoas'){
$sedep="Barbacoas";	
}

if(($forma=="")or($accion=="")){

$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";
	
}else if(($accion=='Factibles')and($forma!='Todas')){
	
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' ";

}else if (($accion=='No Factibles')and($forma!='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='No Factible' ";

}else if (($accion=='En Espera')and($forma!='Todas')) {
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.factibilidad='' OR
proyectos.factibilidad='Sin Asignar' ";

}else if(($accion=='Con Codigos')and($forma!='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo!='' ORDER BY codigo ";

}else if (($accion=='Sin Codigos')and($forma!='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo='' ORDER BY proyectos.id ";

}else if (($accion=='Culminados')and($forma!='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion,
proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='3' ORDER BY proyectos.id  ";

}else if (($accion=='No Culminados')and($forma!='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion,
proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='4' ORDER BY proyectos.id ";



}else if(($accion=='Factibles')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' ";

}else if (($accion=='No Factibles')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='No Factible' ";

}else if (($accion=='En Espera')and($forma='Todas')) {
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.factibilidad='' OR
proyectos.factibilidad='Sin Asignar' ";

}else if(($accion=='Con Codigos')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo!='' ORDER BY codigo ";

}else if (($accion=='Sin Codigos')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND  
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo='' ORDER BY proyectos.id ";

}else if (($accion=='Culminados')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion,
proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='3' ORDER BY proyectos.id  ";

}else if(($accion=='No Culminados')and($forma='Todas')){
$sql="SELECT *,proyectos.id AS'id_proyecto',estudiante.id AS'id_estudiante1',turnos.descripcion FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion,
proyectos_tiene_opinion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='4' ORDER BY proyectos.id ";

} 

$r=mysql_query($sql);
?>
<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="600px;" height="55px;"> 
</center> 
<br><br>
<center>
<strong>Listado de Proyectos <?php echo $accion;?>.</strong>
<br><br>
<center>
<table>
<tr>
<td><center><strong>A&ntilde;o acad&eacute;mico:</strong><?php echo $anio;?>&nbsp;&nbsp;</center></td>
<td><center><strong>PNF:</strong><?php echo $nomb_pnf;?>&nbsp;&nbsp;</center></td>
<td><center><strong>Trayecto:</strong><?php echo $num_trayecto;?>&nbsp;&nbsp;</center></td>
<td><center><strong>Secci&oacute;n:</strong><?php echo $num_seccion;?>&nbsp;&nbsp;</center></td>
<td><center><strong>Turno:</strong><?php echo $turno;?>&nbsp;&nbsp;</center></td>
<td><center><strong>Sede:</strong><?php echo $sedep;?>&nbsp;&nbsp;</center></td>
</tr>
</table>
</center>
<br>
<table border="1" style="width:1050px;">
<tr>
<td style="width:150px;"><center><strong>Integrantes:</strong></center></td>
<td><center><strong>Tutor:</strong></center></td>
<td style="width:400px;"><center ><strong>T&iacute;tulo:</strong></center></td>
<td style="width:600px;"><center><strong>Observaciones:</strong></center></td>
</tr>
<?php
while($row=mysql_fetch_array($r)){
	
//consulta de los datos del estudiante 2
$sql2="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante2 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."' AND
id_estudiante1='".$row['id_estudiante1']."' ";
$r2 = mysql_query($sql2);
$row2 = mysql_fetch_array($r2);
//fin;

//consulta de los datos del estudiante 3
$sql3="select * FROM estudiante, proyectos, est_tiene_proy where 
estudiante.id = est_tiene_proy.id_estudiante3 AND
proyectos.id = est_tiene_proy.id_proyecto AND
id_proyecto = '".$row['id_proyecto']."' AND
id_estudiante1='".$row['id_estudiante1']."'";
$r3 = mysql_query($sql3);
$row3 = mysql_fetch_array($r3);
//fin

//consulta de los datos del tutor
$bus="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,tutor_tiene_proyectos WHERE
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id='".$row['id_proyecto']."' ";
$cons=mysql_query($bus);
$z=mysql_fetch_array($cons);

//consulta de los datos del coordinador
$bus2="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,coord_tiene_proy WHERE
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id='".$row['id_proyecto']."' ";
$cons2=mysql_query($bus2);
$z2=mysql_fetch_array($cons2);

//consulta de los datos del comite1
$bus3="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND
proyectos.id='".$row['id_proyecto']."' ";
$cons3=mysql_query($bus3);
$z3=mysql_fetch_array($cons3);

//consulta de los datos del comite2
$bus4="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite2 AND
proyectos.id='".$row['id_proyecto']."' ";
$cons4=mysql_query($bus4);
$z4=mysql_fetch_array($cons4);

//consulta de los datos del comite3
$bus5="SELECT profesores.nombres,profesores.apellidos,proyectos.id FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite3 AND
proyectos.id='".$row['id_proyecto']."' ";
$cons5=mysql_query($bus5);
$z5=mysql_fetch_array($cons5);

if(mysql_num_rows($cons)>0){
$tutor=$z['nombres'].'&nbsp;'.$z['apellidos'];
}else if(mysql_num_rows($cons)==0){
$tutor="Sin Tutor";
}
//echo $bus;
//fin
	
?>
<tr>
<td style="width:300px;"><center><strong>
<?php 
echo $row['nombres'].'&nbsp;'.$row['apellidos'];
 
if(mysql_num_rows($r2)>0){ 
echo "<br>".$row2['nombres'].'&nbsp;'.$row2['apellidos'];
}

if(mysql_num_rows($r3)>0){ 
echo "<br>".$row3['nombres'].'&nbsp;'.$row3['apellidos'];
}

?></strong></center></td>
<td><center><?php echo $tutor;?></center></td>
<td style="width:400px;"><p align="justify"><?php echo $row['titulo'];?></p></td>
<td style="width:600px;"><p align="justify">
<?php 
if($row['obs_coord']!=""){
echo "<b>".$z2['nombres'].'&nbsp;'.$z2['apellidos']."(Coordinador):</b>".$row['obs_coord'];	
}

if($row['obs_tutor']!=""){
echo "<br><br>"."<b>".$z['nombres'].'&nbsp;'.$z['apellidos']."(Tutor)</b>: ".$row['obs_tutor'];	
}

if($row['obs_esp1']!=""){
echo "<br><br>"."<b>".$z3['nombres'].'&nbsp;'.$z3['apellidos']."(Especialista)</b>: ".$row['obs_esp1'];	
}

if($row['obs_esp2']!=""){
echo "<br><br>"."<b>".$z4['nombres'].'&nbsp;'.$z4['apellidos']."(Especialista)</b>: ".$row['obs_esp2'];	
}

if($row['obs_esp3']!=""){
echo "<br><br>"."<b>".$z5['nombres'].'&nbsp;'.$z5['apellidos']."(Especialista)</b>: ".$row['obs_esp3'];	
}


?></p></td>

</tr>
<?php 
}
?>

 
 
 
 
<?php
@date_defaul_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OBSERVO LA PLANILLA DE PRESENTACION DE PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
//echo $sql;
mysql_query($sql);
?>

