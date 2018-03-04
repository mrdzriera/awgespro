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
        Bienvenido a Awgespro
         
      </h1>
     
		  <center><strong>B&uacute;squedas de personas:</strong></center>
	  
		  <form action="cons_usuario.php" name="form" method="post">
	<center><select name="campo" id="campo" class="form-control-sel" style="width:120px;">
	<option value="estudiantes">Estudiantes</option>
	<option value="profesores">Profesores</option>
	<option value="secretarios">Secretarios</option>
    </select></center>
	<br>
	<center><button>Seleccionar</button></center>
	  </form>
	  
	  <?php
$campo=$_POST['campo'];

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST); 


if($campo=='estudiantes'){

$sql="SELECT * FROM estudiante ORDER BY apellidos";
$r=mysql_query($sql);
if(mysql_num_rows($r)==0){
	?>
<script language="javascript">
alert("No hay estudiantes inscritos");
window.location="cons_usuario";
</script>
<?php
}else{
?> <br>
	 <center><strong>Estudiantes</strong></center>
	 <br>
	 <table border="1">
	 <tr> 
	 <td>Apellidos:</td>
	 <td>Nombres:</td>
	 <td>C&eacute;dula:</td>
	 <td>Tel&eacute;fono:</td>
	 <td>Correo:</td>
	 <td>Eliminar</td>
	 </tr>
<?php	
while(@$row=mysql_fetch_array($r)){
$sql2="SELECT usuarios.id FROM usuarios WHERE ci='".$row['ci']."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);	
?>
	 <tr>	 
	 <td><?php echo $row['apellidos'];?></td>
	 <td><?php echo $row['nombres'];?></td>
	 <td><?php echo $row['ci'];?></td>
	 <td><?php echo $row['telefono'];?></td>
	 <td><?php echo $row['correo'];?></td>
	 <td>
	 <form action="usuario_eliminado.php" name="form2" method="post">
	 <input type="hidden" name="campo" id="campo" value="<?php echo $campo;?>">
		<input type="hidden" name="ci" id="ci" value="<?php echo $row['ci'];?>">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row2['id'];?>">
		<button type="submit"><img src="./iconos/borra.jpg" style="width:30px; height:30px;"></button>
		</form>
	 </td>
	 </tr>
	
	
	 <?php
}
?>
 </table>	
<?php
}
}
?>

<?php
if($campo=='profesores'){

$sql="SELECT * FROM profesores ORDER BY apellidos";
$r=mysql_query($sql);
if(mysql_num_rows($r)==0){
	?>
<script language="javascript">
alert("No hay profesores inscritos");
window.location="cons_usuario";
</script>
<?php
}else{
?> <br>
	 <center><strong>Profesores</strong></center>
	 <br>
	 <table border="1">
	 <tr> 
	 <td>Apellidos</td>
	 <td>Nombres</td>
	 <td>C&eacute;dula</td>
	 <td>Tel&eacute;fono</td>
	 <td>Correo</td>
	 <td>Eliminar</td>
	 </tr>
<?php	
while(@$row=mysql_fetch_array($r)){	
$sql2="SELECT usuarios.id FROM usuarios WHERE ci='".$row['ci']."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);	
?>
	 <tr>	 
	 <td><?php echo $row['apellidos'];?></td>
	 <td><?php echo $row['nombres'];?></td>
	 <td><?php echo $row['ci'];?></td>
	 <td><?php echo $row['telefono'];?></td>
	 <td><?php echo $row['correo'];?></td>
	 <td>
	 <form action="usuario_eliminado.php" name="form2" method="post">
	 <input type="hidden" name="campo" id="campo" value="<?php echo $campo;?>">
		<input type="hidden" name="ci" id="ci" value="<?php echo $row['ci'];?>">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row2['id'];?>">
		<button type="submit"><img src="./iconos/borra.jpg" style="width:30px; height:30px;"></button>
		</form>
	 </td>
	 </tr>
	
	
	 <?php
}
?>
 </table>	
<?php
}
}
?>


<?php
if($campo=='secretarios'){

$sql="SELECT * FROM secretarios ORDER BY apellidos";
$r=mysql_query($sql);
if(mysql_num_rows($r)==0){
	?>
<script language="javascript">
alert("No hay secretarios inscritos");
window.location="cons_usuario";
</script>
<?php
}else{
?> <br>
	 <center><strong>Secretarios</strong></center>
	 <br>
	 <table border="1">
	 <tr> 
	 <td>Apellidos</td>
	 <td>Nombres</td>
	 <td>C&eacute;dula</td>
	 <td>Tel&eacute;fono</td>
	 <td>Correo</td>
	 <td>Eliminar</td>
	 </tr>
<?php	
while(@$row=mysql_fetch_array($r)){	
$sql2="SELECT usuarios.id FROM usuarios WHERE ci='".$row['ci']."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);	
?>
	 <tr>	 
	 <td><?php echo $row['apellidos'];?></td>
	 <td><?php echo $row['nombres'];?></td>
	 <td><?php echo $row['ci'];?></td>
	 <td><?php echo $row['telefono'];?></td>
	 <td><?php echo $row['correo'];?></td>
	 <td>
	 <form action="usuario_eliminado.php" name="form2" method="post">
	 <input type="hidden" name="campo" id="campo" value="<?php echo $campo;?>">
		<input type="hidden" name="ci" id="ci" value="<?php echo $row['ci'];?>">
		<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row2['id'];?>">
		<button type="submit"><img src="./iconos/borra.jpg" style="width:30px; height:30px;"></button>
		</form>
	 </td>
	 </tr>
	
	
	 <?php
}
?>
 </table>	
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
