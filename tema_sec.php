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
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
			<img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index6.php" class="logo">
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
        Personalizaci&oacute;n de temas
         
      </h1>
      
    </section>
    <section class="content-header">
 
         <div class="col-md-10 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Temas disponibles</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body panel-title text-center">
                
                <center><table id="layout-skins-list" class="table table-striped bring-up nth-2-center" align="center">
        <thead>
          <tr>
            <th align="center">Colores</th>
            <th align="center">Visualizar</th>
          </tr>
        </thead>
        <tbody>
          <tr> 
            <td>Tema azul con gris</td>
            <td><a href="#" data-skin="skin-blue" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema azul con blanco</td>
            <td><a href="#" data-skin="skin-blue-light" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema amarillo con gris</td>
            <td><a href="#" data-skin="skin-yellow" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema amarillo con blanco</td>
            <td><a href="#" data-skin="skin-yellow-light" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema verde con gris</td>
            <td><a href="#" data-skin="skin-green" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema verde con blanco</td>
            <td><a href="#" data-skin="skin-green-light" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema purpura con gris</td>
            <td><a href="#" data-skin="skin-purple" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema purpura con blanco</td>
            <td><a href="#" data-skin="skin-purple-light" class="btn bg-purple btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema rojo con gris</td>
            <td><a href="#" data-skin="skin-red" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema rojo con blanco</td>
            <td><a href="#" data-skin="skin-red-light" class="btn btn-danger btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema blanco con gris</td>
            <td><a href="#" data-skin="skin-black" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
          <tr>
            <td>Tema blanco</td>
            <td><a href="#" data-skin="skin-black-light" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a></td>
          </tr>
        </tbody>
      </table></center>
                
              </div>
              <!-- /.box-body -->
             
            </form>
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
