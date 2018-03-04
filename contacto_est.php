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

	<?php 
	
	if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menus_adm.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menus_est.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menus_coord.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menus_ct.php");	
		
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menus_sec.php");	
		
	}
	?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php 
	
	if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menu.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menu2.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menu3.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menu4.php");	
		
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menu5.php");	
		
	}
	?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	 <section class="content-header">
    <br>
    <h1 class="panel-title text-center">Ayuda/Contacto
    </h1>
    </section>
<section class="content">

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Si presenta dudas con el uso del sistema puede localizar a estas direcciones:</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
			
                                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><p align="center">DIRECCI&Oacute;N (SEDE PRINCIPAL):<br>
				Avenida Universidad s/n, al lado del Comando de la FAN, La Victoria, Estado Aragua.<br><br>
				 
				Tel&eacute;fonos:<br>
				(0244) 3222278 (Postgrado)<br>
				(0244) 3222822 (Acad&eacute;mico)<br>
				(0244)3211478 (Administrativo)<br>
				(0244) 3217054 (Rectorado)</p></th>
                  <th><center><img src="imagenes/upta.jpg" style="width:300px; height:130px;"></center></th>
				  </tr>
                </thead>
                <tbody>
				<tr>
				<th><center><img src="imagenes/maracay.jpg" style="width:300px; height:130px;"></center></th>
                  <th><p align="center">DIRECCI&Oacute;N (SEDE EXTENSI&Oacute;N MARACAY):<br>
				Avenida Para&iacute;so al lado de la ETI "Joaqu&iacute;n Avell&aacute;n"<br><br>
				 
				Tel&eacute;fonos:<br>
				(0243) 5561608/5513469<br>
				<a href="http://maracay.upta.edu.ve">http://maracay.upta.edu.ve</a></p></th>
					</tr>
				<tr>
                  <th><p align="center">DIRECCI&Oacute;N (SEDE PROGRAMA BARBACOAS):<br>
				"Frente Manga Coleo "<br><br>
				 
				Tel&eacute;fonos:<br>
				(0246) 6261042</p></th>
                  <th><center><img src="imagenes/barbacoas.jpg" style="width:300px; height:130px;"></center></th>
				  </tr>
				</tbody>
              </table>
									
                              </div>
                        </div>
                        

                    </div>

                <!-- end panel -->
            </div>
        </div>

		
		     

                   
               </div> <!-- fin de box box-info -->


          </div> <!-- fin de rejilla-->

       </form> 
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
