<?php

require_once("clasedb.php");
$db=new clasedb();
$db-> conectar();

$usuario=$_POST['usuario'];
$status=$_POST['status'];

$sql2="UPDATE usuarios SET status='".$status."',intentos='0' WHERE usuario='".$usuario."' ";
mysql_query($sql2);
?>
<script language="javascript">
alert("La cuenta del usuario se desbloqueo exitosamente");
window.location="index2.php";
</script>		
<?php
date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL ADMINISTRADOR QUE DESBLOQUEO LA CUENTA DEL USUARIO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);
?>