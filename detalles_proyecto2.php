<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
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

  <?php include ("menus_coord.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu3.php"); ?>

</aside>        
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Proyectos/Consultar    
      </h1>
      
    </section>

<section class="content">


         <div class="col-md-12 col-md-offset-0">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="detalles_proyecto2.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                 <center><div class="form-group">
                
                      <h5 align="center"><b>A&ntilde;o</b>(<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">)</h5>
                      <select name="anio" id="anio" class="form-control" style="width:500px;" required>
                      <option value="">Seleccione una opci&oacute;n</option>
                      <?php 
                      require_once("clasedb.php");
                      $db= new clasedb();
                      $db->conectar();
                      $sql="SELECT DISTINCT anios.periodo FROM anios,profesores, prof_dicta_proy WHERE 
                      profesores.id=prof_dicta_proy.id_profesor AND
                      prof_dicta_proy.id_anio=anios.id AND
                      profesores.ci='".$_SESSION['cedula_usu']."' order by periodo";
                      $r=mysql_query($sql);
                      while($row=mysql_fetch_array($r)){
                      ?>
                      <option value="<?php echo $row['periodo']?>"><?php echo $row['periodo']?></option>
                      <?php 
                      }
                      ?>
                      </select>
					  
                    <h5 align="center"><b>Acci&oacute;n</b>(<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">)</h5>
                   <select  name="accion" id="accion" title="accion" class="form-control" style="width:500px;" required>
				   <option value="">Seleccione una opci&oacute;n</option>
                   <option value="Factibles"> Factibles </option>
                   <option value="No Factibles"> No factibles </option>
                   <option value="En Espera"> En espera </option>
                   <option value="Con Codigos"> Con códigos </option>
                   <option value="Sin Codigos"> Sin códigos </option>
                   <option value="Culminados"> Culminados </option>
                   <option value="No Culminados"> No culminados </option>
                   </select>
                              

                </div> </center>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                <button type="submit" class="btn btn-info"><i class="fa fa-share"></i> Consultar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

    </section>

            <section class="content">

      <br>
      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Proyectos donde usted es coordinador(a)</h3>
           <br><br>
       <?php
	  $a="SELECT * FROM profesores WHERE ci='".$_SESSION['cedula_usu']."' ";
	  $b=mysql_query($a);
	  $c=mysql_fetch_array($b);
	  
      $nomb_pnf=$c['area_especializacion'];
	  $anio=$_POST['anio'];
	  $accion=$_POST['accion'];	  
      ?>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
       <?php
	   
	   if(($anio=="")or($accion=="")){
       $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,
	   est_tiene_proy,proyectos,coord_tiene_proy,profesores WHERE
       estudiante.id=est_cursa_proy.id_estudiante AND
       pnfs.id=est_cursa_proy.id_pnf AND
       trayectos.id=est_cursa_proy.id_trayecto AND
       secciones.id=est_cursa_proy.id_seccion AND
       anios.id=est_cursa_proy.id_anio AND
       turnos.id=est_cursa_proy.id_turno AND
       sedes.id=est_cursa_proy.id_sede AND
	   proyectos.id_anio=anios.id AND
	   estudiante.id=est_tiene_proy.id_estudiante1 AND
       proyectos.id=est_tiene_proy.id_proyecto AND
	   profesores.id=coord_tiene_proy.id_profesor AND
       proyectos.id=coord_tiene_proy.id_proyecto AND
	   profesores.ci='".$_SESSION['cedula_usu']."' ";
       
	   }else if(($anio!="")and($accion=="Factibles")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND 
		factibilidad='Factible' AND 
		profesores.ci='".$_SESSION['cedula_usu']."' ";
		
	   }else if(($anio!="")and($accion=="No Factibles")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND 
		factibilidad='No Factible' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }else if(($anio!="")and($accion=="En Espera")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND 
		factibilidad='' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }else if(($anio!="")and($accion=="Con Codigos")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND 
		codigo!='' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }else if(($anio!="")and($accion=="Sin Codigos")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND 
		codigo='' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }else if(($anio!="")and($accion=="Culminados")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy,proyectos_tiene_culminacion
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND  
		id_culminacion='3' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }else if(($anio!="")and($accion=="No Culminados")){
	    
	   $sql="SELECT proyectos.titulo,estudiante.nombres,estudiante.apellidos,proyectos.id,
	   trayectos.descripcion AS'des_tray',num_seccion,turnos.descripcion,sedes.nombre,anios.periodo
	   FROM 
	   estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,
	   profesores,coord_tiene_proy,proyectos_tiene_culminacion
	   WHERE 
	   estudiante.id=est_cursa_proy.id_estudiante AND 
	   pnfs.id=est_cursa_proy.id_pnf AND
	   trayectos.id=est_cursa_proy.id_trayecto AND
	    secciones.id=est_cursa_proy.id_seccion AND
	    anios.id=est_cursa_proy.id_anio AND
	    turnos.id=est_cursa_proy.id_turno AND
	    sedes.id=est_cursa_proy.id_sede AND
		proyectos.id=est_tiene_proy.id_proyecto AND 
		estudiante.id=est_tiene_proy.id_estudiante1 AND
        proyectos.id_anio=anios.id AND		
		proyectos.id=coord_tiene_proy.id_proyecto AND 
		profesores.id=coord_tiene_proy.id_profesor AND
		proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
		anios.periodo='".$anio."' AND
		pnfs.nomb_pnf='".$nomb_pnf."' AND  
		id_culminacion='4' AND 
		profesores.ci='".$_SESSION['cedula_usu']."'";
		
	   }
       
	   $r=mysql_query($sql);
            
	   //echo $sql;
			
         if(mysql_num_rows($r)==0){
         ?>
        <script language="javascript">
        $(document).ready(function(){
        sweetAlert("Disculpe", "No se encontraron resultados", "error");
        });
        function redireccionar(){
        window.location="detalles_proyecto2.php";
        }
        setTimeout('redireccionar()',3000); 
        </script>
        <?php
        }else{
		?>
        <table id="example1" class="table table-bordered table-striped">
		<thead>
        <tr>
        <th><center>Lider de proyecto</center></th>
        <th><center>Trayecto</center></th>
        <th><center>Secci&oacute;n</center></th>
        <th><center>Turno</center></th>
        <th><center>Tutor</center></th>
	    <th><center>Titulo</center></th>
	    <th><center>PDF.</center></th>
        </tr>
        </thead>
        <tbody>
        <?php 
	    $row=mysql_fetch_array($r);
		$trayecto=$row['des_tray'];
        $seccion=$row['num_seccion'];
	    $forma=$seccion;  
	    $turno=$row['descripcion'];
        $sede=$row['nombre'];
        for($i=0; $i<$row;$i++){
        $mysql="SELECT *  FROM profesores,proyectos,tutor_tiene_proyectos WHERE
        profesores.id=tutor_tiene_proyectos.id_profesor AND
        proyectos.id=tutor_tiene_proyectos.id_proyecto AND 
        proyectos.id='".$row['id']."' ";
        $res=mysql_query($mysql);
        $data=mysql_fetch_array($res);
        ?>
        <tr>  
        <td align='center'><?php echo $row['nombres']."&nbsp;".$row['apellidos'];;?></td>
        <td align='center'><?php echo $row['des_tray'];?></td>
        <td align='center'><?php echo $row['num_seccion'];?></td>
        <td align='center'><?php echo $row['descripcion'];?></td>
		<td align='center'><?php if(mysql_num_rows($res)==1){
        echo $data['nombres'].'&nbsp;'.$data['apellidos'];}else if(mysql_num_rows($res)==0){
		echo"<center>Sin Tutor</center>";
		}
		?></td>
        <td><?php echo $row['titulo'];?></td>
        <td><center>
		<a style="color:gray;" target="_blank" 
		href="reporte_proyecto_filtros.php?
		<?php 
		if($accion!=""){
		echo"accion=$accion&";	
		} 
		?>
		forma=<?php echo $forma;?>&
		anio=<?php echo $row['periodo'];?>&
		pnf=<?php echo $nomb_pnf;?>&
		trayecto=<?php echo $trayecto?>&
		seccion=<?php echo $seccion;?>&
		turno=<?php echo $turno?>&
		sede=<?php echo $sede;?>"><img src="imagenes/pdf.png" style="width:30px; height:30px;"></a>
		</center></td>
        </tr>
        <?php  
        $row=mysql_fetch_array($r);
        } 
        } 
        ?>
        </tbody>

        </table>
        </form>
                  


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
 $(document).ready(function() {
            var table = $('#example1').DataTable({
                dom: 'lBfrtip',/*Bfrtip*/
                buttons: [
                    {
                        extend: 'colvis',
                        columns: ':not(:first-child)',
                    },
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                "language" : {
                    "url":"{{ assetsUrl }}assets/js/DataTables/i18n/Spanish.json"
                },
                "lengthMenu": [[5, 10/*, 20, -1*/], [5, 10/*, 20, "Todos"*/]]
            });
            /*http://stackoverflow.com/a/33537085/1883256*/
            table.on( 'draw', function () {
                var body = $( table.table().body() );
 
                body.unhighlight();
                body.highlight( table.search() );
            } );
 
        } );
</script>
</body>
</html>
