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
    <br>
    <h1 class="panel-title text-center">
      Consultas de proyecto/Proyectos/Subir Informe       
      </h1><br>
    </section>

	<br>
<?php
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);
date_default_timezone_set('America/Caracas');

$id_proyecto=$_POST['id_proyecto'];
$informe=$_FILES['informe'];
$informe=$_FILES['informe']['name'];
$ruta=$_FILES['informe']['tmp_name'];
$extension=$_FILES['informe']['type'];
$destino="archivos/".$informe;
move_uploaded_file($ruta,$destino);
$fecha=@date("y-m-d");

//factibilidad y codigo
$mysql="SELECT * FROM proyectos WHERE factibilidad='Factible' AND codigo!='' AND id='".$id_proyecto."' ";
$query=mysql_query($mysql);
//fin

//presentaciones por modulo
$mysql2="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND 
defensas.fecha!='0000-00-00' AND modulo='1' AND id_proyecto='".$id_proyecto."'";
$query2=mysql_query($mysql2);

$mysql3="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='2' AND id_proyecto='".$id_proyecto."'";
$query3=mysql_query($mysql3);

$mysql4="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='3' AND id_proyecto='".$id_proyecto."'";
$query4=mysql_query($mysql4);
//fin

//evaluaciones por modulo
$mysql5="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='1' AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$query5=mysql_query($mysql5);

$mysql6="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='2'  AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$query6=mysql_query($mysql6);

$mysql7="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='3' AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$query7=mysql_query($mysql7);
//fin

//fecha de socializacion y evaluacion final
$mysql8="SELECT * FROM proyectos_tiene_socializacion,proyectos WHERE proyectos.id=proyectos_tiene_socializacion.id_proyecto
AND proyectos.id='".$id_proyecto."' AND proyectos_tiene_socializacion.fecha!='0000-00-00'";
$query8=mysql_query($mysql8);

$mysql9="SELECT * FROM proyectos_tiene_eva_def,proyectos WHERE proyectos.id=proyectos_tiene_eva_def.id_proyecto
AND proyectos.id='".$id_proyecto."' AND
proyectos_tiene_eva_def.cal_c!='0' AND
proyectos_tiene_eva_def.cal_t!='0' AND
proyectos_tiene_eva_def.cal_e1!='0' AND
proyectos_tiene_eva_def.cal_e2!='0' AND
proyectos_tiene_eva_def.cal_e3!='0'";
$query9=mysql_query($mysql9);
//fin

//documentos
$mysql10="SELECT * FROM proyectos_tiene_documento WHERE 
portada='Si' AND 
acta_coord='Si' AND
acta_tutor='Si' AND 
acta_inscrip='Si' AND 
resumen='Si' AND
indice_general='Si' AND
introduccion='Si' AND 
manuales='Si' AND 
empastado='Si' AND 
cd='Si' AND 
id_proyecto='".$id_proyecto."' ";
$query10=mysql_query($mysql10);
//fin

if($extension!='application/pdf'){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El informe solo puede ser en formato pdf", "error");
});
function redireccionar(){
window.location="consult_est.php";
}
setTimeout('redireccionar()',3000);
</script>	
<?php	
}else if((mysql_num_rows($query)==0)or(mysql_num_rows($query2)==0)or(mysql_num_rows($query3)==0)or(mysql_num_rows($query4)==0)or(mysql_num_rows($query5)==0)or(mysql_num_rows($query6)==0)or(mysql_num_rows($query7)==0)or(mysql_num_rows($query8)==0)or
(mysql_num_rows($query9)==0)or(mysql_num_rows($query10)==0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El proyecto aun no ha cumplido con todos los requisitos para subir el informe", "error");
});
 function redireccionar(){
window.location="consult_est.php";
}
setTimeout('redireccionar()',5000);
</script>
<?php	
}else{	
$sql2="UPDATE proyectos_tiene_documento SET informe='".$destino."' WHERE id_proyecto='".$id_proyecto."' ";
$r=mysql_query($sql2);

$sql3="UPDATE proyectos_tiene_culminacion SET id_culminacion='3',fecha='".$fecha."' WHERE id_proyecto='".$id_proyecto."' ";
mysql_query($sql3);

if($r==0){
?>
<script language="javascript">
alert("problemas");
window.location="consult_est.php";
</script>	
<?php	
}else{
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "El informe ha sido adjuntado exitosamente", "success");
});

function redireccionar(){
window.location="consult_est.php";
}
setTimeout('redireccionar()',3000);
</script>		
<?php
date_default_timezone_set('America/Caracas');
$var="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL ESTUDIANTE QUE ADJUNTO SU INFORME TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($var);

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