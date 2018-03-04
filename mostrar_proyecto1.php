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
    Consultas de proyecto/Proyectos/Modificar
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

$id=$_GET['id'];

// VALIDACION EN CASO DE QUE EL PROYECTO NO TENGA HABILITADO EL PERMISO DE MODIFICAR
$sql="SELECT * FROM proyectos,proyectos_tiene_permiso WHERE
proyectos.id=proyectos_tiene_permiso.id_proyecto AND
proyectos.id='".$id."' ";
$r=mysql_query($sql);
//echo $sql;
$row=mysql_fetch_array($r);//fin

	//datos del proyectos y del lider del proyecto
	$consulta="SELECT *,
	estudiante.id AS'id_estudiante1',
	proyectos.id AS'id_proyecto',
	trayectos.descripcion AS'descripcion_trayecto'
	FROM
proyectos,estudiante,usuarios,pnfs,trayectos,secciones,anios,turnos,est_cursa_proy,est_tiene_proy
WHERE
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.ci=usuarios.ci AND 
pnfs.id=est_cursa_proy.id_pnf AND 
trayectos.id=est_cursa_proy.id_trayecto AND 
secciones.id=est_cursa_proy.id_seccion AND 
anios.id=est_cursa_proy.id_anio AND 
turnos.id=est_cursa_proy.id_turno AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id='".$id."' ";
	$resultado=mysql_query($consulta);
	$fila=mysql_fetch_array($resultado);//fin

if($row['est_per']=='Deshabilitado'){
	?>
	<script language="javascript">
	 $(document).ready(function(){
		swal("Disculpe", "Usted no tiene permiso para modificar el proyecto, espere que su coordinador le habilite la opcion", "error");
		});

		function redireccionar(){
		window.location="index3.php";
		}
		setTimeout('redireccionar()',5000);
	</script>
	<?php
} if(mysql_num_rows($resultado)==0){
?>
     <!-- -->  <script type="text/javascript">
          $(document).ready(function(){
		swal("Disculpe", "Usted no tiene proyectos inscritos hasta ahora", "error");
		});

		function redireccionar(){
		window.location="index3.php";
		}
		setTimeout('redireccionar()',4000);
        </script>
<?php
}else if($row['cont']==3){
?>
   <script type="text/javascript">
         $(document).ready(function(){
		swal("Disculpe", "Usted ya excedio el limite de 3 intentos para modificar el proyecto", "error");
		});

		function redireccionar(){
		window.location="index3.php";
		}
		setTimeout('redireccionar()',4000);
        </script>
<?php 
} if($row['id_permiso']==0){
?>
 <script type="text/javascript">
         $(document).ready(function(){
		swal("Disculpe", "Usted no tiene permisos para modificar el proyecto", "error");
		});

		function redireccionar(){
		window.location="index3.php";
		}
		setTimeout('redireccionar()',4000); 
        </script>
<?php	
}else{

	//datos del coordinador 
	$sql="SELECT *,profesores.nombres AS'nom_p',profesores.apellidos AS'ape_p',profesores.ci AS'ci_p'
	FROM estudiante,anios,pnfs,trayectos,secciones,proyectos,profesores,est_cursa_proy,prof_dicta_proy,coord_tiene_proy,est_tiene_proy
 WHERE 
coord_tiene_proy.id_profesor = profesores.id AND
coord_tiene_proy.id_proyecto = proyectos.id AND
 est_cursa_proy.id_estudiante = estudiante.id AND
est_cursa_proy.id_pnf = pnfs.id AND 
 est_cursa_proy.id_trayecto = trayectos.id AND
 est_cursa_proy.id_seccion = secciones.id AND
 est_cursa_proy.id_anio = anios.id AND
est_tiene_proy.id_estudiante1=estudiante.id AND 
est_tiene_proy.id_proyecto=proyectos.id AND
	proyectos.id='".$id."' ";
	$r=mysql_query($sql);
	$row=mysql_fetch_array($r);//fin
	
	//datos del tutor
	$sql2="SELECT *,
	profesores.nombres AS'nom_p',
	profesores.apellidos AS'ape_p',
	profesores.ci AS'ci_p'
	FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,tutor_tiene_proyectos,est_cursa_proy,est_tiene_proy 
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
	proyectos.id='".$id."' ";
	$r2=mysql_query($sql2);
	$row2=mysql_fetch_array($r2);//fin
	
	//datos del estudiante2
	$sql3="SELECT * FROM
proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
WHERE
estudiante.ci=usuarios.ci AND 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante2 AND
proyectos.id=est_tiene_proy.id_proyecto AND
	proyectos.id='".$id."' ";
	$r3=mysql_query($sql3);
	$row3=mysql_fetch_array($r3);//fin
	
	//datos del estudiante3
	$sql4="SELECT * FROM
proyectos,estudiante,usuarios,est_cursa_proy,est_tiene_proy 
WHERE
estudiante.ci=usuarios.ci AND 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante3 AND
proyectos.id=est_tiene_proy.id_proyecto AND
	proyectos.id='".$id."'  ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);//fin

$sql5="SELECT *,comunidades.id AS'id_comunidad' FROM proyectos,comunidades,com_tiene_proy WHERE
proyectos.id=com_tiene_proy.id_proyecto AND
comunidades.id=com_tiene_proy.id_comunidad AND
proyectos.id='".$id."' ";
$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);

$sql6="SELECT *,responsable.id AS'id_responsable' FROM responsable,comunidades,com_tiene_resp WHERE
responsable.id=com_tiene_resp.id_responsable AND
comunidades.id=com_tiene_resp.id_comunidad AND 
id_comunidad='".$row5['id_comunidad']."' ";
$r6=mysql_query($sql6);
$row6=mysql_fetch_array($r6);

?>
   <div class="col-md-10 col-md-offset-1">   
          <!-- Horizontal Form -->
          <div class="progress">
                  <div style="width: 25%;" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div> <!-- fin de progress--> 
          <div class="box box-info">
            <div class="step"> <!-- step 1 -->
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del perfil</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="proyecto_modificado.php" method="post" name="form">
            
              <div class="box-body panel-title text-center">
                
                <div class="form-group">

                <?php
	  require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

extract($_REQUEST);
// CONSULTA PARA TRAER EL AÑO,SECCION,TURNO Y PROFESOR DE PROYECTO

$id=$_GET['id'];

$sql="SELECT 
pnfs.id AS 'id_pnf',
pnfs.nomb_pnf,
trayectos.id AS 'id_trayecto', 
trayectos.descripcion AS'des_tray', 
secciones.num_seccion, 
secciones.id AS 'id_sede',
anios.periodo, 
anios.id AS 'id_anio',
turnos.descripcion, 
turnos.id AS 'id_turno', 
profesores.nombres, 
profesores.apellidos, 
profesores.ci,
profesores.id AS 'id_profesor',
sedes.id AS'id_sede'
FROM proyectos,coord_tiene_proy, est_cursa_proy, profesores, estudiante, pnfs, trayectos, secciones, anios, turnos,sedes
WHERE coord_tiene_proy.id_profesor = profesores.id
AND coord_tiene_proy.id_proyecto = proyectos.id
AND est_cursa_proy.id_estudiante = estudiante.id
AND est_cursa_proy.id_pnf = pnfs.id
AND est_cursa_proy.id_trayecto = trayectos.id
AND est_cursa_proy.id_anio = anios.id
AND est_cursa_proy.id_seccion = secciones.id
AND est_cursa_proy.id_sede = sedes.id
AND proyectos.id='".$id."' ";
$r=mysql_query($sql);
if(mysql_num_rows($r)==0){
	?>
<script type="text/javascript">
			$(document).ready(function(){
			swal("DISCULPE!", "Usted No tiene proyectos para modificar", "error");
			});
          function redireccionar(){
			window.location="index.php";
			}
			setTimeout('redireccionar()',2000);
        </script>
	<?php
}
$i=mysql_fetch_array($r);
	?>
	
                  <div class="col-md-6">
			                <input type="hidden" name="id_proyecto" value="<?php echo $fila['id_proyecto'];?>" size="1" max-length="20" placeholder="" readonly title=""/>
			                   
                            <h5><b>Fecha</b></h5>
                             <p><input class="form-control" type="date" name="fecha" value="<?php echo $fila['fecha'];?>" id="fecha" required readonly></p>

                             <h5><b>Trayecto</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['des_tray'];?>" readonly></p>

                            <h5><b>Seccion</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['num_seccion'];?>" readonly></p>
                  
                            <h5><b>Profesor(a) de proyecto</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['nombres']."&nbsp;".$i['apellidos'];?> C.I V-<?php echo $i['ci'];?>" readonly></p>
                   
                           
                  </div>

                    <div class="col-md-6">

                     <h5><b>Pnf</b></h5>
                     <p><input class="form-control" type="text" value="<?php echo $i['nomb_pnf'];?>" readonly></p>
                   
                    <h5><b>A&ntilde;o</b></h5>
                    <p><input class="form-control" type="text" value="<?php echo $i['periodo'];?>" readonly></p>
                           
                    <h5><b>Turno</b></h5>
                    <p><input class="form-control" type="text" value="<?php echo $i['descripcion'];?>" readonly></p>

                     <h5><b>Tutor(a) de proyecto</b></h5>
                     <p><input class="form-control" type="text" value="<?php echo $row2['nom_p'].$row2['ape_p'];?> C.I V-<?php echo $row2['ci_p'];?>" readonly></p>

                  </div>

                </div>

                <center><table>
                <tr>
				<p align="center"><b>Integrantes del colectivo de estudiantes</b></p>
				<td><center><b>Nombre</b>&nbsp;&nbsp;</center></td>
				<td><center><b>Apellido</b></center></td>
				<td><center><b>C&eacute;dula</b>&nbsp;&nbsp;</center></td>
				<td><center><b>Correo</b></center></td>
				<td><center><b>Tel&eacute;fono</b></center></td>
				</tr>

				<tr>
<td><center><h5><?php echo $fila['nombres'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $fila['apellidos'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $fila['nacionalidad'].'-'.$fila['ci'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $fila['correo'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $fila['telefono'];?>&nbsp;&nbsp;</h5></center></td>
<td><input type="hidden" name="id_estudiante1" id="id_estudiante1" value="<?php echo $a['id'];?>"></td>
</tr>

<?php
if(mysql_num_rows($r3)>0){
?>
<tr>
<td><center><h5><?php echo $row3['nombres'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $row3['apellidos'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $row3['nacionalidad'].'-'.$row3['ci'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $row3['correo'];?>&nbsp;&nbsp;</h5></center></td>
<td><center><h5><?php echo $row3['telefono'];?>&nbsp;&nbsp;</h5></center></td>
<td><input type="hidden" name="id_estudiante2" id="id_estudiante2" value="<?php echo $b['id'];?>"></td>
</tr>
<?php 
}
?>

<?php
if(mysql_num_rows($r4)>0){
?>
<tr>
<td><center><h5><?php echo $row4['nombres'];?></h5></center></td>
<td><center><h5><?php echo $row4['apellidos'];?></h5></center></td>
<td><center><h5><?php echo $row4['nacionalidad'].'-'.$row4['ci'];?></h5></center></td>
<td><center><h5><?php echo $row4['correo'];?></h5></center></td>
<td><center><h5><?php echo $row4['telefono'];?></h5></center></td>
<td><input type="hidden" name="id_estudiante3" id="id_estudiante3" value="<?php echo $c['id'];?>"></td>
</tr>
<?php 
}
?>


<tr>
<input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $i['id_profesor'];?>">
<input type="hidden" name="id_anio" id="id_anio" value="<?php echo $i['id_anio'];?>">
</tr>

		        <center></table>	

               </div> <!-- Fin de step 1 -->
              </div>

                 <div class="step"> <!-- step 2 -->
                 <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del perfil</h2>
              </div>

          <div class="box-body text-center">

          <div class="row">

          <div class="form-group">
                 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Comunidad</label>

                  <div class="col-sm-9">
                   <input type="hidden" name="id_comunidad" value="<?php echo $row5['id_comunidad'];?>" size="1" max-length="20" placeholder="" readonly title=""/>
                   <input class="form-control" name="nombre" value="<?php echo $row5['nombre'];?>" id="usr" type="text" readonly><br>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Responsable</label>

                  <div class="col-sm-9">
                  <input type="hidden" name="id_responsable" value="<?php echo $row6['id_responsable'];?>" size="1" max-length="20" placeholder="" readonly title=""/>
                  <input class="form-control" name="responsable" value="<?php echo $row6['responsable'];?>" id="usr" type="text"><br>
                  </div>

                </div>
                 </div>

              <div class="col-md-6">
              <div class="form-group">

                <h5><b>Telefono</b></h5>
                <div class="input-group">
                <div class="input-group-btn">
                 <select name="cod_tel" class="form-control-1" style="width:85px;" required>                  
                 <option value="<?php echo substr($row6['telefono'],0,4)?>"><?php echo substr($row6['telefono'],0,4)?></option>
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
                <input name="numero" type="text" class="form-control" placeholder="N&uacute;mero" id="usr" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="7" value="<?php echo substr($row6['telefono'],5,7)?>" required>
                 </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
               <h5><b>Estado</b></h5>
             <input class="form-control" name="estado" value="<?php echo $row5['estado'];?>" readonly id="usr" placeholder="ejemplo@gmail.com" type="text">
              </div>

              <div class="form-group">
               <h5><b>Parroquia</b></h5>
             <input name="parroquia" value="<?php echo $row5['parroquia'];?>" class="form-control" readonly id="usr" type="text">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
               <h5><b>Correo</b></h5>
               <input class="form-control" name="resp_email" value="<?php echo $row6['correo'];?>" id="usr" placeholder="Prueba@example.com" type="email">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
             <h5><b>Municipio</b></h5>
                <input name="municipio" value="<?php echo $row5['municipio'];?>" class="form-control" readonly id="usr" type="text">
              </div>

              <div class="form-group">
               <h5><b>Sector</b></h5>
               <input name="sector" value="<?php echo $row5['sector'];?>" class="form-control" readonly id="usr" type="text">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>      

            

                 </div> <!-- Fin de step 2 -->
              <!-- /.box-body -->


                   <div class="step"> <!-- step 3 -->
                 <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del proyecto</h2>
              </div>

            <div class="box-body">

<p><b>T&iacute;tulo de Proyecto</b></p>
<textarea class="form-control" required="required" class="textarea" name="titulo" value="" id="titulo"   title="Solo puede colocar un titulo que tenga un maximo de 400 caracteres" placeholder="Solo puede colocar un titulo que tenga un maximo de 400 caracteres" maxlength="400" rows="3" required style="resize:none;"><?php echo $fila['titulo'];?> </textarea>
<br>

<p><b>Objetivo del Proyecto</b></p>
<textarea class="form-control" required="required" class="textarea" name="objetivo" id="objetivo"  value="" title="Solo puede colocar un objetivo que tenga un maximo de 1000 caracteres" placeholder="Solo puede colocar un objetivo que tenga un maximo de 1000 caracteres" maxlength="1000" rows="3" required style="resize:none;"><?php echo $fila['objetivo'];?> </textarea>
<br>

<p><b>Alcances del Proyecto</b></p>
<textarea class="form-control" required="required" class="textarea" name="alcance" id="alcance" value="" title="Solo puede colocar un alcance que tenga un maximo de 2100 caracteres" placeholder="Solo puede colocar un alcance que tenga un maximo de 2100 caracteres" maxlength="2100" rows="3" required style="resize:none;"><?php echo $fila['alcance'];?> </textarea>
<br>

<p><b>Limitaciones</b></p>
<textarea class="form-control" class="textarea" name="limitaciones" id="limitaciones" required="required" value="" title="Solo puede colocar una limitacion que tenga un maximo de 600 caracteres" placeholder="Solo puede colocar limitaciones que tenga un maximo de 600 caracteres" maxlength="600" rows="3" required style="resize:none;"><?php echo $fila['limitaciones'];?> </textarea>


            </div>

                 </div> <!-- Fin de step 3 -->
              <!-- /.box-body -->

      <div class="step"> <!-- step 4 -->
                 <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del proyecto</h2>
              </div>

            <div class="box-body">

<p><b>Aportes a la Comunidad. Personas Beneficiadas?</b></p>
<textarea class="form-control" class="textarea" name="aportes" id="aportes"  required="required" value="" title="Solo puede colocar los aportes con un maximo de 700 caracteres" placeholder="Solo puede colocar aportes que tenga un maximo de 700 caracteres" maxlength="700"  rows="6" required style="resize:none;"><?php echo $fila['aportes'];?></textarea><br>


<p><b>Acciones de integraci&oacute;n con la comunidad</b></p>

<textarea class="form-control" class="textarea" name="acciones" id="acciones"  required="required" value="" title="Solo puede colocar las acciones que tenga un maximo de 600 caracteres" placeholder="Solo puede colocar acciones que tenga un maximo de 600 caracteres" maxlength="600" rows="4" required style="resize:none;"><?php echo $row5['acciones'];?> </textarea><br>


<p><b>Vinculaci&oacute;n de la ivestigaci&oacute;n con el Plan de la Patria 2013-2019</b></p>
<textarea class="form-control" class="textarea" name="vinculacion" id="vinculacion"  required="required" value="" title="Solo puede colocar una vinculacion que tenga un maximo de 1200 caracteres" placeholder="Solo puede colocar una vinculacion que tenga un maximo de 1200 caracteres" maxlength="1200" rows="5" required style="resize:none;"><?php echo $row5['vinculacion'];?> </textarea><br>
            
            
            </div>

                 </div> <!-- Fin de step 4 -->
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
               <button type="button" class=" btn btn-info action btn-sky text-capitalize back btn"> <i class="fa fa-reply" aria-hidden="true"></i> Volver </button>
                                                                
                    <button type="button" class=" btn btn-info action btn-sky text-capitalize next btn"> <i class="fa fa-share" aria-hidden="true"></i> Siguiente </button>

                    <button type="submit" onclick="{!c.saveContact}" class=" btn btn-info action btn-hot text-capitalize submit btn"> <i class="fa fa-check" aria-hidden="true"></i> Modificar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php } ?>
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
