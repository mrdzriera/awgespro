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
     Usuarios/Consultar/Bloqueados
     </h1>
      
    </section>
        <section class="content">
<?php
$tipo=$_GET["tipo"];
?>
      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Listado de <?php echo $tipo;?> bloqueados </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
   <?php
  require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();

if($tipo=='Estudiantes'){
  
$busqueda="SELECT *,usuarios.id,usuarios.correo,usuarios.ci FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
nivel='Estudiante' AND usuarios.status='Bloqueado' ";

}else if($tipo=='Profesores'){
  
$busqueda="SELECT *,usuarios.id,usuarios.ci FROM profesores,usuarios WHERE profesores.ci=usuarios.ci AND usuarios.status='Bloqueado'";

}else if($tipo=='Secretarios'){
  
$busqueda="SELECT *,usuarios.id,usuarios.correo,usuarios.ci FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
 nivel='Secretario' AND usuarios.status='Bloqueado'";

}

$bus=mysql_query($busqueda);
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No usuarios bloqueados con este nivel", "error");
});
function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',2000); 
</script>
<?php
}else{ 
?>
<form action='desbloqueado_lotes_sec.php' name='form' method='post' >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Apellidos</th>  
				  <th class="text-center">Nombres</th>
                  <th class="text-center">C&eacute;dula</th>
                  <th class="text-center">Correo</th>
                  <th class="text-center">Estatus</th>
                </tr>
                </thead>
                <tbody>
                                            <?php $fila=mysql_fetch_array($bus);
                                            for($i=0; $i<$fila;$i++){ ?>
                                            <tr>
											<td ><p align='center'><?php echo $fila['apellidos'];?></p></td>
                                            <td ><p align='center'><?php echo $fila['nombres'];?></p></td>
                                            <td ><p align='center'><?php echo $fila['ci'];?></p></td>
                                            <td ><p align='center'><?php echo $fila['correo'];?></p></td>
                                            <input type='hidden' name='usuario[]' value='<?php echo $fila['usuario'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='intentos[]' value='0' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='indice' value='<?php echo $cont;?>'/>
                                            <input type='hidden' name='tipo' value='<?php echo $tipo;?>'/>
                                            <td>
                                            <center>
                                            <select name='status[]' class="form-control" style="width:130px;" required>;
                                                                  <option value=''>Seleccione</option>
                                                                  <option value='Activo'>Activo</option>
                                                                  <option value='Bloqueado'>Bloqueado</option>
                                                                  </select>
                                            </center>
                                            </td>
                                            </tr>
                                            <?php  $fila=mysql_fetch_array($bus);
} ?>
                  <?php } ?>
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