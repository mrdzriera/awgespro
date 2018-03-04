// JavaScript Document
var $iva;

$iva=12;

var $total;
var $totalGeneral;

var $nros;
$nros=0;
$items = new Array( new Array());


/*
$items[0] = ["","","","",""];
$items[1] = ["2", "Balones"    , "10"      ,"15.2"  ,"30.4"];
$items[2] = ["3", "descripcion", "cantidad","precio","total"];
$items[3] = ["4", "descripcion", "cantidad","precio","total"];
$items[4] = ["5", "descripcion", "cantidad","precio","total"];
$items[5] = ["6", "descripcion", "cantidad","precio","total"];
*/

function uno(){
	$total=0;
	$totalSinIva=0;
	
$div="<table width='600' border='1' align='center'>";
for ($i=0;$i<=$nros;$i++){

  if (!$items[$i][0] == "") {
	$div=$div+"<tr> <td width='53'>"+$items[$i][0]+"</td> <td width='260'>"+$items[$i][1]+"</td> <td width='85' align='right'>"+$items[$i][2]+"</td> <td width='93' align='right'>"+$items[$i][3]+"</td> <td width='96' align='right'>"+$items[$i][4]+"</td><td width='30' align='right'><img src='../images/elimina.png' onclick='EliminaItem("+$i+")' /></td> </tr>";
	
	$total=$items[$i][4];
	
	eval($totalSinIva = parseFloat($totalSinIva) + parseFloat($total) );
	}
}
$totalSinIva = parseInt($totalSinIva*100);
$totalSinIva= $totalSinIva/100;
document.getElementById('total_sin_iva').value=$totalSinIva;
document.getElementById('items').innerHTML=$div;
calculo();


}







function EliminaItem($codigo){
$items[$codigo][0]="";
uno();
}


function AgregaItem(){
$codigo=document.getElementById('codigo').value;
$descripcion=document.getElementById('descripcion').value;
$cantidad=document.getElementById('cantidad').value;
$precio=document.getElementById('precio').value;
//alert ($nros);
$nros=$nros+1;
$items[$nros] = [$codigo, $descripcion,$cantidad,$precio,eval($precio*$cantidad)];
$codigo=document.getElementById('codigo').value="";
$descripcion=document.getElementById('descripcion').value="";
$cantidad=document.getElementById('cantidad').value="1";
$precio=document.getElementById('precio').value="";
uno();
}



//funcion de autosugerencia
function cargaClientes(){
	var options = {
		script:"busca.php?json=true&limit=10&",
		varname:"input",
		json:true,
		shownoresults:true,
		maxresults:10,
		callback: function (obj) { 
			document.getElementById('codigo_cliente').value = obj.id;
//			document.getElementById('CONSEJO').value= obj.value;
//			document.getElementById('nombreBus').value="";
//		buscar();
		}
	};
	//Especifica el campo que va a predecir
	var as_json = new bsn.AutoSuggest('nombre', options);
}



function cargaProductos(){
	var options = {
		script:"buscaProductos.php?json=true&limit=10&",
		varname:"input",
		json:true,
		shownoresults:true,
		maxresults:10,
		callback: function (obj) { 
			document.getElementById('codigo').value = obj.id;
			document.getElementById('precio').value= obj.info;
//			document.getElementById('precio').value= obj.value;
//			document.getElementById('nombreBus').value="";
//		buscar();
		}
	};
	//Especifica el campo que va a predecir
	var as_json = new bsn.AutoSuggest('descripcion', options);
}


function carga(){
	cargaProductos();
	cargaClientes();
	init();
}





function calculo(){

//-------------------descuento
$descuento=document.getElementById('descuento').value;
	if ($descuento > 0) {
		$sub_total=eval($total-$descuento);
		
		document.getElementById('sub_total').value=$sub_total;
		
	}else {document.getElementById('sub_total').value=$total;
 }


//---------------impuesto
parseFloat($sub_total=document.getElementById('sub_total').value);
//alert("Sub:"+$sub_total+" IVA:"+$iva);

$ivaForm=eval( ($iva*$sub_total) /100 );
$iva = eval(parseInt($iva*100));
$iva= eval($iva/100);
document.getElementById('iva').value=$ivaForm;




//--------------total mas iva
parseFloat($sub_total=document.getElementById('sub_total').value);
parseFloat($ivaForm=document.getElementById('iva').value);
$totalGeneral=eval(parseFloat($sub_total)+parseFloat($ivaForm));
document.getElementById('total').value=$totalGeneral;

//------------Asigno total a Contado
document.getElementById('monto_contado').value=$totalGeneral;
}


function Credito(){
	if 	($totalGeneral > 0 ){ //si tiene algun total
		$credito=document.getElementById('monto_credito').value;	
		$credito = eval(parseInt($credito*100));
		$credito= eval($credito/100);

		document.getElementById('monto_contado').value=eval($totalGeneral-$credito);
	}
	
}


function Contado(){
	if 	($totalGeneral > 0 ){ //si tiene algun total
		$contado=document.getElementById('monto_contado').value;
	
		$res=eval($totalGeneral-$contado);

		$res = eval(parseInt($res*100));
		$res= eval($res/100);


		document.getElementById('monto_credito').value=$res;
	}
	
}




