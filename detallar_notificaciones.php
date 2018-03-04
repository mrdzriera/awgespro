<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Estudiante'){
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
	
			<img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index3.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
	<aside> 

	<?php include ("menus_est.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu2.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

	<br>
		<script language="javascript">
	//alert("BIENVENIDO A AWGESPRO");
	</script>
 <div class="col-xs-12">
             <div class="box">
			<?php 
			require_once("clasedb.php"); 
			$db=new clasedb();
			$db->conectar();  
			extract($_REQUEST);
			mysql_query("SET NAMES 'utf8'");
			
			//correcciones de planilla de inscripcion
			$sql="SELECT proyectos.id FROM estudiante,est_tiene_proy,proyectos,proyectos_tiene_opinion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' AND 
			obs_coord!='' OR
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' AND 
			obs_tutor!='' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' AND 
			obs_esp1!='' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' AND 
			obs_esp2!='' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' AND 
			obs_esp3!=''";
			$r=mysql_query($sql);
			$cont=mysql_num_rows($r);
			$row=mysql_fetch_array($r);

			//correcciones de documentos
			$sql2="SELECT proyectos.id FROM estudiante,est_tiene_proy,proyectos,proyectos_tiene_documento,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			documento='No Visto' AND  observaciones!='' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			documento='No Visto' AND  observaciones!='' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			documento='No Visto' AND  observaciones!=''";
			$r2=mysql_query($sql2);
			$cont2=mysql_num_rows($r2);
			$row2=mysql_fetch_array($r2);

			//factibilidad de proyecto
			$sql3="SELECT proyectos.id FROM estudiante,est_tiene_proy,proyectos,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			proyectos_tiene_notificacion.factibilidad='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			proyectos_tiene_notificacion.factibilidad='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			proyectos_tiene_notificacion.factibilidad='No Visto'";	
			$r3=mysql_query($sql3);
			$cont3=mysql_num_rows($r3);
			$row3=mysql_fetch_array($r3);

			//codigo de proyecto
			$sql4="SELECT proyectos.id FROM estudiante,est_tiene_proy,proyectos,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto'";
			$r4=mysql_query($sql4);
			$cont4=mysql_num_rows($r4);
			$row4=mysql_fetch_array($r4);
			
			//presentacion 1
			$sql5="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE estudiante.id=est_tiene_proy.id_estudiante1 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			defensas.fecha!='0000-00-00' AND 
			modulo='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			presentacion1='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			defensas.fecha!='0000-00-00' AND 
			modulo='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			presentacion1='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			defensas.fecha!='0000-00-00' AND 
			modulo='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			presentacion1='No Visto'";
			$r5=mysql_query($sql5);
			$cont5=mysql_num_rows($r5);
			$row5=mysql_fetch_array($r5);

			//jurados
			$sql6="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_comite,
			profesores,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite1 AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			jurados='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite1 AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			jurados='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite1 AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			jurados='No Visto' ";
			$r6=mysql_query($sql6);
			$cont6=mysql_num_rows($r6);
			$row6=mysql_fetch_array($r6);

			//evaluacion
			$sql7="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			evaluacion1='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			evaluacion1='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			evaluacion1='No Visto'";
			$r7=mysql_query($sql7);
			$cont7=mysql_num_rows($r7);
			$row7=mysql_fetch_array($r7);

			//socializacion
			$sql8="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_socializacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND 
			socializacion='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND 
			socializacion='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND 
			socializacion='No Visto'";
			$r8=mysql_query($sql8);
			$cont8=mysql_num_rows($r8);
			$row8=mysql_fetch_array($r8);
			
		    	//presentacion 2
			$mysql13="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' ";
			$query13=mysql_query($mysql13);
			//echo $mysql13;
			$cont13=mysql_num_rows($query13);
			$data13=mysql_fetch_array($query13);
			//fin
			
			//presentacion 3
			$mysql14="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query14=mysql_query($mysql14);
			//echo $mysql15;
			$cont14=mysql_num_rows($query14);
			$data14=mysql_fetch_array($query14);
			//fin
			
			//evaluacion 2
			$mysql15="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query15=mysql_query($mysql15);
			//echo $mysql15;
			$cont15=mysql_num_rows($query15);
			$data15=mysql_fetch_array($query15);
			//fin
			
			//evaluacion 3
			$mysql16="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'			";
			$query16=mysql_query($mysql16);
			//echo $mysql16;
			$cont16=mysql_num_rows($query16);
			$data16=mysql_fetch_array($query16);
			
			//culminacion
			$mysql17="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_culminacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query17=mysql_query($mysql17);
			//echo $mysql16;
			$cont17=mysql_num_rows($query17);
			$data17=mysql_fetch_array($query17);
			//fin	
			
			//evaluacion final
			$mysql18="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_eva_def,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query18=mysql_query($mysql18);
			//echo $mysql18;
			$cont18=mysql_num_rows($query18);
			$data18=mysql_fetch_array($query18);
			
			$contt=$cont+$cont2+$cont3+$cont4+$cont5+$cont6+$cont7+$cont8+$cont13+$cont14+$cont15+$cont16+$cont17+$cont18;

			if((mysql_num_rows($r)==0)and(mysql_num_rows($r2)==0)and(mysql_num_rows($r3)==0)and(mysql_num_rows($r4)==0)and
				(mysql_num_rows($r5)==0)and(mysql_num_rows($r6)==0)and(mysql_num_rows($r7)==0)and(mysql_num_rows($r8)==0)
				and(mysql_num_rows($query13)==0)and(mysql_num_rows($query14)==0)and(mysql_num_rows($query15)==0)and
				(mysql_num_rows($query16)==0)and(mysql_num_rows($query17)==0)and(mysql_num_rows($query18)==0)){
			?>
			<script language="javascript" type="text/javascript">
            $(document).ready(function(){
			sweetAlert("Disculpe", "Usted no tiene notificaciones pendientes", "error");
			});
			function redireccionar(){
			window.location="index3.php";
			}
			setTimeout('redireccionar()',4000);
                </script>
			<?php
			}else{
			?>

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Notificaciones de proyecto <?php echo "(".$contt.")";?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Descripci&oacute;n</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Observar</th>
                </tr>
                </thead>
                <tbody>
				<?php
				if(mysql_num_rows($r)>0){
				?>
                  <tr>       
               <td class="text-center">Usted tiene correcciones en su planilla de inscripción</td>
               <td class="text-center">No visto</td>
               <td><a target='_blank' href="reporte_obs.php?id=<?php echo $row['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r2)>0){
				?>
                  <tr>       
               <td class="text-center">Usted tiene correcciones en los documentos de su proyecto</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=documentos&id=<?php echo $row2['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r3)>0){
				?>
                  <tr>       
               <td class="text-center">Se ha determinado la factibilidad para su proyecto</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=factibilidad&id=<?php echo $row3['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r4)>0){
				?>
                  <tr>       
               <td class="text-center">Su c&oacute;digo de proyecto ha sido asignado</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=codigo&id=<?php echo $row4['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r5)>0){
				?>
                  <tr>       
               <td class="text-center">La fecha de la presentaci&oacute;n 1 ha sido asignada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $row5['id'];?>&modulo=1" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($query13)>0){
				?>
                  <tr>       
               <td class="text-center">La fecha de la presentaci&oacute;n 2 ha sido asignada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $data13['id'];?>&modulo=2" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($query14)>0){
				?>
                  <tr>       
               <td class="text-center">La fecha de la presentaci&oacute;n 3 ha sido asignada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $data14['id'];?>&modulo=3" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r6)>0){
				?>
                  <tr>       
               <td class="text-center">Su jurado evaluador ha sido asignado</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=jurados&id=<?php echo $row6['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r7)>0){
				?>
                  <tr>       
               <td class="text-center">La evaluaci&oacute;n 1 ha sido cargada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $row7['id'];?>&modulo=1" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
					<?php
				if(mysql_num_rows($query15)>0){
				?>
                  <tr>       
               <td class="text-center">La evaluaci&oacute;n 2 ha sido cargada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $data15['id'];?>&modulo=2" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				
					<?php
				if(mysql_num_rows($query16)>0){
				?>
                  <tr>       
               <td class="text-center">La evaluaci&oacute;n 3 ha sido cargada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $data16['id'];?>&modulo=3" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($r8)>0){
				?>
                  <tr>       
               <td class="text-center">La fecha de la socializaci&oacute;n ha sido asignada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=socializacion&id=<?php echo $row8['id'] ?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
				<?php
				if(mysql_num_rows($query18)>0){
				?>
                  <tr>       
               <td class="text-center">La evaluaci&oacute;n final ha sido cargada</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=evadef&id=<?php echo $data18['id'];?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></a></td>
			   </tr>
				<?php
				}
				?>
					<?php
				if(mysql_num_rows($query17)>0){
				?>
                  <tr>       
               <td class="text-center">Su proyecto ha sido culminado</td>
               <td class="text-center">No visto</td>
               <td><a href="ver_observaciones.php?obs=culminacion&id=<?php echo $data17['id'];?>" >
			   <center><img src="imagenes/buscar.png" style="width:30px; height:30px;"></center></td>
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
