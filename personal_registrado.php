<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Administrador'){
	?>
<script language="javascript">
window.location="index.php";
</script>
<?php	
}
?>
<!DOCTYPE html>
<script type="text/javascript" language="javascript">


	function salir()
	{
	
			if(confirm("¿Desea Salir?")){
			document.location.href='cerrar_login.php';
			}else{
				
			}
		}

function solonumeros(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key);

numeros="0123456789";

especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){

teclado_especial=true;

				}

			}

	if(numeros.indexOf(teclado)==-1 && !teclado_especial){
	return false;
	}
}


function sololetras(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key).toLowerCase();

letras=" abcdefghijklmnopqrstuvwxyz";

especiales="8-37-38-46-164";

teclado_especial=false;

			for(var i in especiales){

		if(key==especiales[i]){
	
	
	teclado_especial=true;break;
	
		}

	}
	
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
	
	return false;
	
	}

}

</script>
<html lang="en">
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
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="font-awesome/css/font-awesome.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	  <script src="disti/jquery-1.12.3.min.js"></script>
  <script src="disti/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
			<img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
	<aside> 

	<?php include ("menus_adm.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>
      <h1 class="panel-title text-center">
        Personal/Registros/Otro Personal
         
      </h1>

<?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$ci=$_POST['ci'];
$correo=$_POST['correo'];
$telefono=$_POST['cod'].'-'.$_POST['telefono'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$claveencriptada=password_hash($clave,PASSWORD_DEFAULT);
$nivel=$_POST['nivel'];
$sclave=$_POST['sclave'];
$pregunta=$_POST['pregunta'];
$spregunta=$_POST['spregunta'];
$respuesta=$_POST['respuesta'];
$foto=$_FILES['foto'];
$foto=$_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino="fotousuarios/".$foto;
move_uploaded_file($ruta,$destino);
$extension=$_FILES['foto']['type'];

//verificar si hay un usuario creado con esta cedula
$query="SELECT * FROM usuarios WHERE ci='".$_POST['ci']."'";
$bus=mysql_query($query);
//fin

//verificar si hay un usuario creado con este nombre de usuario
$query2="SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."'";
$bus2=mysql_query($query2);
//fin

if($clave!=$sclave){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Las claves de acceso no coinciden");
});
function redireccionar(){
window.location="opera_personal.php";
}
setTimeout('redireccionar()',2000);  
</script>
<?php	 
}else if(mysql_num_rows($bus)>0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Ya hay un Usuario con esta Cedula");
});
function redireccionar(){
window.location="opera_personal.php";
}
setTimeout('redireccionar()',2000);  
</script>
<?php
}else if(mysql_num_rows($bus2)>0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("El Nombre de Usuario ya Existe");
});
function redireccionar(){
window.location="opera_personal.php";
}
setTimeout('redireccionar()',4000);  
</script>
<?php
}else if(($destino!='')and($extension!='image/jpeg')and($destino!='')and($extension!='image/png')and($extension!='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Disculpe, la foto debe ser png o jpg");
});
function redireccionar(){
window.location="opera_personal.php";
}
setTimeout('redireccionar()',4000); 
</script>
<?php	
}else{

$meter="INSERT INTO usuarios VALUES ('null','".$ci."','".$correo."','".$telefono."','".$usuario."',
'".$claveencriptada."','".$nivel."','".$pregunta."','".$respuesta."','".$destino."','0','Activo')";
$incluir=mysql_query($meter);
$ultimo_id=mysql_insert_id();

if($nivel=='Estudiante'){
	
$query1="INSERT INTO usuario_tiene_permiso VALUES 
('null','".$ultimo_id."','1','1'),
('null','".$ultimo_id."','2','1'), 
('null','".$ultimo_id."','11','1'),
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

@mail('guillermogarvar@hotmail.com','Creacion de cuenta','El usuario con C.I.'.$ci.' Acaba de crear su cuenta, proceda a darle los permisos de usuario en www.awgesproprueba.hol.es');	

}

if($incluir==0){
?>
<script language="javascript" type="text/javascript">
alert('El Registro ha Fallado');
window.location='opera_personal.php';
</script>
<?php
}else{ 
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "El usuario se registro exitosamente", "success");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000);  
</script>
<?php
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE REGISTRO ESTE USUARIO TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
mysql_query($sql);
//echo $sql;

}

}
?>
  </div> <!-- Fin de box-body -->
                        
              </div>

                   
               </div> <!-- fin de box box-info -->	 
	 
	 
	 
	 
    </section>

  
    
  </div>
  
<?php
include("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
   </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>