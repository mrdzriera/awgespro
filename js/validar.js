function validacion(){
	
var fecha=document.getElementById("fecha").value;
if((fecha=="0000-00-00")||(fecha=="")){
alert("la fecha esta vacia");
return false;
}

var comunidad=document.getElementById("comunidad").value;
var otra_comunidad=document.getElementById("otra_comunidad").value;

if(comunidad=="Ninguna de estas")||(otra_comunidad==""){
alert("seleccione una opcion de comunidad");
return false;
}

if(comunidad!="Ninguna de estas")||(otra_comunidad!=""){
alert("solo puede ingresar una opcion de comunidad");
return false;
}

var responsable=document.getElementById("responsable").value;
if(responsable==""){
alert("el nombre del responsable esta vacio");
return false;
}

var numero=document.getElementById("numero").value;
if(numero==""){
alert("el numero del responsable esta vacio");
return false;
}

var resp_email=document.getElementById("resp_email").value;
if(resp_email==""){
alert("el correo del responsable esta vacio");
return false;
}

var estado=document.getElementById("estado").value;
if(estado==""){
alert("el estado de la comunidad esta vacio");
return false;
}

var municipio=document.getElementById("municipio").value;
if(municipio==""){
alert("el municipio de la comunidad esta vacio");
return false;
}

var parroquia=document.getElementById("parroquia").value;
if(parroquia==""){
alert("la parroquia de la comunidad esta vacio");
return false;
}

var sector=document.getElementById("sector").value;
if(sector==""){
alert("el sector de la comunidad esta vacio");
return false;
}

var titulo=document.getElementById("titulo").value;
if(titulo==""){
alert("el titulo esta vacio");
return false;
}

var objetivo=document.getElementById("objetivo").value;
if(objetivo==""){
alert("el objetivo esta vacio");
return false;
}

var alcance=document.getElementById("alcance").value;
if(alcance==""){
alert("el alcance esta vacio");
return false;
}

var limitaciones=document.getElementById("limitaciones").value;
if(limitaciones==""){
alert("las limitaciones estan vacias");
return false;
}

var aportes=document.getElementById("aportes").value;
if(aportes==""){
alert("los aportes a la comunidad estan vacios");
return false;
}

var aportes=document.getElementById("aportes").value;
if(aportes==""){
alert("los aportes a la comunidad estan vacios");
return false;
}

var acciones=document.getElementById("acciones").value;
if(acciones==""){
alert("los acciones de integracion a la comunidad estan vacias");
return false;
}

var linea_investigacion=document.getElementById("linea_investigacion").value;
if(linea_investigacion==""){
alert("la linea de investigacion comunidad esta vacia");
return false;
}

var vinculacion=document.getElementById("vinculacion").value;
if(vinculacion==""){
alert("la vinculacion con el plan de la patria esta vacia");
return false;
}


}