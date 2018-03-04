  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
<?php 
require_once("clasedb.php"); 
$db=new clasedb(); 
$db-> conectar(); 
$sql="select * from profesores, usuarios where profesores.ci= 
usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' and nivel='Coordinador' ";
$r=mysql_query($sql);
//echo $sql;
$row=mysql_fetch_array($r);
$sql2="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='3' AND 
 permisos.id='1' ";
$r2=mysql_query($sql2);

$sql3="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='4' AND 
 permisos.id='1' ";
$r3=mysql_query($sql3);

$sql4="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='5' AND 
 permisos.id='1'";
$r4=mysql_query($sql4);

$sql5="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='6' AND 
 permisos.id='1' ";
$r5=mysql_query($sql5);

$sql7="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='7' AND 
 permisos.id='1'";
$r7=mysql_query($sql7);

$sql6="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='8' AND 
 permisos.id='1'";
$r6=mysql_query($sql6);

//permiso de consultar jurados
$sql24="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='24' AND 
 permisos.id='1'";
$r24=mysql_query($sql24);
//fin

//permiso de consultar proyectos
$sql18="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='18' AND 
 permisos.id='1'";
$r18=mysql_query($sql18);
//fin

//permiso de retiro de proyectos
$sql29="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='29' AND 
 permisos.id='1'";
$r29=mysql_query($sql29);
//fin


//permiso de consultar factibilidad
$sql19="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='19' AND 
 permisos.id='1'";
$r19=mysql_query($sql19);
//fin

//permiso de consultar comunidades
$sql20="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='20' AND 
 permisos.id='1'";
$r20=mysql_query($sql20);
//fin

//permiso de consultar evaluaciones
$sql21="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='21' AND 
 permisos.id='1'";
$r21=mysql_query($sql21);
//fin

//permiso de consultar presentaciones
$sql22="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='22' AND 
 permisos.id='1'";
$r22=mysql_query($sql22);
//fin

//permiso de consultar culminacion
$sql23="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='23' AND 
 permisos.id='1'";
$r23=mysql_query($sql23);
//fin

//permiso de habilitar modificaciones
$sql33="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='33' AND 
 permisos.id='1'";
$r33=mysql_query($sql33);
//fin




?>
<br>
        </div>
        <div class="pull-left info">
          
        </div>
		<p align="center" style="color:#24A2EB;"><?php echo'Coord'.'-'. $row['nombres'].'&nbsp;'.$row['apellidos'];
		if(mysql_num_rows($r)==0){
		echo $_SESSION['nombre_usu'];	
		}
		?></p>
      </div>

       <!-- Menu vertical -->
     
      <ul class="sidebar-menu">
        <li class="header"> - Menu de navegaci&oacute;n -</li>
        <li class="active treeview">
         <?php 
			if((mysql_num_rows($r2)==1)or(mysql_num_rows($r3)==1)or(mysql_num_rows($r4)==1)
			or(mysql_num_rows($r6)==1)){
			?> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
			
            <span>Registros</span>
			
			
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  
		  <?php
		  if(mysql_num_rows($r2)==1){
		   ?>
		   <li><a href="opera_opiniones.php"><i class="fa fa-circle-o"></i> Factibilidad</a></li>
		   <?php
		  }
		  ?>
		  
		    <?php
		  if(mysql_num_rows($r3)==1){
		   ?>
		   <li><a href="consulta_defensa.php"><i class="fa fa-circle-o"></i> Presentaciones</a></li>
		   <?php
		  }
		  ?>
		  
		    <?php
		  if(mysql_num_rows($r4)==1){
		   ?>
		   <li><a href="consulta_evaluacion.php"><i class="fa fa-circle-o"></i> Evaluaciones</a></li>
		   <?php
		  }
		  ?>
          </ul>
        </li>
		<?php 
			}
			?>
		
		<?php 
			if((mysql_num_rows($r19)==1)or(mysql_num_rows($r20)==1)or(mysql_num_rows($r21)==1)
			or(mysql_num_rows($r22)==1)or(mysql_num_rows($r23)==1)){
			?>
		   <li class="treeview">
          <a href="#">
		  
            <i class="fa fa-edit"></i>
			
			<span>Consultas</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consultas_coord.php"><i class="fa fa-circle-o"></i> B&uacute;squedas</a></li>
          </ul>
        </li>
		<?php 
			}
			?>
        
		<?php
		if((mysql_num_rows($r18)==1)or(mysql_num_rows($r29)==1)){
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
		  <?php
		  if(mysql_num_rows($r18)==1){
		  ?>
            <li><a href="detalles_proyecto2.php"><i class="fa fa-circle-o"></i> Consultar</a></li>
			 <?php
		  }
		  ?>
		  
		   <?php
		  if (mysql_num_rows($r29)==1){
		  ?>
			<li><a href="#"><i class="fa fa-circle-o"></i> Retiros</a>
			<ul class="treeview-menu">
			<li><a href="detalles_retiros.php?retiro=integrantes"><i class="fa fa-circle-o"></i>Integrantes</a></li>
			<li><a href="detalles_retiros.php?retiro=investigacion"><i class="fa fa-circle-o"></i>Investigacion</a></li>
			</ul>
			</li>
		   <?php
		  }
		  ?>
		  <li><a href="consulta_factibilidad_coord.php"><i class="fa fa-circle-o"></i> Estad&iacute;sticas</a></li>
          </ul>
        </li>		
		 <?php
		}
		?>
		  
		 <?php 
			if(mysql_num_rows($r33)==1){
			?>
		   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Permisos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="registro_permiso.php?opc=1"><i class="fa fa-circle-o"></i>Modificar proyecto</a></li>
            <li><a href="registro_permiso.php?opc=2"><i class="fa fa-circle-o"></i>Modificar asistencias</a></li>
          </ul>
        </li>
		<?php 
			}
			?>
		
		
		<?php
		if(mysql_num_rows($r24)==1){
		?>
		   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Jurados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_jurado.php"><i class="fa fa-circle-o"></i> Consultar</a></li>
          </ul>
        </li>
		
		<?php 
		}
		?>

		
		<?php
		if((mysql_num_rows($r5)==1)or(mysql_num_rows($r7)==1)){
		?>
 		   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Socializaci&oacute;n</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php
		  if(mysql_num_rows($r5)==1){
		  ?>
		  <li><a href="registro_fecha_socializacion.php"><i class="fa fa-circle-o"></i> Fechas</a></li>
		  <?php
		  }
		  ?>
		  
		  	  <?php
		  if(mysql_num_rows($r7)==1){
		  ?>
		  <li><a href="registro_evadef.php"><i class="fa fa-circle-o"></i> Evaluaciones</a></li>
		  <?php
		  }
		  ?>
            
            
          </ul>
        </li>  
			<?php 
		}
			?>
           </li> </ul>
       
    </section>
    <!-- /.sidebar -->
  </aside>