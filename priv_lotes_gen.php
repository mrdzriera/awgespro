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
		
		$tipo=$_POST['tipo'];
		
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
      </h1><br>
      
    </section>

	<br>

			<section class="content">
<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$cont=$_POST['indice'];
for($i=0; $i<$cont; $i++){
	
$seleccionado=$_POST['seleccionado'][$i];

if($seleccionado=='Si'){	

$id_usuario=$_POST['id_usuario'][$i];

//variables de permiso de registro
$regproy=$_POST['regproy'][$i];
$regasis=$_POST['regasis'][$i];
$regfact=$_POST['regfact'][$i];
$regpre=$_POST['regpre'][$i];
$regeva=$_POST['regeva'][$i];
$regsoc=$_POST['regsoc'][$i];
$regevadef=$_POST['regevadef'][$i];
$regculm=$_POST['regculm'][$i];
$regcod=$_POST['regcod'][$i];
$regdoc=$_POST['regdoc'][$i];
$habarch=$_POST['habarch'][$i];
//fin

//variables de permiso de consultas
$confact=$_POST['confact'][$i];
$conpre=$_POST['conpre'][$i];
$coneva=$_POST['coneva'][$i];
$concom=$_POST['concom'][$i];
$concul=$_POST['concul'][$i];
$conjur=$_POST['conjur'][$i];
$conpro=$_POST['conpro'][$i];
$conasis=$_POST['conasis'][$i];
$conretpro=$_POST['conretpro'][$i];
$concod=$_POST['concod'][$i];
$conest=$_POST['conest'][$i];
//fin

//variables de modificar e imprimir
$moddoc=$_POST['moddoc'][$i];
$gensol=$_POST['gensol'][$i];
$habmod=$_POST['habmod'][$i];
$descuen=$_POST['descuen'][$i];

//ESTUDIANTE
$a1="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regproy'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='1' ";	
mysql_query($a1);

$a2="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regasis'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='2' ";	
mysql_query($a2);
//FIN

//COORDINADOR
$b1="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regfact'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='3' ";	
mysql_query($b1);

$b2="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regpre'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='4' ";	
mysql_query($b2);

$b3="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regeva'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='5' ";	
mysql_query($b3);

$b4="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regsoc'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='6' ";	
mysql_query($b4);

$b5="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regevadef'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='7' ";	
mysql_query($b5);

$b6="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regculm'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='8' ";	
mysql_query($b6);

$b7="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['confact'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='19' ";	
mysql_query($b7);

$b8="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conpre'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='22' ";	
mysql_query($b8);

$b0="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['concul'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='23' ";	
mysql_query($b0);

$b9="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['coneva'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='21' ";	
mysql_query($b9);

$b10="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['concom'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='20' ";	
mysql_query($b10);

$b11="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conjur'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='24' ";	
mysql_query($b11);

$b12="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conpro'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='18' ";	
mysql_query($b12);

$b13="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conretpro'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='29' ";	
mysql_query($b13);

$b14="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['habarch'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='31' ";	
mysql_query($b14);

$b15="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['concod'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='28' ";	
mysql_query($b15);

$b16="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conest'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='25' ";	
mysql_query($b16);

$b17="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['conasis'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='32' ";	
mysql_query($b17);

$b18="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['habmod'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='33' ";	
mysql_query($b18);

$b19="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['descuen'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='34' ";	
mysql_query($b19);

//FIN

//SECRETARIO
$c1="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regcod'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='9' ";	
mysql_query($c1);

$c2="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['regdoc'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='10' ";	
mysql_query($c2);

$c3="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['moddoc'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='17' ";	
mysql_query($c3);

$c4="UPDATE usuario_tiene_permiso SET id_permiso='".$_POST['gensol'][$i]."' WHERE id_usuario='".$_POST['id_usuario'][$i]."' AND id_operacion='30' ";	
mysql_query($c4);
//FIN

?>
<script type="text/javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Los privilegios de los usuarios se definieron exitosamente!!", "success");
});

 function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000); 
</script>
<?php
}

}
?>	
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

