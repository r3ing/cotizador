/*incluye js de validaciones*/
//document.write("<script type='text/javascript' src='../validations.js'></script>");

function app_usuarios(app,id,url,evento){
    global_app_usuarios = false
    var variables

    switch (evento) 
    {  
        case 'vista_users': etiqueta = document.getElementById('vista_users'); break;
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

function selectPermits(){
    if (document.getElementById('permits').value != 0 && document.getElementById('permits').value != 3) {
        document.getElementById('sucursal').value = 0;
        document.getElementById('selectSucursal').style.display = "block";
        $('#msgSucursal').fadeIn(1000).html("&nbsp;");
    }else{
        document.getElementById('selectSucursal').style.display = "none";
        document.getElementById('sucursal').value = 0;
    }
}

function add_app_usuarios(id)
{
    valida_formulario_app_usuarios()
    user 				=	 document.getElementById('user').value
    pass				=	 document.getElementById('pass').value
    forename			=	 document.getElementById('forename').value
	paternal 			=	 document.getElementById('paternal').value
	maternal 			=	 document.getElementById('maternal').value
	cellphone			=	 document.getElementById('cellphone').value
	permits			 	=	 document.getElementById('permits').value
	email	 			=	 document.getElementById('email').value
    status 				=	 document.getElementById('status').value
    sucursal            =    document.getElementById('sucursal').value

    variables = 'user='+user+'pass='+pass+'&forename='+forename+'&paternal='+paternal+'&maternal='+maternal+'&cellphone='+encodeURIComponent(cellphone)+'&permits='+permits+'&sucursal='+sucursal+'&email='+email+'&status='+status+'&id='+id
    return variables;
}

function valida_formulario_app_usuarios ()
{ 
	if (document.getElementById('user').value == '')
    { 
		$('#msgUser').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Usuario.</span>"); 
		global_app_usuarios = true
    }
	else {
        if(!validaUsuario(document.getElementById('user').value)){
            $('#msgUser').fadeIn(1000).html("<span style='color:#FF0000;'>Usuario Inv&aacute;lido.</span>");
            global_app_usuarios = true
        }else
            $('#msgUser').fadeIn(1000).html("&nbsp;");
    }


	if (document.getElementById('pass').value == '')
    {
		$('#msgPass').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Contrase&ntilde;a.</span>"); 
        global_app_usuarios = true
    }
	else 
		$('#msgPass').fadeIn(1000).html("&nbsp;");

	
	if (document.getElementById('forename').value == '')
    {
		$('#msgForename').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nombre.</span>");
        global_app_usuarios = true
    }
	else{
        if(!validaLetras(document.getElementById('forename').value)){
            $('#msgForename').fadeIn(1000).html("<span style='color:#FF0000;'>Nombre Inv&aacute;lido.</span>");
            global_app_usuarios = true
        }
        else
		    $('#msgForename').fadeIn(1000).html("&nbsp;");
    }
	
	if (document.getElementById('paternal').value == '')
    {
		$('#msgPaternal').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Apellido Paterno.</span>"); 
        global_app_usuarios = true
    }
	else{
        if(!validaLetras(document.getElementById('paternal').value)){
            $('#msgPaternal').fadeIn(1000).html("<span style='color:#FF0000;'>Apellido Paterno Inv&aacute;lido.</span>");
            global_app_usuarios = true
        }else
		    $('#msgPaternal').fadeIn(1000).html("&nbsp;");
    }
		
	if (document.getElementById('maternal').value == '')
    {
		$('#msgMaternal').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Apellido Materno.</span>"); 
        global_app_usuarios = true
    }
	else{
        if(!validaLetras(document.getElementById('maternal').value)){
            $('#msgMaternal').fadeIn(1000).html("<span style='color:#FF0000;'>Apellido Materno Inv&aacute;lido.</span>");
            global_app_usuarios = true;
        }else
            $('#msgMaternal').fadeIn(1000).html("&nbsp;");
    }
	
 	if (document.getElementById('cellphone').value == '')
    {
        $('#msgCellphone').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Celular.</span>");
        global_app_usuarios = true;
    }
	else {
       if(!validaCellPhone(document.getElementById('cellphone').value)){
            $('#msgCellphone').fadeIn(1000).html("<span style='color:#FF0000;'>Celular Inv&aacute;lido.</span>");
            global_app_usuarios = true
        }else
            $('#msgCellphone').fadeIn(1000).html("&nbsp;");
    }
	
	if (document.getElementById('permits').value == 0)
    {
		$('#msgPermits').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Permisos.</span>"); 
        global_app_usuarios = true
    }
	else 
		$('#msgPermits').fadeIn(1000).html("&nbsp;");

    if(document.getElementById('sucursal').value == 0 && document.getElementById('permits').value != 3){
        $('#msgSucursal').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Sucursal.</span>");
        global_app_usuarios = true
    }else
        $('#msgSucursal').fadeIn(1000).html("&nbsp;");

    if (document.getElementById('email').value == '')
    {
       $('#msgEmail').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese E-mail.</span>");
       global_app_usuarios = true;
    }
	else {
        if(!validaEmail(document.getElementById('email').value)){
            $('#msgEmail').fadeIn(1000).html("<span style='color:#FF0000;'>E-mail Inv&aacute;lido.</span>");
            global_app_usuarios = true
        }
        else
            $('#msgEmal').fadeIn(1000).html("&nbsp;");
    }
		
	if (document.getElementById('status').value == 0)
    {
		$('#msgStatus').fadeIn(1000).html("<span style='color:#FF0000;'>Seleccione Estado.</span>"); 
        global_app_usuarios = true
    }
	else 
		$('#msgStatus').fadeIn(1000).html("&nbsp;");

}

function eli_app_usuarios(id)
{
    var si = confirm('Realmente desea eliminar este Usuario?')
    if (si)
    {
        variables = 'id='+id
    }
    else
    {
        global_app_usuarios = true
    }
    
    return variables
}


