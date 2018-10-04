function app_usuarios(app,id,url,evento){
    global_app_usuarios = false
    var variables

    switch (evento) 
    {  
        case 'vista_usuarios': etiqueta = document.getElementById('vista_usuarios'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }

     switch (app) 
    {  
      case 1: variables = 'ini=ini'; break; //LINK ADD
      case 2: variables = add_app_usuarios(id); break; // ADD DB
      case 3: variables = 'id='+id; break; // UPDATE DB
      case 4: variables = add_app_usuarios(id); break; // UPDATE DB
      case 5: variables = eli_app_usuarios(id); break; // DELETE DB
      default:   alert ('no hubo accion de la DB');
    }
    variables =  variables +'&evento='+evento

    if(global_app_usuarios == false)
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

function app_snc_popup(url) {
open(url,'','top=100,left=100,width=2000,height=1500,scrollbars=yes') ;
} 