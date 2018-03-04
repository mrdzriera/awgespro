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

$sql="SELECT * from profesores, usuarios WHERE 
profesores.ci = usuarios.ci AND
usuarios.ci= '".$_SESSION['cedula_usu']."' AND
nivel='Administrador' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);

?>
        </div>
        <div class="pull-left info">
          
  
        </div>
		<p align="center" style="color:#24A2EB;">
		<?php echo 'Adm'.'-'.$row['nombres'].'&nbsp;'.$row['apellidos']; 
		if(mysql_num_rows($r)==0){
		echo $_SESSION['nombre_usu'];	
		}
		?></p>
      </div>

       <!-- Menu vertical -->
      <ul class="sidebar-menu">
        <li class="header"> - Menu de navegaci&oacute;n -</li>
        <li class="active treeview">
               <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  
        <li>
      <a href="#"><i class="fa fa-circle-o"></i>Registros</a>
      <ul class="treeview-menu"> 
	  <li><a href="importar_excel.php"><i class="fa fa-circle-o"></i>Estudiantes</a></li>
	  <li><a href="opera_usuarios.php"><i class="fa fa-circle-o"></i>Secretarios</a></li>
      <li><a href="opera_personal.php"><i class="fa fa-circle-o"></i>Otro personal</a></li>
	  </ul>
      </li>
           
          </ul>
        </li>
           </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  
        <li>
      <a href="#"><i class="fa fa-circle-o"></i>Consultar</a>
      <ul class="treeview-menu">
      <li>
			<a href="#"><i class="fa fa-circle-o"></i>Estudiantes</a>
			<ul class="treeview-menu">
			<li><a href="filtros_estudiante.php"><i class="fa fa-circle-o"></i>Datos acad&eacute;micos</a></li>
			<li><a href="lista_activos.php?tipo=Estudiantes"><i class="fa fa-circle-o"></i>Activos</a></li>
			<li><a href="lista_bloqueados.php?tipo=Estudiantes"><i class="fa fa-circle-o"></i>Bloqueados</a></li>
			</ul>
			</li>
			    <li>
			<a href="#"><i class="fa fa-circle-o"></i>Profesores</a>
			<ul class="treeview-menu">
			<li><a href="filtros_profesores.php"><i class="fa fa-circle-o"></i>Datos acad&eacute;micos</a></li>
			<li><a href="lista_activos.php?tipo=Coordinadores"><i class="fa fa-circle-o"></i>Activos</a></li>
      <li><a href="lista_bloqueados.php?tipo=Profesores"><i class="fa fa-circle-o"></i>Bloqueados</a></li>
			</ul>
			</li>
			
				    <li>
			<a href="#"><i class="fa fa-circle-o"></i>Secretarios</a>
			<ul class="treeview-menu">
			<li><a href="lista_secretario.php"><i class="fa fa-circle-o"></i>Listado</a></li>
			<li><a href="lista_activos.php?tipo=Secretarios"><i class="fa fa-circle-o"></i>Activos</a></li>
			<li><a href="lista_bloqueados.php?tipo=Secretarios"><i class="fa fa-circle-o"></i>Bloqueados</a></li>
			</ul>
			</li>
      </ul>
      </li>
	          <li>
      <a href="modificar_usuario.php"><i class="fa fa-circle-o"></i>Modificar</a>
      </li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Permisos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="consul_privi.php?tipo=estudiante"><i class="fa fa-circle-o"></i>Estudiantes</a></li>
            <li><a href="consul_privi.php?tipo=coordinador"><i class="fa fa-circle-o"></i>Coordinadores</a></li>
            <li><a href="consul_privi.php?tipo=secretario"><i class="fa fa-circle-o"></i>Secretarios</a></li>
            <li><a href="consul_beca.php"><i class="fa fa-circle-o"></i>Becas</a></li>
          </ul>
        </li>
         
           </li> 
		<li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Coord. de trayecto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
      <li><a href="asignar_cood_tray.php?tipo=Coordinadores"><i class="fa fa-circle-o"></i>Asignar</a></li>
            <li><a href="consul_coord_tray.php"><i class="fa fa-circle-o"></i>Consultar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="consulta_factibilidad_adm.php"><i class="fa fa-circle-o"></i> Estadisticas</a></li>
            <li><a href="consulta_anio.php"><i class="fa fa-circle-o"></i> Inscripciones</a></li>
            <li><a href="consulta_linea.php"><i class="fa fa-circle-o"></i> L&iacute;neas de Investigaci&oacute;n</a></li>
     </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Consultas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consultas_adm.php"><i class="fa fa-circle-o"></i> B&uacute;squedas</a></li>
           
          </ul>
        </li>
           </li> 

           </ul>
       
    </section>
    <!-- /.sidebar -->
  </aside>