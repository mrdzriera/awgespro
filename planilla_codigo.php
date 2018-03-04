<?php 
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$id=$_POST['id'];
$id=$_GET['id'];
@$fecha=date("d-m-y");

$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);

$sql2="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

$sql3="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);
?>
<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="700px;" height="75px;"> 
</center>
<br>
<h3 align="center">MEMORANDUM</h3>
<table align="center" style="width:680px;">
<tr>
<td><b align="left">PARA LOS BR.</b></td>
</tr>
<tr>
<td><b align="left"><?php echo $row['apellidos']."&nbsp;".$row['nombres'];?></b></td>
</tr>
<tr>
<td><b align="left"><?php echo $row2['apellidos']."&nbsp;".$row2['nombres'];?></b></td>
</tr>
<tr>
<td><b align="left"><?php echo $row3['apellidos']."&nbsp;".$row3['nombres'];?></b></td>
</tr>
<tr>
<td><b align="left">DE: Coordinaci&oacute;n de Creaci&oacute;n intelectual y Desarrollo Socio Productivo</b></td>
</tr>
<tr>
<td><b align="left">ASUNTO: Asignaci&oacute;n de Codigo</b></td>
</tr>
<tr>
<td><b align="left">FECHA: <?php echo $fecha;?></b></td>
</tr>
</table>
<br>
<center>
<br>
<table border="0" style="width:680px;" style="font-family:Times New Roman;font-size:12px;">
<tr>
<td><b><p align="justify">Tengo a bien dirigirme ante ustedes, con la finalidad de informarles que en reunion de Comite Tecnico de Investigaci&oacute;n fue Aprobado el proyecto SOCIOINTEGRADOR titulado:<?php echo $row['titulo'];?>al cual se le asigno el CODIGO: <?php echo $row['codigo'];?></p></b></td>
</tr>
</table>
</Center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<b><p align="center">ATENTAMENTE</p></b>
<br>
<br>
<br>
<br>
<b><p align="center">PROF. TELLES SILVA RAFAEL ANGEL</p></b>
<b><p align="center">COORDINADOR DE PROYECTOS</p></b>
<b><p align="center">DEL PROGRAMA NACIONAL DE FORMACI&Oacute;N</p></b><BR>
<br>
<br>
<b><p align="center">Av Universidad (al lado de Comando FAN-Peaje) Y Av. Ricaurte, Urb. Industrial SOCO (frente MAVIPLANCA)</p></b>
<b><p align="center">Telefax (0244)3217054/3222822/3211478 Apartado 109 Codigo Postal 2121 RIF: G-20009565-2'</p></b><BR>
<br>
<br>