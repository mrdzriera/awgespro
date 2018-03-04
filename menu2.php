 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 
$sql="select * from estudiante, usuarios where estudiante.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' ";
				  $r=mysql_query($sql);
				  //echo $sql;
				  $row=mysql_fetch_array($r);
				  
$sql2="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='1' AND 
 permisos.id='1' ";
$r2=mysql_query($sql2);

$sql3="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='2' AND 
 permisos.id='1'";
$r3=mysql_query($sql3);

$sql4="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='12' AND 
 permisos.id='1' ";
$r4=mysql_query($sql4);


$sql18="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='18' AND 
 permisos.id='1' ";
$r18=mysql_query($sql18);

$sql19="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='19' AND 
 permisos.id='1' ";
$r19=mysql_query($sql19);

$sql21="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='21' AND 
 permisos.id='1' ";
$r21=mysql_query($sql21);

$sql24="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='24' AND 
 permisos.id='1' ";
$r24=mysql_query($sql24);

$sql32="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='32' AND 
 permisos.id='1' ";
$r32=mysql_query($sql32);

			//culminacion
			
			$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
			$rs=mysql_query($select);
			$trae=mysql_fetch_array($rs);
	
			$mysql17="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_culminacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha='0000-00-00' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query17=mysql_query($mysql17);
			//echo $mysql16;
			$cont17=mysql_num_rows($query17);
			$data17=mysql_fetch_array($query17);
			//fin	

?>

<br>
        </div>
        <div class="pull-left info">
          
        </div>
		<b><p align="center" style="color:#24A2EB;">
		<?php echo 'Est'.'-'.$row['nombres'].'&nbsp;'.$row['apellidos'];
		if(mysql_num_rows($r)==0){
		echo $_SESSION['nombre_usu'];	
		}
		?></p></b>
      </div>

       <!-- Menu vertical -->
     
      <ul class="sidebar-menu">
        <li class="header"> - Menu de navegaci&oacute;n -</li>

		<?php
		if(mysql_num_rows($r2)==1){
		?>
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_estudiante.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
       
	   </li>
	   <?php 
		}
		?>
	   
        <?php
		if((mysql_num_rows($r18)==1)or(mysql_num_rows($r19)==1)or(mysql_num_rows($r21)==1)or(mysql_num_rows($r24)==1)or
		(mysql_num_rows($r32)==1)){
		?>
		<li class="active treeview">
          <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Consultas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consult_est.php"><i class="fa fa-circle-o"></i> B&uacute;squedas</a></li>
          </ul>
        </li>
		<?php
		}
		?>
		
		 <?php
		if(mysql_num_rows($r3)==1){
		?>
		</li>
			<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Asistencias a la com.</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="registrar_visita.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
          </ul>
        </li>
       <?php
		}
		?>
		
			 <?php
		if(mysql_num_rows($r4)==1){
		?>
			<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Beca trabajo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_bec.php"><i class="fa fa-circle-o"></i>Consultas</a></li>
          </ul>
        </li>
       <?php
		}
		?>
		</ul>
		
    </section>
    <!-- /.sidebar -->
  </aside>