<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Secretario'){
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

	<?php include ("menus_sec.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu5.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Documentos/Modificar         
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

date_default_timezone_set('America/Caracas');

$id_proyecto=$_POST['id_proyecto'];
$portada=$_POST['portada'];
$acta_coord=$_POST['acta_coord'];
$acta_tutor=$_POST['acta_tutor'];
$acta_inscrip=$_POST['acta_inscrip'];
$dedicatoria=$_POST['dedicatoria'];
$agradecimiento=$_POST['agradecimiento'];
$resumen=$_POST['resumen'];
$indice_general=$_POST['indice_general'];
$introduccion=$_POST['introduccion'];
$manuales=$_POST['manuales'];
$empastado=$_POST['empastado'];
$cd=$_POST['cd'];
$observaciones=$_POST['observaciones'];
$fecha=@date("y-m-d");
	
$consulta="UPDATE proyectos_tiene_documento SET portada='".$portada."',acta_coord='".$acta_coord."',
acta_tutor='".$acta_tutor."',acta_inscrip='".$acta_inscrip."',dedicatoria='".$dedicatoria."', 
agradecimiento='".$agradecimiento."',resumen='".$resumen."',indice_general='".$indice_general."',
introduccion='".$introduccion."',manuales='".$manuales."',empastado='".$empastado."',cd='".$cd."',
observaciones='".$observaciones."'WHERE id_proyecto='".$id_proyecto."' ";
$incluir=mysql_query($consulta);

$query="SELECT * FROM proyectos_tiene_documento WHERE 
id_proyecto='".$id_proyecto."' AND informe!='No' OR
id_proyecto='".$id_proyecto."' AND informe!='' ";
$bus=mysql_query($query);
	 	 
if(($portada=='Si')and($acta_coord=='Si')and($acta_tutor=='Si')and($acta_inscrip=='Si')and($resumen=='Si')and
($indice_general=='Si')and($introduccion=='Si')and($manuales=='Si')and($empastado=='Si')and($cd=='Si')and($cd=='Si')and
(mysql_num_rows($bus)==1)){

$sql2="UPDATE proyectos_tiene_culminacion SET id_culminacion='3',fecha='".$fecha."' WHERE id_proyecto='".$id_proyecto."' ";
mysql_query($sql2);	

}else if(($portada=='')or($acta_coord=='')or($acta_tutor=='')or($acta_inscrip=='')or($resumen=='')or
($indice_general=='')or($introduccion=='')or($manuales=='')or($empastado=='')or($cd=='')or
(mysql_num_rows($bus)==0)){

$sql2="UPDATE proyectos_tiene_culminacion SET id_culminacion='4',fecha='0000-00-00' WHERE id_proyecto='".$id_proyecto."' ";
mysql_query($sql2);	

}
		 
if($incluir==0){
?>
<script type="text/javascript">
alert('El Registro de Los Documentos ha Fallado');
window.location='busqueda_pdoc_mod.php';
</script>
<?php
}else{ 
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Los documentos han sido modificados exitosamente", "success");
});

function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',3000);
        </script>
<?php
date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL SECRETARIO QUE REGISTRO LA ENTREGA DE EMPASTADO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);
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