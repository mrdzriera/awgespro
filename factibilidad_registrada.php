<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
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

	<?php include ("menus_coord.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu3.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <br>
            <h1 class="panel-title text-center">
			<?php 
			$opc=$_POST['opc'];
			?> 
      Registros/Factibilidad/<?php echo $opc;?>     
      </h1><br>
    </section>

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

 $cont=$_POST['indice'];

for($i=0; $i<$cont; $i++){

$id=$_POST['id'][$i];
$ci=$_POST['ci'][$i];
$opn_coord=$_POST['opn_coord'][$i];
$opn_tutor=$_POST['opn_tutor'][$i];
$opn_esp1=$_POST['opn_esp1'][$i];
$opn_esp2=$_POST['opn_esp2'][$i];
$opn_esp3=$_POST['opn_esp3'][$i];
$obs_coord=$_POST['obs_coord'][$i];
$obs_tutor=$_POST['obs_tutor'][$i];
$obs_esp1=$_POST['obs_esp1'][$i];
$obs_esp2=$_POST['obs_esp2'][$i];
$obs_esp3=$_POST['obs_esp3'][$i];
//ENVIAR LA OBSERVACION AL CORREO

//CONSULTA PARA TRAER EL CORREO DEL LIDER
$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id[$i]."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
$email=$row['correo'];
//FIN

//EN CASO DE QUE EL EVALUADOR SEA COORDINADOR
$m="SELECT * FROM proyectos,profesores,coord_tiene_proy WHERE
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id='".$id[$i]."' AND profesores.ci='".$ci."' ";
$n=mysql_query($m);
$o=mysql_fetch_array($n);
//FIN

//EN CASO DE QUE EL EVALUADOR SEA TUTOR
$m2="SELECT * FROM proyectos,profesores,tutor_tiene_proyectos WHERE
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
profesores.id=tutor_tiene_proyectos.id_profesor AND
proyectos.id='".$id."' AND profesores.ci='".$ci."' ";
$n2=mysql_query($m2);
$o2=mysql_fetch_array($n2);
//FIN

//EN CASO DE QUE EL EVALUADOR SEA ESPECIALISTA 1
$m3="SELECT * FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND
proyectos.id='".$id."' AND profesores.ci='".$ci."' ";
$n3=mysql_query($m3);
$o3=mysql_fetch_array($n3);
//FIN

//EN CASO DE QUE EL EVALUADOR SEA ESPECIALISTA 2
$m4="SELECT * FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite2 AND
proyectos.id='".$id."' AND profesores.ci='".$ci."' ";
$n4=mysql_query($m4);
$o4=mysql_fetch_array($n4);
//FIN

//EN CASO DE QUE EL EVALUADOR SEA ESPECIALISTA 3
$m5="SELECT * FROM proyectos,profesores,proyectos_tiene_comite WHERE
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite3 AND
proyectos.id='".$id."' AND profesores.ci='".$ci."' ";
$n5=mysql_query($m5);
$o5=mysql_fetch_array($n5);
//FIN

if(mysql_num_rows($n)==1){
$evaluador='Coordinador:'.$o['nombres'].$o['apellidos'];	
}
else if(mysql_num_rows($n2)==1){
$evaluador='Tutor:'.$o2['nombres'].$o2['apellidos'];	
}
else if(mysql_num_rows($n3)==1){
$evaluador='Especialista 1:'.$o3['nombres'].$o3['apellidos'];	
}
else if(mysql_num_rows($n4)==1){
$evaluador='Especialista 2:'.$o4['nombres'].$o4['apellidos'];	
}
else if(mysql_num_rows($n5)==1){
$evaluador='Especialista 3:'.$o5['nombres'].$o5['apellidos'];	
}

if($obs_coord!=''){
	
$observaciones=$obs_coord;	

}else if($obs_tutor!=''){
	
$observaciones=$obs_tutor;	

}else if($obs_esp1!=''){
	
$observaciones=$obs_esp1;	

}else if($obs_esp2!=''){
	
$observaciones=$obs_esp2;	

}else if($obs_esp3!=''){
	
$observaciones=$obs_esp3;	

}
@mail($email,'Observaciones de su proyecto:',$evaluador.$observaciones);
	

//FIN DE ENVIAR LA OBSERVACION AL CORREO

if(($opn_coord!='')or($obs_coord!='')){
$sql="UPDATE proyectos_tiene_opinion SET opn_coord='".$opn_coord."',obs_coord='".$obs_coord."' WHERE id_proyecto='".$id."' ";	
mysql_query($sql);

date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
mysql_query($sql);
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Su opinion de la factibilidad del proyecto como coordinador ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else if(($opn_tutor!='')or($obs_tutor!='')){
$sql2="UPDATE proyectos_tiene_opinion SET opn_tutor='".$opn_tutor."',obs_tutor='".$obs_tutor."' WHERE id_proyecto='".$id."' ";	
mysql_query($sql2);

date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
mysql_query($sql);
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Su opinion de la factibilidad del proyecto como tutor ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if(($opn_esp1!='')or($obs_esp1!='')){
$sql3="UPDATE proyectos_tiene_opinion SET opn_esp1='".$opn_esp1."',obs_esp1='".$obs_esp1."' WHERE id_proyecto='".$id."' ";	
mysql_query($sql3);

date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
mysql_query($sql);
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Su opinion de la factibilidad del proyecto como especialista 1 ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if(($opn_esp2!='')or($obs_esp2!='')){
$sql4="UPDATE proyectos_tiene_opinion SET opn_esp2='".$opn_esp2."',obs_esp2='".$obs_esp2."' WHERE id_proyecto='".$id."' ";	
mysql_query($sql4);

date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
mysql_query($sql);
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Su opinion de la factibilidad del proyecto como especialista 2 ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else if(($opn_esp3!='')or($obs_esp3!='')){
$sql4="UPDATE proyectos_tiene_opinion SET opn_esp3='".$opn_esp3."',obs_esp3='".$obs_esp3."' WHERE id_proyecto='".$id."' ";	
mysql_query($sql4);

date_default_timezone_set('America/Caracas');
$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OPINO LA FACTIBILIDAD DEL PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
mysql_query($sql);
?>
<script language="javascript">
$(document).ready(function(){
swal("Bien!", "Su opinion de la factibilidad del proyecto como especialista 3 ha sido registrada exitosamente", "success");
});

function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}//CONSULTA PARA TRAER LA OPINION DEL PROYECTO POR PARTE DE LOS MIEBROS DEL JURADO 
$x="SELECT * FROM proyectos_tiene_opinion WHERE id_proyecto='".$id."' ";
$y=mysql_query($x);
$z=mysql_fetch_array($y);
//FIN

//SI TODOS OPINAN QUE SI PASARA ESTO:
if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}
//FIN

//SI TODOS OPINAN QUE SI, EXEPTO UNO PASARA ESTO:
if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='0')and($z['opn_esp3']=='0')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='0')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='0')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='0')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='0')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='0')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='0')and
($z['opn_esp2']=='0')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='Factible';	
}
//FIN

//SI TODOS OPINAN QUE SI, EXEPTO 2 PASARA ESTO:
if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='Factible';	
}
//FIN

//SI TODOS OPINAN QUE NO PASARA ESTO:
if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}
//FIN

//SI TODOS OPINAN QUE NO, EXEPTO UNO PASARA ESTO:
if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='No Factible';	
}
//FIN

//SI TODOS OPINAN QUE NO, EXEPTO 2 PASARA ESTO:
if(($z['opn_coord']=='Si')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='Si')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='Si')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='No')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='Si')and
($z['opn_esp2']=='No')and($z['opn_esp3']=='Si')){
$factibilidad='No Factible';	
}

if(($z['opn_coord']=='No')and($z['opn_tutor']=='No')and($z['opn_esp1']=='No')and
($z['opn_esp2']=='Si')and($z['opn_esp3']=='Si')){
$factibilidad='No Factible';	
}
//FIN

/*DEPENDIENDO DE LA MAYORIA DE OPINIONES POSITIVAS O NEGATIVAS DEL PROYECTOS, 
SE ESCOGERA FACTIBLE O NO FACTIBLE */
$consulta="UPDATE proyectos SET factibilidad='".$factibilidad."' WHERE id='".$_POST['id'][$i]."' ";
mysql_query($consulta);
//FIN

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