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
	
			if(confirm("�Desea Salir?")){
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
      Permisos/Modificar Proyecto</h1>
      
    </section>
        <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Permisos para modificar proyecto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  <?php
  require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();

$query="SELECT * FROM 
usuarios,operaciones,permisos,usuario_tiene_permiso 
WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND 
operaciones.id=usuario_tiene_permiso.id_operacion AND 
permisos.id=usuario_tiene_permiso.id_permiso AND
operaciones.nombre='Registrar Evaluaciones' AND
permisos.estado='Deshabilitado' AND
usuarios.ci='".$_SESSION['cedula_usu']."'  ";
$ejecuta=mysql_query($query);

if(mysql_num_rows($ejecuta)>0){
?>	
<script language="javascript">
$(document).ready(function(){
swal("Disculpe", "Usted no esta autorizado para registrar evaluaciones", "error");
});
function redireccionar(){
window.location="consulta_evaluacion.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}

$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
$rs=mysql_query($select);
$trae=mysql_fetch_array($rs);

$opc=$_GET['opc'];

if($opc==1){

$sql="SELECT *,
proyectos.id AS'id',
estudiante.nombres,estudiante.apellidos
FROM proyectos,estudiante,est_tiene_proy,profesores,coord_tiene_proy,proyectos_tiene_permiso,trayectos,turnos,est_cursa_proy WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
turnos.id=est_cursa_proy.id_turno AND
trayectos.id=est_cursa_proy.id_trayecto AND
proyectos.id=proyectos_tiene_permiso.id_proyecto AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
profesores.ci='".$_SESSION['cedula_usu']."' AND
proyectos.id_anio='".$trae['id']."' ";

}else if($opc==2){

$sql="SELECT DISTINCT
proyectos.id AS'id',
estudiante.nombres,estudiante.apellidos,num_trayecto,turnos.descripcion
FROM proyectos,estudiante,est_tiene_proy,profesores,coord_tiene_proy,visitas_comunidades,trayectos,turnos,est_cursa_proy WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
turnos.id=est_cursa_proy.id_turno AND
trayectos.id=est_cursa_proy.id_trayecto AND
proyectos.id=visitas_comunidades.id_proyecto AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=coord_tiene_proy.id_proyecto AND
profesores.id=coord_tiene_proy.id_profesor AND
profesores.ci='".$_SESSION['cedula_usu']."' AND
proyectos.id_anio='".$trae['id']."' ";

}

$bus=mysql_query($sql);
//echo $sql;
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Usted no tiene proyectos para habilitar permisos", "error");
});
 function redireccionar(){
window.location="index4.php";
}
setTimeout('redireccionar()',4000); 
</script>
<?php
}else{ 
?>
              <form action='permiso_registrado.php' name='form' method='post' >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th><center>Lider de proyecto</center></th>
                  <th><center>Trayecto</center> </th>
                  <th><center>Turno</center></th>
                  <th><center>Permiso</center></th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$fila=mysql_fetch_array($bus);
                for($i=0; $i<$fila;$i++){ ?>
                <tr>
                <td ><p align='justify'><?php echo $fila['nombres'].'&nbsp'.$fila['apellidos'];?></p></td>
                <td ><p align='center'><?php echo $fila['num_trayecto'];?></p></td>
                <td ><p align='center'><?php echo $fila['descripcion'];?></p></td>
                <td >
				<center>
				<select name="id_permiso[]" class="form-control">
				<?php 
				if($opc==1){
				?>
				<option value="0">Deshabilitado</option>
				<option value="1">Habilitado</option>
				<?php
				}else if($opc==2){
				?>
				<option value="3">Deshabilitado</option>
				<option value="0">Habilitado</option>
				<?php 
				}
				?>
				</select></center>
				<input type="hidden" name="opc[]" value="<?php echo $opc;?>">
				</td>

               
				<input type='hidden' name='indice' value='<?php echo $cont; ?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
				<input type='hidden' name='id_proyecto[]' value='<?php echo $fila['id']; ?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                </tr>
                <?php  
				$fila=mysql_fetch_array($bus);
				}
				}
				?>
                </tbody>
              </table>
              <div class="box-footer">
              <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i> Guardar </button></center>
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