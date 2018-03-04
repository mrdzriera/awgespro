<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
	?>
<script language="javascript" type="text/javascript">
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
      <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="_all-skins.min.css">
  
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
      Socializaci&oacute;n/Fechas</h1>
      
    </section>
        <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Asignar fecha de socializaci&oacute;n</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  <?php
  require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();


$busqueda="SELECT *,
proyectos.id AS'id_proyecto',
sedes.nombre
FROM proyectos,profesores,coord_tiene_proy,proyectos_tiene_socializacion,estudiante,sedes,est_cursa_proy,est_tiene_proy WHERE 
proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
estudiante.id=est_cursa_proy.id_estudiante AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos_tiene_socializacion.fecha='0000-00-00' AND
profesores.ci='".$_SESSION['cedula_usu']."' AND 
factibilidad='Factible' AND codigo!=''";

$bus=mysql_query($busqueda);
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Usted no tiene proyectos pendientes por registrar socializacion", "error");
});
function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',4000);
</script>
<?php
}else{ 
?>
              <form action='socializacion_registrada.php' name='form' method='post' >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Lider de Proyecto</center></th>
                  <th><center>Fecha</center></th>
                  <th><center>Hora</center></th>
                  <th><center>Lugar</center></th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$fila=mysql_fetch_array($bus);
                for($i=0; $i<$fila;$i++){ 
				?>
                <tr>
				<td ><p align='justify'><?php echo $fila['nombres'].'&nbsp'.$fila['apellidos'];?></p></td>
             
				 <td>
				 <center><input type='date' name='fecha[]' id='fecha' class="form-control" value="<?php $fecha=date("Y-m-d"); echo $fecha;?>" required ></center>
          		 </td>
                <td align='center'><center><input type='time' name='hora_entrada[]' id='hora_entrada' class="form-control" value="<?php date_default_timezone_set('America/Caracas'); $hora=date("h:i"); echo $hora;?>" required></center></td>
				<td align='center'>
				<center><select name='lugar[]' id='lugar' class="form-control" required >
				<option value=''> Seleccione el lugar</option>
				<?php 
				if($fila['nombre']=='Sede Victoria'){
				?>
					<?php
				for($a=1;$a<=15;$a++){
				?>
			    <option value="<?php echo "A".$a?>"><?php echo "A".$a?></option>
				<?php
				}
				?>
				<?php
				for($b=1;$b<=4;$b++){
				?>
			    <option value="<?php echo "B".$b?>"><?php echo "B".$b?></option>
				<?php
				}
				?>
				<?php
				for($c=1;$c<=15;$c++){
				?>
			    <option value="<?php echo "C".$c?>"><?php echo "C".$c?></option>
				<?php
				}
				?>
				<option value="LAB DIS. 1">Lab dise&ntilde;o 1</option>
				<option value="LAB DIS. 2">Lab dise&ntilde;o 2</option>
				<option value="LAB APOY DOC">Lab apoyo docente</option>
			  <option value="LAB PROG">Lab Programaci&oacute;n</option>
				<option value="Biblioteca">Biblioteca</option>
				<option value="Usos multiples">Usos multiples</option>
				<?php 
				}else if($fila['nombre']=='Sede Maracay'){
				?>
				<option value="M1">M1</option>
				<option value="M2">M2</option>
				<option value="M3">M3</option>
				<option value="M4">M4</option>
				<option value="M5">M5</option>
				<option value="M6">M6</option>
				<option value="M7">M7</option>
				<option value="M8">M8</option>
				<?php 
				}else if($fila['nombre']=='Sede Barbacoas'){
				?>
				<option value="E1">E1</option>
				<option value="E2">E2</option>
				<option value="E3">E3</option>
				<option value="E4">E4</option>
				<option value="E5">E5</option>
				<option value="E6">E6</option>
				<option value="E7">E7</option>
				<option value="E8">E8</option>
				<?php
				}
				?>
				</select></center>
				</td>
				<input type='hidden' name='id_proyecto[]' value='<?php echo $fila['id_proyecto'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
				<input type='hidden' name='indice' value='<?php echo $cont;?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                </tr>
                <?php  
				$fila=mysql_fetch_array($bus);
				}  
				}
				?>
                </tbody>
              </table>
              <div class="box-footer">
              <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i> Asignar </button></center>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<script src="jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap.min.js"></script>
<!-- DataTables -->
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="fastclick.js"></script>
<!-- AdminLTE App -->
<script src="app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="demo.js"></script>

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
