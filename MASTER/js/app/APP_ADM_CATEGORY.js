function app_categorias(app,id,url,evento){
    global_app_category = false
    var variables

    switch (evento)
    {
        case 'vista_categorias': etiqueta = document.getElementById('vista_categorias'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }

    switch (app)
    {
        case 1: variables = 'ini=ini'; break; //LINK ADD
        case 2: variables = add_app_category(id); break; // ADD DB
        case 3: variables = 'id='+id; break; // UPDATE DB
        case 4: variables = add_app_category(id); break; // UPDATE DB
        case 5: variables = eli_app_category(id); break; // DELETE DB
        default:   alert ('no hubo accion de la DB');
    }
    variables =  variables +'&evento='+evento

    if(global_app_category == false)
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

function add_app_category(id)
{
    valida_formulario_app_category()
    nombre = document.getElementById('nombre').value
    estado = document.getElementById('estado').value

    variables = 'nombre='+nombre+'&estado='+estado+'&id='+id
    return variables
}

function valida_formulario_app_category ()
{
    if (document.getElementById('nombre').value == '')
    {
        $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Categor&iacute;a.</span>");
        global_app_category = true
    }
    else{
        if(!validaLetras(document.getElementById('nombre').value)){
            $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Categor&iacute;a Inv&aacute;lida.</span>");
            global_app_category = true
        }else
            $('#msgNombre').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('estado').value == 0)
    {
        $('#msgEstado').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Estado.</span>");
        global_app_category = true
    }
    else
        $('#msgEstado').fadeIn(1000).html("&nbsp;");
}

function eli_app_category(id)
{
    var si = confirm('Realmente desea eliminar esta categoria?')
    if (si)
    {
        variables = 'id='+id
    }
    else
    {
        global_app_category = true
    }

    return variables
}