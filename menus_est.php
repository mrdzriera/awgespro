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
			
			//observaciones de planilla de inscripcion
			$mysql="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_opinion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND 
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_opinion.obs_coord!='' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' OR
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_opinion.obs_tutor!='' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_opinion.obs_esp1!='' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_opinion.obs_esp2!='' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_opinion.obs_esp3!='' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			inscripcion='No Visto'";
			$query=mysql_query($mysql);
			//echo $mysql;
			$cont=mysql_num_rows($query);
			$data=mysql_fetch_array($query);
			
			//fin
			
			//observaciones en documentos
			$mysql6="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_documento,proyectos_tiene_notificacion WHERE estudiante.id=est_tiene_proy.id_estudiante1 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			observaciones!='' AND
			documento='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			observaciones!='' AND
			documento='No Visto' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_documento.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' AND
			observaciones!='' AND
			documento='No Visto'";
			$query6=mysql_query($mysql6);
		    //echo $mysql6;
			$cont6=mysql_num_rows($query6);
			$data6=mysql_fetch_array($query6);
			//fin
			
			//factibilidad
			$mysql7="SELECT proyectos.id,proyectos.factibilidad FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_notificacion WHERE estudiante.id=est_tiene_proy.id_estudiante1 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND	
			proyectos.id_anio='".$trae['id']."' AND 
			proyectos.factibilidad='Factible' AND 
			proyectos_tiene_notificacion.factibilidad='No Visto' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND	
			proyectos.id_anio='".$trae['id']."' AND 
			proyectos.factibilidad='Factible' AND 
			proyectos_tiene_notificacion.factibilidad='No Visto' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND 
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND	
			proyectos.id_anio='".$trae['id']."' AND 
			proyectos.factibilidad='Factible' AND 
			proyectos_tiene_notificacion.factibilidad='No Visto' AND 
			estudiante.ci='".$_SESSION['cedula_usu']."' ";
			$query7=mysql_query($mysql7);
			//echo $mysql7;
			$cont7=mysql_num_rows($query7);
			$data7=mysql_fetch_array($query7);
			//fin
			
			//asignacion de codigos
			$mysql8="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos.codigo!='' AND
			proyectos_tiene_notificacion.codigo='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query8=mysql_query($mysql8);
			//echo $mysql7;
			$cont8=mysql_num_rows($query8);
			$data8=mysql_fetch_array($query8);
			//fin
			
			//presentacion 1
			$mysql9="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='1' AND
			presentacion1='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='1' AND
			presentacion1='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='1' AND
			presentacion1='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'	";
			$query9=mysql_query($mysql9);
			//echo $mysql7;
			$cont9=mysql_num_rows($query9);
			$data9=mysql_fetch_array($query9);
			//fin
			
			//especialistas asignados
			$mysql10="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_comite,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			jurados='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			jurados='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_comite.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			id_comite1!='0' AND
			jurados='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query10=mysql_query($mysql10);
			//echo $mysql7;
			$cont10=mysql_num_rows($query10);
			$data10=mysql_fetch_array($query10);
			//fin
			
			//evaluacion 1
			$mysql11="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion1='No Visto' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion1='No Visto' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion1='No Visto' AND
			fase='1' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query11=mysql_query($mysql11);
			//echo $mysql7;
			$cont11=mysql_num_rows($query11);
			$data11=mysql_fetch_array($query11);
			//fin
			
			//socializacion
			$mysql12="SELECT * FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_socializacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			socializacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			socializacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_socializacion.fecha!='0000-00-00' AND
			socializacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query12=mysql_query($mysql12);
			//echo $mysql12;
			$cont12=mysql_num_rows($query12);
			$data12=mysql_fetch_array($query12);
			//fin
			
			//presentacion 2
			$mysql13="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='2' AND
			presentacion2='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' ";
			$query13=mysql_query($mysql13);
			//echo $mysql13;
			$cont13=mysql_num_rows($query13);
			$data13=mysql_fetch_array($query13);
			//fin
			
			//presentacion 3
			$mysql14="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,defensas,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=defensas.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			defensas.fecha!='0000-00-00' AND
			modulo='3' AND
			presentacion3='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query14=mysql_query($mysql14);
			//echo $mysql15;
			$cont14=mysql_num_rows($query14);
			$data14=mysql_fetch_array($query14);
			//fin
			
			//evaluacion 2
			$mysql15="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion2='No Visto' AND
			fase='2' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' ";
			$query15=mysql_query($mysql15);
			//echo $mysql15;
			$cont15=mysql_num_rows($query15);
			$data15=mysql_fetch_array($query15);
			//fin
			
			//evaluacion 3
			$mysql16="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,evaluacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=evaluacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evaluacion3='No Visto' AND
			fase='3' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query16=mysql_query($mysql16);
			//echo $mysql16;
			$cont16=mysql_num_rows($query16);
			$data16=mysql_fetch_array($query16);
			
			//culminacion
			$mysql17="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_culminacion,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			proyectos_tiene_culminacion.fecha!='0000-00-00' AND
			culminacion='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query17=mysql_query($mysql17);
			//echo $mysql16;
			$cont17=mysql_num_rows($query17);
			$data17=mysql_fetch_array($query17);
			//fin	
			
			//evaluacion final
			$mysql18="SELECT proyectos.id FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_eva_def,proyectos_tiene_notificacion WHERE 
			estudiante.id=est_tiene_proy.id_estudiante1 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante2 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."' OR 
			estudiante.id=est_tiene_proy.id_estudiante3 AND
			proyectos.id=est_tiene_proy.id_proyecto AND 
			proyectos.id=proyectos_tiene_eva_def.id_proyecto AND 
			proyectos.id=proyectos_tiene_notificacion.id_proyecto AND
			proyectos.id_anio='".$trae['id']."' AND
			cal_c!='0' AND
			evadef='No Visto' AND
			estudiante.ci='".$_SESSION['cedula_usu']."'";
			$query18=mysql_query($mysql18);
			//echo $mysql18;
			$cont18=mysql_num_rows($query18);
			$data18=mysql_fetch_array($query18);
			//fin
			$contt=$cont+$cont6+$cont7+$cont8+$cont9+$cont10+$cont11+$cont12+$cont13+$cont14+$cont15+$cont16+$cont17+$cont18;

			?>
          <li class="dropdown messages-menu">
            <a href="index3.php">
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
                            
                <li><a href="manual_est.php"> Manual </a></li>
                <li><a href="contacto_est.php"> Contacto</a></li>
              
                   </ul>
            </li>
          </li>
		  
			<?php
           if((mysql_num_rows($query)>0)or(mysql_num_rows($query6)>0)
				or(mysql_num_rows($query7)>0)or(mysql_num_rows($query8)>0)or(mysql_num_rows($query9)>0)
				or(mysql_num_rows($query10)>0)or(mysql_num_rows($query11)>0)or(mysql_num_rows($query12)>0)
				or(mysql_num_rows($query13)>0)or(mysql_num_rows($query14)>0)or(mysql_num_rows($query15)>0)
				or(mysql_num_rows($query16)>0)or(mysql_num_rows($query17)>0)or(mysql_num_rows($query18)>0)){
			?>
			         		          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger"><?php echo $contt?></span>
             <i class="fa fa-envelope"></i>
              <span class="hidden-xs">Notificaciones</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                    <p class="green"></p>
                    </li>
					<?php
					if(($contt<=3)and($contt>0)){
					if(mysql_num_rows($query)>0){ 
					?>
					<li><a href="reporte_obs.php?id=<?php echo $data['id']; ?>">Correcciones en planilla de inscripci&oacute;n</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query7)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=factibilidad&id=<?php echo $data7['id']; ?>">Su proyecto es <?php echo $data7['factibilidad'];?></a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query8)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=codigo&id=<?php echo $data8['id']; ?>">Su proyecto tiene c&oacute;digo asignado</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query10)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=jurados&id=<?php echo $data10['id']; ?>">Jurado evaluador asignado</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query9)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $data9['id'];?>&modulo=1">Fecha de Presentaci&oacute;n 1 asignada</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query13)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $data13['id'];?>&modulo=2">Fecha de Presentaci&oacute;n 2 asignada</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query14)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=presentaciones&id=<?php echo $data14['id'];?>&modulo=3">Fecha de Presentaci&oacute;n 3 asignada</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query11)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $data11['id']; ?>&modulo=1">Evaluaciones Realizadas</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query15)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $data15['id']; ?>&modulo=2">Evaluaciones Realizadas</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query16)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=evaluaciones&id=<?php echo $data16['id']; ?>&modulo=3">Evaluaciones Realizadas</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query12)>0){ 
					?>
					<li><a href="ver_observaciones.php?obs=socializacion&id=<?php echo $data12['id']; ?>">Socializaci&oacute;n Asignada</a></li>	
					<?php 
					} 
					?>
					<?php
					if(mysql_num_rows($query18)>0){
					?>
					<li><a href="ver_observaciones.php?obs=evadef&id=<?php echo $data18['id']; ?>">Evaluaci&oacute;n final cargada</a></li>	
			        <?php 
					}
					?>
					<?php
					if(mysql_num_rows($query6)>0){
					?>
					<li><a href="ver_observaciones.php?obs=documentos&id=<?php echo $data6['id']; ?>">Correcciones en documentos</a></li>	
			        <?php 
					}
					?>
					<?php
					if(mysql_num_rows($query17)>0){
					?>
					<li><a href="ver_observaciones.php?obs=culminacion&id=<?php echo $data17['id']; ?>">Culminaci&oacute;n registrada</a></li>	
			        <?php 
					}
					?>
					<?php
					}else if($contt>3){
					?>
					<li><a href="detallar_notificaciones.php">(Visualizar todas Las notificaciones.)</a></li>
					<?php 
					}
					?>
                   </ul>
            </li>
			<?php 
			}
			?>

				   
            </li>
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
$sql="select * from estudiante, usuarios where estudiante.ci = usuarios.ci and usuarios.ci='".$_SESSION['cedula_usu']."' ";
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
				  }	
				  ?> - Estudiante
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="bus_usuarioest.php" class="btn btn-default btn-flat"> 
                  <i class="fa fa-user"></i> Perfil</a>
                </div>

                <div class="pull-left">
                  <a href="tema_est.php" class="btn btn-default btn-flat"> <i class="fa fa-cog"></i> Personalizar </a>
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