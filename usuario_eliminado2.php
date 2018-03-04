<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
<?php

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$id=$_POST['id'];
$contador=0;

require_once("clasedb.php");
$db= new clasedb();
$db-> conectar();

$sql="SELECT * FROM  usuarios WHERE usuario='".$usuario."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
	
if(password_verify($clave,$row['clave'])){
$contador++;
}

if($contador>0){
	
$sql2="DELETE FROM anios WHERE id='".$id."' ";
mysql_query($sql2);	
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Periodo academico eliminado exitosamente!!", "success");
});

function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php	
}else{
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Clave Incorrecta", "error");
});
function redireccionar(){
window.location="consulta_anio.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
}
?>