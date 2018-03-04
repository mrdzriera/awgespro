<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}

if($_SESSION['tipocuentas']!='Administrador'){
	?>
<script language="javascript">
window.location="index.php";
</script>
	<?php
}

//set_time_limit(300);

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
      <span class="logo-lg"><b>Awgespro</span>
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
      <br><h1>
Restaurar Base de Datos      
      </h1>
      
    </section>
<section class="content">

<script language="javascript">

function continuar(){

var ficheroDeCopia=document.getElementById("ficheroDeCopia").value;

if(ficheroDeCopia!=""){
	
swal("Restaurando...");	
	
}
	
}
</script>

<?php

$id=$_GET['id'];

require_once("clasedb.php");
$db=new clasedb();
$db->conectar();

$sql="SELECT * FROM usuarios WHERE id='".$id."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);


$_POST['clave']=$row['clave'];	

echo'<title>Restore & backup para windows y linux</title>'; 
if (!isset ($_FILES["ficheroDeCopia"])) 
{ 
$contenidoDeFormulario="<form action='restore.php' method='post' enctype='multipart/form-data' name='formularioDeRestauracion'";
	$contenidoDeFormulario.="id='formularioDeRestauracion'>\n<div class='col-md-8 col-md-offset-2'><div class='box box-info'>  ";
	$contenidoDeFormulario.="<input type='hidden' name='clave' value='".$_POST['clave']."' required>";
	$contenidoDeFormulario.="<h3 align='center' style='font-family:Andalus;'>Indique el origen del archivo de copia:</h3> \n";
	$contenidoDeFormulario.="\n<div class='box-body'><div class='form-group'>
	<label for='inputEmail3' class='col-sm-4 control-label' align='right'>Archivo</label><div class='col-sm-7'>";
	$contenidoDeFormulario.="<input type='file' required class='form-control' style='width:350px;' name='ficheroDeCopia' id='ficheroDeCopia'";
	$contenidoDeFormulario.="size='30'></div></div>\n</div>";
	$contenidoDeFormulario.="\n";
	$contenidoDeFormulario.="<center><button type='submit' onclick='continuar()'> <i class='fa fa-share' aria-hidden='true'></i>Guardar </button></center><br>\n";
	$contenidoDeFormulario.="\n";
	$contenidoDeFormulario.="</div>\n";
	$contenidoDeFormulario.="</form></div></div>\n";	
	echo ($contenidoDeFormulario);
echo ($contenidoDeFormulario); 
} 
 else  
 { 
 $archivoRecibido=$_FILES["ficheroDeCopia"]["tmp_name"]; 
 $destino="./ficheroParaRestaurar.sql"; 
     
if (!move_uploaded_file ($archivoRecibido, $destino)) 
{ 
$mensaje='EL proceso ha fallado'; 
echo $mensaje; 
} 
$sistema="show variables where variable_name= 'basedir'"; 
$restore=mysql_query($sistema); 
$DirBase=mysql_result($restore,0,"value"); 
$primero=substr($DirBase,0,1); 
if ($primero=="/") { 
    $DirBase="bin/mysql"; 
	$servername="mysql.hostinger.es";
	$dbusername="u314620087_awges";
	$dbpassword="cesar1890";
	$dbname="u314620087_awges";

}  
else  
{ 
    $DirBase=$DirBase."bin\mysql"; 
} 
$executa = "$DirBase -h $servername -u $dbusername --password=$dbpassword  $dbname < $destino"; 
@system($executa,$resultado); 
if ($resultado)  
{  
echo "<H3>Error ejecutando comando: $executa</H3>\n"; 
$mensaje="ERROR. La copia de seguridad no se ha restaurado."; 
$cabecera="COPIA DE SEGURIDAD NO RESTAURADA"; 
echo $mensaje; 
echo "<meta http-equiv='Refresh' content='3;url=index.php'>"; 
}  
else  
{ 
    $mensaje2="<script language='javascript'>
		$(document).ready(function(){
		swal('Bien!', 'La Base de datos se restauro exitosamente', 'success');
		});
		function redireccionar(){
		window.location='index2.php';
		}
		setTimeout('redireccionar()',2000);
		</script>"; 
		$cabecera2="COPIA DE SEGURIDAD RESTAURADA";
		echo $mensaje2;
		//echo "<meta http-equiv='Refresh' content='3;url=index2.php'>";
/* 		echo "<script language='javascript'>
		window.location='index2.php';
		</script>"; */
} 

unlink ("ficheroParaRestaurar.sql"); 
     
} 

?>
    </div>

      </section>
    </div>


<?php
include("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
      </div>
      <!-- /.tab-pane -->
    </div>
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
