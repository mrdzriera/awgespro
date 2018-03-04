<?php

@session_start();

$anio=$_POST['anio'];
$anio=$_GET['anio'];
$nomb_pnf=$_POST['nomb_pnf'];
$nomb_pnf=$_GET['nomb_pnf'];
$ci=$_POST['ci'];
$ci=$_GET['ci'];

@$fecha=date("d-m-y");

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();
mysql_query("SET NAMES 'utf8'");
	
$sql="SELECT * FROM estudiante WHERE ci='".$ci."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
?>
<style>
font-family: Times New Roman;
</style>
<script>
window.print();
</script>
<br><br><br>
<center>
<img src="imagenes/encabezado.png" width="700px;" height="90px;"> 
</center>
<br>
<center><strong>La Coordinacion de Creaci&oacute;n Intelectual y Desarrollo Socio-Productivo,irotorga la presente a:</strong></center>
<h1 align="center">Constancia a:</h1>
<h1 align="center"><?php echo $row['apellidos'].'&nbsp;'.$row['nombres'].'&nbsp;CI.&nbsp;'.$row['ci'];?></h1>
<h1 align="center">Programa nacional de formaci&oacute;n en <?php echo $nomb_pnf;?></h1>
<center><img src="imagenes/interlineado.png" width="700px;" height="100px;"></center>
 <br>
 <br>
 <br>
 <br>
 <br>
 <h1 align="center">____________________<br>Atentamente.</h1>
 <h2 align="center">Prof.Telles Silva Rafael Angel</h2>