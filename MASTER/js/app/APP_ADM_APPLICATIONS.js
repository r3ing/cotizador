function app_aplicaciones(app,id,nombre,url,evento){

    global_app_aplicaciones = false
    var variables
    //alert(evento)
    switch (evento) 
    {  
        case 'vista_aplicaciones': etiqueta = document.getElementById('vista_aplicaciones'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }

    switch (app)
    {  
      case 1: variables = 'id='+id+'&nombre='+nombre; break; //link agrega
      case 2: variables = 'id='+id+'&nombre='+nombre; break; //link agrega
      case 3: variables = add_app_aplicaciones(id); break; // act bbdd
      case 4: variables = add_app_aplicaciones(id); break; // atualiza bbdd
      default:   alert ('no hubo accion de la bbdd');
    }
    variables =  variables +'&evento='+evento
    if(global_app_aplicaciones==false )
    {
    etiqueta.innerHTML='<div align="center"><img src="images/loaders/loader6.gif"></div>'
	ajax=objetoAjax();
	ajax.open("POST", url,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			etiqueta.innerHTML = ajax.responseText
			etiqueta.style.display = "block";
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(variables);
    }
}

function add_app_aplicaciones(id)
{
    valida_formulario_app_aplicaciones();
    variables = 'nombre='+document.getElementById('nombre').value
    variables = variables + '&ruta='+document.getElementById('ruta').value
    variables = variables + '&estado='+document.getElementById('estado').value
	variables = variables + '&tipo='+document.getElementById('tipo').value
    variables = variables + '&category='+document.getElementById('category').value
    variables = variables + '&id='+ id
        
        return(variables)
}

//Crea la Ruta: APP_(SELLECION TIPO)_(NOMBRE)
function createRoute(){
    if (document.getElementById('nombre').value != '' && document.getElementById('tipo').value != 0) {
        var nombre = removeSpecialCharacters(document.getElementById('nombre').value).toUpperCase().trim();
        document.getElementById('ruta').value = "APP_"
                + document.getElementById('tipo').value.toUpperCase()
                + "_" + nombre.replace(/\s/g, "_");
        //existingRoute();
    }else{
        document.getElementById('ruta').value = '';
    }
}

//Valida si la ruta ya existe
function existingRoute(){
    if (document.getElementById('nombre').value != '' && document.getElementById('tipo').value != 0) {
        $.ajax({
            type: 'HEAD',
            url: '/taskforce/APP/' + document.getElementById('ruta').value,
            success: function () {
                $('#msgRuta').fadeIn(1000).html("<span style='color:#FF0000;'>Ruta Existente.</span>");
                global_app_aplicaciones = true;
            },
            error: function () {
                $('#msgRuta').fadeIn(1000).html("&nbsp;");
            }
        });
    }
}

function valida_formulario_app_aplicaciones(){

    if (document.getElementById('nombre').value == '')
    {
        $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nombre</span>");
        global_app_aplicaciones = true
    }
    else {
        if(!validaRuta(document.getElementById('nombre').value)){
            $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Nombre Inv&aacute;lido. No puede contener caracteres especiales.</span>");
            global_app_aplicaciones = true
        }
        else
            $('#msgNombre').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('estado').value == 0)
    {
        $('#msgEstado').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Permisos.</span>");
        global_app_aplicaciones = true
    }
    else
        $('#msgEstado').fadeIn(1000).html("&nbsp;");


    if (document.getElementById('tipo').value == 0)
    {
        $('#msgTipo').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Tipo.</span>");
        global_app_aplicaciones = true
    }
    else
        $('#msgTipo').fadeIn(1000).html("&nbsp;");

    if (document.getElementById('nombre').value != '' && document.getElementById('tipo').value != 0 && document.getElementById('Guardar').value == 'Agregar Aplicación') {
        $.ajax({
            type: 'HEAD',
            url: '/taskforce/APP/' + document.getElementById('ruta').value,
            success: function () {
                $('#msgRuta').fadeIn(1000).html("<span style='color:#FF0000;'>Ruta Existente.</span>");
                global_app_aplicaciones = true
            },
            error: function () {
                $('#msgRuta').fadeIn(1000).html("&nbsp;");
            }
        });
    }

    if (document.getElementById('category').value == 0)
    {
        $('#msgCategory').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione una Categor&iacute;a.</span>");
        global_app_aplicaciones = true
    }
    else
        $('#msgCategory').fadeIn(1000).html("&nbsp;");

}

