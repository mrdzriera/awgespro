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

function solonumeros(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key);

numeros="0123456789";

especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){

teclado_especial=true;

				}

			}

	if(numeros.indexOf(teclado)==-1 && !teclado_especial){
	return false;
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
      Proyectos/Registrar        
      </h1>

    </section>

    <section class="content">
      
       <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
            </div>

            <div class="box-header with-border">
            <center> <b>¡IMPORTANTE!</b> <br>Todos los Integrantes del equipo deben tener una cuenta de usuario creada para proceder con la inscripción de su proyecto.</center>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="registro_proyecto2.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                <div class="form-group">
                <?php
                require_once("clasedb.php"); 
                $db=new clasedb();
                $db->conectar();
                $query="SELECT * FROM 
                usuarios,operaciones,permisos,usuario_tiene_permiso 
                WHERE
                usuarios.id=usuario_tiene_permiso.id_usuario AND 
                operaciones.id=usuario_tiene_permiso.id_operacion AND 
                permisos.id=usuario_tiene_permiso.id_permiso AND
                operaciones.nombre='Registrar Proyecto' AND
                permisos.estado='Deshabilitado' AND
                usuarios.ci='".$_SESSION['cedula_usu']."' ";
                $ejecuta=mysql_query($query);
                if(mysql_num_rows($ejecuta)>0){
                ?>  
                <script language="javascript">
                $(document).ready(function(){
                sweetAlert("Disculpe", "Usted aun no esta autorizado para registrar proyectos", "error");
                });
                function redireccionar(){
                window.location="index3.php";
                }
                setTimeout('redireccionar()',3000);
                </script>
                <?php
                }
                ?>

                  <label for="inputEmail3" class="col-sm-4 control-label">C.I estudiante 1</label>
                  <div class="col-sm-6">
                   <input class="form-control" placeholder="12345678" name="ci1"  value="<?php echo $_SESSION['cedula_usu'];?>" id="ci1" required readonly  type="text">
                
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />

                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">C.I estudiante 2</label>

                  <div class="col-sm-6">
                  <input class="form-control" placeholder="12345678" name="ci2" onkeypress="return solonumeros(event);" maxlength="8" onpaste="return false" id="inputEmail3"  type="text">
                  
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">C.I estudiante 3</label>

                  <div class="col-sm-6">
                 <input class="form-control" placeholder="12345678" name="ci3" onkeypress="return solonumeros(event);" maxlength="8" onpaste="return false" id="inputEmail3"  type="text">
                  
                  </div>
                </div>
                
                <?php
                $sql="SELECT MAX(periodo)AS'anio' FROM anios ";
                $r=mysql_query($sql);
                $row=mysql_fetch_array($r);
                ?>

                <input type="hidden" name="anio" id="anio" value="<?php echo $row['anio'];?>">                            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
               <center>
               <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Continuar </button>
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
