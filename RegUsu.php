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

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$ci=$_POST['ci'];
$correo=$_POST['correo'];
$telefono=$_POST['cod_tel'].'-'.$_POST['numero'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$claveencriptada=password_hash($clave,PASSWORD_DEFAULT);
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];
$foto=$_FILES['foto'];
$foto=$_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino="fotousuarios/".$foto;
move_uploaded_file($ruta,$destino);
$extension=$_FILES['foto']['type'];

//verificar existencia del usuario como estudiante
$consulta="SELECT * FROM estudiante WHERE ci='".$_POST['ci']."' ";
$verifico=mysql_query($consulta);
//fin

//verificar existencia del usuario como secretario
$consul="SELECT * FROM secretarios WHERE ci='".$_POST['ci']."'  ";
$verifi=mysql_query($consul);
//fin

//verificar existencia del usuario como coordinador
$consult="SELECT * FROM profesores WHERE ci='".$_POST['ci']."'  ";
$verific=mysql_query($consult);
//fin

//verificar existencia del usuario como coordinador de trayecto
$consult2="SELECT * FROM profesores,coordinadores_pnf WHERE 
profesores.id=coordinadores_pnf.id_profesor AND ci='".$_POST['ci']."'  ";
$verific2=mysql_query($consult2);
//fin

//verificar si hay un usuario creado con esta cedula
$query="SELECT * FROM usuarios WHERE ci='".$_POST['ci']."'";
$bus=mysql_query($query);
//fin

//verificar si hay un usuario creado con este nombre de usuario
$query2="SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."'";
$bus2=mysql_query($query2);
//fin

if((mysql_num_rows($verifico)==0)and(mysql_num_rows($verifi)==0)and
(mysql_num_rows($verific)==0)and(mysql_num_rows($verific2)==0)){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Usted no esta autorizado para ingresar al sistema", "error");
});
 function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000);  
</script>
<?php
}else if(mysql_num_rows($bus)>0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Un usuario con esta cedula ya se encuentra registrado", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',4000); 
</script>
<?php
}else if(mysql_num_rows($bus2)>0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El nombre de usuario que ingreso ya se encuentra registrado", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',4000); 
</script>
<?php
}else if(($destino!='')and($extension!='image/jpeg')and($destino!='')and($extension!='image/png')and($extension!='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El formato de la foto debe ser jpg o png", "error");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',4000);
</script>
<?php	
}else{
	
$consulta="SELECT * FROM estudiante WHERE ci='".$_POST['ci']."' ";
$verifico=mysql_query($consulta);
//echo $consulta;

$consult="SELECT * FROM secretarios WHERE ci='".$_POST['ci']."' ";
$verific=mysql_query($consult);
//echo $consult;

$consulta1="SELECT * FROM profesores WHERE ci='".$_POST['ci']."' AND ci!='12143906' AND ci!='7188413' ";
$verifico1=mysql_query($consulta1);
//echo $consulta1;

$consulta2="SELECT * FROM profesores,coordinadores_pnf WHERE 
profesores.id=coordinadores_pnf.id_profesor AND ci='".$_POST['ci']."' ";
$verifico2=mysql_query($consulta2);
//echo $consulta2;

$consulta3="SELECT * FROM profesores WHERE ci='".$_POST['ci']."' AND ci='12143906'";
$verifico3=mysql_query($consulta3);

$consulta4="SELECT * FROM profesores WHERE ci='".$_POST['ci']."' AND ci='7188413'";
$verifico4=mysql_query($consulta4);

if((mysql_num_rows($verifico3)==1)or(mysql_num_rows($verifico4)==1)){
$nivel='Administrador';
	
}else if(mysql_num_rows($verifico)==1){
$nivel='Estudiante';
}

if(mysql_num_rows($verific)==1){
$nivel='Secretario';
}

if(mysql_num_rows($verifico1)==1){
$nivel='Coordinador';
}

if((mysql_num_rows($verifico1)==1)and(mysql_num_rows($verifico2)==1)){
$nivel='Coord Trayecto';
}

$meter="INSERT INTO usuarios VALUES ('null','".$ci."','".$correo."','".$telefono."','".$usuario."','".$claveencriptada."',
'".$nivel."','".$pregunta."','".$respuesta."','".$destino."','0','Activo')";
$incluir=mysql_query($meter);
$ultimo_id=mysql_insert_id();

if($nivel=='Estudiante'){
	
$query1="INSERT INTO usuario_tiene_permiso VALUES 
('null','".$ultimo_id."','1','1'),
('null','".$ultimo_id."','2','1'), 
('null','".$ultimo_id."','11','0'),
('null','".$ultimo_id."','18','1'),
('null','".$ultimo_id."','19','1'),
('null','".$ultimo_id."','32','1'),
('null','".$ultimo_id."','24','1'),
('null','".$ultimo_id."','21','1'),
('null','".$ultimo_id."','22','1'),
('null','".$ultimo_id."','28','1')";
mysql_query($query1);	
	
}else if($nivel=='Coordinador'){
	
$query2="INSERT INTO usuario_tiene_permiso VALUES 
('null','".$ultimo_id."','3','1'),
('null','".$ultimo_id."','4','1'), 
('null','".$ultimo_id."','5','1'), 
('null','".$ultimo_id."','6','1'), 
('null','".$ultimo_id."','7','1'), 
('null','".$ultimo_id."','8','1'),
('null','".$ultimo_id."','19','1'),
('null','".$ultimo_id."','20','1'),
('null','".$ultimo_id."','21','1'),
('null','".$ultimo_id."','22','1'),
('null','".$ultimo_id."','23','1'),
('null','".$ultimo_id."','24','1'),
('null','".$ultimo_id."','18','1'),
('null','".$ultimo_id."','29','1'),
('null','".$ultimo_id."','33','1')";
mysql_query($query2);	
	
}else if($nivel=='Secretario'){
	
$query3="INSERT INTO usuario_tiene_permiso VALUES 
('null','".$ultimo_id."','9','1'),
('null','".$ultimo_id."','10','1'),
('null','".$ultimo_id."','28','1'),
('null','".$ultimo_id."','20','1'),
('null','".$ultimo_id."','21','1'),
('null','".$ultimo_id."','22','1'),
('null','".$ultimo_id."','24','1'),
('null','".$ultimo_id."','25','1'),
('null','".$ultimo_id."','17','1'),
('null','".$ultimo_id."','30','1'),
('null','".$ultimo_id."','31','1'),
('null','".$ultimo_id."','34','1'),
('null','".$ultimo_id."','29','1'),
('null','".$ultimo_id."','33','1')";
mysql_query($query3);	

@mail('guillermogarvar@hotmail.com','Creacion de cuenta','El secretario con C.I.'.$ci.' Acaba de crear su cuenta, proceda a darle los permisos de usuario en www.awgesproprueba.hol.es');	

}

if($incluir==0){
?>
<script language="javascript" type="text/javascript">
alert('El registro ha fallado');
window.location='registro_usuario.php';
</script>
<?php
}else{ 
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Su cuenta ha sido creada exitosamente", "success");
});
function redireccionar(){
window.location="index.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
mysql_query($sql);
//echo $sql;

}

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

