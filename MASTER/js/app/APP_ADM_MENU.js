function app_menu_base(app,nombre,id,url,evento){    
    global_app_menu_base = false
    var variables
    //alert(evento)
    switch (evento) 
    {  
        case 'submenu':   etiqueta = document.getElementById('submenu');   break; 
        case 'subsubmenu':   etiqueta = document.getElementById('subsubmenu');   break; 
        case 'menu':   etiqueta = document.getElementById('menu');   break; 
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }
    //alert(app)
     switch (app) 
    {  
      case 1: variables = 'id='+id+'&nombre='+nombre+'&app='+app; break; //LINK ADD
      case 2: variables = add_app_menu_base_formulario(id); break; //ADD
      case 3: variables = act_app_menu_base_menu(id,'eli',nombre); break; //DELETE
      case 4: variables = act_app_menu_base_menu(id,'act',nombre); break;  
      case 5: variables = 'id='+id+'&nombre='+nombre;break;
      case 6: variables = add_app_menu_base_formulario(id);break;//ACT ACTION
      default:   alert ('no hubo accion de la bbdd');
    }
    variables =  variables +'&evento='+evento
    if(global_app_menu_base==false )
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

function add_app_menu_base_formulario(id)
{
    valida_formulario_app_menu()
    nombre = document.getElementById('nombre').value
    descripcion = document.getElementById('descripcion').value
    idpadre = document.getElementById('idpadre').value
    permisos = document.getElementById('permisos').value
    aplicacion = document.getElementById('aplicacion').value
	activo = document.getElementById('activo').value
	ubicacion = document.getElementById('ubicacion').value 

    variables = 'nombre='+nombre+'&descripcion='+descripcion+'&idpadre='+idpadre+'&permisos='+permisos+'&aplicacion='+aplicacion+'&activo='+activo+'&ubicacion='+ubicacion+"&id="+id
    return variables
}

function act_app_menu_base_menu(id,sms,nombre)
{
    switch(sms)
    {
        case 'eli': mensaje = confirm('Al Eliminar la Raiz, eliminara todos los menus dependientes, Desea Continuar? '); break;
        case 'act': mensaje = confirm('al Modificar podria alterar la dependencia del resto del menu, Desea Continuar? '); break;
    }
    if(mensaje)
    {
        variables  = "id="+id+'&tipo='+sms+'&nombre='+nombre
    }
    else
    {
        variables  = "ini=ini"
        global_app_menu_base = true
    }
    return variables  
}

function valida_formulario_app_menu()
{
    if (document.getElementById('nombre').value == '')
    {
		$('#msgName').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nombre</span>");
        global_app_menu_base = true
    }
	else{
        /* if(!validaMenus(document.getElementById('nombre').value)){
            $('#msgName').fadeIn(1000).html("<span style='color:#FF0000;'>Nombre Inv&aacute;lido</span>");
            global_app_menu_base = true
        }else */
        $('#msgName').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('descripcion').value == '')
    {
        $('#msgDescripcion').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Descripci&oacute;n</span>");
        global_app_menu_base = true
    }
    else{
        $('#msgDescripcion').fadeIn(1000).html("&nbsp;");
    }
		
		
	if (document.getElementById('permisos').value == 0)
    {
		$('#msgPermissions').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Permisos</span>"); 
        global_app_menu_base = true
    }
	else 
		$('#msgPermissions').fadeIn(1000).html("&nbsp;"); 
		
	if (document.getElementById('activo').value == 0)
    {
		$('#msgStatus').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Activo</span>"); 
        global_app_menu_base = true
    }
	else 
		$('#msgStatus').fadeIn(1000).html("&nbsp;"); 
		
	if (document.getElementById('ubicacion').value == 0)
    {
		$('#msgLocation').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Ubicaci&oacute;n</span>"); 
        global_app_menu_base = true
    }
	else 
		$('#msgLocation').fadeIn(1000).html("&nbsp;"); 
}