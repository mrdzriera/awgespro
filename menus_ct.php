<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
<script type="text/javascript" language="javascript">

function salir()
{
	
swal({
  title: "¿Desea cerrar sesión?",
  type: "warning",
  cancelButtonText: "Cancelar",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Aceptar",
  closeOnConfirm: false
},
function(){
window.location="cerrar_login.php";
});

}

</script>
<?php
require_once("clasedb.php"); 
$db=new clasedb(); 
$db-> conectar(); 

$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
$rs=mysql_query($select);
$trae=mysql_fetch_array($rs);


$y="SELECT * FROM profesores,pnfs,trayectos,coordinador_trayecto WHERE 
profesores.id=coordinador_trayecto.id_profesor AND
pnfs.id=coordinador_trayecto.id_pnf AND
trayectos.id=coordinador_trayecto.id_trayecto AND
ci='".$_SESSION['cedula_usu']."' ";
$yy=mysql_query($y);
$yyy=mysql_fetch_array($yy);

$sql2="SELECT * FROM estudiante,est_cursa_proy,est_tiene_proy,proyectos,tutor_tiene_proyectos,anios,pnfs,trayectos WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id=tutor_tiene_proyectos.id_proyecto AND
proyectos.id=est_tiene_proy.id_proyecto AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id_anio=anios.id AND 
pnfs.nomb_pnf='".$yyy['area_especializacion']."' AND 
trayectos.descripcion='".$yyy['descripcion']."' AND 
anios.id='".$trae['id']."' AND 
id_profesor='0' ";
$r2=mysql_query($sql2);
$cont2=mysql_num_rows($r2);

if($cont2>0){
$p2=1;	
}else{
$p2=0;	
}

$x="SELECT * FROM profesores WHERE ci='".$_SESSION['cedula_usu']."' ";
$y=mysql_query($x);
$z=mysql_fetch_array($y);

$sql3="SELECT estudiante.nombres,estudiante.apellidos, proyectos.id AS'id_proyecto',anios.id AS 'id_anio'
FROM anios,pnfs,estudiante,est_cursa_proy,est_tiene_proy,proyectos,proyectos_tiene_comite,coordinador_trayecto, profesores
WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND
proyectos.id=proyectos_tiene_comite.id_proyecto AND
anios.estado='Habilitado' AND
factibilidad='' AND codigo='' AND 
id_comite1='0' AND 
id_comite2='0' AND
id_comite3='0' AND 
nomb_pnf='".$z['area_especializacion']."' AND 
coordinador_trayecto.id_profesor=profesores.id AND
coordinador_trayecto.id_trayecto=est_cursa_proy.id_trayecto AND
proyectos.id_anio=anios.id AND
profesores.ci='".$_SESSION['cedula_usu']."' ";
$r3=mysql_query($sql3);
$cont3=mysql_num_rows($r3);

if($cont3>0){
$p3=1;	
}else{
$p3=0;	
}
?>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Menu horizontal -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Inicio-->

          <li class="dropdown messages-menu">
            <a href="index5.php">
              <i class="fa fa-home"></i>
              <span class="hidden-xs">Inicio</span>
            </a>
            
          
               <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-question-circle"></i>
             <span class="hidden-xs">Ayuda</span>
            </a>
           
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
                <li><a href="manual_ct.php"> Manual </a></li>
                <li><a href="contacto_ct.php"> Contacto</a></li>
              
                   </ul>
            </li>
			
			<?php
           if((mysql_num_rows($r2)>0)or(mysql_num_rows($r3)>0)){
			?>
			            <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger"><?php echo $p2+$p3;?></span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell" title="Notificaciones"></i></span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
					<?php
					if(mysql_num_rows($r2)>0){
					?>
					<li><a class="message-notification" href="asignar_tutor.php">Debe asignar tutor a <?php echo $cont2;?> proyecto(s)</a></li>	
			        <?php 
					}
					?>
					<?php
					if(mysql_num_rows($r3)>0){
					?>
					<li><a class="message-notification" href="consulta_comite_p.php">Debe asignar jurado a <?php echo $cont3;?> proyecto(s)</a></li>	
			        <?php 
					}
					?>          
                   </ul>
            </li>
			<?php 
			}
			?>
           
          </li> 
		  		  <li class="dropdown tasks-menu">
            <a align="left" target="_self" onclick="salir();" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-power-off"></i>
              <span class="hidden-xs">Salir</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php 
require_once("clasedb.php"); 
$db=new clasedb(); 
$db-> conectar(); 
$sql="select * from profesores, usuarios where 
profesores.ci = usuarios.ci and 
usuarios.ci='".$_SESSION['cedula_usu']."' 
and nivel='Coord Trayecto' ";
				  $r=mysql_query($sql);
				  //echo $sql;
				  $row=mysql_fetch_array($r);
			if(($row['foto']=='')or($row['foto']=='fotousuarios/')){
	?>
	<img src="imagenes/user.png" style='' class="user-image" alt="User Image">
	<?php
}else{
echo "<img src='".$row['foto']."' style='' class='user-image' alt='User Image'> ";
}
?>
              <span class="hidden-xs">
			  <?php 
				if(mysql_num_rows($r)>0){
				  echo $row['nombres'].'&nbsp;'.$row['apellidos'] ;
				  }else{
					echo $_SESSION['nombre_usu'];	  
				  }	?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  <?php			
			if(($row['foto']=='')or($row['foto']=='fotousuarios/')){
	?>
	<img src="imagenes/user.png" class="img-circle" alt="User Image">
	<?php
}else{
echo "<img src='".$row['foto']."' class='img-circle' alt='User Image'>";
}
?>
                <p>
                  <?php  
				  if(mysql_num_rows($r)>0){
				  echo $row['nombres'].'&nbsp;'.$row['apellidos'] ;
				  }else{
					echo $_SESSION['nombre_usu'];	  
				  }	?> - Coordinador de Trayecto
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="bus_usuarioct.php" class="btn btn-default btn-flat"> 
                  <i class="fa fa-user"></i> Perfil</a>
                </div>

                <div class="pull-left">
                  <a href="tema_ct.php" class="btn btn-default btn-flat"> <i class="fa fa-cog"></i> Personalizar </a>
                </div>
				
				 <div class="pull-left">
                  <a href="validaclave.php" class="btn btn-default btn-flat"> <i class="fa fa-lock"></i> Clave </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>