<?php

@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");

$id=$_GET['id'];

//CONSURLTA PARA MOSTRAR LOS DATOS DEL PROYECTO JUNTO CON SU LIDER EN LA PLANILLA
$sql="SELECT * ,
proyectos.id AS'id_proyecto',
linea_investigacion,
estudiante.nombres AS'nom_e1',
estudiante.apellidos AS'ape_e1',
estudiante.ci AS'ci_e1',
usuarios.correo AS'mail_e1',
usuarios.telefono AS'tlf_e1',
trayectos.descripcion AS'des_t',
turnos.descripcion AS'des_tur'
FROM
estudiante,usuarios,pnfs,trayectos,anios,secciones,turnos,proyectos,est_tiene_proy,est_cursa_proy
WHERE
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
anios.id=est_cursa_proy.id_anio AND
secciones.id=est_cursa_proy.id_seccion AND
turnos.id=est_cursa_proy.id_turno AND
estudiante.ci=usuarios.ci AND
proyectos.id='".$id."' ";

$r=mysql_query($sql);

//echo $sql;

$row=mysql_fetch_array($r);//FIN DE LA CAPTURA DE LOS DATOS DE LA PLANILLA

//datos del estudiante2
$consulta="SELECT * FROM proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
WHERE
estudiante.ci=usuarios.ci AND
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$traer=mysql_query($consulta);

$fila=mysql_fetch_array($traer);//fin

//datos del estudiante3
$consulta2="SELECT * FROM proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
WHERE
estudiante.ci=usuarios.ci AND
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$traer2=mysql_query($consulta2);
$fila2=mysql_fetch_array($traer2);//fin


//datos del coordinador de la materia
$sql2="SELECT *,
profesores.nombres AS'nom_c',
profesores.apellidos AS'ape_c',
profesores.ci AS'ci_c'
FROM proyectos,profesores,coord_tiene_proy
WHERE 
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id=coord_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);//fin

//datos del tutor
$sql3="SELECT *,
profesores.nombres AS'nom_t',
profesores.apellidos AS'ape_t',
profesores.ci AS'ci_t'
FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,tutor_tiene_proyectos,est_cursa_proy,est_tiene_proy 
WHERE
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);//fin

//consulta de los datos del comite1
$bus2="SELECT profesores.nombres,profesores.apellidos,profesores.ci FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$cons2=mysql_query($bus2);
$z2=mysql_fetch_array($cons2);//fin

//consulta de los datos del comite2
$bus3="SELECT profesores.nombres,profesores.apellidos,profesores.ci FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite2 AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$cons3=mysql_query($bus3);
$z3=mysql_fetch_array($cons3);//fin

//consulta de los datos del comite3
$bus4="SELECT profesores.nombres,profesores.apellidos,profesores.ci FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite3 AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$cons4=mysql_query($bus4);
$z4=mysql_fetch_array($cons4);//fin

//consulta de los datos del coordinador de pnf
$bus5="SELECT * FROM estudiante,proyectos,coordinadores_pnf,profesores,pnfs WHERE
profesores.id=coordinadores_pnf.id_profesor AND
pnfs.id=coordinadores_pnf.id_pnf AND
nomb_pnf='".$row['nomb_pnf']."' ";
$cons5=mysql_query($bus5);
$z5=mysql_fetch_array($cons5);//fin

//consulta de los datos de la comunidad
$bus6="SELECT * FROM proyectos,comunidades,com_tiene_proy WHERE
proyectos.id=com_tiene_proy.id_proyecto AND
comunidades.id=com_tiene_proy.id_comunidad AND
id_proyecto='".$id."' ";
$cons6=mysql_query($bus6);
$z6=mysql_fetch_array($cons6);//fin

$dia=substr($row['fecha'],8,2)."-";
$mes=substr($row['fecha'],5,2)."-";
$anio=substr($row['fecha'],0,4);
$fecha=$dia.$mes.$anio;
?>

<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="600px;" height="55px;"> 
</center>
<br>
<center>
<strong>Planilla de Inscripci&oacute;n de Proyecto.</strong>
<br>
<br>
<table style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><strong>Fecha:</strong><?php echo $fecha;?></td>
<td><strong>PNF:</strong><?php echo $row['nomb_pnf'];?></td>
<td><strong>Trayecto:</strong><?php echo $row['des_t'];?></td>
<td><strong>A&ntilde;o:</strong><?php echo $row['periodo'];?></td>
<td><strong>Secci&oacute;n:</strong><?php echo $row['num_seccion'];?></td>
<td><strong>Turno:</strong><?php echo $row['des_tur'];?></td>
</tr>
</table>
<table style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><strong>Profesor de Proyecto:</strong><?php echo $row2['nom_c'].'&nbsp;'.$row2['ape_c'];?></td>
<td><strong>Tutor del Proyecto:</strong><?php echo $row3['nom_t'].'&nbsp;'.$row3['ape_t'];?></td>
<td><strong>Estado:</strong><?php echo $z6['estado'];?></td>
</tr>
</table>
<table style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><strong>Municipio:</strong><?php echo $z6['municipio'];?></td>
<td><strong>Parroquia:</strong><?php echo $z6['parroquia'];?></td>
<tr>
</tr>
<td><strong>Sector:</strong><?php echo $z6['sector'];?></td>
</tr>
</table>
<br>
<strong style="font-family:Times New Roman;font-size:12px;">Integrantes del colectivo de estudiantes.</strong>
<br>
<table border="1" style="width:590px;" style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><center><strong style="font-family:Times New Roman;font-size:12px;">Apellido y Nombre:</strong></center></td>
<td><center><strong style="font-family:Times New Roman;font-size:12px;">C.I.:</strong></center></td>
<td><center><strong style="font-family:Times New Roman;font-size:12px;">Tel&eacute;fono:</strong></center></td>
<td><center><strong style="font-family:Times New Roman;font-size:12px;">Correo:</strong></center></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['ape_e1'].'&nbsp;'.$row['nom_e1'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['ci_e1'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['tlf_e1'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['mail_e1'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['apellidos'].'&nbsp;'.$fila['nombres'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['ci'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['telefono'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['correo'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['apellidos'].'&nbsp;'.$fila2['nombres'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['ci'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['telefono'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['correo'];?></p></td>
</tr>
</table>
<br>
<strong style="font-family:Times New Roman;font-size:12px;">BREVE DESCRIPCION DEL PROYECTO</strong>
<br>
<table border="1" style="width:590px;" style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Titulo:</strong><?php echo $row['titulo'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Objetivo:</strong><?php echo $row['objetivo'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Alcance:</strong><?php echo $row['alcance'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Limitaciones:</strong><?php echo $row['alcance'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>L&iacute;neas de Investigaci&oacute;n:</strong></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><?php echo $row['linea_investigacion'];?></p></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Aportes a la comunidad, Personas beneficiadas? :</strong><?php echo $row['aportes'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Acciones de Integraci&oacute;n con la Comunidad:</strong><?php echo $row['acciones'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify"><strong>Vinculaci&oacute;n de la investigaci&oacute;n con  el Plan de la Patria 2013-2019:</strong>
<?php echo $row['vinculacion'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><strong>Estudiantes:</p></td>
</tr>
</table>
<table border="1" style="width:590px;" style="font-family:Times New Roman;font-size:12px;">
<tr>
<td style="width:200px;"><center><strong>Apellido y Nombre:</strong></center></td>
<td style="width:150px;"><center><strong>C.I.:</strong></center></td>
<td><center><strong>Firma:</strong></center></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['ape_e1'].'&nbsp;'.$row['nom_e1'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $row['ci_e1'];?></p></td>
<td></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['apellidos'].'&nbsp;'.$fila['nombres'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila['ci'];?></p></td>
<td></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['apellidos'].'&nbsp;'.$fila2['nombres'];?></p></td>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center"><?php echo $fila2['ci'];?></p></td>
<td></td>
</tr>
</table>

<br>
<strong style="font-family:Times New Roman;font-size:12px;">ACTA DE APROBACION DEL TEMA</strong>
<br>
<table style="width:596px;">
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="justify" >Nosotros los abajo firmantes Coordinador de investigaci&oacute;n del PNF, Profesor de Proyecto, Tutor Acad&eacute;mico y Comit&eacute; T&eacute;cnico, hacemos constar que queda aprobado e inscrito  el tema del mismo.</p></td>
</tr>
</table>
<br>
<table>
<tr>
<td style="font-family:Times New Roman;font-size:12px;">Coordinador de investigaci&oacute;n del PNF: (Firma) ___________________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $z5['nombres'].'&nbsp;'.$z5['apellidos'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>C.I.</strong><?php echo $z5['ci'];?></p></td>
</tr>
<tr>
<td style="font-family:Times New Roman;font-size:12px;" align="left"><br>Profesor de Proyecto: (Firma) ___________________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $row2['nom_c'].'&nbsp;'.$row2['ape_c'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<strong>C.I.</strong><?php echo $row2['ci_c'];?></p></td>
</tr>
</table>
<br>
<table>
<tr>
<td style="font-family:Times New Roman;font-size:12px;" align="left"><br>Tutor Acad&eacute;mico: (Firma) ___________________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $row3['nom_t'].'&nbsp;'.$row3['ape_t'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<strong>C.I.</strong><?php echo $row3['ci_t'];?></p></td>
</tr>
</table>
</center>
<br>
<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong>Comit&eacute; T&eacute;cnico:</strong></p>
<table align="left">
<tr>
<td style="font-family:Times New Roman;font-size:12px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
(Firma) _____________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $z2['nombres'].'&nbsp;'.$z2['apellidos'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<strong>C.I.</strong><?php echo $z2['ci'];?></p></td>
</tr>
</table>

<table align="left">
<tr>
<td style="font-family:Times New Roman;font-size:12px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
(Firma) ______________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $z3['nombres'].'&nbsp;'.$z3['apellidos'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<strong>C.I.</strong><?php echo $z3['ci'];?></p></td>
</tr>
</table>

<table align="left">
<tr>
<td style="font-family:Times New Roman;font-size:12px;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
(Firma) ___________________</td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<strong>Nombre:</strong><?php echo $z4['nombres'].'&nbsp;'.$z4['apellidos'];?></p></td>
</tr>
<tr>
<td><p style="font-family:Times New Roman;font-size:12px;" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<strong>C.I.</strong><?php echo $z4['ci'];?></p></td>
</tr>
</table>
</center>

