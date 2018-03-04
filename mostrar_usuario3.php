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
        Privilegios de usuario de forma individual        
      </h1>
      <br>

       <div class="col-md-13">
            
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
$tipo=$_POST['tipo'];

if($tipo=='estudiante'){

$sql="SELECT *,usuarios.id FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
estudiante.ci='".$ci."' AND nivel='Estudiante' ";

}else if($tipo=='coordinador'){

$sql="SELECT *,usuarios.id FROM profesores,usuarios WHERE profesores.ci=usuarios.ci AND 
profesores.ci='".$ci."' AND nivel='Coordinador' ";
	
}else if($tipo=='secretario'){

$sql="SELECT *,usuarios.id FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
secretarios.ci='".$ci."' AND nivel='Secretario' ";
	
}

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


if(mysql_num_rows($r)==0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No existe un usuario con esta cedula", "error");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else{
//registrar proyecto
$sql1="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='1' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r1=mysql_query($sql1);
//fin

//registrar asistencia
$sql2="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='2' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r2=mysql_query($sql2);
//fin

//consultar proyecto
$sql18="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='18' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r18=mysql_query($sql18);
//fin

//consultar factibilidad
$sql19="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='19' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r19=mysql_query($sql19);
//fin

//consultar presentation
$sql22="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='22' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r22=mysql_query($sql22);
//fin

//consultar evaluacion
$sql21="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='21' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r21=mysql_query($sql21);
//fin

//consultar asistencias
$sql32="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='32' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r32=mysql_query($sql32);
//fin

//consultar jurados
$sql24="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='24' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r24=mysql_query($sql24);
//fin

//consultar codigos
$sql28="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='28' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r28=mysql_query($sql28);
//fin

//registrar fact
$sql3="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='3' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r3=mysql_query($sql3);
//fin

//registrar pres
$sql4="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='4' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r4=mysql_query($sql4);
//fin

//registrar eva
$sql5="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='5' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r5=mysql_query($sql5);
//fin

//registrar soc
$sql6="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='6' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r6=mysql_query($sql6);
//fin

//registrar eva def
$sql7="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='7' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r7=mysql_query($sql7);
//fin

//registrar culm
$sql8="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='7' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r8=mysql_query($sql8);
//fin

//cons com
$sql20="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='20' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r20=mysql_query($sql20);
//fin

//ret proy
$sql29="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='29' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r29=mysql_query($sql29);
//fin

//hab mod
$sql33="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='33' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r33=mysql_query($sql33);
//fin

//reg cod
$sql9="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='9' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r9=mysql_query($sql9);
//fin

//reg doc
$sql10="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='10' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r10=mysql_query($sql10);
//fin

//hab harch
$sql31="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='31' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r31=mysql_query($sql31);
//fin

//mod doc
$sql17="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='17' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r17=mysql_query($sql17);
//fin

//gen sol
$sql30="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='30' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r30=mysql_query($sql30);
//fin

//hab cuenta
$sql34="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND
id_operacion='34' AND id_permiso='1' AND usuarios.ci='".$ci."' ";
$r34=mysql_query($sql34);
//fin
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


<?php
if($nivel=='Estudiante'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>
<tr>
<td align='center'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registrar proyecto&nbsp; <br><input type="checkbox" name="regproy" id="regproy" value="1" <?php if(mysql_num_rows($r1)==1){ echo"checked"; }?> ></td>
<td align='center'>&nbsp;Registrar asistencias &nbsp;<br><input type="checkbox" name="regasis" id="regasis" value="1" <?php if(mysql_num_rows($r2)==1){ echo"checked"; }?>></td>
</tr>
</thead>
</table>
<br>		
								<table class="table table-bordered table-striped">
<thead>
  <td align='center' colspan=2> Acciones de registro: </td>
<tr>
<td align='center'>&nbsp;Proyectos&nbsp; <br><input type="checkbox" name="conpro" id="conpro" value="1"  <?php if(mysql_num_rows($r18)==1){ echo"checked"; }?> ></td>
<td align='center'>&nbsp;Factibilidad&nbsp; <br><input type="checkbox" name="confact" id="confact" value="1"  <?php if(mysql_num_rows($r19)==1){ echo"checked"; }?> ></td>

</tr>
 </thead>
 
<tr>
<td align='center'>&nbsp;Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" <?php if(mysql_num_rows($r22)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" <?php if(mysql_num_rows($r21)==1){ echo"checked"; }?>></td>
</tr>
 
<tr>
<td align='center'>&nbsp;Asistencias&nbsp; <br><input type="checkbox" name="conasis" id="conasis" value="1" <?php if(mysql_num_rows($r32)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" <?php if(mysql_num_rows($r24)==1){ echo"checked"; }?>></td>
</tr>
</table>

<table class="table table-bordered table-striped">
<tr>
<td><center>&nbsp;C&oacute;digos&nbsp; <br><input type="checkbox" name="concod" id="concod" value="1" <?php if(mysql_num_rows($r28)==1){ echo"checked"; }?>></center></td>
</tr>
</table>
<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<input type="hidden" name="tipo" value="<?php echo $tipo;?>">
<center><button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button></center>

<br>
</form>
<?php
}else if($nivel=='Coordinador'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>

<center><b>Acciones para registrar</b></center>

<tr>
<td align='center'>&nbsp;Factibilidad&nbsp; <br><input type="checkbox" name="regfact" id="regfact" value="1" <?php if(mysql_num_rows($r3)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Presentaciones&nbsp; <br><input type="checkbox" name="regpre" id="regpre" value="1" <?php if(mysql_num_rows($r4)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Evaluaciones&nbsp; <br><input type="checkbox" name="regeva" id="regeva" value="1" <?php if(mysql_num_rows($r5)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Socializaci&oacute;n&nbsp; <br><input type="checkbox" name="regsoc" id="regsoc" value="1" <?php if(mysql_num_rows($r6)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Evaluacion Definitiva&nbsp; <br><input type="checkbox" name="regevadef" id="regevadef" value="1" <?php if(mysql_num_rows($r7)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Culminaci&oacute;n&nbsp; <br><input type="checkbox" name="regculm" id="regculm" value="1" <?php if(mysql_num_rows($r8)==1){ echo"checked"; }?>></td>
</tr>
</thead>
</table>

<table class="table table-bordered table-striped">
<thead>
<center><b>Acciones para consultar</b></center>
<tr>
<td align='center'>&nbsp;Factibilidad&nbsp; <br><input type="checkbox" name="confact" id="confact" value="1" <?php if(mysql_num_rows($r19)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" <?php if(mysql_num_rows($r22)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" <?php if(mysql_num_rows($r21)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Comunidades&nbsp; <br><input type="checkbox" name="concom" id="concom" value="1" <?php if(mysql_num_rows($r20)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" <?php if(mysql_num_rows($r24)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Proyectos&nbsp; <br><input type="checkbox" name="conpro" id="conpro" value="1"   <?php if(mysql_num_rows($r18)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Retiro de Proyectos&nbsp; <br><input type="checkbox" name="conretpro" id="conretpro" value="1" <?php if(mysql_num_rows($r29)==1){ echo"checked"; }?> ></td>
<td align="center">&nbsp;Habilitar modificaciones&nbsp; <br><input type="checkbox" name="habmod" id="habmod" value="1" <?php if(mysql_num_rows($r33)==1){ echo"checked"; }?>></td>

</tr>
</thead>
</table>
<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<input type="hidden" name="tipo" value="<?php echo $tipo;?>">
<center>
<button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button>
</center>
<br>
</form>
<?php
}else if($nivel=='Secretario'){
?>
<form action="priv_ind_cambiado.php" method="post"> 
<table class="table table-bordered table-striped">
<thead>
<center><b>Acciones para registrar</b></center>
<tr>
<td align='center'>&nbsp;C&oacute;digos&nbsp; <br><input type="checkbox" name="regcod" id="regcod" value="1"  <?php if(mysql_num_rows($r9)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Documentos&nbsp; <br><input type="checkbox" name="regdoc" id="regdoc" value="1"  <?php if(mysql_num_rows($r10)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Habilitar archivos&nbsp; <br><input type="checkbox" name="habarch" id="habarch" value="1"  <?php if(mysql_num_rows($r31)==1){ echo"checked"; }?>></td>
</tr>
</thead>
</table>
<table class="table table-bordered table-striped">
<thead>
<center><b>Acciones para consultar, modificar en imprimir</b></center>
<tr>
<td align='center'>&nbsp;Comunidades&nbsp; <br><input type="checkbox" name="concom" id="concom" value="1"   <?php if(mysql_num_rows($r20)==1){ echo"checked"; }?> ></td>
<td align='center'>&nbsp;Presentaciones&nbsp; <br><input type="checkbox" name="conpre" id="conpre" value="1" <?php if(mysql_num_rows($r22)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Evaluaciones&nbsp; <br><input type="checkbox" name="coneva" id="coneva" value="1" <?php if(mysql_num_rows($r22)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Jurados&nbsp; <br><input type="checkbox" name="conjur" id="conjur" value="1" <?php if(mysql_num_rows($r24)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;C&oacute;digos&nbsp; <br><input type="checkbox" name="concod" id="concod" value="1" <?php if(mysql_num_rows($r28)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Documentos&nbsp; <br><input type="checkbox" name="moddoc" id="moddoc" value="1" <?php if(mysql_num_rows($r17)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Solvencias&nbsp; <br><input type="checkbox" name="gensol" id="gensol" value="1" <?php if(mysql_num_rows($r30)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Habilitar cuenta&nbsp; <br><input type="checkbox" name="descuen" id="descuen" value="1" <?php if(mysql_num_rows($r34)==1){ echo"checked"; }?>></td>
</tr>
<tr>
<td align='center'>&nbsp;Retiro de proyectos&nbsp; <br><input type="checkbox" name="conretpro" id="conretpro" value="1" <?php if(mysql_num_rows($r29)==1){ echo"checked"; }?>></td>
<td align='center'>&nbsp;Habilitar modificaciones&nbsp; <br><input type="checkbox" name="habmod" id="habmod" value="1" <?php if(mysql_num_rows($r33)==1){ echo"checked"; }?>></td>
</tr>
</thead>
</table>

<input type="hidden" name="id_usuario" value="<?php echo $id;?>">
<input type="hidden" name="tipo" value="<?php echo $tipo;?>">
<center>
<button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button>
</center>
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
