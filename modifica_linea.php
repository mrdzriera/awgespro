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
    <a href="index2.html" class="logo">
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
      <h1 align="center" class="panel-title text-center">
	    Proyectos/L&iacute;neas de investigaci&oacute;n/Modificar      
      </h1>
      
    </section>

			<section class="content">

        <?php
        require_once("clasedb.php");
       $db=new clasedb();
      $db->conectar();
      mysql_query("SET NAMES 'utf8'");
      $id_pnf=$_GET['id_pnf'];
      $id_linea=$_GET['id_linea'];
      $query="SELECT * FROM lineas_investigacion,pnfs,pnf_tiene_linea WHERE 
	  pnfs.id=pnf_tiene_linea.id_pnf AND
	  lineas_investigacion.id=pnf_tiene_linea.id_linea AND 
	  pnfs.id='".$id_pnf."' AND lineas_investigacion.id='".$id_linea."' ";
      $bus=mysql_query($query);
      $row=mysql_fetch_array($bus); 
       ?>

           <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="linea_modificada.php" name="form" method="post">
                    <div class="box-body panel-title text-center">

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label" align="right">Nombre:</label>

                        <div class="col-sm-6">
                         <input type="text" name="nombre" id="nombre" onkeypress="return sololetras(event)" onpaste="return false" 
						 class="form-control"  size="4" value="<?php echo $row['nombre'];?>"required>
                        </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                      </div>
                     
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label" align="right">PNF:</label>

                         <div class="col-sm-6">
                         <select name="id_pnf" class="form-control" required>
                         <option value="<?php echo $id_pnf;?>"><?php echo $row['nomb_pnf']?></option>
                         <?php 
						require_once("clasedb.php");
						$db= new clasedb();
						$db->conectar();
						$sql2="SELECT * FROM pnfs ORDER BY nomb_pnf";
						$r2=mysql_query($sql2);
						while(@$row2=mysql_fetch_array($r2)){
						?>
						<option value="<?php echo $row2['id']?>"><?php echo $row2['nomb_pnf']?></option>
						<?php 
						}
						?>
                         </select>
                        </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                      </div>
						 <input type="hidden" name="id_linea" value="<?php echo $row['id_linea'];?>"required>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <center>
                      <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Modificar </button>
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
