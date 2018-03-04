<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coord Trayecto'){
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
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
	<aside> 

	<?php include ("menus_ct.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu4.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<br>
	    <h1 class="panel-title text-center">
        Consultas de Proyecto/Evaluaci&oacute;n
        </h1>
    </section>
  
  <section class="content">
  	
  	 <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Consultar evaluaci&oacute;n</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">

<?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);	


$ci_1=$_POST['ci_1'];
$anio=$_POST['anio'];
$fase=$_POST['fase'];
	
	$consulta="SELECT * FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,evaluacion,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=evaluacion.id_proyecto AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci= '".$ci_1."' AND fase= '".$fase."' AND anios.periodo='".$anio."' ";
	
	$resultado=mysql_query($consulta);
	
	 if(mysql_num_rows($resultado)==0){
?>
        <!----><script type="text/javascript">
       $(document).ready(function(){
		sweetAlert("Disculpe", "No hay Evaluaciones Registradas con este Lider en esta fase para este periodo academico", "error");
		 });
		function redireccionar(){
		window.location="consulta_evaluacion_ct.php";
		}
		setTimeout('redireccionar()',2000);
        </script>
<?php
	 }
	 else {	
		

	while(@$fila= mysql_fetch_array($resultado)){
?>		
<br>
<center><b>La evaluacion del proyecto es:</b></center>
<br>	
	<center> <table class="table table-bordered table-striped" >
	<thead>
	<tr>
	<td><center><strong>Titulo:</strong></center></td>
	<td><center><strong>PNF:</strong></center> </td>
	<td><center><strong>Trayecto</strong></center> </td>
	<td><center><strong>A&ntilde;o:</strong></center></td>
	</tr>
	</thead>
	<tbody>
	<tr>
   <td align="justify"><?php echo $fila['titulo'];?>	</td>
	<td><center><?php echo $fila['nomb_pnf'];?></center> </td>
	<td><center><?php echo $fila['descripcion'];?></center> </td>
	<td><center><?php echo $fila['periodo'];?></center></td>
	</tr>
	</tbody>
	</table></center>
		
		<center><b>Integrantes del jurado evaluador</b></center>
	    <br>
		<center>
		<table class="table table-bordered table-striped" >
		<thead>
		<tr>
		<td><center><b>Nota del coordinador</b></center></td>
		<td><center><b>Nota del tutor</b></center></td>
		<td><center><b>Nota del especialista:</b></center></td>
		</tr>
</thead>
<tbody>
		<tr>
		<td><center><?php echo $fila['cal_c']; ?></center></td>
		<td><center><?php echo $fila['cal_t']; ?></center></td>
		<td><center><?php echo $fila['cal_e']; ?></center></td>
		</tbody>
		</tr>
			</table>
		<?php
			
$sql2="SELECT ((cal_c+cal_t+cal_e)/3) AS'total' FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,evaluacion,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=evaluacion.id_proyecto AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci= '".$ci_1."' AND fase= '".$fase."' AND anios.periodo='".$anio."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);
		?>

		<table border="1" class="table table-bordered table-striped">
		<thead>
		<tr>
		<td><center>Nota definitiva en la fase:<?php echo $row2['fase'];?></center></td>
		</tr>
		<thead>
		<tbody>
		<tr>
		<td><center> <?php echo number_format($row2['total'],0,".",",");?></center></td>
		</tr>
		</tbody>
	</table>
<?php
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL COORDINADOR QUE CONSULTO LA EVALUACION DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
//echo $sql;
mysql_query($sql);
?>
	
		</table>

		
			   </center> 
	<?php 
	}
	 }
?>	
                        
                         </div>
                        </div>
                        

                    </div>

                <!-- end panel -->
            </div>
        </div>

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
