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
      Registros/Presentaciones/M&oacute;dulo 1     
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

$id_proyecto=$_POST['id'][$i];
$fecha=$_POST['fecha'][$i];
$hora_entrada=$_POST['hora_entrada'][$i];
$lugar=$_POST['lugar'][$i];
$mes=substr($fecha,5,2);

/*VALIDACION PARA ASEGURARSE DE QUE NO SE PUEDA ASIGNAR UNA FECHA 
PRESENTACION A UN GRUPO DE PROYECTO, EN CASO DE QUE YA EXISTA UNO 
EN ESA FECHA, EN ESA HORA, Y EN ESE LUGAR EN ESPECIFICO*/
$x="SELECT * FROM defensas WHERE 
defensas.fecha='".$fecha."' AND hora_entrada='".$hora_entrada."' AND lugar='".$lugar."' AND 
modulo='1' ";  
$y=mysql_query($x);

if(mysql_num_rows($y)>0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Ya existe un proyecto con una fecha de presentacion en esta fecha, hora, lugar para este periodo academico", "error");
});
function redireccionar(){
window.location="reg_pre1.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php	
} else if(($mes!=03)and($mes!=04)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "ingrese una fecha entre los meses de marzo a abril", "error");
});
function redireccionar(){
window.location="reg_pre1.php";
}
setTimeout('redireccionar()',4000); 
</script>
<?php
}else{
	
$consulta="UPDATE defensas SET fecha='".$_POST['fecha'][$i]."',hora_entrada='".$_POST['hora_entrada'][$i]."',
lugar='".$_POST['lugar'][$i]."' WHERE id_proyecto='".$_POST['id_proyecto'][$i]."' AND modulo='1' ";
		
//ejecuta la inserción
$incluir=mysql_query($consulta);

//echo $consulta;

if($incluir==0){
?>
<script type="text/javascript">
alert('No se Pudo Asignar la fecha de presentacion');
window.location='index4.php';
</script>
<?php
}else{ 
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "La fecha de presentacion de la fase 1 ha sido asignada exitosamente", "success");
});

 function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);  
</script>      
<?php
date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE ASIGNO LA FECHA DE PRESENTACION EN LA FASE 1 TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
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