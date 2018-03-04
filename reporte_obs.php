<?php

@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");

$id=$_GET['id'];

$sql="SELECT profesores.nombres,apellidos,obs_coord FROM proyectos,profesores,coord_tiene_proy,proyectos_tiene_opinion WHERE 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id='".$id."' ";
$r=mysql_query($sql);;
$row=mysql_fetch_array($r);

$sql2="SELECT profesores.nombres,apellidos,obs_tutor FROM proyectos,profesores,tutor_tiene_proyectos,proyectos_tiene_opinion WHERE 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id='".$id."' ";
$r2=mysql_query($sql2);;
$row2=mysql_fetch_array($r2);

$sql3="SELECT profesores.nombres,apellidos,obs_esp1 FROM proyectos,profesores,proyectos_tiene_comite,proyectos_tiene_opinion WHERE 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND
proyectos.id='".$id."'";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);

$sql4="SELECT profesores.nombres,apellidos,obs_esp2 FROM proyectos,profesores,proyectos_tiene_comite,proyectos_tiene_opinion WHERE 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite2 AND
proyectos.id='".$id."'";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);

$sql5="SELECT profesores.nombres,apellidos,obs_esp3 FROM proyectos,profesores,proyectos_tiene_comite,proyectos_tiene_opinion WHERE 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite3 AND
proyectos.id='".$id."'";
$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);

$sql6="UPDATE proyectos_tiene_notificacion SET inscripcion='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($sql6);
?>

<script language="javascript">
window.print();
</script>
<center>
<img src="imagenes/encabezado.png" width="620px;" height="100px;"> 
</center>
<br>
<h2 align="center">Observaciones de Proyecto.</h2>
<br>
<center>
<table border="1" style="width:590px;">
<tr>
<td><strong>Coordinador:<?php echo $row['nombres']."&nbsp;".$row['apellidos'];?></strong></td>
</tr>
<tr>
<td><?php echo $row['obs_coord'];?></td>
</tr>
<tr>
<td><strong>Tutor:<?php echo $row2['nombres']."&nbsp;".$row2['apellidos'];?></strong></td>
</tr>
<tr>
<td><?php echo $row2['obs_tutor'];?></td>
</tr>
<tr>
<td><strong>Especialista:<?php echo $row3['nombres']."&nbsp;".$row3['apellidos'];?></strong></td>
</tr>
<tr>
<td><?php echo $row3['obs_esp1'];?></td>
</tr>
<?php
if(mysql_num_rows($r4)>0){
?>
<tr>
<td><strong>Especialista:<?php echo $row4['nombres']."&nbsp;".$row4['apellidos'];?></strong></td>
</tr>
<tr>
<td><?php echo $row4['obs_esp2'];?></td>
</tr>
<?php 
}
?>
<?php
if(mysql_num_rows($r5)>0){
?>
<tr>
<td><strong>Especialista:<?php echo $row5['nombres']."&nbsp;".$row5['apellidos'];?></strong></td>
</tr>
<tr>
<td><?php echo $row5['obs_esp3'];?></td>
</tr>
<?php 
}
?>
</table>
</center>
