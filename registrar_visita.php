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
    <a href="index2.html" class="logo">
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
        Asistencias/Registrar 
         
      </h1>
      
    </section>

  <section class="content">

       <div class="col-md-13">
            
            <div class="col-md-13">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Registrar asistencias</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                      </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
                              <form action='visita_registrada.php' name='form' method='post' >
                              <?php
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();

$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
$rs=mysql_query($select);
$trae=mysql_fetch_array($rs);
			
date_default_timezone_set('America/Caracas');

$sql="SELECT proyectos.id AS'id_proyecto',estudiante.id AS'id_estudiante' 
FROM proyectos,estudiante,anios,est_tiene_proy,proyectos_tiene_opinion,proyectos_tiene_comite WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND  
proyectos.id=proyectos_tiene_opinion.id_proyecto AND  
proyectos.id=proyectos_tiene_comite.id_proyecto AND  
anios.id=proyectos.id_anio AND
estudiante.ci= '".$_SESSION['cedula_usu']."' AND 
anios.id='".$trae['id']."' AND
opn_coord='Si' AND
id_comite1!='0' AND
proyectos.factibilidad='Factible' OR
estudiante.ci= '".$_SESSION['cedula_usu']."' AND
estudiante.id=est_tiene_proy.id_estudiante2 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND
proyectos.id=proyectos_tiene_comite.id_proyecto AND  
anios.id=proyectos.id_anio AND
estudiante.ci= '".$_SESSION['cedula_usu']."' AND 
anios.id='".$trae['id']."' AND
opn_coord='Si' AND
id_comite1!='0' AND
proyectos.factibilidad='Factible' OR
estudiante.ci= '".$_SESSION['cedula_usu']."' AND
estudiante.id=est_tiene_proy.id_estudiante3 AND 
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
proyectos.id=proyectos_tiene_comite.id_proyecto AND 
anios.id=proyectos.id_anio AND
estudiante.ci= '".$_SESSION['cedula_usu']."' AND 
anios.id='".$trae['id']."' AND
opn_coord='Si' AND
id_comite1!='0' AND
proyectos.factibilidad='Factible' ";
$r=mysql_query($sql);
$c=mysql_fetch_array($r);
$cont=mysql_num_rows($r);

if(mysql_num_rows($r)==0){

?>
<script>
$(document).ready(function(){
sweetAlert("Disculpe", "Usted aun no tiene proyectos registrados", "error");
});
function redireccionar(){
window.location="index3.php";
}
setTimeout('redireccionar()',4000);
</script>
<?php
}else{
$sql2="SELECT MAX(pagina) AS'maximo' FROM estudiante,proyectos,visitas_comunidades WHERE
proyectos.id= visitas_comunidades.id_proyecto AND
estudiante.id=visitas_comunidades.id_estudiante AND
estudiante.ci =  '".$_SESSION['cedula_usu']."' ";
$ejecutar=mysql_query($sql2);
$data=mysql_fetch_array($ejecutar);
$pagina=$data['maximo'];
$pagina=$pagina+1;
?>
                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>D&iacute;a</td>
                                        <td align='center'>Fecha </td>
                                        <td align='center'>Hora de entrada </td>
                                        <td align='center'>Hora de salida</td>
                                        <td align='center'>Actividades</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            
                                            <?php 
                                            for($i=0; $i<6;$i++){ 
                                            date_default_timezone_set('UTC');?>
                                            <tr>
                                            <td align='center'>
                                            <input type='hidden' name='id_proyecto[]' id='id_proyecto' value='<?php echo $c['id_proyecto']; ?>'>
                                            <input type='hidden' name='id_estudiante[]' id='id_estudiante' value='<?php echo $c['id_estudiante']; ?>'>
                                            <select name='dia[]' id='dia' class="form-control" required>
                                            <option value="">Seleccione </option>
                                            <option value='Lunes'>Lunes</option>
                                            <option value='Martes'>Martes</option>
                                            <option value='Miercoles'>Miercoles</option>
                                            <option value='Jueves'>Jueves</option>
                                            <option value='Viernes'>Viernes</option>
                                            </select></td>
                                            <td align='center'><input type='date' name='fecha[]' id='fecha' style="width: 150px;" class="form-control" 
											value='<?php date_default_timezone_set('America/Caracas'); echo  $fecha=date('Y-m-d'); ?>'required></td>
                                            <td align='center'><input type='time' name='hora_entrada[]' id='hora_entrada' class="form-control"
											value='<?php date_default_timezone_set('America/Caracas'); echo $hora=date('h:i'); ?>' required></td>
                                            <td align='center'><input type='time' name='hora_salida[]' id='hora_salida' class="form-control"
											value='<?php echo $hora=date('h:i'); ?>' required></td>
                                            <td align='center'><input type='text' name='actividad[]' id='actividad' class="form-control" value='' required></td>
											<input type='hidden' name='pagina[]' class="form-control" value='<?php echo $pagina?>' required>
                                           <?php  
										   }
										   ?>
                                      </tbody>
                                </table>
                                <?php
                                } 
                                ?>
                                <div class="box-footer">
                                 <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button>
                </center>
                                </div>
                                </form>

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
