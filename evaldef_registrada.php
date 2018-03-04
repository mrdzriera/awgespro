<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
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

	<?php include ("menus_coord.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu3.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>
    <h1 class="panel-title text-center">
      Socializaci&oacute;n/Evaluaci&oacute;n Definitiva     
      </h1>
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
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);
	
	 $cont=$_POST['indice'];

for($i=0; $i<$cont; $i++){

$id_proyecto=$_POST['id_proyecto'][$i];
$cal_c=$_POST['cal_c'][$i];
$cal_t=$_POST['cal_t'][$i];
$cal_e1=$_POST['cal_e1'][$i];
$cal_e2=$_POST['cal_e2'][$i];
$cal_e3=$_POST['cal_e3'][$i];
$cal_com=$_POST['cal_com'][$i];

//VERIFICAR SI TIENE TUTOR
 $sql="SELECT * FROM proyectos,profesores,tutor_tiene_proyectos
WHERE proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND 
id_profesor!='0' AND
proyectos.id='".$id_proyecto."' ";
$r=mysql_query($sql);
//echo $sql;

//PRESENTACION PRIMER MODULO
$query="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND 
defensas.fecha!='0000-00-00' AND modulo='1' AND id_proyecto='".$id_proyecto."' ";
$bus=mysql_query($query);

//PRESENTACION SEGUNDO MODULO
$query2="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='2' AND id_proyecto='".$id_proyecto."' ";
$bus2=mysql_query($query2);  

//PRESENTACION TERCER MODULO
$query3="SELECT * FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='3' AND id_proyecto='".$id_proyecto."' ";
$bus3=mysql_query($query3); 

//NOTA TOTAL PRIMER MODULO
$consulta1="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='1' AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta1=mysql_query($consulta1);
	
//NOTA TOTAL SEGUNDO MODULO
$consulta2="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='2'  AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta2=mysql_query($consulta2);
	
//NOTA TOTAL TERCER MODULO
$consulta3="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='3' AND proyectos.id='".$id_proyecto."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta3=mysql_query($consulta3);

//PRESENTACION DE SOCIALIZACION
$consulta4="SELECT * FROM proyectos_tiene_socializacion,proyectos WHERE proyectos.id=proyectos_tiene_socializacion.id_proyecto
AND proyectos.id='".$id_proyecto."' AND
proyectos_tiene_socializacion.fecha!='0000-00-00'";
$respuesta4=mysql_query($consulta4);

if((mysql_num_rows($respuesta1)==0)or(mysql_num_rows($respuesta2)==0)or(mysql_num_rows($respuesta3)==0)or
(mysql_num_rows($respuesta4)==0)or(mysql_num_rows($bus)==0)or(mysql_num_rows($bus2)==0)or(mysql_num_rows($bus3)==0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Este proyecto no ha cumplido con las presentaciones y/o evaluaciones y/o fecha de socializacion, por favor registrelas", "error");
});
function redireccionar(){
window.location="registro_evadef.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else{
	
$consulta="UPDATE proyectos_tiene_eva_def
SET cal_c='".$_POST['cal_c'][$i]."', 
cal_t='".$_POST['cal_t'][$i]."', 
cal_e1='".$_POST['cal_e1'][$i]."', 
cal_e2='".$_POST['cal_e2'][$i]."', 
cal_e3='".$_POST['cal_e3'][$i]."',
cal_com='".$_POST['cal_com'][$i]."'
WHERE id_proyecto='".$_POST['id_proyecto'][$i]."' ";
		
$incluir=mysql_query($consulta);

//echo $consulta;

if($incluir==0){
?>
<script type="text/javascript">
alert('No se Pudo Registrar La Evaluacion Definitiva del Proyecto');
window.location='registro_evadef.php';
</script>
<?php
}else{ 
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "La evaluacion definitiva ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script> 
<?php
date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE REGISTRO LA EVALUACION DEFINITIVA DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);

}
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