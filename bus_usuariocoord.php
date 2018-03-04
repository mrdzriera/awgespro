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
<?php
}
?>
<!DOCTYPE html>
<script type="text/javascript" language="javascript">

	function salir(){
			if(confirm("¿Desea Salir?")){
			document.location.href='cerrar_login.php';
			}else{
				
			}
		}
</script>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Awgespro</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="bootstrap/css/progress-bar.css"rel="stylesheet">
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
      <br>
      <h1 class="panel-title text-center">
        Configuración/Perfil  
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <?php 

      require_once("clasedb.php"); 
      $db=new clasedb();
      $db->conectar();  
      mysql_query("SET NAMES 'utf8'");

      extract($_REQUEST);
        
        $busqueda="SELECT * FROM profesores,usuarios WHERE 
        profesores.ci=usuarios.ci AND
        nivel='Coordinador' AND
        usuarios.ci='".$_SESSION['cedula_usu']."'  ";
        $ejecuta=mysql_query($busqueda);
        $muestra=mysql_fetch_array($ejecuta);
        ?>
      <div class="col-md-10 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del perfil</h2>
              
            </div>
            <br>
              <center>

            <?php
         if(($muestra['foto']=='fotousuarios/')or($muestra['foto']=='')){
          ?>
          <img src="imagenes/user.png"  style="width:150px; height:150px;" class="img-circle" alt="User Image">
          <?php
        }else{
        echo "<img src='".$muestra['foto']."' class='img-circle' style='width:150px; height:150px;' alt='User Image'> ";
        }
        ?>

          </center>
        
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" onsubmit="return validaarchivo();" action="usuario_modificado.php" name="form" enctype='multipart/form-data' method="post">
            <input type="hidden" name="opc" value="1">
              <div class="box-body panel-title text-center">
                
                <div class="form-group">
                
                  <div class="col-md-6">
                   
                            <h5><b>Usuario</b></h5>
                            <p><input class="form-control" name="usuario" value="<?php echo $muestra['usuario'];?>" type="text"></p>

                             <h5><b>Pregunta secreta</b></h5>
                            <p><select name="pregunta" class="form-control">
                          <option value="<?php echo $muestra['pregunta'];?>"> <?php echo $muestra['pregunta'];?> </option>
                <option value=""> Seleccione una pregunta secreta </option>
                <option value="Cual es el nombre de tu mascota">¿Cu&aacute;l es el nombre de tu mascota?</option>
                <option value="Cual es tu pelicula favorita">¿Cu&aacute;l es tu pel&iacute;cula favorita?</option>
                <option value="Cual es tu comida favorita">¿Cu&aacute;l es tu comida favorita?</option>
                <option value="Cual es tu serie favorita">¿Cu&aacute;l es tu serie favorita?</option>
                <option value="Como se llama tu mejor amigo(a)">¿C&oacute;mo se llama tu mejor amigo(a)?</option>
                <option value="A que pais te gustaria viajar">¿A que pa&iacute;s te gustar&iacute;a viajar?</option>
                <option value="Cual es tu helado favorito">¿Cu&aacute;l es tu helado favorito?</option>
                <option value="Cual es tu juego favorito">¿Cu&aacute;l es tu juego favorito?</option>
                <option value="Cual es tu color favorito">¿Cu&aacute;l es tu color favorito?</option>
                <option value="Cual es tu cancion favorita"> ¿Cu&aacute;l es tu canci&oacute;n favorita? </option>
                      </select></p>

                <h5><b>Correo</b></h5>

                <input data-parsley-id="0215" class="form-control" name="correo" placeholder="Prueba@example.com" type="email" value="<?php echo $muestra['correo'];?>">
                      
                  </div>

                    <div class="col-md-6">

                     <h5><b>Telefono</b></h5>
                <div class="input-group">
                <div class="input-group-btn">
                <select name="cod_tel" class="form-control-1" style="width:85px;" required>                   
                <option value="<?php echo substr($muestra['telefono'],0,4)?>"><?php echo substr($muestra['telefono'],0,4)?></option>
                 <option value="0243">0243</option>
                 <option value="0244">0244</option>
                 <option value="0412">0412 </option>
                 <option value="0414">0414 </option>
                 <option value="0416">0416 </option>
                 <option value="0424">0424</option>
                 <option value="0426">0426 </option>
                 </select>
                </div>
                <!-- /btn-group -->
                <input name="numero" placeholder="N&uacute;mero" class="form-control" type="text" id="usr" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="7" value="<?php echo substr($muestra['telefono'],5,7)?>" required>
                 </div>
                   
                    <h5><b>Respuesta</b></h5>
                    <p><input name="respuesta" class="form-control" value="<?php echo $muestra['respuesta'];?>" type="password"></p>
                    <input data-parsley-id="0215" class="form-control" name="ci" placeholder="Admin Image" type="hidden" value="<?php echo $muestra['ci'];?>">
                              
                    <h5><b>Foto</b></h5>
                   <input data-parsley-id="0215" class="form-control" name="foto" placeholder="Admin Image" type="file" id="foto">
                   <br>
                   <input data-parsley-id="0215" class="form-control" name="fotoactual" value="<?php echo $muestra['foto'];?>" placeholder="Admin Image" type="hidden">
                            
                   <input data-parsley-id="0215" class="form-control" name="nivel" value="<?php echo $muestra['nivel'];?>" placeholder="Admin Image" type="hidden">

                  </div>

                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Modificar </button>
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
</body>
</html>
