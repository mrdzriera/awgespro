<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Estudiante'){
  ?>
<script language="javascript">
window.location="index.php";
</script>
<?php  
}
?>
<!DOCTYPE html>
<script type="text/javascript" language="javascript">


  function salir()
  {
  
      if(confirm("¿Desea Salir?")){
      document.location.href='cerrar_login.php';
      }else{
        
      }
    }

</script>
<html lang="en">
<head>
<link href="awgespro.ico" type="image/x-icon" rel="shorcut icon"/>
  <style type="text/css">
  
  .Estilo1{
    
    color:#FFFFFF;
    font-weight:bold;
  }
  
  .Estilo3{ font-family:Arial, Heviltica, sen-serif; }
  
  .Estilo4{ 
  font-family:Arial, Heviltica, sen-serif;
  font-weight:bold; 
  font-size:24px;
  }
  
  </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Awgespro</title>
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="font-awesome/css/font-awesome.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="_all-skins.min.css">
  
  <script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
      <img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
  <aside> 

  <?php include ("menus_est.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu2.php"); ?>

</aside>        
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Notificaciones      
      </h1>
      
    </section>
            <section class="content">
      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">
			 <?php
			 $id=$_GET['id'];
			$obs=$_GET['obs'];
			$modulo=$_GET['modulo'];
			
			if($obs=='documentos'){

			 echo"Correcciones de Documentos de Proyecto";
				
			 }else if($obs=='factibilidad'){

			 echo"Factibilidad de Proyecto";
				
			 }else if($obs=='codigo'){

			 echo"C&oacute;digo de Proyecto";
				
			 }else if($obs=='presentaciones'){

			 echo"Presentaciones de Proyecto";
				
			 }else if($obs=='jurados'){

			 echo"Jurados de Proyecto";
				
			 }else if(($obs=='evaluaciones')or($obs=='evadef')){

			 echo"Evaluaciones de Proyecto";
				
			 }else if($obs=='socializacion'){

			 echo"Socializaci&oacute;n de Proyecto";
				
			 }else if($obs=='culminacion'){

			 echo"Culminaci&oacute;n de Proyecto";
				
			 }
			  ?>
			  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 <?php
 
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  
extract($_REQUEST);
mysql_query("SET NAMES 'utf8'");
 
if($obs=='documentos'){

$sql="SELECT * FROM proyectos,proyectos_tiene_documento WHERE 
proyectos.id=proyectos_tiene_documento.id_proyecto AND
proyectos.id='".$id."' ";

$query="UPDATE proyectos_tiene_notificacion SET documento='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($obs=='factibilidad'){

$sql="SELECT * FROM proyectos WHERE proyectos.id='".$id."' ";

$query="UPDATE proyectos_tiene_notificacion SET factibilidad='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);	

}else if($obs=='codigo'){

$sql="SELECT * FROM proyectos WHERE proyectos.id='".$id."' AND codigo!='' ";

$query="UPDATE proyectos_tiene_notificacion SET codigo='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);
	
}else if($obs=='presentaciones'){

$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy,defensas WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=defensas.id_proyecto AND 
proyectos.id_anio='".$trae['id']."' AND
defensas.fecha!='0000-00-00' AND
proyectos.id='".$id."' AND modulo='".$modulo."' ";

if($modulo==1){
$query="UPDATE proyectos_tiene_notificacion SET presentacion1='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($modulo==2){
$query="UPDATE proyectos_tiene_notificacion SET presentacion2='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($modulo==3){
$query="UPDATE proyectos_tiene_notificacion SET presentacion3='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);
}

}else if($obs=='jurados'){

$sql="SELECT titulo,profesores.nombres,profesores.apellidos FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_comite,profesores WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite1 AND 
proyectos.id_anio='".$trae['id']."' AND
id_comite1!='0' AND
proyectos.id='".$id."' ";

$sql2="SELECT profesores.nombres,profesores.apellidos FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_comite,profesores WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_comite.id_proyecto AND 
profesores.id=proyectos_tiene_comite.id_comite2 AND 
proyectos.id_anio='".$trae['id']."' AND
id_comite2!='0' AND
proyectos.id='".$id."' ";
$r2=mysql_query($sql2);;
$row2=mysql_fetch_array($r2);

$sql3="SELECT profesores.nombres,profesores.apellidos FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_comite,profesores WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_comite.id_proyecto AND 
profesores.id=proyectos_tiene_comite.id_comite3 AND
proyectos.id_anio='".$trae['id']."' AND
id_comite3!='0' AND
proyectos.id='".$id."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);

$query="UPDATE proyectos_tiene_notificacion SET jurados='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($obs=='evaluaciones'){

$sql="SELECT * FROM estudiante,proyectos,est_tiene_proy,evaluacion WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=evaluacion.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
cal_c!='0' AND
proyectos.id='".$id."' AND 
fase='".$modulo."' ";

if($modulo==1){
$query="UPDATE proyectos_tiene_notificacion SET evaluacion1='Visto' WHERE id_proyecto='".$id."'  ";
mysql_query($query);

}else if($modulo==2){
$query="UPDATE proyectos_tiene_notificacion SET evaluacion2='Visto' WHERE id_proyecto='".$id."'  ";
mysql_query($query);

}else if($modulo==3){
$query="UPDATE proyectos_tiene_notificacion SET evaluacion3='Visto' WHERE id_proyecto='".$id."'  ";
mysql_query($query);
}

}else if($obs=='socializacion'){

$sql="SELECT *,((cal_c+cal_t+cal_e1+cal_e2+cal_e3+cal_com)/6)AS'cal' FROM estudiante,proyectos,est_tiene_proy,proyectos_tiene_socializacion,proyectos_tiene_eva_def WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_socializacion.id_proyecto AND
proyectos.id=proyectos_tiene_eva_def.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
proyectos_tiene_socializacion.fecha!='0000-00-00' AND
proyectos.id='".$id."' ";

$query="UPDATE proyectos_tiene_notificacion SET socializacion='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($obs=='evadef'){

$sql="SELECT *,((cal_c+cal_t+cal_e1+cal_e2+cal_e3+cal_com)/6)AS'cal' FROM 
estudiante,proyectos,est_tiene_proy,proyectos_tiene_eva_def WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_eva_def.id_proyecto AND
proyectos.id=proyectos_tiene_eva_def.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
proyectos_tiene_eva_def.cal_c!='0' AND
proyectos.id='".$id."' ";

$query="UPDATE proyectos_tiene_notificacion SET evadef='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);

}else if($obs=='culminacion'){

$sql="SELECT titulo,id_culminacion,proyectos_tiene_culminacion.fecha FROM
 estudiante,proyectos,est_tiene_proy,proyectos_tiene_culminacion WHERE 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND
proyectos.id_anio='".$trae['id']."' AND
proyectos_tiene_culminacion.fecha!='0000-00-00' AND
proyectos.id='".$id."' ";

$query="UPDATE proyectos_tiene_notificacion SET culminacion='Visto' WHERE id_proyecto='".$id."' ";
mysql_query($query);
}

$r=mysql_query($sql);

?>
				<center>
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th><center>Titulo de Proyecto:</center></th>
				 <?php
				 if($obs=="documentos"){
				 ?>
				 <th><center>Observaciones:</center></th>
				 <?php
				 }else if($obs=="factibilidad"){
				 ?>
				 <th><center>Factibilidad:</center></th>
				 <?php 
				 }else if($obs=="codigo"){
				 ?>
				 <th><center>C&oacute;digo:</center></th>
				 <?php 
				 }else if($obs=="presentaciones"){
				 ?>
				 <th><center>Fecha:</center></th>
				 <th><center>Hora:</center></th>
				 <th><center>Lugar:</center></th>
				 <th><center>M&oacute;dulo:</center></th>
				 <?php 
				 }else if($obs=="jurados"){
				 ?>
				<th><center>Jurado(s) Asignad(o)s:</center></th>
				 <?php
				 }else if($obs=="evaluaciones"){
				 ?>
				<th><center>Calificaci&oacute;n obtenida:</center></th>
				<th><center>M&oacute;dulo:</center></th>
				 <?php
				 }else if($obs=="socializacion"){
				 ?>
				 <th><center>Fecha:</center></th>
				 <th><center>Hora:</center></th>
				 <th><center>Lugar:</center></th>
				 <th><center>Calificaci&oacute;n obtenida:</center></th>
				 <?php
				 }else if($obs=="evadef"){
				 ?>
				 <th><center>Calificaci&oacute;n obtenida:</center></th>
				 <?php 
				 }else if($obs=="culminacion"){
				 ?>
				 <th><center>Estado:</center></th>
				 <th><center>Fecha de culminaci&oacute;n:</center></th>
				 <?php 
				 }
				 ?>
                </tr>
                </thead>
                <tbody>
                <?php 
                $row=mysql_fetch_array($r);
				$dia=substr($row['fecha'],8,2)."-";
				$mes=substr($row['fecha'],5,2)."-";
				$anio=substr($row['fecha'],0,4);
				$fecha=$dia.$mes.$anio;
                for($i=0; $i<$row;$i++){
                    ?>
                 <tr>
				<td><p align='justify'><?php echo $row['titulo'];?></p></td>
				<?php 
					if($obs=='documentos'){
				
					if($row['observaciones']!=""){
					echo '<td><p align="justify">'.$row['observaciones'].'</p></td>';	
					
					}
				
					}else if($obs=='factibilidad'){
			
					echo '<td><p align="justify">'.$row['factibilidad'].'</p></td>';	
					
					}else if($obs=='codigo'){
			
					echo '<td><p align="center">'.$row['codigo'].'</p></td>';	
					
					}else if($obs=='presentaciones'){
			
					echo "<td><p align='center'>".$fecha."</p></td>";	
					echo "<td><p align='center'>".$row['hora_entrada']."</p></td>";	
					echo "<td><p align='center'>".$row['lugar']."</p></td>";	
					echo "<td><p align='center'>".$row['modulo']."</p></td>";	
					
					}else if($obs=='jurados'){
			
					echo "<td><p align='center'>".$row['nombres'].'&nbsp;'.$row['apellidos'];	
					
					if(mysql_num_rows($r2)>0){
					echo "<br><p align='center'>".$row2['nombres'].'&nbsp;'.$row2['apellidos']."</p>";
					}
					
					if(mysql_num_rows($r3)>0){
					echo "<p align='center'>".$row3['nombres'].'&nbsp;'.$row3['apellidos']."</p>";
					}
					
					echo"</p></td>";
					
					}else if($obs=="evaluaciones"){
						
					echo "<td><p align='center'>".number_format((($row['cal_c']+$row['cal_t']+$row['cal_e'])/3),0,".",",").'</p></td>';
					echo "<td><p align='center'>".$row['fase'].'</p></td>';
						
					}else if($obs=="socializacion"){
						
					
					echo "<td><p align='center'>".$fecha."</p></td>";	
					echo "<td><p align='center'>".$row['hora_entrada']."</p></td>";	
					echo "<td><p align='center'>".$row['lugar']."</p></td>";	
			
				    if($row['cal']==0){
				    echo "<td><p align='center'>Sin evaluar</p></td>";	
					}else{
				    echo "<td><p align='center'>".number_format($row['cal'],0,".",",")."</p></td>";		
					}
					?>											
                    </tr>
					<?php
					}else if($obs=="evadef"){
					if($row['cal']==0){
				    echo "<td><p align='center'>Sin evaluar</p></td>";	
					}else{
				    echo "<td><p align='center'>".number_format($row['cal'],0,".",",")."</p></td>";		
					}
					
					}else if($obs=="culminacion"){
					
					if($row['id_culminacion']==3){
					echo "<td><p align='center'>Culminado</p></td>";		
					}else if($row['id_culminacion']==4){
					echo "<td><p align='center'>No Culminado</p></td>";		
					}
					
					echo "<td><p align='center'>".$row['fecha']."</p></td>";	
					
					}
					?>
                  </tr>
                  <?php  
				  $row=mysql_fetch_array($r);
                   } 
				   ?>
                </tbody>
              
              </table>
			  </center>
              <br>

			  <center>
                  
             <button type="button" class=" btn btn-info"> <i class="fa fa-reply" aria-hidden="true"></i> <a href="detallar_notificaciones.php" style="color:white;"> Volver </a> </button>

             </center>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
  </div>
  

<?php
include("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
   </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap.min.js"></script>
<!-- DataTables -->
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="fastclick.js"></script>
<!-- AdminLTE App -->
<script src="app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
