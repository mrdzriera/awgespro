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
      Socializaci&oacute;n/Fechas     
      </h1>
    </section>

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
$hora_entrada=$_POST['hora_entrada'][$i];
$lugar=$_POST['lugar'][$i];
$fecha=$_POST['fecha'][$i];
$mes=substr($fecha,5,2);

/*VALIDACION PARA QUE LA FECHA DE SOCIALIZACION NO SEA IGUAL A ALGUNAS DE LAS FECHAS DE 
PRESENTACION POR MODULO*/

$query="SELECT defensas.fecha FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND 
defensas.fecha!='0000-00-00' AND modulo='1' AND id_proyecto='".$_POST['id_proyecto'][$i]."' ";
$bus=mysql_query($query);
$data=mysql_fetch_array($bus);

$query2="SELECT defensas.fecha FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='2' AND id_proyecto='".$_POST['id_proyecto'][$i]."' ";
$bus2=mysql_query($query2);
$data2=mysql_fetch_array($bus2);  

$query3="SELECT defensas.fecha FROM proyectos,defensas WHERE proyectos.id=defensas.id_proyecto AND
defensas.fecha!='0000-00-00' AND modulo='3' AND id_proyecto='".$_POST['id_proyecto'][$i]."' ";
$bus3=mysql_query($query3);
$data3=mysql_fetch_array($bus3); 

//VERIFICAR SI EL PROYECTO TIENE TUTOR
$sql="SELECT * FROM proyectos,profesores,tutor_tiene_proyectos
WHERE proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND 
id_profesor!='0' AND
proyectos.id='".$_POST['id_proyecto'][$i]."' ";
$r=mysql_query($sql);
//echo $sql;

//NOTA TOTAL PRIMER MODULO
$consulta1="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='1' AND proyectos.id='".$_POST['id_proyecto'][$i]."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta1=mysql_query($consulta1);
$traer1=mysql_fetch_array($respuesta1);
	
//NOTA TOTAL SEGUNDO MODULO
$consulta2="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='2'  AND proyectos.id='".$_POST['id_proyecto'][$i]."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta2=mysql_query($consulta2);
$traer2=mysql_fetch_array($respuesta2);
	
//NOTA TOTAL TERCER MODULO
$consulta3="SELECT * FROM evaluacion,proyectos WHERE proyectos.id=evaluacion.id_proyecto
AND fase='3' AND proyectos.id='".$_POST['id_proyecto'][$i]."' AND cal_c!='0'  AND cal_t!='0'  AND cal_e!='0'";
$respuesta3=mysql_query($consulta3);
$traer3=mysql_fetch_array($respuesta3);

if(($data['fecha']==$_POST['fecha'][$i])or($data2['fecha']==$_POST['fecha'][$i])or($data3['fecha']==$_POST['fecha'][$i])){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "La fecha de socializacion no puede ser igual a ninguna de las fechas de presentacion por modulo", "error");
});
function redireccionar(){
window.location="registro_fecha_socializacion.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php	
}else if((mysql_num_rows($respuesta1)==0)or(mysql_num_rows($respuesta2)==0)or(mysql_num_rows($respuesta3)==0)or
(mysql_num_rows($bus)==0)or(mysql_num_rows($bus2)==0)or(mysql_num_rows($bus3)==0)){
		?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Este proyecto no ha cumplido con todas las evaluaciones y/o presentaciones por modulo, por favor registrela(s)", "error");
});
function redireccionar(){
window.location="registro_fecha_socializacion.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if(($mes!=11)and($mes!=12)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "ingrese una fecha entre los meses de noviembre a enero", "error");
});
function redireccionar(){
window.location="registro_fecha_socializacion.php";
}
setTimeout('redireccionar()',4000);
</script>
<?php
}else {
	
$consulta="UPDATE proyectos_tiene_socializacion,proyectos,profesores,coord_tiene_proy SET 
proyectos_tiene_socializacion.fecha='".$_POST['fecha'][$i]."', 
proyectos_tiene_socializacion.hora_entrada='".$_POST['hora_entrada'][$i]."',
proyectos_tiene_socializacion.lugar='".$_POST['lugar'][$i]."'
WHERE 
proyectos_tiene_socializacion.fecha='0000-00-00' AND
proyectos_tiene_socializacion.hora_entrada='00:00:00' AND
proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
profesores.ci='".$_SESSION['cedula_usu']."' AND proyectos_tiene_socializacion.id_proyecto='".$_POST['id_proyecto'][$i]."' ";
		
$incluir=mysql_query($consulta);

if($incluir==0){
?>
<script type="text/javascript">
alert('No se Pudo Registrar La Socializacion del Proyecto');
window.location='registro_fecha_socializacion.php';
</script>
<?php
}else{ 
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "La fecha de la socializacion ha sido asignada exitosamente", "success");
});
function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script> 
<?php
date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE REGISTRO LA SOCIALIZACION DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
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