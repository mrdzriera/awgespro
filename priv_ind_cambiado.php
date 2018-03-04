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
    <a href="index2.php" class="logo">
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
 
 <?php
 $tipo=$_POST['tipo'];
 ?>
 
       Permisos/
		<?php 
		
		if($tipo=='estudiante'){
		
		echo "Estudiante";
		
		}else if($tipo=='coordinador'){
		
		echo "Coordinador";
		
		}else if($tipo=='secretario'){
		
		echo "Secretario";
		
		}else if($tipo=='usuario'){
		
		echo "Desbloquear Usuario";
		
		}
		?>       
      </h1>
      
    </section>

			<section class="content">
<?php

require_once("clasedb.php");
$db=new clasedb();
$db->conectar ();

$id_usuario=$_POST['id_usuario'];
$tipo=$_POST['tipo'];
//variables de permiso de registro
$regproy=$_POST['regproy'];
$regasis=$_POST['regasis'];
$regfact=$_POST['regfact'];
$regpre=$_POST['regpre'];
$regeva=$_POST['regeva'];
$regsoc=$_POST['regsoc'];
$regevadef=$_POST['regevadef'];
$regculm=$_POST['regculm'];
$regcod=$_POST['regcod'];
$regdoc=$_POST['regdoc'];
$habarch=$_POST['habarch'];
//fin

//variables de permiso de consultas
$confact=$_POST['confact'];
$conpre=$_POST['conpre'];
$coneva=$_POST['coneva'];
$concom=$_POST['concom'];
$conjur=$_POST['conjur'];
$conpro=$_POST['conpro'];
$conasis=$_POST['conasis'];
$conretpro=$_POST['conretpro'];
$concod=$_POST['concod'];
$conest=$_POST['conest'];
//fin

//variables de modificar e imprimir
$moddoc=$_POST['moddoc'];
$gensol=$_POST['gensol'];
$habmod=$_POST['habmod'];
$descuen=$_POST['descuen'];

//fin

if(($tipo=='estudiante')and($regproy=='')and($regasis=='')and($conpro=='')and($confact=='')
and($conpre=='')and($coneva=='')and($conasis=='')and($conjur=='')and($concod=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000); 
</script>
<?php
}if(($tipo=='coordinador')and($regfact=='')and($regpre=='')and($regeva=='')and($regsoc=='')and($regevadef=='')and($regculm=='')and($confact=='')
and($conpre=='')and($coneva=='')and($concom=='')and($conjur=='')and($conpro=='')and($conretpro=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000); 
</script>
<?php
}if(($tipo=='secretario')and($regcod=='')and($regdoc=='')and($habarch=='')
and($concom=='')and($conpre=='')and($coneva=='')and($conjur=='')and($concod=='')
and($conest=='')and($moddoc=='')and($gensol=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000); 
</script>
<?php
}else{
//ESTUDIANTE
$a1="UPDATE usuario_tiene_permiso SET id_permiso='".$regproy."' WHERE id_usuario='".$id_usuario."' AND id_operacion='1' ";	
mysql_query($a1);

$a2="UPDATE usuario_tiene_permiso SET id_permiso='".$regasis."' WHERE id_usuario='".$id_usuario."' AND id_operacion='2' ";	
mysql_query($a2);

$a3="UPDATE usuario_tiene_permiso SET id_permiso='".$conasis."' WHERE id_usuario='".$id_usuario."' AND id_operacion='32' ";	
mysql_query($a3);
//FIN

//COORDINADOR
$b1="UPDATE usuario_tiene_permiso SET id_permiso='".$regfact."' WHERE id_usuario='".$id_usuario."' AND id_operacion='3' ";	
mysql_query($b1);

$b2="UPDATE usuario_tiene_permiso SET id_permiso='".$regpre."' WHERE id_usuario='".$id_usuario."' AND id_operacion='4' ";	
mysql_query($b2);

$b3="UPDATE usuario_tiene_permiso SET id_permiso='".$regeva."' WHERE id_usuario='".$id_usuario."' AND id_operacion='5' ";	
mysql_query($b3);

$b4="UPDATE usuario_tiene_permiso SET id_permiso='".$regsoc."' WHERE id_usuario='".$id_usuario."' AND id_operacion='6' ";	
mysql_query($b4);

$b5="UPDATE usuario_tiene_permiso SET id_permiso='".$regevadef."' WHERE id_usuario='".$id_usuario."' AND id_operacion='7' ";	
mysql_query($b5);

$b6="UPDATE usuario_tiene_permiso SET id_permiso='".$regculm."' WHERE id_usuario='".$id_usuario."' AND id_operacion='8' ";	
mysql_query($b6);

$b7="UPDATE usuario_tiene_permiso SET id_permiso='".$confact."' WHERE id_usuario='".$id_usuario."' AND id_operacion='19' ";	
mysql_query($b7);

$b8="UPDATE usuario_tiene_permiso SET id_permiso='".$conpre."' WHERE id_usuario='".$id_usuario."' AND id_operacion='22' ";	
mysql_query($b8);

$b9="UPDATE usuario_tiene_permiso SET id_permiso='".$coneva."' WHERE id_usuario='".$id_usuario."' AND id_operacion='21' ";	
mysql_query($b9);

$b10="UPDATE usuario_tiene_permiso SET id_permiso='".$concom."' WHERE id_usuario='".$id_usuario."' AND id_operacion='20' ";	
mysql_query($b10);

$b11="UPDATE usuario_tiene_permiso SET id_permiso='".$conjur."' WHERE id_usuario='".$id_usuario."' AND id_operacion='24' ";	
mysql_query($b11);

$b12="UPDATE usuario_tiene_permiso SET id_permiso='".$conpro."' WHERE id_usuario='".$id_usuario."' AND id_operacion='18' ";	
mysql_query($b12);

$b13="UPDATE usuario_tiene_permiso SET id_permiso='".$conretpro."' WHERE id_usuario='".$id_usuario."' AND id_operacion='29' ";	
mysql_query($b13);

$b14="UPDATE usuario_tiene_permiso SET id_permiso='".$habarch."' WHERE id_usuario='".$id_usuario."' AND id_operacion='31' ";	
mysql_query($b14);

$b15="UPDATE usuario_tiene_permiso SET id_permiso='".$concod."' WHERE id_usuario='".$id_usuario."' AND id_operacion='28' ";	
mysql_query($b15);

$b16="UPDATE usuario_tiene_permiso SET id_permiso='".$conest."' WHERE id_usuario='".$id_usuario."' AND id_operacion='25' ";	
mysql_query($b16);

$b18="UPDATE usuario_tiene_permiso SET id_permiso='".$habmod."' WHERE id_usuario='".$id_usuario."' AND id_operacion='33' ";	
mysql_query($b18);

$b19="UPDATE usuario_tiene_permiso SET id_permiso='".$descuen."' WHERE id_usuario='".$id_usuario."' AND id_operacion='34' ";	
mysql_query($b19);
//FIN

//SECRETARIO
$c1="UPDATE usuario_tiene_permiso SET id_permiso='".$regcod."' WHERE id_usuario='".$id_usuario."' AND id_operacion='9' ";	
mysql_query($c1);

$c2="UPDATE usuario_tiene_permiso SET id_permiso='".$regdoc."' WHERE id_usuario='".$id_usuario."' AND id_operacion='10' ";	
mysql_query($c2);

$c3="UPDATE usuario_tiene_permiso SET id_permiso='".$moddoc."' WHERE id_usuario='".$id_usuario."' AND id_operacion='17' ";	
mysql_query($c3);

$c4="UPDATE usuario_tiene_permiso SET id_permiso='".$gensol."' WHERE id_usuario='".$id_usuario."' AND id_operacion='30' ";	
mysql_query($c4);
//FIN

}
?>

<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien", "Los privilegios del usuario se han establecido exitosamente!!", "success");
});

function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000);
</script>
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