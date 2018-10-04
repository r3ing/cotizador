function app_usuarios(app,id,url,evento){
    global_app_usuarios = false
    var variables

    switch (evento) 
    {  
        case 'vista_usuarios': etiqueta = document.getElementById('vista_usuarios'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
		case 'vista_password': etiqueta = document.getElementById('vista_password'); break;
        default:   alert('No existe Div');
    }

     switch (app) 
    {  
      case 1: variables = 'ini=ini'; break; //LINK ADD
      case 2: variables = add_app_usuarios(id); break; // ADD DB
      case 3: variables = 'id='+id; break; // UPDATE DB
      case 4: variables = add_app_usuarios(id); break; // UPDATE DB
      case 5: variables = eli_app_usuarios(id); break; // DELETE DB
	  case 6: variables = act_app_password(id); break; // UPDATE DB PASSWORD
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

function act_app_password(id)
{
    valida_formulario_app_password()
    old_pass = document.getElementById('old_pass').value
    password = document.getElementById('password').value
    cpassword = document.getElementById('cpassword').value
    variables = 'old_pass='+old_pass+'&password='+password+'&cpassword='+cpassword+'&id='+id
    return variables  
}

function add_app_usuarios(id)
{
    valida_formulario_app_usuarios()
    nombre 				=	 document.getElementById('nombre').value
	fechaNacimiento 	=	 document.getElementById('fechaNacimiento').value 
	ubicacion 			=	 document.getElementById('ubicacion').value
	anexo			 	=	 document.getElementById('anexo').value
	celular 			=	 document.getElementById('celular').value
    email 				=	 document.getElementById('email').value
	nacionalidad		= 	 document.getElementById('nacionalidad').value
	sexo				= 	 document.getElementById('sexo').value
	apellidoPaterno		= 	 document.getElementById('apellidoPaterno').value
	apellidoMaterno		= 	 document.getElementById('apellidoMaterno').value
	
    variables = 'nombre='+nombre+'&fechaNacimiento='+fechaNacimiento+'&ubicacion='+ubicacion+'&anexo='+anexo+'&celular='+celular+'&email='+email+'&nacionalidad='+nacionalidad+'&sexo='+sexo+'&apellidoPaterno='+apellidoPaterno+'&apellidoMaterno='+apellidoMaterno+'&id='+id
    return variables
}

function valida_formulario_app_password()
{ 
    if(document.getElementById('old_pass').value=="")
    {
        alert('Debe ingresar su password actual')
        global_app_usuarios = true
    }
    if(document.getElementById('password').value=="")
    {
        alert('Debe ingresar una nueva password')
        global_app_usuarios = true
    }
    if(document.getElementById('cpassword').value=="")
    {
        alert('Confirme nueva password')
        global_app_usuarios = true
    }
    
    if( document.getElementById('cpassword').value != document.getElementById('password').value )
    {
        alert('Las passwords no coinciden')
        global_app_usuarios = true
    }   
}

function valida_formulario_app_usuarios ()
{
    
    if(
	   	document.getElementById('nombre').value=='' 			||
		document.getElementById('fechaNacimiento').value=='' 	||
		document.getElementById('ubicacion').value==''			|| 
		document.getElementById('anexo').value==''				||
		document.getElementById('celular').value=='' 			|| 
		document.getElementById('email').value=='' 				||
		document.getElementById('nacionalidad').value==''		||
		document.getElementById('sexo').value==0				||
		document.getElementById('apellidoPaterno').value==''	||
		document.getElementById('apellidoMaterno').value==''
		
	  )
    {
        alert('ERROR: Debe llenar todos los campos')
        global_app_usuarios = true
    }
}