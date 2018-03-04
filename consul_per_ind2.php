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
	  	<?php
	$tipo=$_POST['tipo'];
	$forma=$_POST['forma'];
	?>
      <br>
      <h1 class="panel-title text-center">
        Permisos/
		<?php if($tipo=='estudiante'){
		
		echo "Estudiante";
		
		}else if($tipo=='coordinador'){
		
		echo "Coordinador";
		
		}else if($tipo=='secretario'){
		
		echo "Secretario";
		
		}else if($tipo=='usuario'){
		
		echo "Desbloquear Usuario";
		
		}
		?>
		</h1>

	<section class="content">

<?php
$forma=$_POST['forma'];
$tipo=$_POST['tipo'];


if($forma=='Forma individual'){
?>
<div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="mostrar_usuario3.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C.I</label>

                  <div class="col-sm-6">
                    <input class="form-control" placeholder="12345678" name="ci" id="inputEmail3"  type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8">
                  <input type="hidden" name="tipo" value="<?php echo $tipo;?>">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
               <button type="submit" class="btn btn-info" onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Asignar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>

<?php 
}else if($forma=='Forma general'){
	
?>

       <div class="col-md-13">
            
            <div class="col-md-13">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Permisos de <?php echo $forma;?></h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
<form action="consul_priv_gen.php" method="post" name="form">
<?php
if($tipo=='estudiante'){
?>	
		 <table class="table table-bordered table-striped">
     <thead>
     
     <td align='center' colspan=2> Acciones de registro: </td>
      
     </tr>
     </thead>                           

<tr>
     <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proyecto&nbsp;&nbsp; <br><input type="checkbox" name="conpro" id="conpro" value="1"></td>
     <td align="center">&nbsp;Asistencias <br><input type="checkbox" name="regasis" id="regasis" value="1" ></td>
     </tr>
    </table>
						



<table class="table table-bordered table-striped">
<thead>
<td align='center' colspan=2> Acciones para consultar: </td>
<tr>
<td align='center'>&nbsp;Proyectos&nbsp; <br><input type="checkbox" name="conpro" id="conpro" value="1"   ></td>
<td align='center'>&nbsp;Factibilidad&nbsp; <br><input type="checkbox" name="confact" id="confact" value="1"   ></td>

</tr>
 </thead>
 
<tr>
<td align='center'>&nbsp;Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" ></td>
<td align='center'>&nbsp;Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" ></td>
</tr>
 
<tr>
<td align='center'>&nbsp;Asistencias&nbsp; <br><input type="checkbox" name="conasis" id="conasis" value="1" ></td>
<td align='center'>&nbsp;Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" ></td>
</tr>
</table>

<table class="table table-bordered table-striped">
<tr>
<td><center>&nbsp;Codigos&nbsp; <br><input type="checkbox" name="concod" id="concod" value="1" ></center></td>
</tr>
</table>
<?php
}else if($tipo=='coordinador'){
?>
<table class="table table-bordered table-striped">


<center><b>Acciones para registrar</b></center>
 <thead>
<tr>
<td align='center'>Factibilidad <br><input type="checkbox" name="regfact" id="regfact" value="1"   ></td>
<td align='center'>Presentaciones <br><input type="checkbox" name="regpre" id="regpre" value="1" ></td>
</tr>
 </thead>
<tr>
<td align='center'>Evaluaciones <br><input type="checkbox" name="regeva" id="regeva" value="1" ></td>
<td align='center'>Socializaci&oacute; <br><input type="checkbox" name="regsoc" id="regsoc" value="1"   ></td>
</tr>

<tr>
<td align='center'>Evaluacion definitiva <br><input type="checkbox" name="regevadef" id="regevadef" value="1" ></td>
<td align='center'>Culminaci&oacute;n <br><input type="checkbox" name="regculm" id="regculm" value="1" ></td>
</tr>

</table>

<table class="table table-bordered table-striped">
<thead>
<center><b>Acciones para consultar</b></center>
<tr>
<td align='center'>Factibilidad&nbsp; <br><input type="checkbox" name="confact" id="confact" value="1"   ></td>
<td align='center'>Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" ></td>

</tr>
 </thead>
 
<tr>
<td align='center'>Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" ></td>
<td align='center'>Comunidades&nbsp;  <br><input type="checkbox" name="concom" id="concom" value="1"   ></td>
</tr>
 
<tr>
<td align='center'>Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" ></td>
<td align='center'>Proyectos&nbsp; <br><input type="checkbox" name="conpro" id="conpro" value="1"   ></td>
</tr>
</table>
<table class="table table-bordered table-striped">
<thead>
<tr>
<center><b>Acciones de Modificar</b></center>
</thead>
<tr>
<td align="center">Retiro de Proyectos&nbsp; <br><input type="checkbox" name="conretpro" id="conretpro" value="1" ></td>
<td align="center">Habilitar Modificaciones&nbsp; <br><input type="checkbox" name="habmod" id="habmod" value="1" ></td>
</tr>
</table>
<?php	
}else if($tipo=='secretario'){
?>
<table class="table table-bordered table-striped">
<center><b>Acciones para registrar</b></center>
<tr>
<td align='center'>Codigos&nbsp; <br><input type="checkbox" name="regcod" id="regcod" value="1" ></td>
<td align='center'>Documentos&nbsp; <br><input type="checkbox" name="regdoc" id="regdoc" value="1" ></td>
</tr>
</table>
<table class="table table-bordered table-striped">
<center><b>Acciones para habilitar</b></center>
<tr>
<td align='center'>Archivos&nbsp; <br><input type="checkbox" name="habarch" id="habarch" value="1" ></td>
</tr>
</table>

<table class="table table-bordered table-striped">
<thead>
<center><b>Acciones para consultar, modificar en imprimir</b></center>
<tr>
<td align='center'>Comunidades&nbsp; <br><input type="checkbox" name="concom" id="concom" value="1"   ></td>
<td align='center'>Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" ></td>
</tr>
</thead>
<tr>
<td align='center'>Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" ></td>
<td align='center'>Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" ></td>
</tr>
<tr>
<td align='center'>Codigos&nbsp; <br><input type="checkbox" name="concod" id="concod" value="1" ></td>
<td align='center'>Documentos&nbsp; <br><input type="checkbox" name="moddoc" id="moddoc" value="1" ></td>
</tr>
<tr>

<td align='center'>Solvencias&nbsp; <br><input type="checkbox" name="gensol" id="gensol" value="1" ></td>
<td align='center'>Habilitar Cuenta&nbsp; <br><input type="checkbox" name="descuen" id="descuen" value="1" ></td>
</tr>
<tr>

<td align='center'>Retiro de Proyectos&nbsp; <br><input type="checkbox" name="conretpro" id="conretpro" value="1" ></td>
<td align='center'>Habilitar Modificaciones&nbsp; <br><input type="checkbox" name="habmod" id="habmod" value="1" ></td>
</tr>
</table>

<?php
}
?>
<input type="hidden" name="tipo" value="<?php echo $tipo;?>">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button>
                </center>
				<br>
</form>
<?php	
}
?>


             

                 

                        
              </div>

                   
               </div> <!-- fin de box box-info -->


          </div> <!-- fin de rejilla-->

	   
	   </section>
<!-- fin de box box-info -->
    
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
