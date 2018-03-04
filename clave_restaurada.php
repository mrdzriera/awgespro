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

$ci=$_POST['ci'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$password=password_hash($clave,PASSWORD_DEFAULT);

$mysql="SELECT * FROM usuarios WHERE ci='".$ci."' ";
$query=mysql_query($mysql);

if(mysql_num_rows($query)==0){
?>
<script>
$(document).ready(function(){
sweetAlert("Disculpe", "Cedula incorrecta", "error");
});
function redireccionar(){
window.location="reestablecer_clave.php";
}
setTimeout('redireccionar()',3000);
</script>	
<?php	
}else{
	
$sql="UPDATE usuarios SET usuario='".$usuario."',clave='".$password."' WHERE ci='".$ci."' ";
$r=mysql_query($sql);
if($r==0){
?>	
<script>
alert("error");
window.location="index.php";
</script>	
<?php	
}else{
?>
<script>
$(document).ready(function(){
swal("Bien!", "Datos restaurados exitosamente", "success");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php	
}
}
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
