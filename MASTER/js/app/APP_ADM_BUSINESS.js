function app_business(app,id,business,url,evento){
    
    global_app_business = false
    var variables
    //alert(evento)
    switch (evento) 
    {  
        case 'vista_business': etiqueta = document.getElementById('vista_business'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }
   //alert (app)
   //alert (id)
     switch (app) 
    {  
      case 1: variables = 'id='+id+'&business='+business; break; //link agrega
      case 2: variables = 'id='+id+'&business='+business; break; //link agrega
      case 3: variables = add_app_business(id); break; // act bbdd
      case 4: variables = add_app_business(id); break; // atualiza bbdd
      default:   alert ('no hubo accion de la bbdd');
    }
    variables =  variables +'&evento='+evento
    //alert (variables)
   // alert (url)
    if(global_app_business==false )
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
function add_app_business(id)
{
    
    if (document.getElementById('business').value == '')
    {
		$('#msgBusiness').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Empresa</span>");
        /* alert('Debe ingresar un business.') */
        global_app_business = true
    }
	else 
		$('#msgBusiness').fadeIn(1000).html("&nbsp;");  
		
	if (document.getElementById('website').value == '')
    {
		$('#msgWebsite').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Website</span>");
        /* alert('Debe ingresar un business.') */
        global_app_business = true
    }
	else 
		$('#msgWebsite').fadeIn(1000).html("&nbsp;");  
		
	if (document.getElementById('status').value == 0)
    {
		$('#msgStatus').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Estado</span>"); 
        global_app_business = true
    }
	else 
		$('#msgStatus').fadeIn(1000).html("&nbsp;"); 

        
        variables = 'business='+document.getElementById('business').value 
		variables = variables + '&website='+document.getElementById('website').value 
        variables = variables + '&status='+document.getElementById('status').value 
        variables = variables + '&id='+ id
        
        return(variables)
    
}