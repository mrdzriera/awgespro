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

	function solonumeros(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key);

numeros="0123456789";

especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){

teclado_especial=true;

				}

			}

	if(numeros.indexOf(teclado)==-1 && !teclado_especial){
	return false;
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
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="dataTables.bootstrap.css">

    <link rel="stylesheet" href="_all-skins.min.css">
    <script src="disti/jquery-1.12.3.min.js"></script>
    <script src="disti/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
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
      <h1 align="center" class="panel-title text-center">
      Proyectos/Inscripciones
      </h1>
      
    </section>

			<section class="content">

      <div class="col-md-8 col-md-offset-2">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                  <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
                  </div>

                     <div class="box-header with-border">
                  <center> <b>IMPORTANTE</b>  <br> Para registrar un nuevo a&ntilde;o acad&eacute;mico debe ingresar el a&ntilde;o en curso y habilitar es estado actual</center>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" action="anio_registrado.php" name="form" method="post">
                    <div class="box-body panel-title text-center">

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label" align="right">A&ntilde;o</label>

                        <div class="col-sm-6">
                         <input type="text" name="periodo" id="periodo" onkeypress="return solonumeros(event);" onpaste="return false" class="form-control" placeholder="Ingrese el a&ntilde;o" size="4" required>
                        </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                      </div>
                      
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label" align="right">Estado</label>

                         <div class="col-sm-6">
                         <select name="estado" name="estado" class="form-control" required>
                         <option value="">Seleccione una opci&oacute;n</option>
                         <option value="Habilitado">Habilitado</option>
                         <option value="Deshabilitado">Deshabilitado</option>
                         </select>
                        </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                      </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <center>
                      <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Registrar </button>
                      </center>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>

                </section>

    <section class="content">

      <br>
      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">A&ntilde;os acad&eacute;micos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php
    require_once("clasedb.php");
    $db=new clasedb();
    $db->conectar();
    mysql_query("SET NAMES 'utf8'");
    $query="SELECT * FROM anios";
    $bus=mysql_query($query);
    
    if(mysql_num_rows($bus)==0){
    ?>
	<script>
	$(document).ready(function(){
	sweetAlert("Disculpe", "no se encontraron los periodos académicos registrados", "error");
	});
	function redireccionar(){
	window.location="index.php";
	}
	setTimeout('redireccionar()',3000);
	</script>
	<?php
    }else {
    ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>A&ntilde;o Acad&eacute;mico</th>
                  <th>Estado</th>
                  <th>Acci&oacute;n</th>
                </tr>
                </thead>
                <tbody>
<?php
                      while($row=mysql_fetch_array($bus)){
                       ?>
                       <tr>
                                            <td align='center'><?php echo $row['id'];?></td>
                                            <td align='center'><?php echo $row['periodo'];?></td>
                                            <td align='center'><?php if($row['estado']=='Habilitado'){
                      ?>
                      <img src="./imagenes/bien.png" style="width:30px; height:30px;">
                      <?php 
                      } else if($row['estado']=='Deshabilitado'){
                      ?>
                      <img src="imagenes/deshabilitado.png" style="width:30px; height:30px;">
                      <?php
                      }
                      ?></td>
                                            <td align='center'><a href="modifica_anio.php?id=<?php echo $row['id']; ?>" >
                      <img src="imagenes/modificar.png" style="width:30px; height:30 px;"></a>
                      <a onclick="return confirm('¿Esta seguro que desea eliminar?')" href="anio_eliminado.php?id=<?php echo $row['id']; ?>" >
                      <img src="imagenes/eliminar.png" style="width:30px; height:30px;"></a></td>
                                            </tr>
                      <?php }}
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