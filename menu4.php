  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 
$sql="select * from profesores, usuarios where profesores.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' and nivel='Coord Trayecto' ";
				  $r=mysql_query($sql);
				  //echo $sql;
				  $row=mysql_fetch_array($r);
?>
<br>
        </div>
        <div class="pull-left info">
          
        </div>
		<p align="center" style="color:#24A2EB;"><?php echo'Coord-T &nbsp;'.$row['nombres'].'&nbsp;'.$row['apellidos'];
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
            <i class="fa fa-users"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_factibilidad_ct.php"><i class="fa fa-circle-o"></i> Estad&iacute;sticas</a></li>
          </ul>
        </li>
		   <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Consultas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="consulta_defensa_ct.php"><i class="fa fa-circle-o"></i> Presentaci&oacute;n</a></li>
            <li><a href="consulta_evaluacion_ct.php"><i class="fa fa-circle-o"></i> Evaluaci&oacute;n</a></li>
            <li><a href="consulta_jurado_ct.php"><i class="fa fa-circle-o"></i> Jurados</a></li>
            <li><a href="consul_comu.php"><i class="fa fa-circle-o"></i> Comunidades</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Comit&eacute; t&eacute;cnico</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Profesores</a>
			<ul class="treeview-menu">
			<li><a href="consulta_comite.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
			<li><a href="consul_comite.php"><i class="fa fa-circle-o"></i> Consultar</a></li>
			<li><a href="proy_prof_com.php"><i class="fa fa-circle-o"></i>Proyectos asociados</a></li>
			</ul>
			</li>
            <li><a href="consulta_comite_p.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Tutores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="opc_tutor.php"><i class="fa fa-circle-o"></i> Profesores</a>
			<ul class="treeview-menu">
			<li><a href="opc_tutor.php"><i class="fa fa-circle-o"></i> Registrar</a></li>
			<li><a href="consul_comite_t.php"><i class="fa fa-circle-o"></i> Consultar</a></li>
			<li><a href="proy_prof_tut.php"><i class="fa fa-circle-o"></i>Proyectos asociados</a></li>
			</ul>
			</li>
            <li><a href="asignar_tutor.php"><i class="fa fa-circle-o"></i> Proyectos</a></li>
          </ul>
        </li>
           </li> </ul>
       
    </section>
    <!-- /.sidebar -->
  </aside>