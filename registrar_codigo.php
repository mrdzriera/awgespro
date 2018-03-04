<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Secretario'){
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
      	<?php
$tipo=$_GET["tipo"];
?>
      <br>
      <h1 class="panel-title text-center">
      Registros/C&oacute;digos</h1>
      
    </section>
        <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Asignar c&oacute;digos </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
  <?php
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

if($_GET['pnf']!=""){
$pnf=$_GET['pnf'];	
}else if($_POST['pnf']!=""){
$pnf=$_POST['pnf'];	
}

if($_GET['trayecto']!=""){
$trayecto=$_GET['trayecto'];	
}else if($_POST['trayecto']!=""){
$trayecto=$_POST['trayecto'];	
}

if($_GET['sede']!=""){
$sede=$_GET['sede'];	
}else if($_POST['sede']!=""){
$sede=$_POST['sede'];	
}

$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
$rs=mysql_query($select);
$trae=mysql_fetch_array($rs);

$sentenciasql=" 
SELECT SUBSTR(codigo,12,3)AS'ultimo' FROM 
proyectos,pnfs,sedes,trayectos,anios,estudiante,est_cursa_proy,est_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
anios.id=est_cursa_proy.id_anio AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$trae['periodo']."' AND
nomb_pnf='".$pnf."' AND 
trayectos.descripcion='".$trayecto."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' AND
codigo=(SELECT MAX(codigo)FROM proyectos,pnfs,sedes,trayectos,anios,estudiante,est_cursa_proy,est_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
anios.id=est_cursa_proy.id_anio AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$trae['periodo']."' AND
nomb_pnf='".$pnf."' AND 
trayectos.descripcion='".$trayecto."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' ORDER BY proyectos.id)";

$query=mysql_query($sentenciasql);
//echo $sentenciasql;
$rs=mysql_fetch_array($query);
$contador=$rs['ultimo'];
$contador=$contador+1;//FIN ;
$cerome='00';
$ceroma='0';
	 
$busqueda="SELECT
estudiante.nombres,
estudiante.apellidos,
proyectos.id AS'id_proyecto',
proyectos.titulo,
pnfs.cod_pnf,
SUBSTR(nombre,6,1) AS'letra_sede',
trayectos.num_trayecto,
SUBSTR(periodo, 3, 2 )AS'ini_periodo'
FROM proyectos,pnfs,sedes,trayectos,anios,estudiante,est_cursa_proy,est_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
anios.id=est_cursa_proy.id_anio AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id_anio='".$trae['id']."' AND
nomb_pnf='".$pnf."' AND 
trayectos.descripcion='".$trayecto."' AND 
sedes.nombre='".$sede."' AND 
codigo='' AND 
factibilidad='Factible' ORDER BY proyectos.id";
$bus=mysql_query($busqueda);
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript" type="text/javascript">
 $(document).ready(function(){
sweetAlert("Disculpe", "No se encontraron resultados", "error");
});
function redireccionar(){
window.location="reg_cod.php";
}
setTimeout('redireccionar()',3000);
</script>
<?php
}else{ 
?>
              <form action='codigo_registrado.php' name='form' method='post' >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Lider de proyecto</center></th>
                  <th><center>Estudiante 2</center></th>
                  <th><center>Estudiante 3</center></th>
                  <th><center>C&oacute;digo</center></th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$fila=mysql_fetch_array($bus);
				
                for($i=0;$i<$fila;$i++){ 
				//datos del estudiante2
				$consulta2="SELECT * FROM proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
				WHERE
				estudiante.ci=usuarios.ci AND
				estudiante.id=est_cursa_proy.id_estudiante AND 
				estudiante.id=est_tiene_proy.id_estudiante2 AND
				proyectos.id=est_tiene_proy.id_proyecto AND
				proyectos.id='".$fila['id_proyecto']."' ";
				$traer2=mysql_query($consulta2);

				$fila2=mysql_fetch_array($traer2);//fin

				//datos del estudiante3
				$consulta3="SELECT * FROM proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
				WHERE
				estudiante.ci=usuarios.ci AND
				estudiante.id=est_cursa_proy.id_estudiante AND 
				estudiante.id=est_tiene_proy.id_estudiante3 AND
				proyectos.id=est_tiene_proy.id_proyecto AND
				proyectos.id='".$fila['id_proyecto']."' ";
				$traer3=mysql_query($consulta3);
				$fila3=mysql_fetch_array($traer3);//fin
				?>
                <tr>
                <td ><center><?php echo $fila['nombres'].'&nbsp'.$fila['apellidos'];?></p></td>
                <td ><center><?php echo $fila2['nombres'].'&nbsp'.$fila2['apellidos'];?></p></td>
                <td ><center><?php echo $fila3['nombres'].'&nbsp'.$fila3['apellidos'];?></p></td>
                <td >
				<center>
				<input type="text" name="codigo[]" id="codigo" class="form-control" style="width:150px" size="80" readonly value="<?php echo $fila['cod_pnf'].$fila['letra_sede'];?>-<?php echo $fila['num_trayecto'];?>-<?php echo $fila['ini_periodo'];?>-<?php if($contador<=9){echo $cerome.$contador;}else if($contador>9){echo $ceroma.$contador;}?>" />
				</center>
				</td>
                <input type='hidden' name='indice' value='<?php echo $cont;?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                <input type="hidden" name="id[]" value="<?php echo $fila['id_proyecto'];?>">
                  </tr>
                  <?php 
				  $fila=mysql_fetch_array($bus);
				  $contador++;
				  } 
				  } 
				  ?>
                </tbody>
                
              </table>
              <div class="box-footer"><br>
              <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i> Guardar</button></center>
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
