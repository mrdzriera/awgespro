<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
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
      Configuraci&oacute;n
      </h1>
	  
    </section>
<section class="content">
<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$opc=$_POST['opc'];
$ci=$_POST['ci'];
$correo=$_POST['correo'];
$telefono=$_POST['cod_tel'].'-'.$_POST['numero'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$claveencriptada=password_hash($clave,PASSWORD_DEFAULT);
$nivel=$_POST['nivel'];
$fotoactual=$_POST['fotoactual'];
$foto=$_FILES['foto'];
$foto=$_FILES['foto']['name'];
$ruta=$_FILES['foto']['tmp_name'];
$destino="fotousuarios/".$foto;
move_uploaded_file($ruta,$destino);

$mysql2="SELECT * FROM usuarios WHERE usuario='".$usuario."' AND ci!='".$ci."' ";
$query2=mysql_query($mysql2);

if(($opc==1)and(mysql_num_rows($query2)>0)){
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Disculpe", "Este nombre de usuario no se encuentra disponible, pruebe con otro", "error");
});
</script>
<?php
if($nivel=='Administrador'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="bus_usuario.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Coordinador'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="bus_usuariocoord.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Coord Trayecto'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="bus_usuarioct.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Estudiante'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="bus_usuarioest.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Secretario'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="bus_usuariosec.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}

}else if(($opc==1)and(mysql_num_rows($query2)==0)){
	
$consulta="UPDATE usuarios SET correo='".$correo."',telefono='".$telefono."',usuario='".$usuario."',pregunta='".$_POST['pregunta']."', respuesta='".$_POST['respuesta']."' WHERE ci='".$ci."' ";
mysql_query($consulta);

if($foto!=''){
$query="UPDATE usuarios SET foto='".$destino."' WHERE ci='".$ci."' AND foto='".$fotoactual."' ";	
mysql_query($query);
}

$sql2="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
//echo $sql;
mysql_query($sql2);
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Sus datos han sido modificados exitosamente", "success");
});
			
</script>
<?php
if($nivel=='Administrador'){
?>
<script type="text/javascript">
function redireccionar(){
 window.location="index2.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else if($nivel=='Coordinador'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Coord Trayecto'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index5.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Estudiante'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index3.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else if($nivel=='Secretario'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}

}else if(($opc==2)){

$consulta="UPDATE usuarios SET clave='".$claveencriptada."' WHERE ci='".$ci."' ";
mysql_query($consulta);	

$sql2="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE MODIFICO SUS DATOS TIENE ESTE ID:".$_SESSION['id_usu']. "','".@date("Y-m-d")."','".@date("h:i")."')";
//echo $sql;
mysql_query($sql2);

?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "Sus datos han sido modificados exitosamente", "success");
});
			
</script>
<?php
if($nivel=='Administrador'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else if($nivel=='Coordinador'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Coord Trayecto'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index5.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Estudiante'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index3.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if($nivel=='Secretario'){
?>
<script type="text/javascript">
function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}

}
?>	
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
	

