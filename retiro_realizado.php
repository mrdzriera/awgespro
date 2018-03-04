<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if(($_SESSION['tipocuentas']!='Coordinador')and($_SESSION['tipocuentas']!='Secretario')){
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

	<?php 
	
	if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menus_coord.php");	
	
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menus_sec.php");	
		
	}
	
	 ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menu3.php");	
	
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menu5.php");	
		
	} ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>
    <h1 class="panel-title text-center">
      Proyectos/Retiros/<?php echo $_POST['retiro'];?>     
      </h1>
    </section>

<?php 
@session_start();

require_once("clasedb.php");
$db=new clasedb();
$db-> conectar();
mysql_query("SET NAMES 'utf8'");
	
$id_estudiante1=$_POST['id_estudiante1'];
$id_estudiante2=$_POST['id_estudiante2'];
$id_estudiante3=$_POST['id_estudiante3'];
$id_proyecto=$_POST['id_proyecto'];

if($_SESSION['tipocuentas']=='Coordinador'){

$index="index4.php";
	
}else if($_SESSION['tipocuentas']=='Secretario'){

$index="index6.php";
	
}

$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante1."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante1."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante1."' AND
proyectos.id!='".$id_proyecto."' ";
$r=mysql_query($sql);

$sql2="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante2."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante2."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante2."' AND
proyectos.id!='".$id_proyecto."' ";
$r2=mysql_query($sql2);

$sql3="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante3."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante3."' AND
proyectos.id!='".$id_proyecto."' OR 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id='".$id_estudiante3."' AND
proyectos.id!='".$id_proyecto."' ";
$r3=mysql_query($sql3);

if($id_estudiante1==0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El proyecto debe tener al menos un integrante", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes";
}
setTimeout('redireccionar()',4000); 
</script>
<?php	
}else if(($id_estudiante1==$id_estudiante2)||($id_estudiante1==$id_estudiante3)||
($id_estudiante2==$id_estudiante3)&&($id_estudiante2!=0)&&($id_estudiante3!=0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Los integrantes deben ser distintos", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes";
}
setTimeout('redireccionar()',3000);
</script>	
<?php	
}else if(mysql_num_rows($r)==1){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El primer estudiante ya se encuentra inscrito en un proyecto, intente con otro", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes";
}
setTimeout('redireccionar()',6000); 
</script>
<?php	
}else if(mysql_num_rows($r2)==1){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El segundo estudiante ya se encuentra inscrito en un proyecto, intente con otro", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes";
}
setTimeout('redireccionar()',6000); 
</script>
<?php	
}else if(mysql_num_rows($r3)==1){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "El tercer ya se encuentra inscrito en un proyecto, intente con otro", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes";
}
setTimeout('redireccionar()',6000); 
</script>
<?php
}else if(($id_estudiante1!=0)&&($id_estudiante2==0)&&($id_estudiante3!=0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Si el grupo es de 2 integrantes, por favor coloque el segundo estudiante en el recuadro del medio", "error");
});
function redireccionar(){
window.location="detalles_retiros.php?retiro=integrantes.php";
}
setTimeout('redireccionar()',6000);
</script>	
<?php
}else{
$query="UPDATE est_tiene_proy SET id_estudiante1='".$id_estudiante1."',id_estudiante2='".$id_estudiante2."', 
id_estudiante3='".$id_estudiante3."' WHERE id_proyecto='".$id_proyecto."' ";
mysql_query($query);	

date_default_timezone_set('America/Caracas');
$sql2="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE MODIFICO LOS INTEGRANTES DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql2);	
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Los integrantes del proyecto han sido modificados exitosamente", "success");
});
function redireccionar(){
window.location="<?php echo $index; ?>";
}
setTimeout('redireccionar()',3000); 
</script>
<?php 
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