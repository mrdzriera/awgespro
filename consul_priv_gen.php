<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Administrador'){
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
<?PHP

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();
    
$tipo=$_POST['tipo'];


//variables de permiso de registro
$regproy=$_POST['regproy'];
$regasis=$_POST['regasis'];
$regfact=$_POST['regfact'];
$regpre=$_POST['regpre'];
$regeva=$_POST['regeva'];
$regsoc=$_POST['regsoc'];
$regevadef=$_POST['regevadef'];
$regculm=$_POST['regculm'];
$regcod=$_POST['regcod'];
$regdoc=$_POST['regdoc'];
$habarch=$_POST['habarch'];
//fin

//variables de permiso de consultas
$confact=$_POST['confact'];
$conpre=$_POST['conpre'];
$coneva=$_POST['coneva'];
$concom=$_POST['concom'];
$conjur=$_POST['conjur'];
$conpro=$_POST['conpro'];
$conretpro=$_POST['conretpro'];
$conasis=$_POST['conasis'];
$concod=$_POST['concod'];
$conest=$_POST['conest'];
//fin

//variables de modificar e imprimir
$moddoc=$_POST['moddoc'];
$habmod=$_POST['habmod'];
$descuen=$_POST['descuen'];
$gensol=$_POST['gensol'];

//fin

if(($tipo=='estudiante')and($regproy=='')and($regasis=='')and($conpro=='')and($confact=='')
and($conpre=='')and($coneva=='')and($conasis=='')and($conjur=='')and($concod=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar!");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}if(($tipo=='coordinador')and($regfact=='')and($regpre=='')and($regeva=='')and($regsoc=='')and($regevadef=='')and($regculm=='')and($confact=='')
and($conpre=='')and($coneva=='')and($concom=='')and($conjur=='')and($conpro=='')and($conretpro=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar!");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}if(($tipo=='secretario')and($regcod=='')and($regdoc=='')and($habarch=='')
and($concom=='')and($conpre=='')and($coneva=='')and($conjur=='')and($concod=='')
and($conest=='')and($moddoc=='')and($gensol=='')and($descuen=='')){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
swal("Seleccione al menos una opcion para continuar!");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',3000); 
</script>
<?php
}else{
?>
    Permisos/Forma general/
    <?php if($tipo=='estudiante'){
    
    echo "Estudiante";
    
    }else if($tipo=='coordinador'){
    
    echo "Coordinador";
    
    }else if($tipo=='secretario'){
    
    echo "Secretario";
    
    }else if($tipo=='usuario'){
    
    echo "Desbloquear Usuario";
    
    }
    ?></h1>
      
    </section>

        <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Permisos de forma general</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
if($tipo=='estudiante'){

$busqueda="SELECT *,usuarios.id FROM estudiante,usuarios WHERE 
estudiante.ci=usuarios.ci AND
usuarios.nivel='Estudiante'  ORDER BY apellidos"; 
  
}else if($tipo=='coordinador'){

$busqueda="SELECT *,usuarios.id FROM profesores,usuarios WHERE 
profesores.ci=usuarios.ci AND
usuarios.nivel='Coordinador'  ORDER BY apellidos";
  
}else if($tipo=='secretario'){
  
$busqueda="SELECT *,usuarios.id FROM secretarios,usuarios WHERE 
secretarios.ci=usuarios.ci AND
usuarios.nivel='Secretario' ORDER BY apellidos";
  
}

$bus=mysql_query($busqueda);
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "No hay Resultados", "error");
});
function redireccionar(){
window.location="index2.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
}else{ 
?>
                  <form action='priv_lotes_gen.php' name='form' method='post' >
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seleccionar</th>
				  <th>Apellido</th>
                  <th>Nombre</th>
                  <th>C&eacute;dula</th>
                  <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                                             <?php $fila=mysql_fetch_array($bus);
                                            for($i=0; $i<$fila;$i++){ ?>
                                            <tr>
                      <td><center><select name="seleccionado[]" class="form-control">
					  <option value="No">No</option>
					  <option value="Si">Si</option>
					  
					  </select>
					  </center></td>
                                            <td ><p align='center'><?php echo $fila['apellidos'];?></p></td>
											<td ><p align='center'><?php echo $fila['nombres'];?></p></td>
											<td ><p align='center'><?php echo $fila['ci'];?></p></td>
                                            <td ><p align='center'><?php echo $fila['correo'];?></p></td>
											<input type="hidden" name="indice" value="<?php echo $cont;?>">
											<input type="hidden" name="tipo" value="<?php echo $tipo;?>">
                                            <input type='hidden' name='id_usuario[]' value='<?php echo $fila['id'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
											<input type='hidden' name='regproy[]' value='<?php echo $regproy;?>'>
                                            <input type='hidden' name='regasis[]' value='<?php echo $regasis;?>'>
                                            <input type='hidden' name='regfact[]' value='<?php echo $regfact;?>'>
                                            <input type='hidden' name='regpre[]' value='<?php echo $regpre;?>'>
                                            <input type='hidden' name='regeva[]' value='<?php echo $regeva;?>'>
                                            <input type='hidden' name='regsoc[]' value='<?php echo $regsoc;?>'>
                                            <input type='hidden' name='regevadef[]' value='<?php echo $regevadef;?>'>
                                            <input type='hidden' name='regculm[]' value='<?php echo $regculm;?>'>
                                            <input type='hidden' name='regcod[]' value='<?php echo $regcod;?>'>
                                            <input type='hidden' name='regdoc[]' value='<?php echo $regdoc;?>'>
                                            <input type='hidden' name='habarch[]' value='<?php echo $habarch;?>'>
                                            <input type='hidden' name='confact[]' value='<?php echo $confact;?>'>
                                            <input type='hidden' name='conpre[]' value='<?php echo $conpre;?>'>
                                            <input type='hidden' name='coneva[]' value='<?php echo $coneva;?>'>
                                            <input type='hidden' name='concom[]' value='<?php echo $concom;?>'>
                                            <input type='hidden' name='conjur[]' value='<?php echo $conjur;?>'>
                                            <input type='hidden' name='conpro[]' value='<?php echo $conpro;?>'>
                                            <input type='hidden' name='conretpro[]' value='<?php echo $conretpro;?>'>
                                            <input type='hidden' name='concod[]' value='<?php echo $concod;?>'>
                                            <input type='hidden' name='moddoc[]' value='<?php echo $moddoc;?>'>
                                            <input type='hidden' name='gensol[]' value='<?php echo $gensol;?>'>                                     
                                            <input type='hidden' name='conasis[]' value='<?php echo $conasis;?>'>                                     
                                            <input type='hidden' name='concul[]' value='<?php echo $concul;?>'>                                     
                                            <input type='hidden' name='habmod[]' value='<?php echo $habmod;?>'>                                     
                                            <input type='hidden' name='descuen[]' value='<?php echo $descuen;?>'>                                     
                                             </tr>
                                            <?php  $fila=mysql_fetch_array($bus);
} ?>
                </tbody>
              </table>
                                              <div class="box-footer"><br>
                            <center><button type="submit" class="btn btn-info"> <i class="fa fa-share" ></i>
                            Establecer privilegios </button></center>
              </div>
                  </form>
<?php } }?>

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
