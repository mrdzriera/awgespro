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
	<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
			<img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index3.php" class="logo">
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

<?php
	
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);
$id_anio=$_POST['id_anio'];	
$fecha=$_POST['fecha'];
$titulo=$_POST['titulo'];
$objetivo=$_POST['objetivo'];
$alcance=$_POST['alcance'];
$limitaciones=$_POST['limitaciones'];
$aportes=$_POST['aportes'];
$acciones=$_POST['acciones'];
$vinculacion=$_POST['vinculacion'];
$linea_investigacion=$_POST['linea_investigacion'];
$factibilidad=$_POST['factibilidad'];
$codigo=$_POST['codigo'];
$id_tutor=$_POST['id_tutor'];
$comunidad=$_POST['comunidad'];
$otra_comunidad=$_POST['otra_comunidad'];
$estado=$_POST['estado'];
$municipio=$_POST['municipio'];
$sector=$_POST['sector'];
$parroquia=$_POST['parroquia'];
$id_estudiante1=$_POST['id_estudiante1'];
$id_estudiante2=$_POST['id_estudiante2'];
$id_estudiante3=$_POST['id_estudiante3'];
$responsable=$_POST['responsable'];
$cod_tel=$_POST['cod_tel'];
$numero=$_POST['numero'];
$resp_email=$_POST['resp_email'];
$id_profesor=$_POST['id_profesor'];

$sql="SELECT * FROM proyectos WHERE titulo='".$titulo."' And titulo!='' ";
$r=mysql_query($sql);

$sql2="SELECT * FROM proyectos WHERE objetivo='".$objetivo."' And objetivo!='' ";
$r2=mysql_query($sql2);

$sql3="SELECT * FROM proyectos WHERE alcance='".$alcance."' And alcance!='' ";
$r3=mysql_query($sql3);

$sql4="SELECT * FROM proyectos WHERE limitaciones='".$limitaciones."' And limitaciones!='' ";
$r4=mysql_query($sql4);

$sql5="SELECT * FROM proyectos WHERE aportes='".$aportes."' And aportes!='' ";
$r5=mysql_query($sql5);

$sql6="SELECT * FROM proyectos WHERE acciones='".$acciones."' And acciones!='' ";
$r6=mysql_query($sql6);

$sql7="SELECT * FROM proyectos WHERE vinculacion='".$vinculacion."' And vinculacion!='' ";
$r7=mysql_query($sql7);

if((mysql_num_rows($r)==1)or(mysql_num_rows($r2)==1)or(mysql_num_rows($r3)==1)or
(mysql_num_rows($r4)==1)or(mysql_num_rows($r5)==1)or(mysql_num_rows($r6)==1)or
(mysql_num_rows($r7)==1)){

?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Este proyecto ya fue inscrito anteriormente, por seguridad se le detendra la inscripcion de proyecto", "error");
});
function redireccionar(){
window.location="consulta_estudiante.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php	
}else if(($comunidad!='Ninguna de estas')and($otra_comunidad!='')){
?>
<script language="javascript">
$(document).ready(function(){
swal("Solo puede escoger una opcion para el registro de la comunidades");
});
function redireccionar(){
window.location="consulta_estudiante.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else{

$meter="INSERT INTO proyectos VALUES ('null','".$id_anio."','".$fecha."','".$titulo."','".$objetivo."','".$alcance."',
'".$limitaciones."','".$aportes."','".$acciones."','".$vinculacion."','".$linea_investigacion."',
'".$factibilidad."','".$codigo."')";

$incluir=mysql_query($meter);

$ultimo_id=mysql_insert_id();

$x="SELECT * FROM profesores,anios,opc_tutores WHERE 
profesores.id=opc_tutores.id_profesor AND
anios.id=opc_tutores.id_anio AND
profesores.id='".$id_tutor."' AND
anios.id='".$id_anio."' ";
$y=mysql_query($x);
$z=mysql_fetch_array($y);

$cont=$z['cont_proy_prof'];
$cont=$cont+1;

$query="UPDATE opc_tutores SET cont_proy_prof='".$cont."' WHERE id_profesor='".$id_tutor."' AND id_anio='".$id_anio."'";
mysql_query($query);

$sql2="INSERT INTO proyectos_tiene_permiso VALUES ('null',".$ultimo_id.", '0','0')";
mysql_query($sql2);

$sql3="INSERT INTO proyectos_tiene_comite VALUES ('null',".$ultimo_id.", '0','0','0')";
mysql_query($sql3);

$sql4="INSERT INTO proyectos_tiene_documento VALUES('null',".$ultimo_id.",'No','No','No','No','No','No','No','No','No','No','No','No','No','')";
mysql_query($sql4);

$sql5="INSERT INTO proyectos_tiene_culminacion VALUES('null',".$ultimo_id.",'4','0000-00-00')";
mysql_query($sql5);

$sql6="INSERT INTO tutor_tiene_proyectos VALUES('null','".$ultimo_id."','".$id_tutor."')";
mysql_query($sql6);

$sql7="INSERT INTO proyectos_tiene_socializacion VALUES('null',".$ultimo_id.",'0000-00-00','00:00:00','' )";
mysql_query($sql7);

$sql8="INSERT INTO proyectos_tiene_eva_def VALUES('null',".$ultimo_id.",'0','0','0','0','0','0' )";
mysql_query($sql8);

$sql9="INSERT INTO defensas VALUES
('null',".$ultimo_id.",'0000-00-00','00:00:00','','1' ),
('null',".$ultimo_id.",'0000-00-00','00:00:00','','2' ),
('null',".$ultimo_id.",'0000-00-00','00:00:00','','3' )";
mysql_query($sql9);

$sql10="INSERT INTO evaluacion VALUES
('null',".$ultimo_id.",'0','0','0','1' ),
('null',".$ultimo_id.",'0','0','0','2' ),
('null',".$ultimo_id.",'0','0','0','3' )";
mysql_query($sql10);


if(($comunidad!='Ninguna de estas')and($otra_comunidad=='')){
$sql11="INSERT INTO comunidades VALUES('null','".$comunidad."','".$estado."','".$municipio."','".$parroquia."','".$sector."')";
mysql_query($sql11);
$id_comunidad=mysql_insert_id();

}else if(($comunidad=='Ninguna de estas')and($otra_comunidad!='')){
$sql11="INSERT INTO comunidades VALUES('null','".$otra_comunidad."','".$estado."','".$municipio."','".$parroquia."','".$sector."')";
mysql_query($sql11);
$id_comunidad=mysql_insert_id();
}

$sql12="INSERT INTO responsable VALUES('null','".$responsable."','".$cod_tel.'-'.$numero."','".$resp_email."')";
mysql_query($sql12);
$id_responsable=mysql_insert_id();

$sql13="INSERT INTO com_tiene_resp VALUES('null','".$id_comunidad."','".$id_responsable."')";
mysql_query($sql13);

$sql14="INSERT INTO com_tiene_proy VALUES('null','".$ultimo_id."','".$id_comunidad."')";
mysql_query($sql14);

$sql15="INSERT INTO est_tiene_proy VALUES('null','".$ultimo_id."','".$id_estudiante1."','".$id_estudiante2."','".$id_estudiante3."')";
mysql_query($sql15);

$sql16="INSERT INTO coord_tiene_proy VALUES('null','".$ultimo_id."','".$id_profesor."')";
mysql_query($sql16);

$sql17="INSERT INTO proyectos_tiene_opinion VALUES('null','".$ultimo_id."','0','','0','','0','','0','','0','')";
mysql_query($sql17);

$sql18="INSERT INTO proyectos_tiene_notificacion VALUES ('null','".$ultimo_id."','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto','No Visto')";
mysql_query($sql18); 
                                 
if($incluir==0){
?>
<script type="text/javascript">
alert('El Registro ha Fallado');
window.location='consulta_estudiante.php';
</script>
<?php
}else{ 
?>
<script type="text/javascript">
$(document).ready(function(){
swal("Bien!", "El proyecto ha sido registrado exitosamente", "success");
});
function redireccionar(){
window.location="index3.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}

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