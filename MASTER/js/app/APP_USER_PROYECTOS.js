function app_category(app,id,url,evento){
    global_app_category = false
    var variables

    switch (evento) 
    {  
        case 'vista_category': etiqueta = document.getElementById('vista_category'); break;
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
    category			=	 document.getElementById('category').value 
    status 				=	 document.getElementById('status').value 
	
    variables = 'category='+category+'&status='+status+'&id='+id
    return variables
}

function valida_formulario_app_category ()
{ 
	if (document.getElementById('category').value == '')
    { 
		$('#msgCategory').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Categor&iacute;a.</span>"); 
		global_app_category = true 
    }
	else 
		$('#msgCategory').fadeIn(1000).html("&nbsp;");  
		
	if (document.getElementById('status').value == '')
    {
		$('#msgStatus').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Estado.</span>"); 
        global_app_category = true
    }
	else 
		$('#msgStatus').fadeIn(1000).html("&nbsp;");  
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