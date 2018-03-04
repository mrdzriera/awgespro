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
$opcion=$_POST['opcion'];

if($opcion=='codigos'){
	
echo"Consultas de proyecto/Codigos";

}else if($opcion=='comunidades'){
	
echo"Consultas de proyecto/Comunidades";

}else if($opcion=='jurados'){
	
echo"Consultas de proyecto/Jurados";

}else if($opcion=='evaluacion'){
	
echo"Consultas de proyecto/Evaluacion";

}else if($opcion=='presentaciones'){
	
echo"Consultas de proyecto/Presentaciones";

}
?>
         
      </h1>
    </section>
			 <?php
			$opcion=$_POST['opcion'];
			if($opcion=='codigos'){ ?>
			<section class="content">

				 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="listado_codigos.php" name="form1" method="post" id="cdr">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">A&ntilde;o</label>

                  <div class="col-sm-6">
                 <select name="anio" id="anio" class="form-control" required>
        				  <option value="">Seleccione una opci&oacute;n</option>
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
        				  </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">PNF</label>

                  <div class="col-sm-6">
                  <select name="pnf" id="pnf" class="form-control" required="">
          				  <option value="">Seleccione una opci&oacute;n</option>
          					<?php 
          					require_once("clasedb.php");
          					$db= new clasedb();
          					$db->conectar();
          					$sql="SELECT * FROM pnfs ORDER BY nomb_pnf";
          					$r=mysql_query($sql);
          					while($row=mysql_fetch_array($r)){
          					?>
          					<option value="<?php echo $row['nomb_pnf']?>"><?php echo $row['nomb_pnf']?></option>
          					<?php 
          					}
          					?>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Trayecto</label>

                  <div class="col-sm-6">
                  <select name="trayecto" id="trayecto" class="form-control" required="">
          				  <option value="">Seleccione una opci&oacute;n</option>
          					<?php 
          					require_once("clasedb.php");
          					$db= new clasedb();
          					$db->conectar();
          					$sql="SELECT * FROM trayectos";
          					$r=mysql_query($sql);
          					while($row=mysql_fetch_array($r)){
          					?>
          					<option value="<?php echo $row['num_trayecto']?>"><?php echo $row['descripcion']?></option>
          					<?php 
          					}
          					?>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Secci&oacute;n</label>

                  <div class="col-sm-6">
                  <select name="seccion" id="seccion" class="form-control" required="">
          				  <option value="">Seleccione una opci&oacute;n</option>
          					<?php 
          					require_once("clasedb.php");
          					$db= new clasedb();
          					$db->conectar();
          					$sql="SELECT * FROM secciones";
          					$r=mysql_query($sql);
          					while($row=mysql_fetch_array($r)){
          					?>
          					<option value="<?php echo $row['num_seccion']?>"><?php echo $row['num_seccion']?></option>
          					<?php 
          					}
          					?>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Turno</label>

                  <div class="col-sm-6">
                  <select name="turno" id="turno" class="form-control" required="">
          				  <option value="">Seleccione una opci&oacute;n</option>
          					<?php 
          					require_once("clasedb.php");
          					$db= new clasedb();
          					$db->conectar();
          					$sql="SELECT * FROM turnos";
          					$r=mysql_query($sql);
          					while($row=mysql_fetch_array($r)){
          					?>
          					<option value="<?php echo $row['descripcion']?>"><?php echo $row['descripcion']?></option>
          					<?php 
          					}
          					?>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Sede</label>

                  <div class="col-sm-6">
                  <select name="sede" id="sede" class="form-control" required>
          				  <option value="">Seleccione una opci&oacute;n</option>
          					<?php 
          					require_once("clasedb.php");
          					$db= new clasedb();
          					$db->conectar();
          					$sql="SELECT * FROM sedes";
          					$r=mysql_query($sql);
          					while($row=mysql_fetch_array($r)){
          					?>
          					<option value="<?php echo $row['nombre']?>">
          					<?php if($row['nombre']=='Sede Victoria'){
          					echo 'Sede Principal la Victoria';
          					}else{ echo $row['nombre'];}?></option>
          					<?php 
          					}
          					?>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

          	<?php
			date_default_timezone_set('America/Caracas');
	        $sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL SECRETARIO QUE CONSULTO EL CODIGO DE PROYECTO TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
	        //echo $sql;
	        mysql_query($sql);
            ?>
	
            </section>
			<?php }?>
			 <?php
			$opcion=$_POST['opcion'];
			if($opcion=='comunidades'){ ?>
			<script>
			window.location="consul_comu.php";
			</script>
			<?php }?>
            <?php
			$opcion=$_POST['opcion'];
			if($opcion=='evaluacion') {?>
			<section class="content">

				 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="mostrar_evaluacion_sec.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C.I del lider</label>

                  <div class="col-sm-6">
                  <input type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" class="form-control" id="textValidReg" placeholder="12345678" name="ci_1"  size="9" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Fase</label>

                  <div class="col-sm-6">
                   <select  name="fase" id="fase" title="Seleccione una Opcion" class="form-control" value="" required>
          					<option value="">Seleccione una opci&oacute;n</option>
          					<option value="1"> 1 </option>
          					<option value="2"> 2 </option>
          					<option value="3"> 3 </option>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div>

                   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">A&ntilde;o</label>

                  <div class="col-sm-6">
                   <select name="anio" class="form-control" id="periodo" required>
        					<option value="">Seleccione una opci&oacute;n</option>
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
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div>  

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

            </section>
	<?php }?>
			 <?php
			$opcion=$_POST['opcion'];
			if($opcion=='jurados'){ ?>
			<section class="content">

						 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="lista_jurados_sec.php" name="form1" method="post" id="cdr">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C.I del lider</label>

                  <div class="col-sm-6">
                  <input type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" class="form-control" id="textValidReg" placeholder="12345678" name="ci"  size="9" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                  </div>

                   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">A&ntilde;o</label>

                  <div class="col-sm-6">
                  <select name="anio" id="anio" class="form-control" required="">
        				  <option value="">Seleccione una opci&oacute;n</option>
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
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div>  

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

            </section>
			<?php }?>
<?php
			$opcion=$_POST['opcion'];
			if($opcion=='presentaciones') {?>
			<section class="content">

        		 <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="cronograma_presentacion.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">A&ntilde;o</label>

                  <div class="col-sm-6">
                  <select name="periodo" class="form-control" id="periodo" required="">
        					<option value="">Seleccione una opci&oacute;n</option>
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
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">PNF</label>

                  <div class="col-sm-6">
                   <select name="nomb_pnf" class="form-control" id="nomb_pnf" title="Seleccione una Opcion" value="" required=""> 
        					<option value="">Seleccione una opci&oacute;n</option>
        					<option value="Administracion"> Administraci&oacute;n </option>
        					<option value="Agroalimentacion"> Agroalimentaci&oacute;n </option>
        					<option value="Calidad y Ambiente"> Calidad y ambiente </option>
        					<option value="Contaduria Publica"> Contaduria p&uacute;blica </option>
        					<option value="Electricidad"> Electricidad </option>
        					<option value="Electronica"> Electr&oacute;nica </option>
        					<option value="Informatica"> Inform&aacute;tica </option>
        					<option value="Instrumentacion y Control"> Instrumemtaci&oacute;n y control </option>
        					<option value="Mantenimiento"> Mantenimiento </option>
        					<option value="Mecanica"> Mec&aacute;nica </option>
        					<option value="Prevencion y Salud en el Trabajo"> Prevenci&oacute;n y salud en el trabajo </option>
        					<option value="Telecomunicaciones"> Telecomunicaciones </option>
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div>

                   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Trayecto</label>

                  <div class="col-sm-6">
                  <select  name="num_trayecto" id="num_trayecto" title="Seleccione una Opcion" class="form-control" value="" required=""> 
        					<option value="">Seleccione una opci&oacute;n</option>
        					<option value="1"> I </option>
        					<option value="2"> II </option>
        					<option value="3"> III </option>
        					<option value="4"> IV </option>
        					<option value="5"> V </option>
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div> 

                   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Secci&oacute;n</label>

                  <div class="col-sm-6">
                  <select  name="num_seccion" id="num_seccion" title="Seleccione una Opcion" class="form-control" value="" required=""> 
        					<option value="">Seleccione una opci&oacute;n</option>
        					<option value="1"> 1 </option>
        					<option value="2"> 2 </option>
        					<option value="3"> 3 </option>
        					<option value="4"> 4 </option>
        					<option value="5"> 5 </option>
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div>

                   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">M&oacute;dulo</label>

                  <div class="col-sm-6">
                  <select  name="modulo" id="fase" title="Seleccione una Opcion" class="form-control" value="" required=""> 
        					<option value="">Seleccione una opci&oacute;n</option>
        					<option value="1"> 1 </option>
        					<option value="2"> 2 </option>
        					<option value="3"> 3 </option>
        					</select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                 </div> 

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

            </section>
			
			<?php 
			}else if ($opcion=='informes'){
			?>
			<script>
			window.location="mostrar_informe.php";
			</script>
			<?php 
			}
			?>               
       
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
</body>
</html>
