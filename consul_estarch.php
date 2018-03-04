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
    <a href="index2.html" class="logo">
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
        Registros/Archivos        
      </h1>

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-left">Tablas de datos</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a marked="1" href="#home" aria-controls="home" data-toggle="tab" aria-expanded="true"> Estudiante </a></li>
                      </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
<?php
require_once("clasedb.php");
$db=new clasedb();
$db-> conectar();
$ci=$_POST['ci'];
$sql="SELECT estudiante.*,usuarios.id,correo,telefono FROM estudiante,usuarios WHERE 
estudiante.ci=usuarios.ci AND estudiante.ci='".$ci."' AND nivel='Estudiante' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
if(mysql_num_rows($r)==0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No existe un estudiante con esta cedula", "error");
});
function redireccionar(){
window.location="per_estarch.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
}else{
?>
<table class="table table-bordered table-striped">
<thead>
<tr>
<center>
<td align='center'>Nombre</td>
<td align='center'>Apellido</td>
<td align='center'>C&eacute;dula</td>
<td align='center'>Correo</td>
<td align='center'>T&eacute;lefono</td>
</center>  
</tr>
</thead>
<tbody>
<tr>
<td align='center'><?php echo $row['nombres'];?></td>
<td align='center'><?php echo $row['apellidos'];?></td>
<td align='center'><?php echo $row['ci'];?></td>
<td align='center'><?php echo $row['correo'];?></td>
<td align='center'><?php echo $row['telefono'];?></td>
</tr>
</tbody>
</table>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<form action="perarchivo_cambiado.php" name="form" method="post">
         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center> <h3 class="box-title">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />) son obligatorios</h3></center>
                     </div>

                    <div class="box-body">

                      <div class="form-group">
                        <br>
                  <label for="inputEmail3" class="col-sm-4 control-label" align="right">Subir archivos:</label>

                     <div class="col-sm-7">
                    <select name="id_permiso" class="form-control" required>
					<option value="">Seleccione</option>
					<option value="1">Habilitar</option>
					<option value="0">Deshabilitar</option>
					</select>
                  </div>
				  <img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />
                </div>                          

				<input type="hidden" name="id_usuario" value="<?php echo $row['id'];?>">
                    </div> <!-- Fin de box-body -->

                    <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right"> <i class="fa fa-share" aria-hidden="true"></i>
                Continuar </button>
              </div>

                        
              </div>

                   
               </div> <!-- fin de box box-info -->


          </div> <!-- fin de rejilla-->

       </form> <!-- fin de formulario-->
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
