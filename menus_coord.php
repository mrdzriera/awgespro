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
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Menu horizontal -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Inicio-->
			<?php
			require_once("clasedb.php"); 
			$db=new clasedb(); 
			$db-> conectar(); 
			
			$select="SELECT id,periodo FROM anios WHERE periodo=(SELECT MAX(periodo)AS'anio' FROM anios) ";
			$rs=mysql_query($select);
			$trae=mysql_fetch_array($rs);
			
			$mysql3="select * from profesores,proyectos,anios,coord_tiene_proy,proyectos_tiene_opinion WHERE 
			anios.id=proyectos.id_anio AND
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=coord_tiene_proy.id_proyecto AND
			profesores.id=coord_tiene_proy.id_profesor AND
			opn_coord='0' AND
			profesores.ci='".$_SESSION['cedula_usu']."' ";
			$query3=mysql_query($mysql3);
			$cont3=mysql_num_rows($query3);
			$data3=mysql_fetch_array($query3);
			
			$mysql4="select * from profesores,proyectos,anios,tutor_tiene_proyectos,proyectos_tiene_opinion WHERE 
			anios.id=proyectos.id_anio AND
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=tutor_tiene_proyectos.id_proyecto AND
			profesores.id=tutor_tiene_proyectos.id_profesor AND
			opn_tutor='0' AND
			id_anio='".$trae['id']."' AND
			profesores.ci='".$_SESSION['cedula_usu']."' ";
			$query4=mysql_query($mysql4);
			//echo $mysql4;
			$cont4=mysql_num_rows($query4);
			$data4=mysql_fetch_array($query4);
			
			$mysql5="select * from profesores,proyectos,anios,proyectos_tiene_comite,proyectos_tiene_opinion WHERE 
			anios.id=proyectos.id_anio AND
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite1 AND
			opn_esp1='0' AND
			id_anio='".$trae['id']."' AND
			profesores.ci='".$_SESSION['cedula_usu']."' OR 
			anios.id=proyectos.id_anio AND
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite2 AND
			opn_esp2='0' AND
			id_anio='".$trae['id']."' AND
			profesores.ci='".$_SESSION['cedula_usu']."' OR 
			anios.id=proyectos.id_anio AND
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			profesores.id=proyectos_tiene_comite.id_comite3 AND
			opn_esp3='0' AND
			id_anio='".$trae['id']."' AND
			profesores.ci='".$_SESSION['cedula_usu']."'";
			$query5=mysql_query($mysql5);
			$cont5=mysql_num_rows($query5);
			$data5=mysql_fetch_array($query5);
		  ?>
          <li class="dropdown messages-menu">
            <a href="index4.php">
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
                            
                <li><a href="manual_coord.php"> Manual </a></li>
                <li><a href="contacto_coord.php"> Contacto</a></li>
              
                   </ul>
            </li>
			
			<?php
           if((mysql_num_rows($query3)>0)or(mysql_num_rows($query4)>0)or(mysql_num_rows($query5)>0)){
			?>
			            <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger"><?php echo $cont+$cont2+$cont3+$cont4+$cont5;?></span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
					<?php
					if(mysql_num_rows($query3)>0){
					?>
					<li><a href="controlador_opiniones.php?profesor=Coordinador">Coordinador debe asignar factibilidad a <?php echo $cont3;?> proyectos</a></li>	
			        <?php 
					}
					?>
					<?php
					if(mysql_num_rows($query4)>0){
					?>
					<li><a href="controlador_opiniones.php?profesor=Tutor">Tutor debe asignar factibilidad a <?php echo $cont4;?> proyectos</a></li>	
			        <?php 
					}
					?>
					<?php
					if(mysql_num_rows($query5)>0){
					?>
					<li><a href="controlador_opiniones.php?profesor=Especialista">Especialista debe asignar factibilidad a <?php echo $cont5;?> proyectos</a></li>	
			        <?php 
					}
					?>
              
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
<?php require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 
$sql="select * from profesores, usuarios where profesores.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' and nivel='Coordinador' ";
				  $r=mysql_query($sql);
				  //echo $sql;
				  $row=mysql_fetch_array($r);
			if(($row['foto']=='')or($row['foto']=='fotousuarios/')){
	?>
	<img src="imagenes/user.png" class="user-image" alt="User Image"> 
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
				  ?> - Coordinador
                </p>
              </li>
			  

             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="bus_usuariocoord.php" class="btn btn-default btn-flat"> 
                  <i class="fa fa-user"></i> Perfil</a>
                </div>

                <div class="pull-left">
                  <a href="tema_coord.php" class="btn btn-default btn-flat"> <i class="fa fa-cog"></i> Personalizar </a>
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