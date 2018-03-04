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
        Registros/C&oacute;digos/Casos Especiales        
      </h1>
      </section>

      <section class="content">

       <div class="col-md-13">
            
            <div class="col-md-13">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Datos del proyecto</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a marked="1" href="#home" aria-controls="home" data-toggle="tab" aria-expanded="true"> Proyecto </a></li>
                      </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
<?php
require_once("clasedb.php");
$db=new clasedb();
$db-> conectar();

$ci_1=$_POST['ci_1'];
$anio=$_POST['anio'];

$sql="SELECT proyectos.id,proyectos.titulo,proyectos.codigo,pnfs.nomb_pnf,trayectos.descripcion
FROM estudiante,pnfs,trayectos,anios,proyectos,est_cursa_proy,est_tiene_proy
WHERE  
est_tiene_proy.id_estudiante1=estudiante.id AND
est_tiene_proy.id_proyecto=proyectos.id AND
est_cursa_proy.id_estudiante=estudiante.id AND
est_cursa_proy.id_pnf=pnfs.id AND 
est_cursa_proy.id_trayecto=trayectos.id AND 
est_cursa_proy.id_anio=anios.id AND 
estudiante.ci='".$ci_1."'  and anios.periodo='".$anio."'";
$r=mysql_query($sql);
$cont=mysql_num_rows($r);
$row=mysql_fetch_array($r);
if(mysql_num_rows($r)==0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No existe un estudiante con esta cedula en este periodo academico", "error");
});
function redireccionar(){
window.location="reg_cod_esp.php";
}
setTimeout('redireccionar()',4000);
</script>
<?php
}else{
?>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<center>
<td align='center'>T&iacute;tulo</td>
<td align='center'>Pnf</td>
<td align='center'>Trayecto </td>
<td align='center'>C&oacute;digo actual</td>
</center>  
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $row['titulo'];?></td>
<td align='center'><?php echo $row['nomb_pnf'];?></td>
<td align='center'><?php echo $row['descripcion'];?></td>
<td align='center'><?php echo $row['codigo'];?></td>
</tr>
</tbody>
</table>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
            </div>

            <div class="box-header with-border">
            <center> <b>¡IMPORTANTE!</b> <br>Modifique el c&oacute;digo actual para asignar el nuevo</center>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="codigo_registrado.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                <div class="form-group">

                  <label for="inputEmail3" class="col-sm-4 control-label">Código</label>
                  <div class="col-sm-6">
                  <input type="hidden" name="indice" class="form-control" value="<?php echo $cont;?>">
                  <input type="text" name="codigo[]" class="form-control" value="<?php echo $row['codigo'];?>">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                  <input type="hidden" name="id[]" value="<?php echo $row['id'];?>">

                </div>
                          
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
               <center>
               <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Modificar </button>
               </center>
              
              </div>
              <!-- /.box-footer -->
            </form>
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
