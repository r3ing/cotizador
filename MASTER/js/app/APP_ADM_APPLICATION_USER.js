function app_permisos_aplicacion(app,id,nombre,url,evento){
    global_app_permisos_aplicacion = false
    var variables
    //alert(evento)
    switch (evento) 
    {  
        case 'vista_usuarios': etiqueta = document.getElementById('vista_usuarios'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }
   //alert (app)
   //alert (id)
     switch (app) 
    {  
      case 1: variables = 'id='+id+'&nombre='+nombre; break; //link agrega
      case 2: variables = add_aplicaciones_permisos_aplicacion(id); break; // act bbdd
      default:   alert ('no hubo accion de la bbdd');
    }
    variables =  variables +'&evento='+evento
    //alert (variables)
   // alert (url)
   if(global_app_permisos_aplicacion == false)
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
function add_aplicaciones_permisos_aplicacion(id)
{
   
cant = document.getElementById('cantidad').value
texto = ''
    for (i=0;i<cant;i++) 
    { 
        if(document.getElementById('ck['+i+']').checked == true)
        {
            texto = texto + document.getElementById('ck['+i+']').value+'|'
        }
    }
variables = 'id='+id+'&texto='+texto
return (variables)  
}








