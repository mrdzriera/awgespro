<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
$nivel=$_SESSION['tipocuentas'];
if($nivel!=$_SESSION['tipocuentas']){
	?>
<script language="javascript">
window.location="index.php";
</script>
<?php	
}
?>
<!DOCTYPE html>
<script type="text/javascript" language="javascript">
function verifica_clave(){
var codigoseg=document.getElementById('codigoseg').value;
var scodigoseg=document.getElementById('scodigoseg').value;
var clave=document.getElementById('clave').value;
var clave2=document.getElementById('sclave').value;
var expresionR=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$/;
var expresionR2=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$/;
var resultado=expresionR.test(clave);
var resultado2=expresionR2.test(clave2);

if(clave!=clave2){
sweetAlert("Disculpe", "Las contraseñas no coinciden", "error");
return false;
}

if(clave2!=clave){
sweetAlert("Disculpe", "Las contraseñas no coinciden", "error");
return false;
}

if((resultado != true)||(resultado2 != true)){ 
sweetAlert("Disculpe", "La contraseña debe tener minimo de 6 a 12 caracteres. Puede contener mayusculas, minusculas, numeros y/o caracteres especiales. Y no debe contener espacios en blanco", "error");
return false;
}

if(codigoseg!=scodigoseg){
sweetAlert("Disculpe", "El código de seguridad que introdujo es incorrecto", "error");
return false;
}

}

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


function sololetras(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key).toLowerCase();

letras=" abcdefghijklmnopqrstuvwxyz";

especiales="8-37-38-46-164";

teclado_especial=false;

			for(var i in especiales){

		if(key==especiales[i]){
	
	
	teclado_especial=true;break;
	
		}

	}
	
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
	
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

	<?php 
	
	if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menus_adm.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menus_est.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menus_coord.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menus_ct.php");	
		
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menus_sec.php");	
		
	}
	?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php 
	
	if($_SESSION['tipocuentas']=='Administrador'){
		
	include ("menu.php");
	
	}else if($_SESSION['tipocuentas']=='Estudiante'){
		
	include ("menu2.php");	
		
	}else if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menu3.php");	
		
	}else if($_SESSION['tipocuentas']=='Coord Trayecto'){
		
	include ("menu4.php");	
		
	}else if($_SESSION['tipocuentas']=='Secretario'){
		
	include ("menu5.php");	
		
	}
	?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>
      <h1 class="panel-title text-center">
        Cambio de contraseña
         
      </h1>
	 	</section>


	<section class="content">

   <?php
   $clave=$_POST['clave'];
   require_once("clasedb.php");
   $db=new clasedb();
   $db->conectar();
   $sql="SELECT * FROM usuarios WHERE ci='".$_SESSION['cedula_usu']."' ";
   $r=mysql_query($sql);
   $row=mysql_fetch_array($r);
   $vericlave=password_verify($clave,$row['clave']);
   
   if($vericlave==0){
   ?>	 
   <script>
	$(document).ready(function(){
	sweetAlert("Disculpe", "Clave incorrecta", "error");
	});
	function redireccionar(){
	window.location="validaclave.php";
	}
	setTimeout('redireccionar()',3000);
	</script>	
   <?php   
   }
   ?>
	<div class="col-md-8 col-md-offset-2">
			  <!-- Horizontal Form -->
			  <div class="box box-info">
				<div class="box-header with-border">
				<h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
				  
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form class="form-horizontal" action="usuario_modificado.php" name="form" method="post" onsubmit="return verifica_clave();">
				  <div class="box-body panel-title text-center">
					
					  <div class="form-group">
					  <input type="hidden" name="opc" value="2">
					  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C.I</label>

					  <div class="col-sm-6">
					  <input type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" name="ci"  value="<?php echo $_SESSION['cedula_usu'];?>" class="form-control" readonly required>
					  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
					</div>

					  <div class="form-group">
					  <label for="inputEmail3" class="col-md-3 control-label" align="right">Contrase&ntilde;a</label>

					  <div class="col-sm-6">
					  <input type="password" maxlength="12" name="clave" id="clave" class="form-control" placeholder="Ingrese la contrase&ntilde;a" required>
					  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
					</div>

					  <div class="form-group">
					  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Confirmar</label>

					  <div class="col-sm-6">
						<input type="password" maxlength="12" name="sclave" id="sclave" class="form-control" placeholder="confirme la contrase&ntilde;a" required>
					  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
					</div>

					  <div class="form-group">
					  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C&oacute;digo</label>

					  <div class="col-sm-6">
					   <input type="text" name="codigoseg" id="codigoseg" class="form-control" placeholder="Ingrese el codigo" required>
					  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
					</div>

					<?php
					generador(6,true,true,true,true,true);

					function generador($longitud,$letras_min,$letras_may,$numeros){

					$variacteres=$letras_min?'abcdefghijklmnopqrstuvwxyz':'';
					$variacteres.=$letras_may?'ABCDEFGHIJKLMNOPQRSTUVWXYZ':'';
					$variacteres.=$numeros?'0123456789':'';

					$i=0;
					while($i<$longitud){
					$numerad=rand(0,strlen($variacteres)-1);
					$clv.= substr($variacteres,$numerad,1);
					$i++;
					}
					echo "<br><center>C&oacute;digo de seguridad: ".'<b>'.$clv.'</b></center><br>';
					?>
					<input type='hidden' name='scodigoseg' id='scodigoseg' value="<?php echo $clv;?>">
					<?php
					}
					?>
							
					<input type="hidden" name="nivel" value="<?php echo $_SESSION['tipocuentas'];?>">		

				  </div>
				  <!-- /.box-body -->
				  <div class="box-footer">
					<center>
					<button type="submit" class="btn btn-info" onclick="ValidarCadenaExpReg();"> <i class="fa fa-check" aria-hidden="true"></i>
					Guardar </button>
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
