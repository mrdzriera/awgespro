<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
<?php
require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 

$mysql="SELECT * FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
nivel='Estudiante' AND usuarios.status='Bloqueado' ";
$r1=mysql_query($mysql);
$cont1=mysql_num_rows($r1);
	
$mysql2="SELECT * FROM profesores,usuarios WHERE 
profesores.ci=usuarios.ci AND 
usuarios.status='Bloqueado' ";
$r2=mysql_query($mysql2);
$cont2=mysql_num_rows($r2);	
	
$mysql3="SELECT * FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
 nivel='Secretario' AND usuarios.status='Bloqueado' AND usuarios.ci!='".$_SESSION['cedula_usu']."' ";
$r3=mysql_query($mysql3);
$cont3=mysql_num_rows($r3);

$sql="select * from profesores, usuarios where 
profesores.ci = usuarios.ci and 
usuarios.ci= '".$_SESSION['cedula_usu']."' and nivel='Administrador' ";
$r=mysql_query($sql);
				  //echo $sql;
$row=mysql_fetch_array($r);
?>
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
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Menu horizontal -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Inicio -->

          <li class="dropdown messages-menu">
            <a href="index2.php">
              <i class="fa fa-home"></i>
              <span class="hidden-xs">Inicio</span>
            </a>
  
            
          <!-- Ayuda -->
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
                            
                <li><a href="manual_adm.php"> Manual </a></li>
                <li><a href="contacto.php"> Contacto</a></li>
              
                   </ul>
            </li>
          </li>
         
          <!-- Mantenimiento -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i>
              <span class="hidden-xs">Mantenimiento</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
                <li><a href="verificarclave.php?opc=1"> Historial </a></li>
                <li><a href="verificarclave.php?opc=2"> Respaldar base de datos</a></li>
                <li><a href="verifica_restore.php"> Restaurar base de datos</a></li>
                <li><a href="descripcion_bd.php"> Descripci&oacute;n de base de datos</a></li>

                   </ul>
            </li>
			
			<?php
			if((mysql_num_rows($r1)>0)and(mysql_num_rows($r2)>0)and(mysql_num_rows($r3)>0)){
			?>
			          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">3</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
			   <li><a href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>
               <li><a href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php 
			}else if((mysql_num_rows($r1)>0)and(mysql_num_rows($r2)>0)){
			?>
			          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
               <li><a href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if((mysql_num_rows($r1)>0)and(mysql_num_rows($r3)>0)){
			?>
			 			        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
               <li><a href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if((mysql_num_rows($r2)>0)and(mysql_num_rows($r3)>0)){
			?>
			        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>
               <li><a href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if(mysql_num_rows($r1)>0){
			?>
					         <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificación</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiante(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php 
			}else if(mysql_num_rows($r2)>0){
			?>
			      				         <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificación</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if(mysql_num_rows($r3)>0){
			?>
			  <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificación</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
                            
               <li><a href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
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
<?php 

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
				  }	
		
		
				  ?> - Administrador
				  
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="bus_usuario.php" class="btn btn-default btn-flat"> 
                  <i class="fa fa-user"></i> Perfil</a>
                </div>

                <div class="pull-left">
                  <a href="tema_adm.php" class="btn btn-default btn-flat"> <i class="fa fa-cog"></i> Personalizar </a>
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