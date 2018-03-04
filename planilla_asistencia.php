<?php

@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$id_proyecto=$_GET['id_proyecto'];
$id_estudiante=$_GET['id_estudiante'];
$pagina=$_GET['pagina'];

//datos del lider y su proyecto
$sql="SELECT 
estudiante.nombres,
estudiante.apellidos,
estudiante.ci,
usuarios.telefono,
proyectos.titulo,
proyectos.codigo,
profesores.id,
visitas_comunidades.*
FROM estudiante,usuarios,profesores,visitas_comunidades,proyectos,coord_tiene_proy
WHERE
estudiante.ci=usuarios.ci AND
estudiante.id=visitas_comunidades.id_estudiante AND
proyectos.id=visitas_comunidades.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
coord_tiene_proy.id_profesor=profesores.id AND
proyectos.id='".$id_proyecto."' AND
estudiante.id='".$id_estudiante."' AND
pagina='".$pagina."' ";
$r=mysql_query($sql);
$cont=mysql_num_rows($r);
$row=mysql_fetch_array($r);
//echo $sql;
//fin

//Datos del profesor
$sql2="select * from profesores, usuarios WHERE 
profesores.ci=usuarios.ci AND 
profesores.id='".$row['id']."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);
//fin
?>
<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="600px;" height="55px;"> 
</center>
<br><br>
<center>
<strong>PLANILLA INDIVIDUAL DE ASISTENCIA DEL PARTICIPANTE A LA COMUNIDAD.</strong>
<br><br>
<center>
<table border="1" style="width:1050px;">
<tr>
<td><center><strong>PARTICIPANTE:</strong></center></td>
<td style="width:250px;"><center><?php echo $row['nombres'].'&nbsp;'.$row['apellidos'];?></center></td>
<td><center><strong>C&Eacute;DULA:</strong></center></td>
<td style="width:250px;"><center><?php echo $row['ci'];?></center></td>
<td><center><strong>TEL&Eacute;FONO:</strong></center></td>
<td colspan="6" style="width:300px;"><center><?php echo $row['telefono'];?></center></td>
</tr>
<tr>
<td style="width:200px;"><center><strong>T&Iacute;TULO DEL PROYECTO:</strong></center></td>
<td colspan="5" style="width:100px;"><p align="justify"><?php echo $row['titulo'];?></p></td>
<td><center><strong>C&Oacute;DIGO:</strong></center></td>
<td  style="width:220px;"><center><?php echo $row['codigo'];?></center></td>
</tr>
<tr>
<td style="width:200px;"><center><strong>COORDINADOR:</strong></center></td>
<td colspan="5" style="width:1000px;"><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></td>
<td><strong>T&Eacute;LEFONO:</strong></td>
<td colspan="4"><center><?php echo $row['telefono'];?></center></td>
</tr>
<tr>
<td style="width:150px;"><center><strong>DIA:</strong></center></td>
<td style="width:150px;"><center><strong>FECHA:</strong></center></td>
<td style="width:150px;"><center><strong>HORA ENTRADA</strong></center></td>
<td style="width:150px;"><center><strong>HORA SALIDA</strong></center></td>
<td style="width:150px;"><center><strong>TOTAL DE HORAS</strong></center></td>
<td style="width:300px;"><center><strong>ACTIVIDAD REALIZADA</strong></center></td>
<td colspan="2" style="width:150px;"><center><strong>RESPONSABLE POR LA COMUNIDAD (FIRMA Y SELLO)</strong></center></td>
</tr>

<?php
$inicial=0;
for($i=0;$i<$row;$i++){
$inicial=$inicial+$row['totalh'];
$dia=substr($row['fecha'],8,2)."-";
$mes=substr($row['fecha'],5,2)."-";
$anio=substr($row['fecha'],0,4);
$fecha=$dia.$mes.$anio;
?>
<tr>
<td><center><?php echo $row['dia'];?></center></td>
<td><center><?php echo $fecha;?></center></td>
<td><center><?php echo $row['hora_entrada'];?></center></td>
<td><center><?php echo $row['hora_salida'];?></center></td>
<td><center><?php echo $row['totalh'];?></center></td>
<td><center><?php echo $row['actividad'];?></center></td>
<td colspan="2"><center></center></td>
</tr>
<?php
$row=mysql_fetch_array($r);
}
?>
<tr>
<td colspan="4"><center><strong>TOTAL DE HORAS:</strong></center></td>
<td><center><strong><?php echo $inicial;?></strong></center></td>
<td colspan="3"><center><strong></strong></center></td>
</tr>
<tr>
<td colspan="4"  style="height:70px;"><center><strong>OBSERVACIONES:</strong></center></td>
<td colspan="4"></td>
</tr>
</table>
<br>
<br>
<br>
<table>
<tr>
<td>________________________________<br><center><strong>Responsable por la comunidad</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
<td>________________________________<center><strong>Responsable por el proyecto</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
<td>________________________________<center><strong>Coord de proyecto</strong></center></td>
</tr>
</table>
</center>