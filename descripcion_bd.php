<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Administrador'){
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

  <?php include ("menus_adm.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Descripci&oacute;n de base de datos
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
			<?php
			$php=phpversion();
			$apache=$_SERVER['SERVER_SOFTWARE'];
			if(($apache=="")or($apache=="APACHE")){
            $apach=apache_get_version();
        
            }else{
        	$apach=$_SERVER['SERVER_SOFTWARE'];    
            }
			$mysql=mysql_get_server_info();
			$database="awgespro";
			
			$y="SHOW TABLES";
			$yy=mysql_query($y);
			$conty=mysql_query($y);
			$yyy=mysql_fetch_array($yy);
			
            $totalregistros=0;
            $totalbytes=0;
            $totalmb=0;
			for($i=0;$i<$yyy;$i++){
				
			//cantidad de registros
			$sql2="SELECT COUNT(*)AS'cant' FROM ".$yyy['0']." ";
			$r2=mysql_query($sql2);
			$cont2=mysql_num_rows($r2);
			$row2=mysql_fetch_array($r2);
			
			//peso en bytes
			$sql3="SELECT table_name Tabla,(data_length+index_length)Tamaño FROM information_schema.tables WHERE 
			table_schema='".$database."' AND table_name='".$yyy['0']."' ";
			$r3=mysql_query($sql3);
			$cont3=mysql_num_rows($r3);
			$row3=mysql_fetch_array($r3);
			
			//peso en mb
			$sql4="SELECT table_name Tabla,((data_length+index_length)/(1024*1024))Tamaño FROM information_schema.tables WHERE 
			table_schema='".$database."' AND table_name='".$yyy['0']."' ";
			$r4=mysql_query($sql4);
			$cont4=mysql_num_rows($r4);
			$row4=mysql_fetch_array($r4);	
			
			$yyy=mysql_fetch_array($yy);
			$totalregistros=$totalregistros+$row2['cant'];
			$totalbytes=$totalbytes+$row3['Tamaño'];
			$totalmb=$totalmb+$row4['Tamaño'];
			}
			
			?>
              <h1 class="panel-title text-center">
			  <?php echo "Versi&oacute;n de PHP: ".$php;?>&nbsp;&nbsp;
			  <?php echo "Versi&oacute;n de MYSQL: ".$mysql;?>&nbsp;&nbsp;
			  <?php echo "Versi&oacute;n de APACHE: ".$apach;?>&nbsp;&nbsp;
			  <br>
			  <br>
			  <?php echo "Total de registros: ".$totalregistros;?>&nbsp;&nbsp;
			  <?php echo "Peso en bytes: ".$totalbytes;?>&nbsp;&nbsp;
			  <?php echo "Peso en Mb: ".$totalmb;?>&nbsp;&nbsp;
			  <a target="_blank" href="estimacion_bd.php?peso=<?php echo $totalmb;?>">
         <img src="imagenes/grafico.png" style="width:30px; height:30px;"> 
        <b style="color:gray;"> Ver gr&aacute;fica </b></a></center>   
        </a></h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php
    require_once("clasedb.php");
    $db=new clasedb();
    $db->conectar();
    mysql_query("SET NAMES 'utf8'");
    $query="SHOW TABLES";
    $bus=mysql_query($query);
    
    if(mysql_num_rows($bus)==0){
    ?>
	<script>
	$(document).ready(function(){
	sweetAlert("Disculpe", "No se encontraron las tablas creadas en la base de datos", "error");
	});
	function redireccionar(){
	window.location="index2.php";
	}
	setTimeout('redireccionar()',3000);
	</script>
	<?php
    }else {
    ?>

              <table id="example1" class="table table-bordered table-striped">
             <thead>
			 <tr>
			<td><center><strong>Tabla</strong></center></td>
			<td><center><strong>Registros</strong></center></td>
			<td><center><strong>Cotejamiento</strong></center></td>
			<td><center><strong>Motor</strong></center></td>
			<td><center><strong>Ver campos</strong></center></td>
			</tr>
			</thead>
			<tbody>
			<?php
			$totalregistros=0;
			$row=mysql_fetch_array($bus);
			for($i=0;$i<$row;$i++){
			//cantidad de registros
			$sql2="SELECT COUNT(*)AS'cant' FROM ".$row['0']." ";
			$r2=mysql_query($sql2);
			$cont2=mysql_num_rows($r2);
			$row2=mysql_fetch_array($r2);
			
			//peso en bytes
			$sql3="SELECT table_name Tabla,(data_length+index_length)Tamaño FROM information_schema.tables WHERE 
			table_schema='".$database."' AND table_name='".$row['0']."' ";
			$r3=mysql_query($sql3);
			$cont3=mysql_num_rows($r3);
			$row3=mysql_fetch_array($r3);
			
			//peso en mb
			$sql4="SELECT table_name Tabla,((data_length+index_length)/(1024*1024))Tamaño FROM information_schema.tables WHERE 
			table_schema='".$database."' AND table_name='".$row['0']."' ";
			$r4=mysql_query($sql4);
			$cont4=mysql_num_rows($r4);
			$row4=mysql_fetch_array($r4);
			
			//cotejamiento y motor de almacenamiento
			$sql5="SELECT TABLE_SCHEMA,TABLE_NAME,TABLE_COLLATION,ENGINE FROM information_schema.TABLES WHERE 
			table_schema='".$database."' AND table_name='".$row['0']."'";
			$r5=mysql_query($sql5);
			$cont5=mysql_num_rows($r5);
			$row5=mysql_fetch_array($r5);
			?>
			<tr>
			<td><?php echo $row['0'];?></td>
			<td><center><?php echo $row2['cant'];?></center></td>
			<td><center><?php echo $row5['TABLE_COLLATION'];?></center></td>
			<td><center><?php echo $row5['ENGINE'];?></center></td>
			<td><center><a target="_blank" href="ver_campos.php?tabla=<?php echo $row['0'];?>"><img src="imagenes/buscar.png" style="width:30px; heigth:30px;"></a></center></td>
			</tr>
			<?php	
			$row=mysql_fetch_array($bus);
			$totalregistros=$totalregistros+$row2['cant'];
			}
			}
			?>
			</tbody>
			</table>
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