//********************** INICIO Funciones de AJAX *********************************************** 
function getXMLHTTPRequest()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = getXMLHTTPRequest();

function buscarUsuarioAJAX(ide,url){
	
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url+"&tipoB="+document.getElementById("tipoB").value+
						"&nombre="+document.getElementById("nombre").value+
						"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;
							   //document.getElementById("cedulaU").value="";
                       }
               }
			   else{
					document.getElementById(ide).innerHTML="<div  style='text-align:center'><img src='../images/ajax.gif' title='cargando...' />";
                }
       }
       miPeticion.send(null);
}
function buscarUsuarioAJAX2(ide,url){
	
	
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url+"&tipoB="+document.getElementById("tipoB").value+
						"&nombre_eq="+document.getElementById("nombre_eq").value+
						"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;
							   //document.getElementById("cedulaU").value="";
                       }
               }
			   else{
					document.getElementById(ide).innerHTML="<div  style='text-align:center'><img src='../images/ajax.gif' title='cargando...' />";
                }
       }
       miPeticion.send(null);
}
campo=0;
function agregarF() {
	
	campo=campo+1;
	$("#campos").append('<table width="381" border="0" align="left" cellpadding="0">'+
						'<tr class="email'+campo+'">'+
						'<th width="92" align="right">Frecuencia en Hz</th>'+
						'<th align="left"><input type="text" name="valorFrecuencia[]"></th>'+
						'</tr>'+
						'<tr class="email'+campo+'">'+
						'<th align="right" >Tiempo</th>'+
						'<td align="left"><input type="text" name="tiempo[]">Minutos</td>'+
						'</tr>'+
						'<tr class="email'+campo+'">'+
						'<th align="right">Archivo MP3</th>'+
						'<td align="left"><input type="file" name="ArchivoMp3[]"></td>'+
						'</tr>'+
						'<tr class="email'+campo+'">'+
							'<td colspan="2" align="right"><input type="button" value="- Borrar" onclick="borrar('+campo+')"></td>'+
						'</tr>'+
						'</table>');
}

function agregar2() {
	campo=campo+1;
	
	generarVector(campo)
	$("#campos1").append('<table width="348" border="0" align="center">'+
						'<tr class="email'+campo+'">'+
							'<td><input type="text" name="condecoracion[]" size="23"></td>'+
							'<td><input type="text" name="clase[]" size="23"></td>'+
							'<td><input type="text" name="fechaOtorg[]" size="23"></td>'+
						'</tr>'+						
						'<tr class="email'+campo+'">'+
						'<td colspan="3" align="center">'+
					'<input type="button" value="- Borrar" onclick="borrar('+campo+')"></td>'+
						'</tr>'+
						'</table>');
						
	
}


/*function agregar() {
	campo=campo+1;
	
	generarVector(campo)
	$("#campos2").append('<table width="348" border="0" align="center">'+
						'<tr class="email'+campo+'">'+
		'<td><input type="text"  name="EnombresApellidos[]" size="15" id="tipo_red" /></td>'+
   '<td><textarea name="Edireccion[]" cols="15" rows="5" ></textarea></td>'+
   '<td><input type="text"  name="EtelfDom[]" size="15"/></td>'+
   '<td><input type="text"  name="EtelfCel[]" size="15" /></td>'+
						'</tr>'+						
						'<tr class="email'+campo+'">'+
							'<td colspan="3" align="center">'+
					'<input type="button" value="- Borrar" onclick="borrar('+campo+')"/></td>'+
						'</tr>'+
						'</table>');
}*/


function borrar(cual) {
	$("tr.email"+cual).remove();
	campo=campo-1;
	return false;
}
function generarVector(valor){
	return valor;	
	
}