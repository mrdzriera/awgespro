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

$sql="select * from secretarios, usuarios where secretarios.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' ";
$r=mysql_query($sql);
//echo $sql;
$row=mysql_fetch_array($r);

$sql2="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='9' AND 
 permisos.id='1'";
$r2=mysql_query($sql2);

$sql3="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='10' AND 
 permisos.id='1'";
$r3=mysql_query($sql3);

//permiso de habilitar archivos
$sql31="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='31' AND 
 permisos.id='1'";
$r31=mysql_query($sql31);
//fin

//permiso de generar solvencias
$sql30="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='30' AND 
 permisos.id='1'";
$r30=mysql_query($sql30);
//fin

//permiso de consultar estadisticas
$sql25="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='25' AND 
 permisos.id='1'";
$r25=mysql_query($sql25);
//fin

//permiso de modificar documentos
$sql17="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='17' AND 
 permisos.id='1'";
$r17=mysql_query($sql17);
//fin

//permiso de desbloquear cuenta
$sql34="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='34' AND 
 permisos.id='1'";
$r34=mysql_query($sql34);
//fin

//permiso de consultar codigos
$sql20="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='29' AND 
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

//permiso de consultar comunidades
$sql23="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='20' AND 
 permisos.id='1'";
$r23=mysql_query($sql23);
//fin

//permiso de consultar codigos
$sql28="select * from usuarios,operaciones,permisos,usuario_tiene_permiso where
 usuarios.id = usuario_tiene_permiso.id_usuario AND 
 operaciones.id = usuario_tiene_permiso.id_operacion AND 
 permisos.id = usuario_tiene_permiso.id_permiso AND 
 usuarios.ci= '".$_SESSION['cedula_usu']."' AND 
 operaciones.id='28' AND 
 permisos.id='1'";
$r28=mysql_query($sql28);
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
		<p align="center" style="color:#24A2EB;"><?php echo'Sec'.'-'. $row['nombres'].'&nbsp;'.$row['apellidos'];
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
		 if((mysql_num_rows($r2)==1)or(mysql_num_rows($r3)==1)or(mysql_num_rows($r31))){
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
		     <li><a href="#"><i class="fa fa-circle-o"></i>C&oacute;digos</a>
			<ul class="treeview-menu">
			<li><a href="reg_cod.php"><i class="fa fa-circle-o"></i>En curso</a></li>
			<li><a href="reg_cod_esp.php"><i class="fa fa-circle-o"></i>Casos especiales</a></li>
			</ul>
			</li>
		  <?php 
		  }
		  ?>
		  
		   <?php
		  if(mysql_num_rows($r3)==1){
		  ?>
		  <li><a href="listado_nosolventes.php?solvente=no"><i class="fa fa-circle-o"></i>Documentos</a></li>
		  <?php 
		  }
		  ?>
            
		   <?php
		  if(mysql_num_rows($r31)==1){
		  ?>
			<li><a href="per_estarch.php"><i class="fa fa-circle-o"></i>Archivos</a></li>
		  <?php
		  }
		  ?>
          </ul>
        </li>
		<?php 
		 }
		 ?>
  
  <?php 
  if((mysql_num_rows($r20)==1)or(mysql_num_rows($r21)==1)or
  (mysql_num_rows($r22)==1)or(mysql_num_rows($r24)==1)or
  (mysql_num_rows($r23)==1)or(mysql_num_rows($r28)==1)) {
  ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Consultas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_sec.php"><i class="fa fa-circle-o"></i>B&uacute;squedas</a></li> 
          </ul>
        </li>	
		<?php 
		}
		?>
		  <?php
		  if(mysql_num_rows($r25)==1){
		  ?>
		   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_factibilidad_sec.php"><i class="fa fa-circle-o"></i>Estad&iacute;sticas</a></li>
					   <?php
		  if (mysql_num_rows($r29)==1){
		  ?>
			<li><a href="#"><i class="fa fa-circle-o"></i>Retiros</a>
			<ul class="treeview-menu">
			<li><a href="detalles_retiros.php?retiro=integrantes"><i class="fa fa-circle-o"></i>Integrantes</a></li>
			<li><a href="detalles_retiros.php?retiro=investigacion"><i class="fa fa-circle-o"></i>Investigaci&oacute;n</a></li>
			</ul>
			</li>
		   <?php
		  }
		  ?>
          </ul>
        </li>
		
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
            <li><a href="registro_permiso_sec.php"><i class="fa fa-circle-o"></i>Habilitar modificaciones</a></li>
          </ul>
        </li>
		<?php 
			}
			?>
			
		<?php 
		}
		?>
		
		<?php
		  if(mysql_num_rows($r17)==1){
		  ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Documentos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="listado_nosolventes.php?solvente=no"><i class="fa fa-circle-o"></i>Modificar</a></li>
          </ul>
        </li>
		<?php 
		}
		?>
		
		<?php
		if(mysql_num_rows($r30)==1){
		?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Solvencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li>
			<a href="#"><i class="fa fa-circle-o"></i>Consultar</a>
			<ul class="treeview-menu">
			<li><a href="listado_solventes.php?solvente=si"><i class="fa fa-circle-o"></i>Solventes</a></li>
			<li><a href="listado_nosolventes.php?solvente=no"><i class="fa fa-circle-o"></i>No solventes</a></li>
			</ul>
			</li>
            <li><a href="consulta_solvencia.php"><i class="fa fa-circle-o"></i>Generar reportes</a></li>
          </ul>
        </li>
		<?php
		}
		?>
           </li> </ul>
       
    </section>
    <!-- /.sidebar -->
  </aside>