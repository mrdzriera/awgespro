<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Secretario'){
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
	<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
	<script src="disti/jquery-1.12.3.min.js"></script>
	<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$('#BtnSeleccionar').click(function(){
	      $('#DivDocumentos input[type=checkbox]').prop("checked",true);
		});
	 
	 $('#BtnDeSeleccionar').click(function (){
	    $('#DivDocumentos input[type=checkbox]').prop("checked",false);
	 });
	
	 }); 

	</script>
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

	<?php include ("menus_sec.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu5.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
         Registros/Documentos           
      </h1>
	<section class="content">
       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Registrar documentos</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">

                <?php 


$ci_1=$_POST['ci_1'];
$anio=$_POST['anio'];


require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");


$busqueda="SELECT *,proyectos.id AS'id_proyecto' FROM proyectos,estudiante,anios,est_tiene_proy,est_cursa_proy 
WHERE  
est_tiene_proy.id_estudiante1=estudiante.id AND
est_tiene_proy.id_proyecto=proyectos.id AND
est_cursa_proy.id_estudiante=estudiante.id AND
est_cursa_proy.id_anio=anios.id AND 
estudiante.ci='".$ci_1."'  and anios.periodo='".$anio."'";
$r=mysql_query($busqueda);
$muestra=mysql_fetch_array($r);

	 if((mysql_num_rows($r)==0)){
?>
        <script type="text/javascript">
		$(document).ready(function(){
		sweetAlert("Disculpe", "No existen proyectos con este lider", "error");
		});
		function redireccionar(){
		window.location="index6.php";
		}
		setTimeout('redireccionar()',3000);
        </script>
<?php
	 }
	?>

	<center><table  class="table table-bordered table-striped">
	<thead>
	<tr><td><center><strong>Titulo</strong></center></td>
	<td><center><strong>C&oacute;digo</strong></center></td>
	<tr></tr></thead>
	<tbody><tr>
   <td><?php echo $muestra['titulo'];?>	</td>
   <td><center><?php echo $muestra['codigo'];?></center>	</td></tr></tbody>
	</table></center>
	

<form action="doc_registrados.php" method="post" id="form" enctype="multipart/form-data">
<input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $muestra['id_proyecto'];?>">		

<?php 
//CONSULTA PARA TRAER EL ESTADO DE LOS DOCUMENTOS
$sql="SELECT * FROM proyectos,proyectos_tiene_documento WHERE
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id='".$muestra['id_proyecto']."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);
//FIN
?>

<?php 
$sql2="SELECT * FROM proyectos,proyectos_tiene_documento WHERE
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id='".$muestra['id_proyecto']."' AND 
portada='Si' AND
acta_coord='Si' AND
acta_tutor='Si' AND
acta_inscrip='Si' AND
resumen='Si' AND
indice_general='Si' AND
introduccion='Si' AND
manuales='Si' AND
empastado='Si' AND
dedicatoria='Si' AND
agradecimiento='Si' AND
cd='Si' AND 
informe='Si' ";
$r2=mysql_query($sql2);
if (mysql_num_rows($r2)==1){
?>
<script type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Este proyecto ya cumplio con todos los requisitos", "error");
});
function redireccionar(){
window.location="busqueda_pdoc_mod.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php 
}
?>
	<center><strong>Documentos</strong></center>
	
	<br>
	<center>
	<button type="button" id="BtnSeleccionar" value="Seleccionar Todos" class="btn btn-info"> </i> Seleccionar todos </button>
	<button type="button" id="BtnDeSeleccionar" value="Deseleccionar Todos" class="btn btn-info"> </i> Desmarcar todos </button>
	</center>
	</br>
	
	<div id="DivDocumentos">
	<center>
	<table class="table table-bordered table-striped" 	>
	<tr>
	<td>	
	<center>
	Portada:
	<?php 
	if($row['portada']=='Si'){
	?>
	<input type="checkbox" name="portada" id="portada" value="Si" checked>
	<?php 
	}else if(($row['portada']=='No')or($row['portada']=='')){
	?>
	<input type="checkbox" name="portada" id="portada" value="Si">
	<?php
	}
	?>
	</center></td>
	<td>
	<center>
	Acta del Coordinador:
	<?php 
	if($row['acta_coord']=='Si'){
	?>
	&nbsp;<input type="checkbox" name="acta_coord" id="acta_coord" value="Si" checked >
	<?php 
	}else if(($row['acta_coord']=='No')or($row['acta_coord']=='')){
	?>
	&nbsp;<input type="checkbox" name="acta_coord" id="acta_coord" value="Si">
	<?php
	}
	?>
	</center>
	</td>
	<td><center>
	Acta de del Tutor:
	<?php 
	if($row['acta_tutor']=='Si'){
	?>
	<input type="checkbox" name="acta_tutor" id="acta_tutor" value="Si" checked >
	<?php 
	}else if(($row['acta_tutor']=='No')or($row['acta_tutor']=='')){
	?>
	<input type="checkbox" name="acta_tutor" id="acta_tutor" value="Si">
	<?php 
	}
	?>
	</center></td>
	<td>	
	<center>
    Planilla de Inscripci&oacute;n: 
	<?php 
	if($row['acta_inscrip']=='Si'){
	?>
	<input type="checkbox" name="acta_inscrip" id="acta_inscrip" value="Si" checked>
	<?php 
	}else if(($row['acta_inscrip']=='No')or($row['acta_inscrip']=='')){
	?>
	<input type="checkbox" name="acta_inscrip" id="acta_inscrip" value="Si">
	<?php 
	}
	?>
	</center></td>
	</tr>
	<tr>
	<td>	
	<center>
	Dedicatoria: 
    <?php 
	if($row['dedicatoria']=='Si'){
	?>
	<input type="checkbox" name="dedicatoria" id="dedicatoria" value="Si" checked>
	<?php 
	}else if(($row['dedicatoria']=='No')or($row['dedicatoria']=='')){
	?>
	<input type="checkbox" name="dedicatoria" id="dedicatoria" value="Si">
	<?php
	}
	?>
	</center></td>
	<td><center>
	Agradecimiento: 
	  <?php 
	if($row['agradecimiento']=='Si'){
	?>
	<input type="checkbox" name="agradecimiento" id="agradecimiento" value="Si" checked>
	<?php 
	}else if(($row['agradecimiento']=='No')or($row['agradecimiento']=='')){
	?>
	<input type="checkbox" name="agradecimiento" id="agradecimiento" value="Si" >
	<?php 
	}
	?>
	</center></td>
	<td>
	<center>
	Resumen:
	  <?php 
	if($row['resumen']=='Si'){
	?>
	<input type="checkbox" name="resumen" id="resumen" value="Si" checked >
	<?php 
	}else if(($row['resumen']=='No')or($row['resumen']=='')){
	?>
	<input type="checkbox" name="resumen" id="resumen" value="Si">
	<?php 
	}
	?>
	</center></td>
	<td>
	<center>
	Indice General:
	<?php 
	if($row['indice_general']=='Si'){
	?>
	<input type="checkbox" name="indice_general" id="indice_general" value="Si" checked >
	<?php 
	}else if(($row['indice_general']=='No')or($row['indice_general']=='')){
	?>
	<input type="checkbox" name="indice_general" id="indice_general" value="Si">
	<?php 
	}
	?>
	</center></td>
	</tr>
	<tr>
	<td>	<center>
	Introducci&oacute;n:
	<?php 
	if($row['introduccion']=='Si'){
	?>
	<input type="checkbox" name="introduccion" id="introduccion" value="Si" checked >
	<?php 
	}else if(($row['introduccion']=='No')or($row['introduccion']=='')){
	?>
	<input type="checkbox" name="introduccion" id="introduccion" value="Si">
	<?php 
	}
	?>
	</center></td>
	
	<td>	
	<center>
	Manuales:		
	<?php 
	if($row['manuales']=='Si'){
	?>
	<input type="checkbox" name="manuales" id="manuales" value="Si" checked >
	<?php 
	}else if(($row['manuales']=='No')or($row['manuales']=='')){
	?>
	<input type="checkbox" name="manuales" id="manuales" value="Si">
	<?php 
	}
	?>
	</center></td>
	
	<td>		
	<center>
	Empastado:
	<?php 
	if($row['empastado']=='Si'){
	?>
	<input type="checkbox" name="empastado" id="empastado" value="Si" checked >
	<?php 
	}else if(($row['empastado']=='No')or($row['empastado']=='')){
	?>
	<input type="checkbox" name="empastado" id="empastado" value="Si">
	<?php 
	}
	?>
	</center></td>
	
	<td>	<center>
	CD:
	<?php 
	if($row['cd']=='Si'){
	?>
	<input type="checkbox" name="cd" id="cd" value="Si" checked >
	<?php 
	}else if(($row['cd']=='No')or($row['cd']=='')){
	?>
	<input type="checkbox" name="cd" id="cd" value="Si" >
	<?php 
	}
	?>
	</center></td>
	</tr>
	</table>
	
	<br>
	
	<strong align="center">Observaciones</strong>
	<table class="table table-bordered table-striped" >
	<tr>
	<td><textarea class="form-control" onkeypress="return sololetras(event)" onpaste="return false" name="observaciones" id="observaciones" maxlength="60" placeholder="Maximo de 60 caracteres" rows="3" style="resize:none;"><?php echo $row['observaciones'];?></textarea></td>
	</tr>

	

	</table>
	</center>
	</div>

              <div class="box-footer">
              <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i> registrar documentos </button></center>
              </div>

		<br>
</form>

                   
               </div> <!-- fin de box box-info -->


          </div> <!-- fin de rejilla-->

  <!-- fin de formulario-->
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