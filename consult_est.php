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
      Consultas de proyecto
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
            <form class="form-horizontal" action="cons_est.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                <div class="form-group">
                <?php
                require_once("clasedb.php");
                $db= new clasedb();
                $db-> conectar();

                $sql18="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='18' AND 
				 permisos.id='1'";
                $r18=mysql_query($sql18);

                $sql19="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='19' AND 
				 permisos.id='1'";
                $r19=mysql_query($sql19);

                $sql32="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='32' AND 
				 permisos.id='1'";
                $r32=mysql_query($sql32);

                $sql24="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='24' AND 
				 permisos.id='1'";
                $r24=mysql_query($sql24);

                $sql21="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='21' AND 
				 permisos.id='1'";
                $r21=mysql_query($sql21);

                $sql22="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='22' AND 
				 permisos.id='1'";
                $r22=mysql_query($sql22);

                $sql28="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
				 usuarios.id = usuario_tiene_permiso.id_usuario AND 
				 operaciones.id = usuario_tiene_permiso.id_operacion AND 
				 permisos.id = usuario_tiene_permiso.id_permiso AND 
				 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
				 operaciones.id='28' AND 
				 permisos.id='1'";
                $r28=mysql_query($sql28);
                ?>
                  <div class="col-sm-6 col-sm-offset-3">
                   
                  <select name="opcion" id="opcion" class="form-control" required="">
                  <option value="">Seleccione una opci&oacute;n</option>
                <?php

                if(mysql_num_rows($r18)==1){
                ?>
                <option value="proyectos">Proyectos</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r19)==1){
                ?>
                <option value="factibilidad">Factibilidad</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r24)==1){
                ?>
                <option value="jurados">Jurados</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r28)==1){
                ?>
                <option value="codigos">C&oacute;digos</option>
                  <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r32)==1){
                ?>
                <option value="asistencias">Asistencias</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r22)==1){
                ?>
                <option value="presentaciones">Presentaciones</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r21)==1){
                ?>
                <option value="evaluacion">Evaluaciones</option>
                <?php 
                }
                ?>
                <?php
                if(mysql_num_rows($r22)==1){
                ?>
                <option value="socializacion">Socializaci&oacute;n</option>
                <?php 
                }
                ?>
                  </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />

                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
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
