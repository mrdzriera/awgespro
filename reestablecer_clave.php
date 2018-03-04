<!DOCTYPE html>
<html>
<head>
<script>
function verifica_clave(){
var codigoseg=document.getElementById('codigoseg').value;
var scodigoseg=document.getElementById('scodigoseg').value;
var clave=document.getElementById('clave').value;
var clave2=document.getElementById('sclave').value;
var expresionR=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$/;
var expresionR2=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,12}$/;
var resultado=expresionR.test(clave);
var resultado2=expresionR2.test(clave2);

if(clave!=clave2){
sweetAlert("Disculpe", "Las contraseñas no coinciden", "error");
return false;
}

if(clave2!=clave){
sweetAlert("Disculpe", "Las contraseñas no coinciden", "error");
return false;
}

if((resultado != true)||(resultado2 != true)){ 
sweetAlert("Disculpe", "La contraseña debe tener minimo de 6 a 12 caracteres. Puede contener mayusculas, minusculas, numeros y/o caracteres especiales. Y no debe contener espacios en blanco", "error");
return false;
}

if(codigoseg!=scodigoseg){
sweetAlert("Disculpe", "El código de seguridad que introdujo es incorrecto", "error");
return false;
}

}

function solonumeros(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key);

numeros="0123456789";

especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){

teclado_especial=true;

				}

			}

	if(numeros.indexOf(teclado)==-1 && !teclado_especial){
	return false;
	}
}
</script>
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
  <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/flat-login.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/flat-logiin.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/animate.css">
  <link rel="stylesheet" href="estilos/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="estilos/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="estilos/plugins/iCheck/square/blue.css">
    <script src="disti/jquery-1.12.3.min.js"></script>
  <script src="disti/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>

<body class="hold-transition login-page">
<br>
<div class="login-box animated bounceIn">

<div class="login-box">

  <div class="login-logo">
    

  </div> <!-- Fin de login-logo -->
<br>
  <div class="login-box-body">

  <div class="login-register-form-section">
      <h4 align="center" ><b> Sistema para la gesti&oacute;n de proyectos <BR>(AWGESPRO)<BR> </b><br></h4>
  
      <ul class="nav nav-tabs" role="tablist">
        
      <li class="active"><a href="#login" data-toggle="tab"> <center> Reestablecer datos </center></a></li> 
      
      </ul>
    

       <div class="tab-content">

       <div role="tabpanel" class="tab-pane fade in active" id="login">
        
<form class="form-horizontal" method="post" action="clave_restaurada.php" onsubmit="return verifica_clave();" >

<center><b>Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />) son obligatorios</b></center>
    
    <br>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />

</div>
                                    <input type="text" name="ci" class="form-control" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" placeholder="C&eacute;dula" required="required" value="" >
                                </div>
                            </div>
							
      <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  /></div>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="required" value="">

          </div>
                            
      </div>
     <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  /></div>
        <input type="password" name="clave" id="clave" class="form-control" placeholder="Nueva contrase&ntilde;a" required="required" value="">

          </div>
                            
      </div>
       <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  /></div>
        <input type="password" name="sclave" id="sclave" class="form-control" placeholder="Confirmar contrase&ntilde;a" required="required" value="">

          </div>
                            
      </div>

         <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  /></div>
        <input type="text" name="codigoseg" id="codigoseg" class="form-control" placeholder="Codigo de seguridad" required="required" >

          </div>
                            
      </div>
    
        <?php
generador(6,true,true,true,true,true);

function generador($longitud,$letras_min,$letras_may,$numeros){

$variacteres=$letras_min?'abcdefghijklmnopqrstuvwxyz':'';
$variacteres.=$letras_may?'ABCDEFGHIJKLMNOPQRSTUVWXYZ':'';
$variacteres.=$numeros?'0123456789':'';

$i=0;
while($i<$longitud){
$numerad=rand(0,strlen($variacteres)-1);
$clv.= substr($variacteres,$numerad,1);
$i++;
}
echo "<center>C&oacute;digo de seguridad: ".'<b>'.$clv.'</b></center><br>';
?>
<input type='hidden' name='scodigoseg' id='scodigoseg' value="<?php echo $clv;?>">
<?php
}
?>
    
        <div class="row">
       
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
              </div>

              <div class="col-xs-6">
              <a href="olvido_clave.php" class="btn btn-primary btn-block btn-flat">Volver</a>
        
              </div>

         
        <!-- /.col -->

      </div>

</form> <!-- Fin de form-horizontal 1 -->
<br>
   
       </div> <!-- Fin de tab-pane fade in active --> 



       </div> <!-- Fin de tab-content --> 

  </div> <!-- Fin de login-register -->

    <form action="../../index2.html" method="post">
      

    </form> <!-- Fin de form 1 -->
    
   </div> <!-- Fin de login-box-body -->

  </div> <!-- Fin de login-box -->

 </div> <!-- Fin de login-box animated bounceIn -->

<!-- script -->

<script src="estilos/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="estilos/bootstrap/js/bootstrap.min.js"></script>
<script src="estilos/plugins/iCheck/icheck.min.js"></script>
<script src="estilos/bootstrap/js/jquery.js"></script>
<script src="estilos/bootstrap/js/jquery-1.8.2.min.js"></script>
<script src="estilos/bootstrap/js/jquery.backstretch.min.js"></script>
<script src="estilos/bootstrap/js/scripts.js"></script>
<script src="estilos/bootstrap/sweetalert/sweetalert.min.js"></script>

<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
