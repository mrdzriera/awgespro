<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Estudiante'){
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
    <a href="index3.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
	<aside> 

	<?php include ("menus_est.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu2.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
      Asistencias/Registrar        
      </h1><br>
    </section>

	<br>
<?php  

@session_start();


if(!$_SESSION){
	
	header("Location:index.php");
	
}

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");

$id_proyecto=$_POST['id_proyecto'];

$a1="SELECT * FROM proyectos WHERE proyectos.id='".$id_proyecto."' AND factibilidad='No Factible' ";
$r1=mysql_query($a1);
//echo $sql.'<br>';

$a2="SELECT * FROM proyectos WHERE proyectos.id='".$id_proyecto."' AND factibilidad='' ";
$r2=mysql_query($a2);
//echo $sql2.'<br>';

if(mysql_num_rows($r1)==1){
	?>
	  <script type="text/javascript">
		$(document).ready(function(){
		sweetAlert("Disculpe", "No se pudo registrar las asistencias debido a que su proyecto no es factible", "error");
		});
		function redireccionar(){
		window.location="registrar_visita.php";
		}
		setTimeout('redireccionar()',3000);
        </script>
	<?php
   } else if(mysql_num_rows($r2)==1){
?>
 <script type="text/javascript">
		 $(document).ready(function(){
		sweetAlert("Disculpe", "No se pudo registrar las asistencia debido a que su proyecto no tiene factibilidad registrada", "error");
		});
		function redireccionar(){
		window.location="registrar_visita.php";
		}
		setTimeout('redireccionar()',3000);
        </script>
<?php
}else{

for($i=0; $i<6; $i++){

$id_proyecto=$_POST['id_proyecto'][$i];
$id_estudiante=$_POST['id_estudiante'][$i];
$dia=$_POST['dia'][$i];
$fecha=$_POST['fecha'][$i];
$hora_entrada=$_POST['hora_entrada'][$i];
$hora_salida=$_POST['hora_salida'][$i];
$actividad=$_POST['actividad'][$i];
$pagina=$_POST['pagina'][$i];

$horaini=explode(":",$hora_entrada);
$horahast=explode(":",$hora_salida);

$totalhora=$horahast['0']-$horaini['0'];
$totalminuto=$horahast['1']+$horaini['1'];

if($totalminuto>=10){
$min=":".$totalminuto;	
}else if($totalminuto<10){
$min=":0".$totalminuto;	
}
	
$sql="INSERT INTO visitas_comunidades VALUES ('null','".$_POST['id_proyecto'][$i]."','".$_POST['id_estudiante'][$i]."','".$_POST['dia'][$i]."','".$_POST['fecha'][$i]."','".$_POST['hora_entrada'][$i]."','".$_POST['hora_salida'][$i]."','".$totalhora.$min."','".$_POST['actividad'][$i]."','".$_POST['pagina'][$i]."','0')";
mysql_query($sql);
?>

        <script type="text/javascript">
			$(document).ready(function(){
			swal("Bien!", "Las asistencias han sido registradas exitosamente", "success");
			});

			function redireccionar(){
			window.location="index3.php";
			}
			setTimeout('redireccionar()',3000); 
        </script>
<?php
$sql3="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE REGISTRO ESTA ASISTENCIA TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
//echo $sql;
mysql_query($sql3);
}
}
?>
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