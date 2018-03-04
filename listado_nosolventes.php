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
	  <?php
	  require_once("clasedb.php"); 
	$db=new clasedb();
	$db->conectar();  
	extract($_REQUEST);
	mysql_query("SET NAMES 'utf8'");

	$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
	$rs=mysql_query($select);
	$trae=mysql_fetch_array($rs);
	
	  $solvente=$_GET['solvente'];
	  
	  if($solvente=='si'){
		echo"Solvencias/Consultar/Solventes";
	  }else if($solvente=='no'){
		echo"Solvencias/Consultar/No Solventes";
	  }
	  ?>    
      </h1>
      
    </section>
            <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h1 class="panel-title text-center">
			 <?php
			$solvente=$_GET['solvente'];

			 if($solvente=='si'){

			 echo"Estudiantes solventes del a&ntilde;o ".$trae['periodo'];
				
			 }else if($solvente=='no'){

			 echo"Estudiantes no solventes del a&ntilde;o ".$trae['periodo'];
				
			 }
			  ?>
			  </h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 <?php
			
if($solvente=='no'){

$sql="SELECT proyectos.id,estudiante.nombres,estudiante.apellidos,estudiante.ci,nomb_pnf,sedes.nombre FROM estudiante,pnfs,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_documento WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
portada='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
acta_coord='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
acta_tutor='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
acta_inscrip='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
resumen='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
introduccion='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
manuales='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
empastado='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
cd='No' OR
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
sedes.id=est_cursa_proy.id_sede AND
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
informe='No' OR informe='' ";
	
}

$r=mysql_query($sql);

//echo $sql;

$row=mysql_fetch_array($r);

if(mysql_num_rows($r)==0){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No se encontraron resultados", "error");
});
function redireccionar(){
window.location="index6.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php	
}else{
?>
		
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th><center>Nombres y apellidos</center></th>
                 <th><center>Pnf</center></th>
                 <th><center>Trayecto</center></th>
                 <th><center>Sede</center></th>
                 <th><center>Informe</center></th>
                 <th><center>Modificar</center></th>
                </tr>
                </thead>
                <tbody>
                <?php 
				if($row['nombre']=='Sede Victoria'){
				$sedep="La Victoria";	
				}else if($row['nombre']=='Sede Maracay'){
				$sedep="Maracay";	
				}else if($row['nombre']=='Sede Barbacoas'){
				$sedep="Barbacoas";	
				}
                for($i=0; $i<$row;$i++){
				
				//datos del 2do estudiante
				$sql2="select * FROM estudiante, proyectos, est_tiene_proy where 
				estudiante.id = est_tiene_proy.id_estudiante2 AND
				proyectos.id = est_tiene_proy.id_proyecto AND
				id_proyecto = '".$row['id']."'";
				$r2 = mysql_query($sql2);
				//echo $sql2;
				$row2 = mysql_fetch_array($r2);

				//datos del tercer estudiante
				$sql3="select * FROM estudiante, proyectos, est_tiene_proy where 
				estudiante.id = est_tiene_proy.id_estudiante3 AND
				proyectos.id = est_tiene_proy.id_proyecto AND
				id_proyecto = '".$row['id']."'";
				$r3 = mysql_query($sql3);
				$row3 = mysql_fetch_array($r3);
				
				//datos del trayecto
				$sql4="select * FROM estudiante,trayectos,anios,est_cursa_proy where 
				estudiante.id = est_cursa_proy.id_estudiante AND 
				anios.id = est_cursa_proy.id_anio AND 
				trayectos.id = est_cursa_proy.id_trayecto AND  
				anios.id = '".$trae['id']."' AND
				estudiante.ci='".$row['ci']."' ";
				$r4 = mysql_query($sql4);
				//echo $sql4;
				$row4 = mysql_fetch_array($r4);
                    ?>
                 <tr>
				<td><p align='justify'>
				<?php 
				echo $row['nombres'].'&nbsp;'.$row['apellidos'].'&nbsp;CI&nbsp;'.$row['ci'];
				if(mysql_num_rows($r2)==1){
				echo "<br>".$row2['nombres'].'&nbsp;'.$row2['apellidos'].'&nbsp;CI&nbsp;'.$row2['ci'];	
				}
				if(mysql_num_rows($r3)==1){
				echo "<br>".$row3['nombres'].'&nbsp;'.$row3['apellidos'].'&nbsp;CI&nbsp;'.$row3['ci'];	
				}
				?></p></td>
				<td><p align="center"><?php echo $row['nomb_pnf'];?></p></td>
				<td><p align="center"><?php echo $row4['descripcion'];?></p></td>
				<td><p align="center"><?php echo $sedep;?></p></td>
				<td><p align="center">
				<?php 
				if(($row['informe']!='')and($row['informe']!='No')){
				
				echo "<center>Entregado</center>";
				
				}else{
				
				echo "<center>No entregado</center>";
				
				}
				?></p></td>
				<td align='center'><a href="cons_doc_mod.php?ci_1=<?php echo $row['ci'];?>&anio=<?php echo $trae['periodo'];?>" ><img src="imagenes/modificar.png" style="width:30px; height:30px;" ></a></td>
                  </tr>
                  <?php  
				  $row=mysql_fetch_array($r);
				   }
				   }
				   ?>
                </tbody>
              
              </table>
			
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
