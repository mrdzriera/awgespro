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
      Proyectos/Consultar      
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
			$nomb_pnf=$_POST['nomb_pnf'];
            $trayecto=$_POST['trayecto'];
            $seccion=$_POST['seccion'];
            $anio=$_POST['anio'];
            $turno=$_POST['turno'];
            $sede=$_POST['sede'];
			$accion=$_POST['accion'];
			$forma=$seccion;
			?>
              <h3 class="box-title">Listado de Proyectos de
		<?php echo $pnf.'&nbsp;'.'Trayecto'.'&nbsp;'.$trayecto.'&nbsp;'.'Secci&oacute;n'.'&nbsp;'.$seccion.'&nbsp;'.
			  'A&ntilde;o'.'&nbsp;'.$anio.'&nbsp;'.'Turno'.'&nbsp;'.$turno;?></h3>&nbsp;


<br>
<br>		  

<a target="_blank" href="reporte_proyecto_filtros.php?forma=<?php echo $forma;?>&accion=<?php echo $accion;?>&anio=<?php echo $anio;?>&pnf=<?php echo $nomb_pnf;?>&trayecto=<?php echo $trayecto?>&seccion=<?php echo $seccion;?>&turno=<?php echo $turno?>&sede=<?php echo $sede;?>">VER RESUMEN <img src="iconos/pdf.jpg" style="width:30px; height:30px;"> </a>

<!--
<a href="observaciones_proyecto.php?forma=<?php echo $forma;?>&accion=<?php echo $accion;?>&anio=<?php echo $anio;?>&pnf=<?php echo $nomb_pnf;?>&trayecto=<?php echo $trayecto?>&seccion=<?php echo $seccion;?>&turno=<?php echo $turno?>&sede=<?php echo $sede;?>">VER OBSERVACIONES <img src="iconos/pdf.jpg" style="width:30px; height:30px;"> </a>
-->		  
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
            
            if(($accion=='Factibles')and($forma!='Todas')){
            $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
			FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
			est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
			estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
			profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
			profesores.ci='".$_SESSION['cedula_usu']."' AND 
      factibilidad='Factible' ";

            }else if(($accion=='No Factibles')and($forma!='Todas')){
              $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      factibilidad='No Factible' ";

            }else if(($accion=='En Espera')and($forma!='Todas')){
              $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      proyectos.factibilidad='' ";

              }else if(($accion=='Con Codigos')and($forma!='Todas')){
                 $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      proyectos.codigo!='' ORDER BY codigo ";

      }else if(($accion=='Sin Codigos')and($forma!='Todas')){
        $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      proyectos.codigo='' ORDER BY proyectos.id ";

            }else if(($accion=='Culminados')and($forma!='Todas')){
              $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND  
      id_culminacion='3' ORDER BY proyectos.id  ";

      }else if(($accion=='No Culminados')and($forma!='Todas')){
        $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND  
      id_culminacion='4' ORDER BY proyectos.id  ";

          } else if(($accion=='Factibles')and($forma='Todas')){
            $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      factibilidad='Factible' ";

      }else if(($accion=='No Factibles')and($forma='Todas')){
        $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      factibilidad='No Factible'";

      }else if(($accion=='En Espera')and($forma='Todas')){
          $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
            profesores.ci='".$_SESSION['cedula_usu']."' AND 
            proyectos.factibilidad='' OR
            proyectos.factibilidad='Sin Asignar'";

      }else if(($accion=='Con Codigos')and($forma='Todas')){
        $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND 
      proyectos.codigo!='' ORDER BY codigo";

      }else if(($accion=='Sin Codigos')and($forma='Todas')){
      $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND
      proyectos.codigo='' ORDER BY proyectos.id ";

      }else if(($accion=='Culminados')and($forma='Todas')){
      $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND
      id_culminacion='3' ORDER BY proyectos.id";

      }else if(($accion=='No Culminados')and($forma='Todas')){
        $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id 
      FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
      est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
            estudiante.id=est_cursa_proy.id_estudiante AND
            pnfs.id=est_cursa_proy.id_pnf AND
            trayectos.id=est_cursa_proy.id_trayecto AND
            secciones.id=est_cursa_proy.id_seccion AND
            anios.id=est_cursa_proy.id_anio AND
            turnos.id=est_cursa_proy.id_turno AND
            sedes.id=est_cursa_proy.id_sede AND
      estudiante.id=est_tiene_proy.id_estudiante1 AND
            proyectos.id=est_tiene_proy.id_proyecto AND
      profesores.id=coord_tiene_proy.id_profesor AND
            proyectos.id=coord_tiene_proy.id_proyecto AND
            pnfs.nomb_pnf='".$nomb_pnf."' AND 
            trayectos.num_trayecto='".$trayecto."' AND 
            secciones.num_seccion='".$seccion."' AND 
            anios.periodo='".$anio."' AND 
            turnos.descripcion='".$turno."' AND 
            sedes.nombre='".$sede."' AND 
      profesores.ci='".$_SESSION['cedula_usu']."' AND
      id_culminacion='4' ORDER BY proyectos.id";
}

            $r=mysql_query($sql);
            
              if(mysql_num_rows($r)==0){
                ?>
                   <script language="javascript">
				$(document).ready(function(){
					sweetAlert("Disculpe", "No se encontraron resultados", "error");
					});
					function redireccionar(){
					window.location="detalles_proyecto2.php";
					}
					setTimeout('redireccionar()',2000);
                </script>
                <?php
              }else{ ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>Nombre</center></th>
                  <th><center>Apellido</center></th>
                  <th><center>Tutor</center></th>
				  <th><center>Titulo</center></th>
                  
                </tr>
                </thead>
                <tbody>
				<?php 
				$row=mysql_fetch_array($r);
                    for($i=0; $i<$row;$i++){
						
					$mysql="SELECT *  FROM profesores,proyectos,tutor_tiene_proyectos WHERE
					profesores.id=tutor_tiene_proyectos.id_profesor AND
					proyectos.id=tutor_tiene_proyectos.id_proyecto AND 
					proyectos.id='".$row['id']."' ";
					$res=mysql_query($mysql);
					$data=mysql_fetch_array($res);
                    ?>
                       <tr>  
                       <td align='center'><?php echo $row['nombres'];?></td>
                       <td align='center'><?php echo $row['apellidos'];?></td>
                      
                       <td align='center'><?php if(mysql_num_rows($res)==1){
					   echo $data['nombres'].'&nbsp;'.$data['apellidos'];}else if(mysql_num_rows($res)==0){
					   echo"<center>Sin Tutor</center>";
					   }?></td>
					   <td align='center'><?php echo $row['titulo'];?></td>
                       </tr>
                   <?php  
				   $row=mysql_fetch_array($r);
                   } 
				   } 
				   ?>
                </tbody>
                <tfoot>
                <tr>
                  <th><center>Nombre</center></th>
                  <th><center>Apellido</center></th>
                  <th><center>Tutor</center></th>
                            <th><center>Titulo</center></th>
                </tr>
                </tfoot>
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
