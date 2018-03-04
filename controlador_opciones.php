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
<?php
$opcion=$_POST['opcion'];

$y="SELECT * FROM profesores WHERE ci='".$_SESSION['cedula_usu']."' ";
$yy=mysql_query($y);
$yyy=mysql_fetch_array($yy);

if($opcion=='factibilidad'){
	
echo"Consultas de proyecto/Factibilidad";

}else if($opcion=='comunidades'){
	
echo"Consultas de proyecto/Comunidades";

}else if($opcion=='culminacion'){
	
echo"Consultas de proyecto/Culminaci&oacute;n";

}else if($opcion=='evaluacion'){
	
echo"Consultas de proyecto/Evaluaci&oacute;n";

}else if($opcion=='presentaciones'){
	
echo"Consultas de proyecto/Presentaciones";

}
?>
      
      </h1>
      
    </section>
	 <?php
			$opcion=$_POST['opcion'];
			if($opcion=='factibilidad'){ ?>

          <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Factibilidad de proyectos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php

//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();
mysql_query("SET NAMES 'utf8'");  
extract($_REQUEST);

$consulta1="SELECT COUNT(*) AS'cuenta_f' FROM 
estudiante,pnfs,trayectos,secciones,turnos,anios,sedes,profesores,est_cursa_proy,proyectos,est_tiene_proy,coord_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=coord_tiene_proy.id_proyecto AND 
profesores.id=coord_tiene_proy.id_profesor AND 
  profesores.ci='".$_SESSION['cedula_usu']."' AND factibilidad='Factible' ";
$resp1=mysql_query($consulta1);
$respuesta1=mysql_fetch_array($resp1);// FIN DE LA CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES

//CONSULTA PARA LA CUENTA DE PROYECTOS NO FACTIBLES
$consulta2="SELECT COUNT(*) AS'cuenta_nf' FROM 
estudiante,pnfs,trayectos,secciones,turnos,anios,sedes,profesores,est_cursa_proy,proyectos,est_tiene_proy,coord_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=coord_tiene_proy.id_proyecto AND 
profesores.id=coord_tiene_proy.id_profesor AND 
  profesores.ci='".$_SESSION['cedula_usu']."' AND factibilidad='No Factible'  ";
$resp2=mysql_query($consulta2);
$respuesta2=mysql_fetch_array($resp2);// FIN DE LA CONSULTA PARA LA CUENTA DE PROYECTOS NO FACTIBLES

//CONSULTA PARA LA CUENTA DE PROYECTOS EN ESPERA
$consulta3="SELECT COUNT(*) AS'cuenta_e' FROM 
estudiante,pnfs,trayectos,secciones,turnos,anios,sedes,profesores,est_cursa_proy,proyectos,est_tiene_proy,coord_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=coord_tiene_proy.id_proyecto AND 
profesores.id=coord_tiene_proy.id_profesor AND 
 profesores.ci='".$_SESSION['cedula_usu']."' AND factibilidad=''  ";
$resp3=mysql_query($consulta3);
$respuesta3=mysql_fetch_array($resp3);// FIN DE LA CONSULTA PARA LA CUENTA DE PROYECTOS EN ESPERA

//CONSULTA PARA EL ORDEN DE LA FACTIBILIDAD
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,turnos,anios,sedes,profesores,est_cursa_proy,proyectos,est_tiene_proy,coord_tiene_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=coord_tiene_proy.id_proyecto AND 
profesores.id=coord_tiene_proy.id_profesor AND 
profesores.ci='".$_SESSION['cedula_usu']."'
ORDER BY factibilidad";

$r=mysql_query($sql);// FIN DE LA CONSULTA PARA EL ORDEN DE LA FACTIBILIDAD
?>

              <table id="example1" class="table table-bordered table-striped">
                    <center>
      <strong style="color:green;"> <img src="imagenes/bien.png" style="width:30px; height:30px;"> Factible </strong>&nbsp; &nbsp;
      <strong style="color:red;"> <img src="imagenes/mal.png" style="width:30px; height:30px;"> No factible</strong>  &nbsp;&nbsp;
      <strong style="color:gray;"> <img src="imagenes/relog.png" style="width:30px; height:30px;"> En espera </strong> 
      </center>
      
      <br>
                <thead>
                <tr>
                  <th class="text-center">T&iacute;tulo</th>
                  <th class="text-center">PNF</th>
                  <th class="text-center">Trayecto</th>
                  <th class="text-center">Secci&oacute;n</th>
                  <th class="text-center">Factibilidad</th>
                </tr>
                </thead>
                <tbody>
                    <?php while($row=mysql_fetch_array($r)){ ?>
                       <tr>
                                            <td ><p align='justify'><?php echo $row['titulo'];?></p></td>
                                            <td align='center'><?php echo $row['nomb_pnf'];?></td>
                                            <td align='center'><?php echo $row['descripcion'];?></td>
                                            <td align='center'><?php echo $row['num_seccion'];?></td>
                      <td align='center'> <center>
                      <?php 
                      if ($row['factibilidad']=='Factible'){?>
                      <img src="imagenes/bien.png" style="width:30px; height:30px;">
                      <?php } else
                      if ($row['factibilidad']=='No Factible'){?>
                      <img src="imagenes/mal.png" style="width:30px; height:30px;">
                      <?php } else
                      if ($row['factibilidad']==''){?>
                      <img src="imagenes/relog.png" style="width:30px; height:30px;">
                      </center></td>
                                            </tr>
                      <?php }
                      }
                      ?> 
                </tbody>
              </table>
                                              </table>
                 <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Factibles: </td>
                                        <td align='center'>No factibles: </td>
                                        <td align='center'>En espera:</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td align='center'><?php echo $respuesta1['cuenta_f'];?></td>
                                            <td align='center'><?php echo $respuesta2['cuenta_nf'];?></td>
                                            <td align='center'><?php echo $respuesta3['cuenta_e'];?></td>                                                                                    
                                            </tr>

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

								<?php }
											?>
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
            <form class="form-horizontal" action="lista_evaluacion.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">A&ntilde;o</label>

                  <div class="col-sm-6">
                    <select name="periodo" id="periodo" class="form-control" required="">
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
                  <input type="text" name="nomb_pnf" class="form-control" id="nomb_pnf" readonly title="Seleccione una Opcion" 
				  value="<?php echo $yyy['area_especializacion'];?>" required="">
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Trayecto</label>

                  <div class="col-sm-6">
                    <select name="num_trayecto" id="num_trayecto" title="Seleccione una Opcion" class="form-control" required="">
                    <option value="">Seleccione una opci&oacute;n</option>
                    <option value="1"> I </option>
                    <option value="2"> II </option>
                    <option value="3"> III</option>
                    <option value="4"> IV </option>
                    <option value="5"> V </option>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Secci&oacute;n</label>

                  <div class="col-sm-6">
                    <select name="num_seccion" id="num_seccion" title="Seleccione una Opcion" class="form-control" required=""> 
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
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">M&oacute;dulo</label>

                  <div class="col-sm-6">
                  <select name="fase" id="fase" title="Seleccione una Opcion" class="form-control" required="">
                    <option value="">Seleccione una opci&oacute;n</option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>
				 
                <?php
                $sql="SELECT MAX(periodo)AS'anio' FROM anios ";
                $r=mysql_query($sql);
                $row=mysql_fetch_array($r);
                ?>

                <input type="hidden" name="anio" id="anio" value="<?php echo $row['anio'];?>">

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
                    <select name="periodo" id="periodo" class="form-control" required="">
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
                   <input type="text" name="nomb_pnf" class="form-control" id="nomb_pnf" readonly title="Seleccione una Opcion" 
				  value="<?php echo $yyy['area_especializacion'];?>" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Trayecto</label>

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
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Secci&oacute;n</label>

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
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">M&oacute;dulo</label>

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
			<?php }?>
			 <?php
			$opcion=$_POST['opcion'];
			if($opcion=='culminacion'){ ?>
      
			<section class="content">

         <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="consul_culmi.php" name="form1" method="post" id="cdr">
              <div class="box-body panel-title text-center">
              
                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">A&ntilde;o</label>

                  <?php
                  require_once("clasedb.php"); 
                  $db=new clasedb();
                  $db->conectar();
                  $query="SELECT * FROM 
                  usuarios,operaciones,permisos,usuario_tiene_permiso 
                  WHERE
                  usuarios.id=usuario_tiene_permiso.id_usuario AND 
                  operaciones.id=usuario_tiene_permiso.id_operacion AND 
                  permisos.id=usuario_tiene_permiso.id_permiso AND
                  operaciones.nombre='Registrar Factibilidad' AND
                  permisos.estado='Deshabilitado' AND
                  usuarios.ci='".$_SESSION['cedula_usu']."' ";
                  $ejecuta=mysql_query($query);

                  if(mysql_num_rows($ejecuta)>0){
                  ?>  
                  <script language="javascript">
                  $(document).ready(function(){
                  swal("Disculpe Ud aun no esta autorizado para registrar factibilidad a los proyectos!");
                  });
                  function redireccionar(){
                  window.location="index4.php";
                  }
                  setTimeout('redireccionar()',2000); 
                  </script>
                  <?php
                  }
                  ?>

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
