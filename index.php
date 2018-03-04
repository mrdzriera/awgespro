<!DOCTYPE html>
<html>
<head>
<script language="javascript">
function verifica_clave(){
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
  <link rel="stylesheet" href="estilos/bootstrap/css/animate.css">
  <link rel="stylesheet" href="estilos/sweetalert.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="estilos/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="estilos/blue.css">
  <script src="disti/jquery-1.12.3.min.js"></script>
  <script src="disti/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>

<body class="hold-transition login-page">
<div class="login-box animated bounceIn">

<div class="login-box">

  <div class="login-logo">
  
  </div> <!-- Fin de login-logo -->

  <div class="login-box-body">

  <script>
  //alert("Si ud es usuario de la aplicacion por favor inicie sesion, sino cree una cuenta");
  </script>
  <div class="login-register-form-section">
      <h4 align="center" ><b> Sistema para la gesti&oacute;n de proyectos <BR>(AWGESPRO)<BR> </b><br></h4>
	
      <ul class="nav nav-tabs" role="tablist">
        
        <li class="active"><a href="#login" data-toggle="tab"> - Iniciar sesi&oacute;n -</a></li>
        <li><a href="#register" data-toggle="tab"> - Crear cuenta -</a></li>
      
      </ul>

       <div class="tab-content">

       <div role="tabpanel" class="tab-pane fade in active" id="login">
        
<form class="form-horizontal" method="post" action="validalogin.php" >

      <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i></div>
        <input type="text" name="alias" class="form-control" placeholder="Usuario" onpaste="return false" required="required" value="">

          </div>
                            
      </div>

       <div class="form-group ">
         <div class="input-group">
         <div class="input-group-addon"><i class="fa fa-lock"></i></div>
         <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a" onpaste="return false" required="required">
         </div>
       </div>

      <div class="row">
       
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>

         
        <!-- /.col -->

      </div>

</form> <!-- Fin de form-horizontal 1 -->
<br>
   
<center><table>
<tr>
<td><center><a href="olvido_clave.php">¿Olvidaste tu contrase&ntilde;a?</a></center></td>
</tr>
</table></center>
   
   <br>
   	  <center>
	  <b>Si usted pertenece a la instituci&oacute;n inicie sesi&oacute;n, de no poseer un usuario cree una cuenta</b>
	  </center>
	  
       </div> <!-- Fin de tab-pane fade in active --> 

       <div role="tabpanel" class="tab-pane fade" id="register">
                        
          <form class="form-horizontal" method="post" action="RegUsu.php" enctype='multipart/form-data' onsubmit="return verifica_clave();">
						
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
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />

</div>
                                    <select class="form-control" style="width:85px;" value='' name="cod_tel" id="estado" required>
								
                  								 <option value="">Linea</option>
                  								 <option value="0243">0243</option>
                  								 <option value="0244">0244</option>
                  								 <option value="0412">0412 </option>
                  								 <option value="0414">0414 </option>
                  								 <option value="0416">0416 </option>
                  								 <option value="0424">0424</option>
                  								 <option value="0426">0426 </option>
                  								 </select><input name="numero" style="width:185px;" placeholder="N&uacute;mero" class="form-control" type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="7" required>
                                </div>
                            </div>

                                             <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />

</div>
                                    <input type="email" name="correo" class="form-control" maxlength="40" placeholder="Correo" required="required" value="" >
                                </div>
                            </div>
							
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />
</div>
                                    <input type="password" name="clave" class="form-control" id="clave"  maxlength="12" placeholder="Contrase&ntilde;a" required="required" value="">
								</div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  /></div>
                                    <input type="password" name="sclave" id="sclave" class="form-control" maxlength="12" placeholder="Confirmar contrase&ntilde;a " required="required">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />
</div>
                            <select name="pregunta" class="form-control" title="Seleccione su pregunta secreta" required>
                            <option value=""> Seleccione una pregunta secreta </option>
                            <option value="Cual es el nombre de tu mascota">  ¿Cu&aacute;l es el nombre de tu mascota? </option>
                            <option value="Cual es tu pelicula favorita"> ¿Cu&aacute;l es tu pel&iacute;cula favorita? </option>
                            <option value="Cual es tu comida favorita">  ¿Cu&aacute;l es tu comida favorita? </option>
                            <option value="Cual es tu serie favorita">  ¿Cu&aacute;l es tu serie favorita? </option>
                            <option value="Como se llama tu mejor amigo(a)"> ¿C&oacute;mo se llama tu mejor amigo(a)? </option>
                            <option value="A que pais te gustaria viajar"> ¿A que pa&iacute;s te gustar&iacute;a viajar? </option>
                            <option value="Cual es tu helado favorito"> ¿Cu&aacute;l es tu helado favorito? </option>
                            <option value="Cual es tu juego favorito">  ¿Cu&aacute;l es tu juego favorito? </option>
                            <option value="Cual es tu color favorito">  ¿Cu&aacute;l es tu color favorito? </option>
                            <option value="Cual es tu cancion favorita"> ¿Cu&aacute;l es tu canci&oacute;n favorita? </option>
                            </select>
                                </div>
                            </div>
							

                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; "  />
</div>
                                    <input type="text" name="respuesta" class="form-control" placeholder="Respuesta" required="required">
                                </div>
                            </div>
							<div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon">Foto:</div>
                                    <input type="file" name="foto" class="form-control" placeholder="" >
                                </div>
                            </div>							
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>

                        </form> <!-- fin de form 2" -->

                    </div> <!-- fin de tab-pane fade" -->



       </div> <!-- Fin de tab-content --> 

  </div> <!-- Fin de login-register -->

    <form action="../../index2.html" method="post">
      

    </form> <!-- Fin de form 1 -->
    
   </div> <!-- Fin de login-box-body -->

  </div> <!-- Fin de login-box -->

 </div> <!-- Fin de login-box animated bounceIn -->

<!-- script -->

<script src="estilos/jquery-2.2.3.min.js"></script>
<script src="estilos/bootstrap/js/bootstrap.min.js"></script>
<script src="estilos/icheck.min.js"></script>
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
