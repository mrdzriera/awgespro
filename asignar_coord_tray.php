<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Administrador'){
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
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
	<aside> 

	<?php include ("menus_adm.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Proyectos/Asignar Coord. Trayecto
      </h1>
      
    </section>
  
  <section class="content">

  <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="coord_tray_asignado.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Profesor</label>

                  <div class="col-sm-6">
                   <td align="left" width=""><select name="id_profesor" id="pnf" class="form-control" required>
                    <option value="">Seleccione una opci&oacute;n</option>
                    <?php 

                    require_once("clasedb.php");
                    $db= new clasedb();
                    $db->conectar();

                    $nomb_pnf=$_POST['nomb_pnf'];
                    $sql1="SELECT id FROM pnfs WHERE nomb_pnf='".$nomb_pnf."'";
                    $r1=mysql_query($sql1);
                    $row1=mysql_fetch_array($r1);
                    $sql="SELECT * FROM profesores WHERE area_especializacion='".$nomb_pnf."' order by apellidos";
                    $r=mysql_query($sql);
                    while($row=mysql_fetch_array($r)){
                    ?>

                    <option value="<?php echo $row['id'];?>"><?php echo  $row['apellidos'] .'&nbsp;'. $row['nombres'];?></option>
                    <?php 
                    }
                    ?>
                    </select>
                    <input type="hidden" name="id_pnf" id="id_pnf" class="form-control"  title="Seleccione una Opcion" value="<?php echo $row1['id'];?>" readonly required> 
                            
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Trayecto</label>

                  <div class="col-sm-6">
                    <select  name="trayecto" id="trayecto" class="form-control" title="Seleccione una Opcion" value="" required>
                    <option value="">Seleccione una opci&oacute;n</option> 
                    <option value="1"> I </option>
                    <option value="2"> II </option>
                    <option value="3"> III </option>
                    <option value="4"> IV </option>
                    <option value="5"> V </option>
                    </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i>
                Asignar </button>
                </center>
              </div>
              <!-- /.box-footer -->
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
