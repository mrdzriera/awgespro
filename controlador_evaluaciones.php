  <?php 
  
  $fase=$_POST['fase'];
  
  if($fase==1){
  
  ?>
  <script language="javascript">
  window.location="reg_eva1.php";
  </script>
  <?php
  } else if($fase==2){
  ?>  
   <script language="javascript">
  window.location="reg_eva2.php";
  </script>
 <?php
  }else if($fase==3){
  ?>
  <script language="javascript">
  window.location="reg_eva3.php";
  </script>
  <?php
  }
  ?>