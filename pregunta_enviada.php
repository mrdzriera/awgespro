<!DOCTYPE html>
<html>
<head>
<link href="awgespro.ico" type="image/x-icon" rel="shorcut icon"/>
	<style type="text/css">
	
	.Estilo1{
		
		color:#FFFFFF;
		font-weight:bold;
	}
	
	.Estilo3{ font-family:Arial, Heviltica, sen-serif; }
	
	.Estilo4{ 
	font-family:Arial, Heviltica, sen-serif;
	font-weight:bold; 
	font-size:24px;
	}
	
	</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Awgespro</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/flat-login.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/animate.css">
  <link rel="stylesheet" href="estilos/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="estilos/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="estilos/plugins/iCheck/square/blue.css">
  <script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>

<body class="hold-transition login-page">
<div class="login-box animated bounceIn">

<div class="login-box">

  <div class="login-logo">
    
  <b>AWGESPRO</b></a>

  </div> <!-- Fin de login-logo -->

  <?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

extract($_REQUEST);	
mysql_query("SET NAMES 'utf8'");

$usuario=$_POST['usuario'];
$respuesta=$_POST['respuesta'];
	
$sql="SELECT * FROM usuarios,estudiante WHERE 
estudiante.ci=usuarios.ci AND
usuario='".$usuario."' AND respuesta='".$respuesta."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);	

$sql2="SELECT * FROM usuarios,profesores WHERE 
profesores.ci=usuarios.ci AND
usuario='".$usuario."' AND respuesta='".$respuesta."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

$sql3="SELECT * FROM usuarios,secretarios WHERE 
secretarios.ci=usuarios.ci AND
usuario='".$usuario."' AND respuesta='".$respuesta."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);	

if((mysql_num_rows($r)==0)and(mysql_num_rows($r2)==0)and(mysql_num_rows($r3)==0)){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "La respuesta es incorrecta", "error");
});
function redireccionar(){
window.location="olvido_clave.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else{
?>

<br>

<?php
if(mysql_num_rows($r)==1){

$email=$row['correo'];
$clave=$row['clave'];
	
}else if(mysql_num_rows($r2)==1){
	
	$email=$row2['correo'];
	$clave=$row2['clave'];
	
}else if(mysql_num_rows($r3)==1){
	
	$email=$row3['correo'];
	$clave=$row3['clave'];
}  
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "La contraseña que olvido ha sido enviada a su correo, revise en correos no deseado si no se muestra en su bandeja principal", "success");
});

function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',4000);
</script> 
 
<?php 
}
@mail($email, 'Recuperacion de Clave', 'Su clave de acceso es: '.$clave);
?>
    
   </div> <!-- Fin de login-box-body -->

  </div> <!-- Fin de login-box -->

 </div> <!-- Fin de login-box animated bounceIn -->

<!-- script -->

<script src="estilos/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="estilos/bootstrap/js/bootstrap.min.js"></script>
<script src="estilos/plugins/iCheck/icheck.min.js"></script>
<script src="estilos/bootstrap/js/jquery.js"></script>
<script src="estilos/bootstrap/js/jquery-1.8.2.min.js"></script>
<script src="estilos/bootstrap/js/jquery.backstretch.min.js"></script>
<script src="estilos/bootstrap/js/scripts.js"></script>
<script src="estilos/bootstrap/sweetalert/sweetalert.min.js"></script>

<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
