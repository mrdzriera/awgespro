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
      Consultas de Proyecto/Modificar        
      </h1>
    </section>

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
<?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

 
$id_proyecto=$_POST['id_proyecto'];
$id_comunidad=$_POST['id_comunidad'];
$id_responsable=$_POST['id_responsable'];
$telefono=$_POST['cod_tel'].'-'.$_POST['numero']; 
 
$consulta="UPDATE proyectos SET 
fecha='".$_POST['fecha']."',
titulo='".$_POST['titulo']."',
objetivo='".$_POST['objetivo']."',
alcance='".$_POST['alcance']."',
limitaciones='".$_POST['limitaciones']."',
aportes='".$_POST['aportes']."',
acciones='".$_POST['acciones']."',
vinculacion='".$_POST['vinculacion']."' WHERE id='".$_POST['id_proyecto']."' ";
mysql_query($consulta);
//echo $consulta;
$sql2="UPDATE comunidades SET 
nombre='".$_POST['nombre']."',
estado='".$_POST['estado']."',
municipio='".$_POST['municipio']."',
parroquia='".$_POST['parroquia']."',
sector='".$_POST['sector']."' WHERE id='".$id_comunidad."' ";
mysql_query($sql2);
//echo $sql2;
	
$sql3="UPDATE responsable SET responsable='".$_POST['responsable']."',telefono='".$telefono."',correo='".$_POST['resp_email']."' WHERE id='".$id_responsable."' ";
mysql_query($sql3);

$sql4="SELECT * FROM proyectos,proyectos_tiene_permiso WHERE 
proyectos.id=proyectos_tiene_permiso.id_proyecto AND
proyectos.id='".$id_proyecto."' ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);
$cont=$row4['cont'];
$cont=$cont+1;
$limite=3;

if($cont<=$limite){	
$sql5="UPDATE proyectos_tiene_permiso SET cont='".$cont."' WHERE id_proyecto='".$id_proyecto."' ";
 mysql_query($sql5);
}


	
	
		 	date_default_timezone_set('America/Caracas');
	$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE MODIFICO EL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);
		 
		  ?>
   <script type="text/javascript">
         $(document).ready(function(){
		swal("Bien!", "El proyecto ha sido modificado exitosamente", "success");
		});
		function redireccionar(){
		window.location="index3.php";
		}
		setTimeout('redireccionar()',3000); 
        </script>	 <!---->    
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

<script type="text/javascript">
  $(document).ready(function(){
    var current = 1;
 
    widget      = $(".step");
    btnnext     = $(".next");
    btnback     = $(".back"); 
    btnsubmit   = $(".submit");
 
    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);
 
    // Next button click action
    btnnext.click(function(){
      if(current < widget.length){
        widget.show();
        widget.not(':eq('+(current++)+')').hide();
        setProgress(current);
      }
      hideButtons(current);
    })
 
    // Back button click action
    btnback.click(function(){
      if(current > 1){
        current = current - 2;
        btnnext.trigger('click');
      }
      hideButtons(current);
    })      
  });
 
  // Change progress bar action
  setProgress = function(currstep){
    var percent = parseFloat(100 / widget.length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar").css("width",percent+"%").html(percent+"%");    
  }
 
  // Hide buttons according to the current step
  hideButtons = function(current){
    var limit = parseInt(widget.length); 
 
    $(".action").hide();
 
    if(current < limit) btnnext.show();
    if(current > 1) btnback.show();
    if (current == limit) { btnnext.hide(); btnsubmit.show(); }
  }
 
</script>

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
