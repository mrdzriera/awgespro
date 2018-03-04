<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if(($_SESSION['tipocuentas']!='Administrador')and
($_SESSION['tipocuentas']!='Coord Trayecto')and
($_SESSION['tipocuentas']!='Secretario')){
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
   <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="font-awesome/css/font-awesome.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="_all-skins.min.css">
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

  <?php if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menus_adm.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menus_est.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menus_coord.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menus_ct.php");	
		
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menus_sec.php");	
		
	} ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menu.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menu2.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menu3.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menu4.php");	
		
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
      Proyectos/Estad&iacute;sticas/Gr&aacute;ficos
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!-- AREA CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="panel-title text-center">Gr&aacute;fico de dona</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:350px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="panel-title text-center">Gr&aacute;fico de area</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:350px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->

          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-10 col-md-offset-1">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="panel-title text-center">Gr&aacute;fico de linea</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:350px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>  

    </section>
      <!-- /.row -->

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
<!-- Bootstrap 3.3.6 -->
<!-- FastClick -->
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap.min.js"></script>
<!-- DataTables -->
<script src="jquery.dataTables.min.js"></script>
<!-- SlimScroll -->
<script src="jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="fastclick.js"></script>
<!-- AdminLTE App -->
<script src="app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="demo.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="Chart.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<?php 
//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$nomb_pnf=$_GET['nomb_pnf'];
$num_trayecto=$_GET['num_trayecto'];
$num_seccion=$_GET['num_seccion'];
$anio=$_GET['anio'];
$sede=$_GET['sede'];
$turno=$_GET['turno'];
$accion=$_GET['accion'];
$forma=$_GET['forma'];


if($forma!='Todas'){

$sql="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND factibilidad='Factible' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql1="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND factibilidad='No Factible' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";  

$sql2="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.factibilidad='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql3="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.codigo!='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql4="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.codigo='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";  


$sql5="SELECT COUNT(titulo)AS'cuenta' 
FROM proyectos,estudiante,anios,pnfs,trayectos,secciones,turnos,sedes,
est_cursa_proy,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
anios.id=est_cursa_proy.id_anio AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
proyectos_tiene_culminacion.id_culminacion='3' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
secciones.num_seccion='".$num_seccion."' AND
trayectos.descripcion='".$num_trayecto."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql6="SELECT COUNT(titulo)AS'cuenta' 
FROM proyectos,estudiante,anios,pnfs,trayectos,secciones,turnos,sedes,
est_cursa_proy,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
anios.id=est_cursa_proy.id_anio AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
proyectos_tiene_culminacion.id_culminacion='4' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."'";
	
}else if($forma='Todas'){

$sql="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND factibilidad='Factible' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql1="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND factibilidad='No Factible' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";  

$sql2="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.factibilidad='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";
	
$sql3="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.codigo!='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";

$sql4="SELECT COUNT(titulo) AS'cuenta'
FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.codigo='' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";  

$sql5="SELECT COUNT(titulo)AS'cuenta' 
FROM proyectos,estudiante,anios,pnfs,trayectos,secciones,turnos,sedes,
est_cursa_proy,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
anios.id=est_cursa_proy.id_anio AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
proyectos_tiene_culminacion.id_culminacion='3' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' ";


$sql6="SELECT COUNT(titulo)AS'cuenta' 
FROM proyectos,estudiante,anios,pnfs,trayectos,secciones,turnos,sedes,
est_cursa_proy,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
anios.id=est_cursa_proy.id_anio AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
proyectos_tiene_culminacion.id_culminacion='4' AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."'";	

}
	
$r=mysql_query($sql);
$row=mysql_fetch_array($r);

$r1=mysql_query($sql1);
$row1=mysql_fetch_array($r1);

$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);

$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);

$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);

$r6=mysql_query($sql6);
$row6=mysql_fetch_array($r6);
?>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Factible", "No Factible", "En Espera", "Con codigo", "Sin codigo", "Culminados", "No Culminados"],
      datasets: [
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $row['cuenta'];?>, <?php echo $row1['cuenta'];?>, <?php echo $row2['cuenta'];?>, <?php echo $row3['cuenta'];?>, <?php echo $row4['cuenta'];?>, <?php echo $row5['cuenta'];?>, <?php echo $row6['cuenta'];?>]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?php echo $row['cuenta'];?>,
        color: "#f56954",
        highlight: "#dc374b",
        label: "Factible"
      },
      {
        value: <?php echo $row1['cuenta'];?>,
        color: "#5ec730",
        highlight: "#7be34d",
        label: "No Factible"
      },
      {
        value: <?php echo $row2['cuenta'];?>,
        color: "#f39c12",
        highlight: "#be7b2b",
        label: "En Espera"
      },
      {
        value: <?php echo $row3['cuenta'];?>,
        color: "#00c0ef",
        highlight: "#2ba8be",
        label: "Con codigo"
      },
      {
        value: <?php echo $row4['cuenta'];?>,
        color: "#3c8dbc",
        highlight: "#3b47b2",
        label: "Sin codigo"
      },
      {
        value: <?php echo $row5['cuenta'];?>,
        color: "#a4e8b8",
        highlight: "#71f799",
        label: "Culminados"
      },
       {
        value: <?php echo $row6['cuenta'];?>,
        color: "#698a73",
        highlight: "#7d8e82",
        label: "No Culminados"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
