/// Abre una ventana nueva ventana
function abrirVentana(url, Alto, Ancho)
{
    window.open(url,"","toolbar=0,width=" + Ancho + ", height=" + Alto + ",location=0,status=1,menubar=0,scrollbars=1,resizable=0");
}
                
/// Abre una ventana nueva con un nombre especifico, esto con el fin de que no se creen varias ventanas iguales.
function abrirVentana3(url, Nombre, Alto, Ancho) {
    windowObjectReference2 = window.open(url , Nombre , "toolbar=0, width=" + Ancho + ", height=" + Alto + ",location=0,status=1,menubar=0,scrollbars=1,resizable=0");
    windowObjectReference2.focus();
}        

$(document).ready(function(){
        $('#ayudaProceso').click(function(){
                $('#divAyudaProceso').fadeIn(1000, function () {  return true;  });
        });
        
        $('a').click(
            function(){
                var value = $(this).attr('id');
                $('#ventanamodal').load(value);
            }
        );        
});

/// Valida que solo sean insertados numeros en un campo de texto
function validarNumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[0-9\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

// Oprime un boton especificado por parametro cuando en un campo de texto se presiona la tecla enter
function Evento(e,Boton)
{    
    tecla = (document.all) ? e.keyCode : e.which; // 2    
    if(tecla == '13') {
        document.getElementById(Boton).click();
    }
}

// Selecciona o quita la seleccion de todos los checkbox dentro de una tabla
function ChequearTodos(chkbox) {
    for (var i=0;i < document.forms[0].elements.length;i++)  {
        var elemento = document.forms[0].elements[i];
        if (elemento.name == "ChkSeleccionar[]") {
            elemento.checked = chkbox.checked
        }
    }
}

// AUTO COMPLETAR

$().ready(function() {

	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}
	
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}	
});
