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
    <link rel="stylesheet" href="dataTables.bootstrap.css">
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
<br>	
<h1 class="panel-title text-center">
<?php
$opcion=$_POST['opcion'];

if($opcion=='proyectos'){
	
echo"Consultas de proyecto/Proyectos";

}else if($opcion=='factibilidad'){
	
echo"Consultas de proyecto/Factibilidad";

}else if($opcion=='asistencias'){
	
echo"Consultas de proyecto/Asistencias";

}else if($opcion=='jurados'){
	
echo"Consultas de proyecto/Jurados";

}else if($opcion=='evaluacion'){
	
echo"Consultas de proyecto/Evaluacion";

}else if($opcion=='presentaciones'){
	
echo"Consultas de proyecto/Presentaciones";

}else if($opcion=='codigos'){
	
echo"Consultas de proyecto/Codigos";

}else if($opcion=='socializacion'){
	
echo"Consultas de proyecto/Socializaci&oacute;n";

}
?>

</h1>

    </section>
<section class="content">

       <div class="col-md-13">
            
            <div class="col-md-13">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Datos del proyecto</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">


                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
                                  <?php
      $opcion=$_POST['opcion'];
      if($opcion=='proyectos'){

  require_once("clasedb.php"); 
  $db=new clasedb();
  $db->conectar();
  extract($_REQUEST);
  mysql_query("SET NAMES 'utf8'");
  
  $consulta="SELECT *, estudiante.ci AS'ci_est',proyectos.id AS'id_proyecto',trayectos.descripcion FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,est_tiene_proy WHERE 
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND
  proyectos.id_anio=anios.id AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND   
  estudiante.id=est_tiene_proy.id_estudiante2 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
    proyectos.id_anio=anios.id AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
    proyectos.id_anio=anios.id AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' ";
  
  $resultado=mysql_query($consulta);
 
 //echo $consulta;
  
  if(mysql_num_rows($resultado)==0){
?>
        <script type="text/javascript">
			$(document).ready(function(){
			swal("Disculpe", "Usted aun no tiene proyectos registrados", "error");
			});
          function redireccionar(){
			window.location="consult_est.php";
			}
			setTimeout('redireccionar()',3000);
        </script>
    
    <?php
   }  else {

    while(@$muestra=mysql_fetch_array($resultado)){ 
	
	$g="SELECT *, estudiante.ci AS'ci_est',proyectos.id AS'id_proyecto',id_permiso FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,est_tiene_proy,proyectos_tiene_permiso WHERE 
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  proyectos.id=proyectos_tiene_permiso.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND   
  estudiante.id=est_tiene_proy.id_estudiante2 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  proyectos.id=proyectos_tiene_permiso.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  proyectos.id=proyectos_tiene_permiso.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' ";
	$h=mysql_query($g);
	$i=mysql_fetch_array($h);
	
	$g2="SELECT * FROM usuarios,usuario_tiene_permiso WHERE
	usuarios.id=usuario_tiene_permiso.id_usuario AND
	id_operacion='11' AND 
	usuarios.ci='".$_SESSION['cedula_usu']."' ";
	$h2=mysql_query($g2);
	$i2=mysql_fetch_array($h2);
	
	?>
	
	
	
							     <form action='planilla_inscripcion.php' name='form' method='post' >
								  <center><input type='hidden' name='ci' id='ci' value='<?php echo $_SESSION['cedula_usu'];?>'></center>
									<center><input type='hidden' name='id_estudiante2' id='id_estudiante2' value='<?php echo $muestra['id_estudiante2'];?>'></center>
									  <center><input type='hidden' name='id_estudiante3' id='id_estudiante3' value='<?php echo $muestra['id_estudiante3'];?>'></center>
							
                                <table class="table table-bordered table-striped">
                             	  <thead><tr>
                                <center>
                                        <td align='center'>Titulo de proyecto</td>
                                        <td align='center'>Pnf</td>
                                        <td align='center'>Trayecto</td>
                                        <td align='center'>Secci&oacute;n</td>
                    					          <td align='center'>Imprimir</td>
										<?php
										if($i['id_permiso']==1){
										?>
                    					<td align='center'>Modificar:</td>
										<?php
										}
										?>
										<?php
										if(($i2['id_permiso']==1)and(mysql_num_rows($h2)>0)){
										?>
										<td align='center'>Adjuntar informe:</td>
										<?php
										}
										?>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td ><p align='justify'><?php echo $muestra['titulo'];?></p></td>
                                            <td align='center'><?php echo $muestra['nomb_pnf'];?></td>
                                            <td align='center'><?php echo $muestra['descripcion'];?></td>
                                            <td align='center'><?php echo $muestra['num_seccion'];?></td>
											<td align='center'><a target="_blank" href="planilla_inscripcion.php?id=<?php echo $muestra['id_proyecto'];?>" ><img src="imagenes/pdf.png" style="width:30px; height:30 px;" ></a></td>
											
										<?php
										if($i['id_permiso']==1){
										?>
                    					<td align='center'><a href="mostrar_proyecto1.php?id=<?php echo $muestra['id_proyecto'];?>" ><img src="imagenes/modificar.png" style="width:30px; height:30 px;" ></a></td>
										<?php
										}
										?>
										
										<?php if(($i2['id_permiso']==1)and(mysql_num_rows($h2)>0)){ ?>
										<td align='center'><a href="subir_informe.php?id=<?php echo $muestra['id_proyecto'] ?>" ><img src="imagenes/agregar.png" style="width:30px; height:30 px;" ></a></td> 
										<?php } ?>
											</tr>

                                      </tbody>
                                </table>
									</form>
									<?php } ?>
<?php 
} 
} else if($opcion=='factibilidad'){

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  

extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");


$sql="SELECT * FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,est_tiene_proy WHERE 
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND   
  estudiante.id=est_tiene_proy.id_estudiante2 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  turnos.id=est_cursa_proy.id_turno AND 
  sedes.id=est_cursa_proy.id_sede AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND 
  proyectos.id=est_tiene_proy.id_proyecto AND 
  estudiante.ci= '".$_SESSION['cedula_usu']."' ";

$r=mysql_query($sql);

    if(mysql_num_rows($r)==0){
?>
        <script type="text/javascript">
			$(document).ready(function(){
			swal("Disculpe", "Usted aun no tiene proyectos registrados", "error");
			});
          function redireccionar(){
			window.location="consult_est.php";
			}
			setTimeout('redireccionar()',2000);
        </script>
<?php
   }else {
  
  while($row=mysql_fetch_array($r)){    
  ?>
                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Titulo de proyecto</td>
                                        <td align='center'>Pnf</td>
                                        <td align='center'>Trayecto </td>
                                        <td align='center'>Secci&oacute;n</td>
                                        <td align='center'>Factibilidad</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td ><p align='justify'><?php echo $row['titulo'];?></p></td>
                                            <td align='center'><?php echo $row['nomb_pnf'];?></td>
                                            <td align='center'><?php echo $row['descripcion'];?></td>
                                            <td align='center'><?php echo $row['num_seccion'];?></td>
                      <td align='center'><?php if($row['factibilidad']=='Factible'){?>
  <center><img style="width:30px;height:30px;" src="./imagenes/bien.png"></center>
  <?php }else if ($row['factibilidad']=='No Factible'){ ?>
  <center><img style="width:30px;height:30px;" src="./imagenes/mal.png"></center>
<?php
  }else if ($row['factibilidad']==''){
?>
<center><img style="width:30px;height:30px;" src="./imagenes/relog.png"></center>
<?php
}
?></td>
                                            </tr>

                                      </tbody>
                                </table>
  <?php
  } 
  }
  }
//fin del condicional de factibilidad
else if($opcion=='asistencias'){


require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  

extract($_REQUEST);

mysql_query("SET NAMES 'utf8'");

$sql="SELECT DISTINCT pagina,titulo,nombres,apellidos,proyectos.id,estudiante.id AS'id_estudiante'
 FROM estudiante,proyectos,visitas_comunidades WHERE
proyectos.id= visitas_comunidades.id_proyecto AND
estudiante.id=visitas_comunidades.id_estudiante AND
estudiante.ci =  '".$_SESSION['cedula_usu']."' ORDER BY pagina";

 $ejecutar=mysql_query($sql);
 $cont=mysql_num_rows($ejecutar);
 if(mysql_num_rows($ejecutar)==0){

?>
        <script type="text/javascript">
		
			$(document).ready(function(){
			swal("Disculpe", "Usted aun no tiene asistencias registradas", "error");
			});
          function redireccionar(){
			window.location="consult_est.php";
			}
			setTimeout('redireccionar()',2000);

        </script>
<?php
}else{
  ?>
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Titulo:</td>
                                        <td align='center'>Integrante:</td>
                                        <td align='center'>No. de asistencia:</td>
                                        <td align='center'>Ver PDF:</td>
                                        <td align='center'>Modificar:</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            
                                            <?php 
											$fila=mysql_fetch_array($ejecutar);
                                            for($i=0; $i<$fila;$i++){
											?>
                                            <tr>
                                            <td align='justify'><?php echo $fila['titulo'];?></td>
                                            <td align='center'><?php echo $fila['nombres']."&nbsp;".$fila['apellidos'];?></td>
                                            <td align='center'><?php echo $fila['pagina']; echo "\n"?></td>
                                            <td><a target="_blank" href="planilla_asistencia.php?id_proyecto=<?php echo $fila['id'] ?>&pagina=<?php echo $fila['pagina'];?>&id_estudiante=<?php echo $fila['id_estudiante'];?>"><img src="./imagenes/pdf.png" style="width:30px; height:30 px;" ></a></td>
											<td><a target="_blank" href="modificar_visita.php?id_proyecto=<?php echo $fila['id'] ?>&pagina=<?php echo $fila['pagina'];?>&id_estudiante=<?php echo $fila['id_estudiante'];?>">
											<center><img src="./imagenes/modificar.png" style="width:30px; height:30 px;" ></center></a></td>
                                            </tr>
                                           <?php  $fila=mysql_fetch_array($ejecutar); }?>
                                      </tbody>
                                </table>
                                </div>
  <?php
  }
  
}else if($opcion=='jurados'){
	 
//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  
extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");

//datos del proyecto y del coordinador
$sql="SELECT 
proyectos.*,
profesores.nombres,
profesores.apellidos,
pnfs.nomb_pnf,
trayectos.descripcion,
secciones.num_seccion
FROM estudiante,proyectos,profesores,est_cursa_proy,coord_tiene_proy,est_tiene_proy,pnfs,trayectos,secciones
WHERE 
coord_tiene_proy.id_profesor = profesores.id AND
coord_tiene_proy.id_proyecto=proyectos.id AND
est_tiene_proy.id_estudiante1=estudiante.id AND 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
est_tiene_proy.id_proyecto=proyectos.id AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR
coord_tiene_proy.id_profesor = profesores.id AND
coord_tiene_proy.id_proyecto=proyectos.id AND
est_tiene_proy.id_estudiante2=estudiante.id AND 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
est_tiene_proy.id_proyecto=proyectos.id AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR
coord_tiene_proy.id_profesor = profesores.id AND
coord_tiene_proy.id_proyecto=proyectos.id AND
est_tiene_proy.id_estudiante3=estudiante.id AND 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
est_tiene_proy.id_proyecto=proyectos.id AND
estudiante.ci='".$_SESSION['cedula_usu']."'
";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);//fin

//datos del proyecto y del tutor
$sql2="SELECT profesores.nombres,profesores.apellidos FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,tutor_tiene_proyectos,est_cursa_proy,est_tiene_proy 
  WHERE
  proyectos.id=tutor_tiene_proyectos.id_proyecto AND
  profesores.id=tutor_tiene_proyectos.id_profesor AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
  profesores.id=tutor_tiene_proyectos.id_profesor AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
  profesores.id=tutor_tiene_proyectos.id_profesor AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."'";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);//fin

//datos del proyecto y del comite1
$sql3="SELECT profesores.nombres,profesores.apellidos FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
  WHERE
  proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite1 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite1 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite1 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."'";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);//fin

//datos del proyecto y del comite2
$sql4="SELECT profesores.nombres,profesores.apellidos FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
  WHERE
  proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite2 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite2 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite2 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."'  ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);//fin

//datos del proyecto y del comite3
$sql5="SELECT profesores.nombres,profesores.apellidos FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
  WHERE
  proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite3 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite3 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
  profesores.id=proyectos_tiene_comite.id_comite3 AND
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.ci='".$_SESSION['cedula_usu']."'  ";
$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);//fin

if((mysql_num_rows($r)==0)or(mysql_num_rows($r2)==0)or
(mysql_num_rows($r3)==0)){
?>
<!----><script language="javascript">

	$(document).ready(function(){
			swal("Disculpe", "Usted aun no tiene jurados asignados", "error");
			});
          function redireccionar(){
			window.location="consult_est.php";
			}
			setTimeout('redireccionar()',3000);
			
</script>
<?php
}else{
  ?>
                                  <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Titulo de proyecto</td>
                                        <td align='center'>Pnf</td>
                                        <td align='center'>Trayecto</td>
                                        <td align='center'>Secci&oacute;n</td>
                                        <td align='center'>C&oacute;digo</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td ><p align='justify'><?php echo $row['titulo'];?></p></td>
                                            <td align='center'><?php echo $row['nomb_pnf'];?></td>
                                            <td align='center'><?php echo $row['descripcion'];?></td>
                                            <td align='center'><?php echo $row['num_seccion'];?></td>
                                            <td align='center'><?php echo $row['codigo'];?></td>
                                            </tr>

                                      </tbody>
                                </table>
                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Coordinador </td>
                                        <td align='center'>Tutor </td>
                                        <td align='center'>Jurado 1</td>
                                        <td align='center'>Jurado 2</td>
                                        <td align='center'>Jurado 3</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td align='center'><?php echo $row['nombres'].'&nbsp;'.$row['apellidos'];?></td>
                                            <td align='center'><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></td>
                                            <td align='center'><?php echo $row3['nombres'].'&nbsp;'.$row3['apellidos'];?></td>
                                            <td align='center'><?php echo $row4['nombres'].'&nbsp;'.$row4['apellidos'];?></td>
                                            <td align='center'><?php echo $row5['nombres'].'&nbsp;'.$row5['apellidos'];?></td>                                                                                      
                                            </tr>

                                      </tbody>
                                </table>
<?php
}
}//fin del condicional de jurados
else if($opcion=='evaluacion'){
  
$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy,evaluacion WHERE
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=evaluacion.id_proyecto AND 
cal_c!='0' AND cal_t!='0' AND cal_e!='0' AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
estudiante.id=est_tiene_proy.id_estudiante2 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=evaluacion.id_proyecto AND 
cal_c!='0' AND cal_t!='0' AND cal_e!='0' AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR
estudiante.id=est_tiene_proy.id_estudiante3 AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=evaluacion.id_proyecto AND 
cal_c!='0' AND cal_t!='0' AND cal_e!='0' AND
estudiante.ci='".$_SESSION['cedula_usu']."' ";
$r=mysql_query($sql);
if(mysql_num_rows($r)==0){
?>
<script language="javascript">

	$(document).ready(function(){
	swal("Disculpe", "Usted no tiene evaluaciones cargadas", "error");
	});
    function redireccionar(){
	window.location="consult_est.php";
	}
	setTimeout('redireccionar()',3000);
			

</script>
<?php
}else{
?>
                                </table>
                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>T&iacute;tulo: </td>
                                        <td align='center'>Calificaci&oacute;n: </td>
                                        <td align='center'>Fase:</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                          <?php
                                          while($row=mysql_fetch_array($r)){
                                          $calificacion=(($row['cal_c']+$row['cal_t']+$row['cal_e'])/3);
                                          ?>
                                            <tr>
                                            <td align='justify'><?php echo $row['titulo'];?></td>
                                            <td align='center'><?php echo number_format($calificacion,0,".",",");?></td>
                                            <td align='center'><?php echo $row['fase'];?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                      </tbody>
                                </table>
<?php
}
}//fin del condicional de evaluacion
else if($opcion=='presentaciones'){
?>
<?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  

extract($_REQUEST);

mysql_query("SET NAMES 'utf8'");


$sql=mysql_query("SELECT * 
FROM
proyectos,estudiante,pnfs,trayectos,secciones,anios,est_cursa_proy,est_tiene_proy,defensas  
WHERE 
proyectos.id=defensas.id_proyecto AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
defensas.fecha!='0000-00-00' AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=defensas.id_proyecto AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
defensas.fecha!='0000-00-00' AND
estudiante.ci='".$_SESSION['cedula_usu']."' OR 
proyectos.id=defensas.id_proyecto AND
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
defensas.fecha!='0000-00-00' AND
estudiante.ci='".$_SESSION['cedula_usu']."'");

   if(mysql_num_rows($sql)==0){
?>
      <!---->  <script type="text/javascript">
	  	$(document).ready(function(){
	swal("Disculpe", "Usted aun no tiene presentaciones definidas", "error");
	});
    function redireccionar(){
	window.location="consult_est.php";
	}
	setTimeout('redireccionar()',3000);
	
      </script> 

<?php 
   }
   else { ?>
                                      <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>T&iacute;tulo del Proyecto </td>
                                        <td align='center'>Fecha</td>
                                        <td align='center'>Hora de Entrada</td>
                                        <td align='center'>Lugar</td>
                                        <td align='center'>Fase</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                    <?php 
								while($row=mysql_fetch_array($sql)){
								$dia=substr($row['fecha'],8,2)."-";
								$mes=substr($row['fecha'],5,2)."-";
								$anio=substr($row['fecha'],0,4);
								$fecha=$dia.$mes.$anio;
			                      ?>

                                     <tbody>
                                            <tr>
                                            <td align='center'><p align="justify"><?php echo $row["titulo"];?></p></td>
                                            <td align='center'><?php echo $fecha;?></td>
                                            <td align='center'><?php echo $row["hora_entrada"];?></td>
                                            <td align='center'><?php echo $row["lugar"];?></td>
                                            <td align='center'><?php echo $row["modulo"];?></td>                                          
                                            </tr>
							<?php 
							} 
							}

							date_default_timezone_set('America/Caracas');
							$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE OBSERVO LOS HORARIOS DE DEFENSA TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
							//echo $sql;
							mysql_query($sql);
							?>
                                      </tbody>
                                </table>
<?php
}//fin de condicional de presentaciones

//inicio del condicional de codigos
else if($opcion=='codigos'){
  
  $consult="SELECT *,proyectos.titulo,proyectos.codigo,estudiante.ci AS'ci_est',proyectos.id FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,est_cursa_proy,est_tiene_proy 
  WHERE
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  codigo!='' OR 
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  codigo!='' OR
  estudiante.id=est_cursa_proy.id_estudiante AND 
  pnfs.id=est_cursa_proy.id_pnf AND 
  trayectos.id=est_cursa_proy.id_trayecto AND 
  secciones.id=est_cursa_proy.id_seccion AND 
  anios.id=est_cursa_proy.id_anio AND 
  estudiante.id=est_tiene_proy.id_estudiante3 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  codigo!='' ";
  
  $resu=mysql_query($consult);
if(mysql_num_rows($resu)==0){
?>
<script language="javascript">
	 $(document).ready(function(){
	swal("Disculpe", "Usted aun no tiene código asignado", "error");
	});
    function redireccionar(){
	window.location="consult_est.php";
	}
	setTimeout('redireccionar()',3000);
</script>
<?php
}else{ 
  ?>

                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                <center><input type='hidden' name='ci' id='ci' value='<?php echo $_SESSION['cedula_usu'];?>'></center>
                                 <center><input type='hidden' name='id_estudiante2' id='id_estudiante2' value='<?php echo $muestra['id_estudiante2'];?>'></center>

                                        <td align='center'>T&iacute;tulo </td>
                                        <td align='center'>C&oacute;digo </td>
                                        <td align='center'>Imprimir</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                          <?php
                                          while($muestrapdf=mysql_fetch_array($resu)){
                                          ?>
                                            <tr>
                                            <td align='justify'><?php echo $muestrapdf['titulo'];?></td>
                                            <td align='center'><?php if($muestrapdf['codigo']==''){ echo "Por asignar";}else{ echo $muestrapdf['codigo'];}?></td>
                              <td align='center'><a target="_blank" href="planilla_codigo.php?id=<?php echo $muestrapdf['id']; ?>" ><img src="./imagenes/pdf.png" style="width:30px; height:30 px;" ></a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
}
}//fin del condicional de codigos
else if($opcion=='socializacion'){
	
 $consult="SELECT proyectos.id,titulo,proyectos_tiene_socializacion.fecha,hora_entrada,lugar FROM proyectos,estudiante,anios,est_cursa_proy,est_tiene_proy,proyectos_tiene_socializacion WHERE
  estudiante.id=est_cursa_proy.id_estudiante AND  
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  proyectos.id_anio=.anios.id AND
  proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  proyectos_tiene_socializacion.fecha!='0000-00-00' OR 
  estudiante.id=est_cursa_proy.id_estudiante AND  
  estudiante.id=est_tiene_proy.id_estudiante2 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  proyectos.id_anio=.anios.id AND
  proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  proyectos_tiene_socializacion.fecha!='0000-00-00' OR
  estudiante.id=est_cursa_proy.id_estudiante AND  
  estudiante.id=est_tiene_proy.id_estudiante1 AND
  proyectos.id=est_tiene_proy.id_proyecto AND
  proyectos.id_anio=.anios.id AND
  proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
  estudiante.ci= '".$_SESSION['cedula_usu']."' AND
  proyectos_tiene_socializacion.fecha!='0000-00-00' ";
  
  $resu=mysql_query($consult);
if(mysql_num_rows($resu)==0){
?>
<script language="javascript">
	 $(document).ready(function(){
	swal("Disculpe", "Usted aun no tiene fecha de socializacion definida", "error");
	});
  function redireccionar(){
	window.location="consult_est.php";
	}
	setTimeout('redireccionar()',3000); 
</script>
<?php
}else{ 
  ?>

                                <table class="table table-bordered table-striped">
                                <thead>
								<tr>
                                <center>
                                        <td align='center'>T&iacute;tulo </td>
                                        <td align='center'>Fecha </td>
                                        <td align='center'>Hora</td>
                                        <td align='center'>Lugar</td>
                                        <td align='center'>Calificaci&oacute;n</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <?php
                                          while($muestrapdf=mysql_fetch_array($resu)){
										  $select="SELECT ((cal_c+cal_t+cal_e1+cal_e2+cal_e3+cal_com)/6)AS'cal' FROM proyectos,proyectos_tiene_eva_def WHERE
										  proyectos.id=proyectos_tiene_eva_def.id_proyecto AND
										  proyectos.id='".$muestrapdf['id']."' ";
										  $query=mysql_query($select);
										  $data=mysql_fetch_array($query);
										  $dia=substr($muestrapdf['fecha'],8,2)."-";
										  $mes=substr($muestrapdf['fecha'],5,2)."-";
										  $anio=substr($muestrapdf['fecha'],0,4);
										  $fecha=$dia.$mes.$anio;
											?>
                                            <tr>
                                            <td align='justify'><?php echo $muestrapdf['titulo'];?></td>
                                            <td align='justify'><?php echo $fecha;?></td>
                                            <td align='justify'><?php echo $muestrapdf['hora_entrada'];?></td>
                                            <td align='justify'><?php echo $muestrapdf['lugar'];?></td>
											<?php
											if($data['cal']==0){
											echo "<td><p align='center'>Sin evaluar</p></td>";	
											}else{
											echo "<td><p align='center'>".number_format($data['cal'],0,".",",")."</p></td>";		
											}
											?>											
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <?php
											}

											}
											?>
                                      </tbody>
                                </table>

                            </div>
                        </div>
                        

                    </div>

                <!-- end panel -->
            </div>
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