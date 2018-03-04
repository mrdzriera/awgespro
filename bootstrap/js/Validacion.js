
$(document).on("ready",inicio);

function inicio(){
	$("#btnvalidar").click(function(){
		if(validar()==false)
			alert("los campos no estan validados");
		else{
			alert("los campos estan validados");
		}
	});