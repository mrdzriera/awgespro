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
        Privilegios de usuario de forma individual        
      </h1>

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Tablas de datos</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a marked="1" href="#home" aria-controls="home" data-toggle="tab" aria-expanded="true"> Usuario </a></li>
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

$sql="SELECT *,usuarios.id FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
estudiante.ci='".$ci."' AND nivel='Estudiante' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);

if(mysql_num_rows($r)==1){
$nombres=$row['nombres'];	
$apellidos=$row['apellidos'];	
$ci=$row['ci'];	
$correo=$row['correo'];	
$telefono=$row['telefono'];	
$usuario=$row['usuario'];	
$nivel=$row['nivel'];	
$id=$row['id'];
}

$sql2="SELECT *,usuarios.id  FROM profesores,usuarios WHERE profesores.ci=usuarios.ci AND 
profesores.ci='".$ci."' AND nivel='Coordinador' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

if(mysql_num_rows($r2)==1){
$nombres=$row2['nombres'];	
$apellidos=$row2['apellidos'];	
$ci=$row2['ci'];	
$correo=$row2['correo'];	
$telefono=$row2['telefono'];	
$usuario=$row2['usuario'];	
$nivel=$row2['nivel'];
$id=$row2['id'];

}

$sql3="SELECT *,usuarios.id  FROM profesores,usuarios WHERE profesores.ci=usuarios.ci AND 
profesores.ci='".$ci."' AND nivel='Coord Trayecto' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);

if(mysql_num_rows($r3)==1){
$nombres=$row3['nombres'];	
$apellidos=$row3['apellidos'];	
$ci=$row3['ci'];	
$correo=$row3['correo'];	
$telefono=$row3['telefono'];	
$usuario=$row3['usuario'];	
$nivel=$row3['nivel'];
$id=$row3['id'];
}

$sql4="SELECT *,usuarios.id  FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
secretarios.ci='".$ci."'  ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);

if(mysql_num_rows($r4)==1){
$nombres=$row4['nombres'];	
$apellidos=$row4['apellidos'];	
$ci=$row4['ci'];	
$correo=$row4['correo'];	
$telefono=$row4['telefono'];	
$usuario=$row4['usuario'];	
$nivel=$row4['nivel'];
$id=$row4['id'];
}

if((mysql_num_rows($r)==0)and(mysql_num_rows($r2)==0)and(mysql_num_rows($r3)==0)and(mysql_num_rows($r4)==0)){
?>
<script language="javascript">
alert("No existe un usuario con esta cedula");
window.location="index2.php";
</script>
<?php
}else{
?>
<table class="table table-bordered table-striped">
<thead>
<tbody>
<tr>
<center>
<td align='center'>Nombre:</td>
<td align='center'>Apellido: </td>
<td align='center'>C&eacute;dula: </td>
<td align='center'>Correo:</td>
<td align='center'>T&eacute;lefono:</td>
</center>  
</tr>
</thead>

<tr>
<td align='center'><?php echo $nombres;?></td>
<td align='center'><?php echo $apellidos;?></td>
<td align='center'><?php echo $ci;?></td>
<td align='center'><?php echo $correo;?></td>
<td align='center'><?php echo $telefono;?></td>
</tr>
</tbody>
</table>

<br>

<?php
if($nivel=='Estudiante'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>
<tr>
<td align='center'> Registrar proyecto <input type="checkbox" name="id_permiso1" id="id_permiso1" value="1"   ></td>
<td align='center'>Registrar asistencias <input type="checkbox" name="id_permiso2" id="id_permiso2" value="1" ></td>
</tr>
</thead>
</table>
<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<center><button>Registrar privilegios</button></center>
<br>
</form>
<?php
}else if($nivel=='Coordinador'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>
<tr>
<td align='center'>Registrar factibilidad<input type="checkbox" name="id_permiso3" id="id_permiso3" value="1"   ></td>
<td align='center'>Registrar presentaciones<input type="checkbox" name="id_permiso4" id="id_permiso4" value="1" ></td>
<td align='center'>Registrar evaluaciones<input type="checkbox" name="id_permiso5" id="id_permiso5" value="1" ></td>
</tr>
<tr>
<td align='center'>Registrar socializaci&oacute;n<input type="checkbox" name="id_permiso6" id="id_permiso6" value="1"   ></td>
<td align='center'>Registrar evaluacion definitiva<input type="checkbox" name="id_permiso7" id="id_permiso7" value="1" ></td>
<td align='center'>Registrar registrar culminaci&oacute;n<input type="checkbox" name="id_permiso8" id="id_permiso8" value="1" ></td>
</tr>
</thead>
</table>
<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<center><button>Registrar privilegios</button></center>
<br>
</form>
<?php
}else if($nivel=='Secretario'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>
<tr>
<td align='center'>Registrar codigos<input type="checkbox" name="id_permiso9" id="id_permiso9" value="1" ></td>
<td align='center'>Registrar documentos<input type="checkbox" name="id_permiso10" id="id_permiso10" value="1" ></td>
</tr>
</thead>
</table>
<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<center><button>Registrar privilegios</button></center>
<br>
</form>
<?php 
}
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 
    
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
