  <?php 
  
  if($_GET['profesor']!=''){
	$profesor=$_GET['profesor']; 		
	}else if($_POST['profesor']!=''){
	$profesor=$_POST['profesor'];
	}
  if($profesor=='Coordinador'){
  
  ?>
  <script language="javascript">
  window.location="cons_fact.php?opc=Coordinador";
  </script>
  <?php
  } else if($profesor=='Tutor'){
  ?>  
   <script language="javascript">
  window.location="cons_facttutor.php?opc=Tutor";
  </script>
 <?php
  }else if($profesor=='Especialista'){
  ?>
  <script language="javascript">
  window.location="cons_factesp1.php?opc=Especialista";
  </script>
  <?php
  }else if($profesor=='Especialista 2'){
  ?>
  <script language="javascript">
  window.location="cons_factesp2.php?opc=Especialista 2";
  </script>
<?php 
  }else if($profesor=='Especialista 3'){
  ?>
    <script language="javascript">
  window.location="cons_factesp3.php?opc=Especialista 3";
  </script>
  <?php 
  }
  ?>