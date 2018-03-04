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
        Usuarios/Registrar/Secretarios
         
      </h1>

<br>
<?php 
	require_once("clasedb.php");
	$db=new clasedb();
	$db-> conectar();
	mysql_query("SET NAMES 'utf8'");
	
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$ci=$_POST['ci'];
	$telefono=$_POST['telefono'];
	$grado_inst=$_POST['grado_inst'];
	$grado_instr=$_POST['grado_instr'];
	$nacionalidad=$_POST['nacionalidad'];
	$sexo=$_POST['sexo'];
	$area_especializacion=$_POST['area_especializacion'];
	$cod=$_POST['cod'];
	$status='Activo';

	
$mysql="SELECT * FROM secretarios WHERE ci='".$ci."' ";
$query=mysql_query($mysql);

if(mysql_num_rows($query)==1){
?>	
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Un Secretario con esta cedula ya se encuentra registrado", "error");
});
function redireccionar(){
window.location="opera_usuarios.php";
}
setTimeout('redireccionar()',3000);
</script>	
<?php
}else{	

$sql="INSERT INTO secretarios VALUES ('null','".$nombres."','".$apellidos."','".$ci."','".$cod.'-'.$telefono."','".$nacionalidad."','".$sexo."','".$grado_instr."','Activo')";
mysql_query($sql);
$ultimo_id=mysql_insert_id();

$sql2="SELECT * FROM secretarios WHERE id='".$ultimo_id."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

@mail($row2['correo'],'Registro exitoso en AWGESPRO (Aplicacion Web Para La Gestion de Proyectos)','Secretario '.$row2['nombres'].$row2['apellidos'].', Usted ha sido registrado en la base de datos de la aplicacion, por favor ingrese en el sistema y cree su cuenta de usuario en la pagina www.awgesproprueba.hol.es');

?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Bien!", "El Secretario ha sido registrado exitosamente", "success");
});

function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000);
</script>	
<?php
}
//FIN DE INSERCION DE SECRETARIO
?>
  </div> <!-- Fin de box-body -->
                        
              </div>

                   
               </div> <!-- fin de box box-info -->	 
	 
	 
	 
	 
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
