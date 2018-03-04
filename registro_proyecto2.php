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

		function sololetras(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key).toLowerCase();

letras=" abcdefghijklmnopqrstuvwxyz";

especiales="8-37-38-46-164";

teclado_especial=false;

			for(var i in especiales){

		if(key==especiales[i]){
	
	
	teclado_especial=true;break;
	
		}

	}
	
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
	
	return false;
	
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
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
        Proyectos/Registrar  
      </h1>
      
    </section>
    <section class="content">

      <div class="col-md-10 col-md-offset-1">
          <!-- Horizontal Form -->
          <div class="progress">
                  <div style="width: 25%;" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">25%</div>
              </div> <!-- fin de progress--> 
          <div class="box box-info">
            <div class="step"> <!-- step 1 -->
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del proyecto</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="proyecto_enviado.php" method="post" name="form" enctype="application/x-www-form-urlencoded">
              <div class="box-body panel-title text-center">
                
                <div class="form-group">

                	<?php

require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	

//CONSULTAR LOS DATOS DEL ESTUDIANTE 1
$ci1=$_POST['ci1'];
$sql="SELECT *,estudiante.id FROM estudiante,usuarios WHERE 
estudiante.ci=usuarios.ci AND estudiante.ci='".$ci1."' ";
$r=mysql_query($sql);
$a=mysql_fetch_array($r);
if($a['status']=='Inactivo'){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Usted no puede inscribir un proyecto porque su estatus esta inactivo", "error");
});
function redireccionar(){
window.location="consulta_estudiante.php";
}
setTimeout('redireccionar()',3000);
</script>	
<?php
}
?>

<?php		
//CONSULTAR LOS DATOS DEL ESTUDIANTE 2
$ci2=$_POST['ci2'];
$sql1="SELECT *,estudiante.id FROM estudiante,usuarios WHERE 
estudiante.ci=usuarios.ci AND estudiante.ci='".$ci2."' ";
$r1=mysql_query($sql1);
if ((mysql_num_rows($r1)==0)&&($ci2!='')){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "La cedula del segundo estudiante no se encuentra registrada", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',3000);
	</script>	
	<?php
}
$b=mysql_fetch_array($r1);
if($b['status']=='Inactivo'){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "el segundo estudiante se encuentra inactivo en el sistema, por lo tanto no se puede inscribir en el proyecto", "error");
});
function redireccionar(){
window.location="consulta_estudiante.php";
}
setTimeout('redireccionar()',5000);

</script>	
<?php
}
?>

<?php
//CONSULTAR LOS DATOS DEL ESTUDIANTE 3
$ci3=$_POST['ci3'];
$sql2="SELECT *,estudiante.id FROM estudiante,usuarios WHERE 
estudiante.ci=usuarios.ci AND estudiante.ci='".$ci3."'";
$r2=mysql_query($sql2);
if ((mysql_num_rows($r2)==0)&&($ci3!='')){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "La cedula del tercer estudiante no se encuentra registrada", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',3000);
	</script>	
	<?php
}
$c=mysql_fetch_array($r2);
if($c['status']=='Inactivo'){
?>
<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "El tercer estudiante se encuentra inactivo en el sistema, por lo tanto no se puede inscribir en el proyecto", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);
</script>	
<?php
}
?>

<?php
$anio=$_POST['anio'];

if(($ci1==$ci2)||($ci1==$ci3)||($ci2==$ci3)&&($ci2!='')&&($ci3!='')){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "Los integrantes deben tener cedula de identidad distinta", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',3000);
	</script>	
	<?php
}


if(($ci1!='')&&($ci2=='')&&($ci3!='')){
	?>
	<script language="javascript">
		$(document).ready(function(){
	sweetAlert("Disculpe", "Si va a inscribir un grupo de 2 integrantes por favor coloque la cedula del segundo estudiante en el recuadro del medio", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);
	</script>	
	<?php
}


$sql="SELECT * FROM anios WHERE periodo='".$anio."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);

if($row['estado']=='Deshabilitado'){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "El periodo academico en vigencia ya no se encuentra habilitado para inscribir proyectos", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);
	</script>	
	<?php
}
?>

<?php
$consulta="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante1 AND 
estudiante.ci='".$ci1."' AND anios.periodo='".$anio."' ";
$query=mysql_query($consulta);

$consulta1="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante2 AND 
estudiante.ci='".$ci1."' AND anios.periodo='".$anio."' ";
$query1=mysql_query($consulta1);

$consulta2="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante3 AND 
estudiante.ci='".$ci1."' AND anios.periodo='".$anio."' ";
$query2=mysql_query($consulta2);

$consulta3="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante1 AND 
estudiante.ci='".$ci2."' AND anios.periodo='".$anio."' ";
$query3=mysql_query($consulta3);

$consulta4="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante2 AND 
estudiante.ci='".$ci2."' AND anios.periodo='".$anio."' ";
$query4=mysql_query($consulta4);

$consulta5="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante3 AND 
estudiante.ci='".$ci2."' AND anios.periodo='".$anio."' ";
$query5=mysql_query($consulta5);

$consulta6="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante1 AND 
estudiante.ci='".$ci3."' AND anios.periodo='".$anio."' ";
$query6=mysql_query($consulta6);

$consulta7="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante2 AND 
estudiante.ci='".$ci3."' AND anios.periodo='".$anio."' ";
$query7=mysql_query($consulta7);

$consulta8="select * FROM estudiante, anios, est_cursa_proy, est_tiene_proy where 
estudiante.id = est_cursa_proy.id_estudiante AND 
anios.id = est_cursa_proy.id_anio AND
estudiante.id = est_tiene_proy.id_estudiante3 AND 
estudiante.ci='".$ci3."' AND anios.periodo='".$anio."' ";
$query8=mysql_query($consulta8);

?>
<?php
if((mysql_num_rows($query)>0)OR(mysql_num_rows($query1)>0)OR(mysql_num_rows($query2)>0)){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "El primer estudiante ya tiene un proyecto inscrito en este periodo academico", "error");
	});
  function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);  
	</script>	
	<?php
}

?>

<?php
if((mysql_num_rows($query3)>0)OR(mysql_num_rows($query4)>0)OR(mysql_num_rows($query5)>0)){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "El segundo estudiante ya tiene un proyecto inscrito en este periodo academico", "error");
	});
 	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);  
	</script>	
	<?php
}

?>

<?php
if((mysql_num_rows($query7)>0)OR(mysql_num_rows($query6)>0)OR(mysql_num_rows($query8)>0)){
	?>
	<script language="javascript">
		$(document).ready(function(){
	sweetAlert("Disculpe", "El tercer estudiante ya tiene un proyecto inscrito en este periodo academico", "error");
	});
  	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);  
	</script>	
	<?php
}

?>

<?php
// CONSULTA PARA TRAER EL AÑO,SECCION,TURNO Y PROFESOR DE PROYECTO

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
profesores.nacionalidad,
profesores.id AS 'id_profesor',
sedes.id AS'id_sede'
FROM prof_dicta_proy, est_cursa_proy, profesores, estudiante, pnfs, trayectos, secciones, anios, turnos,sedes
WHERE prof_dicta_proy.id_profesor = profesores.id
AND prof_dicta_proy.id_pnf = pnfs.id
AND prof_dicta_proy.id_trayecto = trayectos.id
AND prof_dicta_proy.id_seccion = secciones.id
AND prof_dicta_proy.id_turno = turnos.id
AND prof_dicta_proy.id_anio = anios.id
AND prof_dicta_proy.id_sede = sedes.id
AND est_cursa_proy.id_estudiante = estudiante.id
AND est_cursa_proy.id_pnf = pnfs.id
AND est_cursa_proy.id_trayecto = trayectos.id
AND est_cursa_proy.id_anio = anios.id
AND est_cursa_proy.id_seccion = secciones.id
AND est_cursa_proy.id_sede = sedes.id
AND estudiante.ci =  '".$ci1."' 
AND anios.periodo='".$anio."' ";
$r=mysql_query($sql);
//echo $sql;
if(mysql_num_rows($r)==0){
	?>
	<script language="javascript">
	$(document).ready(function(){
	sweetAlert("Disculpe", "Usted no esta inscrito en ninguna seccion de proyecto", "error");
	});
	function redireccionar(){
	window.location="consulta_estudiante.php";
	}
	setTimeout('redireccionar()',5000);
	</script>	
	<?php
}
$i=mysql_fetch_array($r);
	
?>
                
                  <div class="col-md-6">
                   
                            <h5><b>Fecha</b></h5>
                             <p><input class="form-control" type="date" name="fecha" value="<?php 
							date_default_timezone_set('UTC'); $fecha=date("Y-m-d"); echo $fecha;?>" id="fecha" required></p>

                             <h5><b>Trayecto</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['des_tray'];?>" readonly></p>

                            <h5><b>Seccion</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['num_seccion'];?>" readonly></p>
                  
                            <h5><b>Profesor(a) de proyecto</b></h5>
                            <p><input class="form-control" type="text" value="<?php echo $i['nombres']."&nbsp;".$i['apellidos']."&nbsp;C.I.".$i['nacionalidad'].'-'.$i['ci'];?>" readonly></p>
                   
                           
                  </div>

                    <div class="col-md-6">

                     <h5><b>Pnf</b></h5>
                     <p><input class="form-control" type="text" value="<?php echo $i['nomb_pnf'];?>" readonly></p>
                   
                    <h5><b>A&ntilde;o</b></h5>
                    <p><input class="form-control" type="text" value="<?php echo $i['periodo'];?>" readonly></p>
                           
                    <h5><b>Turno</b></h5>
                    <p><input class="form-control" type="text" value="<?php echo $i['descripcion'];?>" readonly></p>

                     <h5><b>Tutor(a) de proyecto</b></h5>
                     <select class="form-control" name="id_tutor" id="id_tutor"  required>
					<option value="0">Seleccione un tutor</option>
							 <?php

					require_once("clasedb.php"); 
					$db=new clasedb();
					$db->conectar();	

					extract($_REQUEST);

					$sql="SELECT *,profesores.id AS'id_profesor' FROM profesores,anios,opc_tutores where 
					ci!='".$i['ci']."' AND 
					profesores.id=opc_tutores.id_profesor AND
					anios.id=opc_tutores.id_anio AND
					anios.estado='Habilitado' AND
					cont_proy_prof<10 ORDER BY apellidos";

					$rs=mysql_query($sql);

					while($row=mysql_fetch_array($rs)){

					?>
					<option value="<?php echo $row['id_profesor'];?>"> <?php echo $row['apellidos'] .'&nbsp;'.$row['nombres'];?> </option>
					<?php
					}
					?>
					</select>

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
				<td><center><h5><?php echo $a['nombres'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $a['apellidos'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $a['ci'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $a['correo'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $a['telefono'];?>&nbsp;&nbsp;</h5></center></td>
				<td><input type="hidden" name="id_estudiante1" id="id_estudiante1" value="<?php echo $a['id'];?>"></td>
				</tr>

				<tr>
				<td><center><h5><?php echo $b['nombres'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $b['apellidos'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $b['ci'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $b['correo'];?>&nbsp;&nbsp;</h5></center></td>
				<td><center><h5><?php echo $b['telefono'];?>&nbsp;&nbsp;</h5></center></td>
				<td><input type="hidden" name="id_estudiante2" id="id_estudiante2" value="<?php echo $b['id'];?>"></td>
				</tr>

				<tr>
				<td><center><h5><?php echo $c['nombres'];?></h5></center></td>
				<td><center><h5><?php echo $c['apellidos'];?></h5></center></td>
				<td><center><h5><?php echo $c['ci'];?></h5></center></td>
				<td><center><h5><?php echo $c['correo'];?></h5></center></td>
				<td><center><h5><?php echo $c['telefono'];?></h5></center></td>
				<td><input type="hidden" name="id_estudiante3" id="id_estudiante3" value="<?php echo $c['id'];?>"></td>

				<input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $i['id_profesor'];?>">
				<input type="hidden" name="id_anio" id="id_anio" value="<?php echo $i['id_anio'];?>">
				</tr>

		        <center></table>	

               </div> <!-- Fin de step 1 -->
              </div>

                 <div class="step"> <!-- step 2 -->
                 <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos de la comunidad</h2>
              </div>

          <div class="box-body text-center">

          <div class="row">

          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Comunidades</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="comunidad" id="comunidad">
					<option value="Ninguna de estas">Seleccione una comunidad</option>
					<?php 
					$mysql="SELECT DISTINCT nombre FROM comunidades ORDER BY nombre";
					$query=mysql_query($mysql);
					while(@$data=mysql_fetch_array($query)){
						
					$mysql2="SELECT * FROM comunidades WHERE nombre='".$data['nombre']."' ";
					$query2=mysql_query($mysql2);	
					$data2=mysql_fetch_array($query2);
					?> 
					<option value="<?php echo $data2['nombre'];?>"><?php echo $data['nombre'];?></option>
					<?php
					}
					?>
					</select>
					<br>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Otra comunidad</label>

                  <div class="col-sm-9">
                    <input class="form-control" name="otra_comunidad" placeholder="Ingrese el nombre de la comunidad" onpaste="return false" maxlength="150" id="usr" type="text"><br>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Responsable</label>

                  <div class="col-sm-9">
                   <input class="form-control" name="responsable" placeholder="Nombre y apellido" onkeypress="return sololetras(event)" onpaste="return false" id="usr" type="text"><br>
                  </div>

                </div>

              <div class="col-md-6">
              <div class="form-group">

                <h5><b>Telefono</b></h5>
                    <div class="input-group">
                    <div class="input-group-btn">
                    <select name="cod_tel" class="form-control-1" style="width:85px;" required>                   
                     <option value="">Linea</option>
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
                
              </div>
              <!-- /.form-group -->
              <div class="form-group">
               <h5><b>Estado</b></h5>
               <select name="estado" class="form-control"  required>
				<option value="">Seleccione el estado</option>			   
               <?php
			   $sql="SELECT * FROM estados ORDER BY estado";
			   $r=mysql_query($sql);
			   while($row=mysql_fetch_array($r)){
			   ?>
               <option value="<?php echo $row['estado'];?>"><?php echo $row['estado'];?></option>
			   <?php
			   }
			   ?>
                </select>
              </div>

              <div class="form-group">
               <h5><b>Parroquia</b></h5>
              <select name="parroquia" onkeypress="return sololetras(event)" onpaste="return false" class="form-control" id="usr" type="text">
			  <option value="">Seleccione la parroquia</option>
              <?php
			   $sql="SELECT DISTINCT parroquia FROM parroquias ORDER BY parroquia";
			   $r=mysql_query($sql);
			   while($row=mysql_fetch_array($r)){
			   ?>
               <option value="<?php echo $row['parroquia'];?>"><?php echo $row['parroquia'];?></option>
			   <?php
			   }
			   ?>
							</select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
               <h5><b>Correo</b></h5>
               <input class="form-control" type="email" name="resp_email" id="usr" maxlength="40" placeholder="Prueba@example.com" required="required">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
             <h5><b>Municipio</b></h5>
                <select name="municipio" onkeypress="return sololetras(event)" onpaste="return false" class="form-control" id="usr">
                <option value="">Seleccione el municipio</option>
				<?php
			   $sql="SELECT DISTINCT municipio FROM municipios ORDER BY municipio";
			   $r=mysql_query($sql);
			   while($row=mysql_fetch_array($r)){
			   ?>
               <option value="<?php echo $row['municipio'];?>"><?php echo $row['municipio'];?></option>
			   <?php
			   }
			   ?>
							</select>
              </div>

              <div class="form-group">
               <h5><b>Sector</b></h5>
               <input class="form-control" name="sector" id="usr" type="text">
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
<textarea class="form-control" rows="3" name="titulo" id="titulo" placeholder="Solo puede colocar un titulo que tenga un maximo de 400 caracteres" maxlength="400" style="resize:none;"></textarea>
<br>

<p><b>Objetivo del Proyecto</b></p>
<textarea class="form-control" rows="3" name="objetivo" id="objetivo" placeholder="Solo puede colocar un objetivo que tenga un maximo de 1000 caracteres" maxlength="1000" style="resize:none;"></textarea>
<br>

<p><b>Alcances del Proyecto</b></p>
<textarea class="form-control" rows="3" name="alcance" id="alcance" placeholder="Solo puede colocar un alcance que tenga un maximo de 2100 caracteres" maxlength="2100" style="resize:none;"></textarea>
<br>

<p><b>Limitaciones</b></p>
<textarea class="form-control" rows="3" name="limitaciones" id="limitaciones" placeholder="Solo puede colocar limitaciones que tenga un maximo de 600 caracteres" maxlength="600" style="resize:none;"></textarea>

            </div>

                 </div> <!-- Fin de step 3 -->
              <!-- /.box-body -->

      <div class="step"> <!-- step 4 -->
                 <div class="box-header with-border">
            <h2 class="panel-title text-center">Datos del proyecto</h2>
              </div>

            <div class="box-body">

<p><b>L&iacute;nea de investigaci&oacute;n</b></p>
<select name="linea_investigacion" class="form-control" required>
<option value="">Seleccione una l&iacute;nea de investigaci&oacute;n</option>
<?php 
require_once("clasedb.php");
$db= new clasedb();
$db->conectar();
$sql="SELECT * FROM pnfs,lineas_investigacion,pnf_tiene_linea WHERE 
pnfs.id=pnf_tiene_linea.id_pnf AND
lineas_investigacion.id=pnf_tiene_linea.id_linea AND
pnfs.nomb_pnf='".$i['nomb_pnf']."' ";
$r=mysql_query($sql);
while(@$row=mysql_fetch_array($r)){
?>
<option value="<?php echo $row['nombre']?>"><?php echo $row['nombre']?></option>
<?php 
}
?>	
</select>
<br>


<p><b>Aportes a la comunidad. Personas beneficiadas?</b></p>
<textarea class="form-control" rows="3" name="aportes" id="aportes" placeholder="Solo puede colocar aportes que tenga un maximo de 700 caracteres" maxlength="700" style="resize:none;"></textarea><br>


<p><b>Acciones de integraci&oacute;n con la comunidad</b></p>
<textarea class="form-control" rows="3" name="acciones" id="acciones" placeholder="Solo puede colocar acciones que tenga un maximo de 600 caracteres" maxlength="600" style="resize:none;"></textarea><br>


<p><b>Vinculaci&oacute;n de la investigaci&oacute;n con el Plan de la Patria 2013-2019</b></p>
<textarea class="form-control" rows="3" name="vinculacion" id="vinculacion" placeholder="Solo puede colocar una vinculacion que tenga un maximo de 1200 caracteres" maxlength="1200" style="resize:none;"></textarea><br>
            
            </div>

                 </div> <!-- Fin de step 4 -->
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
               <button type="button" class=" btn btn-info action btn-sky text-capitalize back btn"> <i class="fa fa-reply" aria-hidden="true"></i> Volver </button>
                                                                
                    <button type="button" class=" btn btn-info action btn-sky text-capitalize next btn"> <i class="fa fa-share" aria-hidden="true"></i> Siguiente </button>

                    <button type="submit" onclick="{!c.saveContact}" class=" btn btn-info action btn-hot text-capitalize submit btn"> <i class="fa fa-check" aria-hidden="true"></i> Registrar </button>
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
