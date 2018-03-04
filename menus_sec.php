<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
<script type="text/javascript" language="javascript">
<?php
require_once("clasedb.php");
$db=new clasedb(); 
$db-> conectar(); 

$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
$rs=mysql_query($select);
$trae=mysql_fetch_array($rs);

$mysql="SELECT * FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
nivel='Estudiante' AND usuarios.status='Bloqueado' ";
$r1=mysql_query($mysql);
$cont1=mysql_num_rows($r1);

if($cont1>0){
$p1=1;	
}else{
$p1=0;	
}

$mysql2="SELECT * FROM profesores,usuarios WHERE 
profesores.ci=usuarios.ci AND 
usuarios.status='Bloqueado'";
$r2=mysql_query($mysql2);
$cont2=mysql_num_rows($r2);	

if($cont2>0){
$p2=1;	
}else{
$p2=0;	
}

$mysql3="SELECT * FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
 nivel='Secretario' AND usuarios.status='Bloqueado' AND usuarios.ci!='".$_SESSION['cedula_usu']."' ";
$r3=mysql_query($mysql3);
$cont3=mysql_num_rows($r3);

if($cont3>0){
$p3=1;	
}else{
$p3=0;	
}

$mysql4="SELECT * FROM estudiante,pnfs,trayectos,sedes,anios,est_cursa_proy,proyectos,est_tiene_proy WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=est_cursa_proy.id_anio AND
proyectos.id_anio=anios.id AND 
proyectos.id=est_tiene_proy.id_proyecto AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
anios.id='".$trae['id']."' AND
factibilidad='Factible' AND 
codigo='' ";
$r4=mysql_query($mysql4);
$row4=mysql_fetch_array($r4);
$cont4=mysql_num_rows($r4);

if($cont4>0){
$p4=1;	
}else{
$p4=0;	
}
?>
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
            <a href="index6.php">
              <i class="fa fa-home"></i>
              <span class="hidden-xs">Inicio</span>
            </a>
            
          
          <!-- Tasks: style can be found in dropdown.less -->
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
                            
                <li><a href="manual_sec.php"> Manual </a></li>
                <li><a href="contacto_sec.php"> Contacto</a></li>
              
                   </ul>
            </li>
          </li>
		  
		  <?php
			if((mysql_num_rows($r1)>0)or(mysql_num_rows($r2)>0)or(mysql_num_rows($r3)>0)or(mysql_num_rows($r4)>0)){
			?>
			          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger"><?php echo $p1+$p2+$p3+$p4;?></span>
             <i class="fa fa-bell"></i>
               <span class="hidden-xs">Notificaciones</span>
              </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
               <?php
				if(mysql_num_rows($r1)>0){
				?>
               <li><a href="lista_bloqueados_sec.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
			   <?php 
				}
				?>
				<?php
				if(mysql_num_rows($r2)>0){
				?>
			   <li><a href="lista_bloqueados_sec.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>
                 <?php 
				}
				?>
				<?php
				if(mysql_num_rows($r3)>0){
				?>
			   <li><a href="lista_bloqueados_sec.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>	  <?php 
				}
				?>	
					<?php
				if(mysql_num_rows($r4)>0){
				?>
			   <li><a href="detallar_notificaciones_sec.php">Hay <?php echo $cont4;?> proyecto(s) pendientes por asignar c&oacute;digo</a></li>	  
			   <?php 
				}
				?>	

                   </ul>
           <?php 
			}
			?>
			
		  		  <li class="dropdown tasks-menu">
            <a align="left" target="_self" onclick="salir();" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-power-off"></i>
              <span class="hidden-xs">Salir</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 
$sql="select * from secretarios, usuarios where secretarios.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' ";
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
              <span class="hidden-xs"> <?php 

					echo $row['nombres'].'&nbsp;'.$row['apellidos'] ; 
					if(mysql_num_rows($r)==0){
		echo $_SESSION['nombre_usu'];	
		}
					?></span>
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
				  }	?> - Secretario
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="bus_usuariosec.php" class="btn btn-default btn-flat"> 
                  <i class="fa fa-user"></i> Perfil</a>
                </div>

                <div class="pull-left">
                  <a href="tema_sec.php" class="btn btn-default btn-flat"> <i class="fa fa-cog"></i> Personalizar </a>
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