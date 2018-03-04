<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coord Trayecto'){
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

  <?php include ("menus_ct.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu4.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">   
Comit&eacute; Tecnico/Profesores/Proyectos asociados
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
              <h3 class="panel-title text-center">Profesores asignados como comit&eacute; tecnico</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <?php
    require_once("clasedb.php");
    $db=new clasedb();
    $db->conectar();
    mysql_query("SET NAMES 'utf8'");
    
    $a="SELECT * FROM profesores WHERE ci='".$_SESSION['cedula_usu']."' ";
	$b=mysql_query($a);
	$c=mysql_fetch_array($b);
	
    $sql="SELECT profesores.id AS'id_p',profesores.nombres,profesores.apellidos,titulo,periodo,proyectos.id 
	FROM profesores,proyectos,anios,pnfs,proyectos_tiene_comite,estudiante,est_cursa_proy,est_tiene_proy WHERE
	estudiante.id=est_cursa_proy.id_estudiante AND
	pnfs.id=est_cursa_proy.id_pnf AND
	anios.id=est_cursa_proy.id_anio AND
	anios.id=proyectos.id_anio AND
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite1 AND
	pnfs.nomb_pnf='".$c['area_especializacion']."' OR
	estudiante.id=est_cursa_proy.id_estudiante AND
	pnfs.id=est_cursa_proy.id_pnf AND
	anios.id=est_cursa_proy.id_anio AND
	anios.id=proyectos.id_anio AND
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite2 AND
	pnfs.nomb_pnf='".$c['area_especializacion']."' OR 
	estudiante.id=est_cursa_proy.id_estudiante AND
	pnfs.id=est_cursa_proy.id_pnf AND
	anios.id=est_cursa_proy.id_anio AND
	anios.id=proyectos.id_anio AND
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite3 AND
	pnfs.nomb_pnf='".$c['area_especializacion']."'";
    $r=mysql_query($sql);
	$cont=mysql_num_rows($r);
	$row=mysql_fetch_array($r);
	
	if(mysql_num_rows($r)==0){
    ?>
	<script>
	$(document).ready(function(){
	sweetAlert("Disculpe", "no hay resultados", "error");
	});
	function redireccionar(){
	window.location="index5.php";
	}
	setTimeout('redireccionar()',3000); 
	</script>
	<?php
    }else {	
    ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">A&ntilde;o</th>
                  <th class="text-center">Apellidos</th>
                  <th class="text-center">Nombres</th>
                  <th class="text-center">Asignados</th>
                  <th class="text-center">Ver pdf</th>
                </tr>     
                </thead>
                <tbody>
                 <?php
                      while($row=mysql_fetch_array($r)){
						$sql2="SELECT COUNT(proyectos_tiene_comite.id_proyecto) AS'cant'
						FROM profesores,proyectos,anios,pnfs,proyectos_tiene_comite,
						estudiante,est_cursa_proy,est_tiene_proy WHERE
						estudiante.id=est_cursa_proy.id_estudiante AND
						pnfs.id=est_cursa_proy.id_pnf AND
						anios.id=est_cursa_proy.id_anio AND
						anios.id=proyectos.id_anio AND
						estudiante.id=est_tiene_proy.id_estudiante1 AND
						proyectos.id=est_tiene_proy.id_proyecto AND
						proyectos.id=proyectos_tiene_comite.id_proyecto AND
						profesores.id=proyectos_tiene_comite.id_comite1 AND
						profesores.id='".$row['id_p']."' AND
						pnfs.nomb_pnf='".$c['area_especializacion']."' OR
						estudiante.id=est_cursa_proy.id_estudiante AND
						pnfs.id=est_cursa_proy.id_pnf AND
						anios.id=est_cursa_proy.id_anio AND
						anios.id=proyectos.id_anio AND
						estudiante.id=est_tiene_proy.id_estudiante1 AND
						proyectos.id=est_tiene_proy.id_proyecto AND
						proyectos.id=proyectos_tiene_comite.id_proyecto AND
						profesores.id=proyectos_tiene_comite.id_comite2 AND
						profesores.id='".$row['id_p']."' AND 
						pnfs.nomb_pnf='".$c['area_especializacion']."' OR 
						estudiante.id=est_cursa_proy.id_estudiante AND
						pnfs.id=est_cursa_proy.id_pnf AND
						anios.id=est_cursa_proy.id_anio AND
						anios.id=proyectos.id_anio AND
						estudiante.id=est_tiene_proy.id_estudiante1 AND
						proyectos.id=est_tiene_proy.id_proyecto AND
						proyectos.id=proyectos_tiene_comite.id_proyecto AND
						profesores.id=proyectos_tiene_comite.id_comite3 AND
						profesores.id='".$row['id_p']."' AND
						pnfs.nomb_pnf='".$c['area_especializacion']."'";
						$r2=mysql_query($sql2);
						$cont2=mysql_num_rows($r2);
						$row2=mysql_fetch_array($r2);
					   ?>
                       <tr>
                      <td align='justify'><?php echo $row['titulo'];?></td>
                      <td align='center'><?php echo $row['periodo'];?></td>
                      <td align='center'><?php echo $row['apellidos'];?></td>
                      <td align='center'><?php echo $row['nombres'];?></td>
                      <td align='center'><?php echo $row2['cant'];?></td>
                      <td align='center'><a target="_blank" href="planilla_inscripcion.php?id=<?php echo $row['id'];?>">
					  <img src="imagenes/pdf.png" style="width:30px; height:30px;"></a></td>
					</tr>
                    <?php 
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

<script type="text/javascript">
  $(document).ready(function(){
    var current = 1;
 
    widget      = $(".step");
    btnnext     = $(".next");
    btnback     = $(".back"); 
    btnsubmit   = $(".submit");
 
    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);
 
    // Next button click action
    btnnext.click(function(){
      if(current < widget.length){
        widget.show();
        widget.not(':eq('+(current++)+')').hide();
        setProgress(current);
      }
      hideButtons(current);
    })
 
    // Back button click action
    btnback.click(function(){
      if(current > 1){
        current = current - 2;
        btnnext.trigger('click');
      }
      hideButtons(current);
    })      
  });
 
  // Change progress bar action
  setProgress = function(currstep){
    var percent = parseFloat(100 / widget.length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar").css("width",percent+"%").html(percent+"%");    
  }
 
  // Hide buttons according to the current step
  hideButtons = function(current){
    var limit = parseInt(widget.length); 
 
    $(".action").hide();
 
    if(current < limit) btnnext.show();
    if(current > 1) btnback.show();
    if (current == limit) { btnnext.hide(); btnsubmit.show(); }
  }
 
</script>

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