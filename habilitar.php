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
      <h1 class="panel-title text-center">
       Permisos/Forma General/Habilitar
         
      </h1>

	  <?php
	  $tipo_usuario=$_POST['tipo_usuario'];
	  if($tipo_usuario=='Estudiante'){
	  ?>
<section>
  	 	  
         <form action="#" name="form" method="post">
         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border"><br>
					    <center><strong>Privilegios para estudiantes</strong></center>
						<br>
	
                     <center> <h3 class="box-title">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />) son obligatorios</h3></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

				  <center>
					  <select name="operacion" name="operacion" class="form-control-sel">
				  <option value="Registrar Proyecto">Registrar Proyecto</option>
				  <option value="Registrar Asistencias">Registrar Asistencias</option>
				  </select>&nbsp;<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />
				  </center>

              </div>
                    </div> <!-- Fin de box-body -->

                    <div class="box-footer"><center>
                <button type="submit"  onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Continuar </button></center>
              </div>



          </div> <!-- fin de rejilla-->

       </form> <!-- fin de formulario-->
                      
                    </div> <!-- Fin de box-body -->                      

           
               </div> <!-- fin de box box-info -->	 
    </section>
	
<?php
	  } else if($tipo_usuario=='Coordinador'){
	  ?>
<section>
  	 	  
         <form action="regevadef_habilitado.php" name="form" method="post">
         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border"><br>
					   <center><strong>Privilegios para Coordinadores</strong></center>
						<br>
	
                     <center> <h3 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px;    "  />) son obligatorios</h3></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

				  <center>
					  <select name="operacion" name="operacion" class="form-control-sel">
					  <option value="Registrar Factibilidad">Registrar Factibilidad</option>
					  <option value="Registrar Presentaciones">Registrar Presentaciones</option>
					  <option value="Registrar Evaluaciones">Registrar Evaluaciones</option>
					  <option value="Registrar Socializacion">Registrar Socializaci&oacute;n</option>
					  <option value="Registrar Evaluacion Definitiva">Registrar Evaluaci&oacute;n Definitiva</option>
					  <option value="Registrar Culminacion">Registrar Culminaci&oacute;n</option>
					  </select>&nbsp;<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />
				  </center>

					</div>
                    </div> <!-- Fin de box-body -->

                    <div class="box-footer"><center>
                <button type="submit"  onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Continuar </button></center>
              </div>



          </div> <!-- fin de rejilla-->

       </form> <!-- fin de formulario-->
                      
                    </div> <!-- Fin de box-body -->                      

           
               </div> <!-- fin de box box-info -->	 
    </section>

	
	  <?php
	  } else if($tipo_usuario=='Secretario'){
	  ?>
<section>
  	 	  
         <form action="regcod_habilitado.php" name="form" method="post">
         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border"><br>
					   <center><strong>Privilegios para Secretarios</strong></center>
						<br>
	
                     <center> <h3 class="box-title">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />) son obligatorios</h3></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

				  <center>
					  <select name="operacion" name="operacion" class="form-control-sel">
					  <option value="Registrar Codigos">Registrar C&oacute;digos</option>
					  <option value="Registrar Documentos">Registrar Documentos</option>
					  </select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px;    "  />
						</center>

					</div>
                    </div> <!-- Fin de box-body -->

                    <div class="box-footer"><center>
                <button type="submit"  onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Continuar </button></center>
              </div>
         </div> <!-- fin de rejilla-->

       </form> <!-- fin de formulario-->
                      
                    </div> <!-- Fin de box-body -->                      

           
               </div> <!-- fin de box box-info -->	 
    </section>
    <?php }else if($tipo_usuario='Usuario'){?>

  <section>
  	 	  
         <form action="mostrar_usuario.php" name="form" method="post">
         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border"><br>
					   <center><strong>Desbloquear Cuenta</strong></center>
						<br>
	
                     <center> <h3 class="box-title">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px;    "  />) son obligatorios</h3></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

				  <center>
					  C.I. del usuario:&nbsp;<input type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" name="ci" class="form-control-sel">
					  &nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px;    "  />
						</center>

					</div>
                    </div> <!-- Fin de box-body -->

                    <div class="box-footer"><center>
                <button type="submit"  onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Continuar </button></center>
              </div>
         </div> <!-- fin de rejilla-->

       </form> <!-- fin de formulario-->
                      
                    </div> <!-- Fin de box-body -->                      

           
               </div> <!-- fin de box box-info -->	 
    </section>   
<?php 
	}
?>	

 

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
