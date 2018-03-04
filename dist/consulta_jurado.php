<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
  ?>
<script language="javascript">
window.location="index.php";
</script>
<?  
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
      <span class="logo-lg"><b>Awgespro</span>
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
      <br><h1>
 Jurados/Consultar
      </h1>
      
    </section>
<section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
					 <center><h3 align="center" style="font-family:Andalus;">B&uacute;squeda de Proyecto.</h3> 
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

					 <form action="consulta_jurado.php" name="form1" method="post" >
				<center>
				<select name="tipo" id="tipo" class="form-control-sel" required>
				<option value="">Seleccione</option>
				<option value="todos">Todos</option>
				<option value="coordinador">Coordinador</option>
				<option value="tutor">Tutor</option>
				<option value="comite1">Comite 1</option>
				<option value="comite2">Comite 2</option>
				<option value="comite3">Comite 3</option>
				</select>
				&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
				</center>
                 <div class="box-footer"><br>
				<center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>
  </div>
                   
               </div> <!-- fin de box box-info -->

</div>
          <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	
<?php
$tipo=$_POST['tipo'];

if($tipo=='todos'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_todos.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar proyectos asinados para usted</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['id']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>

                     </div>
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
<?php	
}else if($tipo=='coordinador'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_coord.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar Proyectos donde Usted es Coordinador</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>

                     </div>
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	<?php
}
?>

  <?php
$tipo=$_POST['tipo'];
if($tipo=='tutor'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_tutor.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar Proyectos donde Usted es Turor</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>

                     </div>
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	<?php
}
?>

  <?php
$tipo=$_POST['tipo'];
if($tipo=='comite1'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_comite1.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar Proyectos donde Usted es Jurado 1</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>

             </div>        
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	<?php
}
?>

  <?php
$tipo=$_POST['tipo'];
if($tipo=='comite2'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_comite2.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar Proyectos donde Usted es Jurado 2</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>
  </div>
                   
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	<?php
}
?>

  <?php
$tipo=$_POST['tipo'];
if($tipo=='comite3'){
?>
    <section class="content">


         <div class="col-md-8 col-md-offset-2">  

                <div class="box box-info">

                     <div class="box-header with-border">
                     <center><h4 class="box-title">Todos los campos con (<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</h4></center>
                     </div>

                    <div class="box-body">

                       <div class="form-group">

						 <form action="bus_comite3.php" method="post" name="form1" id="form1"><br>
					<center><strong><h3 align="center" style="font-family:Andalus;">Buscar Proyectos donde Usted es Jurado 3</h3></strong></center><br>
					<center>
					<select name="anio" id="anio" class="form-control-sel" required>
					<option value="">Seleccione</option>
					<option value="Todos">Todos</option>
					<?php 
					require_once("clasedb.php");
					$db= new clasedb();
					$db->conectar();
					$sql="SELECT * FROM anios";
					$r=mysql_query($sql);
					while($row=mysql_fetch_array($r)){
					?>
					<option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
					<?php 
					}
					?>
					</select>&nbsp;<img src="./iconos/asterisco.jpg" style=" width:15px;  height:15px; "  />
					<input type="hidden" name="ci" id="ci"  value="<?php echo $_SESSION['cedula_usu']?>">
					<div class="box-footer"><br>
                <center><button type="submit" class=""> <i class="fa fa-share" ></i>
                Consultar </button></center>
              </div>

                         </form>      
              </div>

                   
               </div> <!-- fin de box box-info -->

          </div> <!-- fin de rejilla-->

 <!-- fin de formulario-->

    </section>
	<?php
}
?>
  </div>
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
</body>
</html>
