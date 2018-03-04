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
      <br><h1 class="panel-title text-center">
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
			$tabla=$_GET['tabla'];
			
			//obtener el numero de campos
			$sql="SELECT * FROM ".$tabla." ";
			$r=mysql_query($sql);
			$ncampos=mysql_num_fields($r);
			
			//cantidad de registros
			$sql2="SELECT COUNT(*)AS'cant' FROM ".$tabla." ";
			$r2=mysql_query($sql2);
			$cont2=mysql_num_rows($r2);
			$row2=mysql_fetch_array($r2);
			
			
			//peso en bytes
			$sql3="SELECT table_name Tabla,(data_length+index_length)Tamaño FROM information_schema.tables WHERE 
			table_schema='awgespro' AND table_name='".$tabla."' ";
			$r3=mysql_query($sql3);
			$cont3=mysql_num_rows($r3);
			$row3=mysql_fetch_array($r3);
			
			//peso en mb
			$sql4="SELECT table_name Tabla,((data_length+index_length)/(1024*1024))Tamaño FROM information_schema.tables WHERE 
			table_schema='awgespro' AND table_name='".$tabla."' ";
			$r4=mysql_query($sql4);
			$cont4=mysql_num_rows($r4);
			$row4=mysql_fetch_array($r4);	
			?>
              <h3 class="panel-title text-center">Tabla:<?php echo $tabla;?>&nbsp;&nbsp;
			  <?php echo "Total de registros: ".$row2['cant'];?>&nbsp;&nbsp;
			  <?php echo "Peso en bytes: ".$row3['Tamaño'];?>&nbsp;&nbsp;
			  <?php echo "Peso en Mb: ".$row4['Tamaño'];?>&nbsp;&nbsp;
			  <?php echo "No. de campos: ".$ncampos;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php
    require_once("clasedb.php");
    $db=new clasedb();
    $db->conectar();
    mysql_query("SET NAMES 'utf8'");
    $query="DESCRIBE ".$tabla." ";
    $bus=mysql_query($query);
    if(mysql_num_rows($bus)==0){
    ?>
	<script>
	$(document).ready(function(){
	sweetAlert("Disculpe", "no se encontraron los campos creados", "error");
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
			<td><center><strong>Campos</strong></center></td>
			<td><center><strong>Tipo de dato</strong></center></td>
			<td><center><strong>Nulo/ No Nulo</strong></center></td>
			<td><center><strong>Clave</strong></center></td>
			<td><center><strong>Default</strong></center></td>
			<td><center><strong>Extra</strong></center></td>
			</tr>
			</thead>
			<tbody>
			<?php
			$row=mysql_fetch_array($bus);
			for($i=0;$i<$row;$i++){
			?>
			<tr>
			<td><?php echo $row['Field'];?></td>
			<td><?php echo $row['Type'];?></td>
			<td><?php echo $row['Null'];?></td>
			<td><?php echo $row['Key'];?></td>
			<td><?php echo $row['Default'];?></td>
			<td><?php echo $row['Extra'];?></td>
			</tr>
			<?php	
			$row=mysql_fetch_array($bus);
			}
			?>
	
            
			  <?php
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