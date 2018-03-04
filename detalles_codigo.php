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
      Proyectos/Consultar/C&oacute;digo   
      </h1>
      
    </section>
<section class="content">

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-left">Proyectos por c&oacute;digo</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
<?php 

$codigo=$_POST['codigo'];
$cip=$_POST['cip'];
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);



if(($codigo!="")&&($cip!="")){
	
$busqueda=mysql_query("SELECT *,estudiante.ci AS'ci_1',proyectos.id AS'id_proyecto'
FROM estudiante,est_tiene_proy,proyectos,profesores,coord_tiene_proy
WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id=coord_tiene_proy.id_proyecto AND
proyectos.codigo='".$codigo."' AND  
profesores.ci='".$cip."' "); 
	}

	 if(mysql_num_rows($busqueda)==0){
?>
        <script type="text/javascript">
          alert('Disculpe, No hay Proyectos con este Lider');
          window.location='detalles_proyecto2.php';
        </script>
<?php
	 }
	 else {


while(@$muestra=mysql_fetch_array($busqueda)){ ?>
							     <form action='planilla_inscripcion.php' name='form' method='post' >
								  <center><input type="hidden" name="id" id="id" value="<?php echo $muestra['id_proyecto'];?>"></center>
									<center><input type="hidden" name="id_estudiante2" id="id_estudiante2" value="<?php echo $muestra['id_estudiante2'];?>"></center>
									<center><input type="hidden" name="id_estudiante3" id="id_estudiante3" value="<?php echo $muestra['id_estudiante3'];?>"></center>
								  <center><input type="hidden" name="ci" id="ci" value="<?php echo $muestra['ci_1']?>"></center>
									<center><input type="hidden" name="pnf" id="pnf" value="<?php echo $muestra['nomb_pnf'];?>"></center>
							
                                <table class="table table-bordered table-striped">
                             	  <thead><tr>
                                <center>
                                        <td align='center'>T&iacute;tulo de proyecto:</td>
                                        <td align='center'>Imprimir: </td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td ><p align='justify'><?php echo $muestra['titulo'];?></p></td>
											<td align='center'><a href="planilla_inscripcion.php?ci=<?php echo $muestra['ci_1']; ?>&id_estudiante2=<?php echo $muestra['id_estudiante2'] ?>&id_estudiante3=<?php echo $muestra['id_estudiante3'] ?>" ><img src="imagenes/pdf.png" style="width:30px; height:30px;" ></a></td>
											 </tr>

                                      </tbody>
                                </table>
									</form>
									<?php } ?>
	 <?php }  ?>
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
