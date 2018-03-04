<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if(($_SESSION['tipocuentas']!='Coordinador')and($_SESSION['tipocuentas']!='Secretario')){
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

  <?php 
  if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menus_coord.php");	
		
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
  if($_SESSION['tipocuentas']=='Coordinador'){
		
	include ("menu3.php");	
		
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
	  <?php
	  $retiro=$_POST['retiro'];
	  ?>
Proyectos/Retiros/<?php if($retiro=='integrantes'){ echo "Integrantes"; }else{ echo "Investigacion"; }?>
      </h1>
      
    </section>
<section class="content">

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Proyecto registrado</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
					</ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
<?php 


$ci_1=$_POST['ci_1'];
$anio=$_POST['anio'];
$cip=$_POST['cip'];
$retiro=$_POST['retiro'];
$retiro=$_GET['retiro'];

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");

if($_SESSION['tipocuentas']=='Coordinador'){
	
$sql="SELECT *,
estudiante.nombres AS'nombre1',
estudiante.apellidos AS'apellido1',
estudiante.id AS'id_estudiante1',
proyectos.id AS'id_proyecto' 
FROM estudiante, anios, est_cursa_proy, profesores, proyectos, 
est_tiene_proy, coord_tiene_proy
WHERE estudiante.id = est_cursa_proy.id_estudiante
AND anios.id = est_cursa_proy.id_anio
AND estudiante.id = est_tiene_proy.id_estudiante1
AND proyectos.id = est_tiene_proy.id_proyecto
AND profesores.id = coord_tiene_proy.id_profesor
AND proyectos.id = coord_tiene_proy.id_proyecto
AND estudiante.ci = '".$ci_1."'
AND anios.periodo = '".$anio."'
AND profesores.ci = '".$cip."' ";	
	
}else if($_SESSION['tipocuentas']=='Secretario'){

$sql="SELECT *,
estudiante.nombres AS'nombre1',
estudiante.apellidos AS'apellido1',
estudiante.id AS'id_estudiante1',
proyectos.id AS'id_proyecto' 
FROM estudiante, anios, est_cursa_proy, profesores, proyectos, 
est_tiene_proy
WHERE estudiante.id = est_cursa_proy.id_estudiante
AND anios.id = est_cursa_proy.id_anio
AND estudiante.id = est_tiene_proy.id_estudiante1
AND proyectos.id = est_tiene_proy.id_proyecto
AND estudiante.ci = '".$ci_1."'
AND anios.periodo = '".$anio."' ";	
	
}

$r=mysql_query($sql);

//echo $sql;

$row=mysql_fetch_array($r);

$sql2="SELECT *,estudiante.id AS'id_estudiante2' 
FROM estudiante,proyectos,est_tiene_proy WHERE
estudiante.id=est_tiene_proy.id_estudiante2 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$row['id_proyecto']."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);

$sql3="SELECT *,estudiante.id AS'id_estudiante3' FROM estudiante,proyectos,est_tiene_proy WHERE
estudiante.id=est_tiene_proy.id_estudiante3 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$row['id_proyecto']."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);

	 if((mysql_num_rows($r)==0)){
?>
        <script type="text/javascript">
		$(document).ready(function(){
		sweetAlert("Disculpe", "No existen proyectos con este lider para este periodo academico", "error");
		});
		function redireccionar(){
		window.location="detalles_retiros.php?retiro=<?php echo $retiro;?>";
		}
		setTimeout('redireccionar()',3000); 
        </script>
<?php
	 }else{
 ?>
							     
                                <table id="example1" class="table table-bordered table-striped">
                             	  <thead><tr>
                                <center>
                                        <td align='center'>T&iacute;tulo de proyecto:</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td ><p align='justify'><?php echo $row['titulo'];?></p></td>
											</tr>

                                      </tbody>
                                </table>
								<?php
								if($retiro=='integrantes'){
								$form="retiro_realizado.php";	
								}else if($retiro=='investigacion'){
								$form="investigacion_eliminada.php";	
								}
								?>
								<form action="<?php echo $form;?>" method="post" id="form">
								<input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $row['id_proyecto'];?>">		
								<table class="table table-bordered table-striped">
                             	  <thead><tr>
                                <center>
                           <td align='center'>
						   <?php 
						   if($retiro=='integrantes'){ 
						   echo "Integrantes del proyecto"; 
						   }else if($retiro='investigacion'){ 
						   echo "<b>¡IMPORTANTE!</b> <br> Para continuar debe confirmar la contrase&ntilde;a del coordinador(a)"; 
						   }?>:</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
											<?php
											if($retiro=='integrantes'){
											?>
<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;Lider del proyecto:&nbsp;<select name="id_estudiante1" id="id_estudiante1" class="form-control-sel">
<option value="<?php echo $row['id_estudiante1']?>"><?php echo $row['nombre1'].'&nbsp;'.$row['apellido1'];?></option>
<?php
if($row['id_estudiante2']==0){
?>
<option value="0">No existe un segundo estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row2['id_estudiante2'];?>"><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></option>
<?php
}
?>
<?php
if($row['id_estudiante3']==0){
?>
<option value="0">No existe un tercer estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row3['id_estudiante3'];?>"><?php echo $row3['nombres'].'&nbsp;'.$row3['apellidos'];?></option>
<?php 
}
?>
<option value="0">Retirado</option>
<select></td>
</tr>
	
<tr>
<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Estudiante 2:&nbsp;<select name="id_estudiante2" id="id_estudiante2" class="form-control-sel"">
<?php
if($row2['id_estudiante2']==0){
?>
<option value="0">No existe un segundo estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row2['id_estudiante2'];?>"><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></option>
<?php
}
?>
<?php
if($row2['id_estudiante3']==0){
?>
<option value="0">No existe un tercer estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row3['id_estudiante3'];?>"><?php echo $row3['nombres'].'&nbsp;'.$row3['apellidos'];?></option>
<?php 
}
?>
<option value="<?php echo $row['id_estudiante1']?>"><?php echo $row['nombre1'].'&nbsp;'.$row['apellido1'];?></option>
<option value="0">Retirado</option>
<select></td>
</tr>

<tr>
<td align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Estudiante 3:&nbsp;<select name="id_estudiante3" id="id_estudiante3" class="form-control-sel">
<?php
if($row3['id_estudiante3']==0){
?>
<option value="0">No existe un tercer estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row3['id_estudiante3'];?>"><?php echo $row3['nombres'].'&nbsp;'.$row3['apellidos'];?></option>
<?php
}
?>
<?php
if($row3['id_estudiante2']==0){
?>
<option value="0">No existe un segundo estudiante</option>
<?php
}else{
?>
<option value="<?php echo $row2['id_estudiante2'];?>"><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></option>
<?php 
}
?>
<option value="<?php echo $row['id_estudiante1']?>"><?php echo $row['nombre1'].'&nbsp;'.$row['apellido1'];?></option>
<option value="0">Retirado</option>
<select></td>
<?php
}else{
?>
<td>
<center><input type="password" name="clave" style="width:200px;" class="form-control"></center>
<center><input type="hidden" name="usuario" value="<?php echo $_SESSION['nombre_usu'];?>"></center>
<center><input type="hidden" name="id_proyecto" value="<?php echo $row['id_proyecto'];?>" style="width:300px;" class="form-control"></center>
</td>
<?php	
} 
?>
<input type="hidden" name="retiro" value="<?php echo $retiro;?>" style="width:200px;" class="form-control">
											</tr>
                                      </tbody>
                                </table>
				<div class="box-footer">
                <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i>
                <?php if($retiro=='integrantes'){ echo "Modificar"; }else if($retiro='investigacion'){ echo "Eliminar"; }?> </button></center>
              </div>

                         </form>   
                              </div>
							  <?php
								}
							  ?>
                        </div>
                        

                    </div>

                <!-- end panel -->
            </div>
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

<script>
$(document).ready(function() {
            var table = $('#example1').DataTable({
                dom: 'lBfrtip',/*Bfrtip*/
                buttons: [
                    {
                        extend: 'colvis',
                        columns: ':not(:first-child)',
                    },
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                "language" : {
                    "url":"{{ assetsUrl }}assets/js/DataTables/i18n/Spanish.json"
                },
                "lengthMenu": [[5, 10/*, 20, -1*/], [5, 10/*, 20, "Todos"*/]]
            });
            /*http://stackoverflow.com/a/33537085/1883256*/
            table.on( 'draw', function () {
                var body = $( table.table().body() );
 
                body.unhighlight();
                body.highlight( table.search() );
            } );
 
        } );
</script>
</body>
</html>
