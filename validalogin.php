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
    
  </div> <!-- Fin de login-logo -->
<br><br>
<?php

@session_start();

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$alias=$_POST['alias'];
$_alias=mysql_real_escape_string($alias);

$password=$_POST['password'];
$_password=mysql_real_escape_string($password);

//consulta general a la tabla usuarios en caso de ser correctos los datos
$consulta="SELECT * FROM usuarios WHERE usuario='".$_alias."'   ";
$resultado=mysql_query($consulta);
$fila=mysql_fetch_array($resultado);
//fin

//consulta para msj de datos erroneos del administrador
$sqladm="SELECT * FROM usuarios WHERE usuario='".$_alias."' AND nivel='Administrador'";
$radm=mysql_query($sqladm);
//fin

//consulta para msj de error segun el numero de intentos para verificar el status de la cuenta
$sql1="SELECT * FROM usuarios WHERE usuario='".$_alias."' AND nivel!='Administrador'";
$r1=mysql_query($sql1);
$row1=mysql_fetch_array($r1);
//fin

$vericlave=password_verify($_password,$fila['clave']);

if((mysql_num_rows($resultado)>=1)and($vericlave>0)and($fila['status'])=='Activo'){
		
$_SESSION['tipocuentas']=$fila['nivel'];
$_SESSION['id_usu']=$fila['id'];
$_SESSION['nombre_usu']=$fila['usuario'];
$_SESSION['clave_usu']=$fila['clave'];
$_SESSION['cedula_usu']=$fila['ci'];
$_SESSION['preg_usu']=$fila['pregunta'];
$_SESSION['resp_usu']=$fila['respuesta'];
$_SESSION['foto_usu']=$fila['foto'];
	
	
$_SESSION['autentificado']=true;

date_default_timezone_set('America/Caracas');
	
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'INICIO SESION EL USUARIO CON ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql); 


if((($fila['nivel'])=='Administrador')){
		
?>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("¡Bienvenido!", " Administrador", "success");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000); 
</script>
	
<?php
} else if($fila['nivel']=='Estudiante'){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("¡Bienvenido!", " Estudiante", "success");
});
function redireccionar(){
window.location="index3.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
$sql5="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);
$intentos=0;	
$limite=3;
	
if((mysql_num_rows($r5)==1)and($intentos<=$limite)){
	
$sql6="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql6);		

}

}else if($fila['nivel']=='Coordinador'){
?>
		
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("¡Bienvenido!", " Coordinador(a)", "success");
});
function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',2000);
</script>
		
<?php	
$sql7="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r7=mysql_query($sql7);
$row7=mysql_fetch_array($r7);
$intentos=0;	
$limite=3;
	
if((mysql_num_rows($r7)==1)and($intentos<=$limite)){
	
$sql7="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql7);		

}

}else if($fila['nivel']=='Coord Trayecto'){
?>
			
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("¡Bienvenido!", " Coordinador(a) de trayecto", "success");
});
function redireccionar(){
window.location="index5.php";
}
setTimeout('redireccionar()',2000);
</script>

	 
<?php

$sql8="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r8=mysql_query($sql8);
$row8=mysql_fetch_array($r8);
$intentos=0;	
$limite=3;
	
if((mysql_num_rows($r8)==1)and($intentos<=$limite)){
	
$sql8="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql8);		

}

}else if ($fila['nivel']=='Secretario'){
?>
		
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("¡Bienvenido!", " Secretario(a)", "success");
});
function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',2000);
</script>

<?php
$sql9="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r9=mysql_query($sql9);
$row9=mysql_fetch_array($r9);
$intentos=0;	
$limite=3;
	
if((mysql_num_rows($r9)==1)and($intentos<=$limite)){
	
$sql9="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql9);		

}

}
	
}else if((mysql_num_rows($radm)>0)and($vericlave==0)){
		
//PROCEDIMIENTO PARA BLOQUEAR LA CUENTA DEL USUARIO EN CASO DE INGRESAR CLAVE ERRADA 3 VECES
?>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
sweetAlert("Disculpe","El usuario o la contraseña son incorrectos", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000);
</script>
	
<?php
}else if(($row1['intentos']==0)and($vericlave==0)){
//PROCEDIMIENTO PARA BLOQUEAR LA CUENTA DEL USUARIO EN CASO DE INGRESAR CLAVE ERRADA 3 VECES
?>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
sweetAlert("El usuario o la contraseña son incorrectos", "Ingrese los datos correctos, solo cuenta con tres intentos", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000);
</script>
	
<?php
$sql="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
$intentos=$row['intentos'];
$intentos=$intentos+1;
$limite=3;
	
if((mysql_num_rows($r)==1)and($intentos<=$limite)){
	
$sql2="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql2);		

}
	
if($intentos==3){
$sql3="UPDATE usuarios SET status='Bloqueado' WHERE usuario='".$_alias."'  AND nivel!='Administrador'";
mysql_query($sql3);
}
	
}else if(($row1['intentos']==1)and($vericlave==0)){
//PROCEDIMIENTO PARA BLOQUEAR LA CUENTA DEL USUARIO EN CASO DE INGRESAR CLAVE ERRADA 3 VECES
?>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
sweetAlert("El usuario o la contraseña son incorrectos", "ya cuenta con dos intentos erroneos, al tercero su cuenta será bloqueada", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000);
 </script>
	
<?php
$sql="SELECT * FROM usuarios WHERE usuario='".$_alias."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
$intentos=$row['intentos'];
$intentos=$intentos+1;
$limite=3;
	
if((mysql_num_rows($r)==1)and($intentos<=$limite)){
	
$sql2="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql2);		

}
	
if($intentos==3){
$sql3="UPDATE usuarios SET status='Bloqueado' WHERE usuario='".$_alias."'  AND nivel!='Administrador'";
mysql_query($sql3);
}
	
}else if(($row1['intentos']==2)and($vericlave==0)){
//PROCEDIMIENTO PARA BLOQUEAR LA CUENTA DEL USUARIO EN CASO DE INGRESAR CLAVE ERRADA 3 VECES
?>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
sweetAlert("Disculpe", "Ha excedido el límite de intentos para ingresar, su cuenta ha sido bloqueada", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000);
</script>
	
<?php
$sql="SELECT * FROM usuarios WHERE usuario='".$_alias."' AND nivel!='Administrador'";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
$intentos=$row['intentos'];
$intentos=$intentos+1;
$limite=3;
	
if((mysql_num_rows($r)==1)and($intentos<=$limite)){
	
$sql2="UPDATE usuarios SET intentos='".$intentos."' WHERE usuario='".$_alias."' ";
mysql_query($sql2);		

}
	
if($intentos==3){
$sql3="UPDATE usuarios SET status='Bloqueado' WHERE usuario='".$_alias."'  AND nivel!='Administrador'";
mysql_query($sql3);
}
	
}else if(($row1['status']=='Bloqueado')and($vericlave==1)or($row1['status']=='Bloqueado')and($vericlave==0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Su cuenta ha sido bloqueada, consulte con el administrador del sistema", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
//FIN
}
?>
<br>


    <form action="../../index2.html" method="post">
      

    </form> <!-- Fin de form 1 -->
    
    <!-- Fin de login-box-body -->

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