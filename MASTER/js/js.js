function objetoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function ventana_principal(id,url){
    
    etiqueta = document.getElementById('principal')
    variables = 'ini=ini'
    //alert(url)
    //alert(id)
    etiqueta.innerHTML='<div align="center"><img src="images/loaders/loader6.gif"></div>'
    //alert(id)
    //var texto = document.getElementById('codigo_usuario').value
	ajax=objetoAjax();
	ajax.open("GET", url,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			etiqueta.innerHTML = ajax.responseText
			etiqueta.style.display = "block";
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send(variables);
    
    
}

function reingreso(id,url,option,actualizar){
    global_reingreso = false
    etiqueta = document.getElementById('principal')
    variables = 'id='+id+'&actualizar='+actualizar+'&option='+option
    //alert(url)
    
    if( url== 'inet/mail.php')
    {
        var email    = document.getElementById('email').value
        variables = variables+'&email='+email
        //alert(variables)
    }
    if( url== 'inet/reinicio.php')
    {
        var ipass    = document.getElementById('ipass').value
        var newpass = document.getElementById('cpass').value
        
        if(ipass == newpass)
        {
            variables = variables+'&pass='+ipass+'&newpass='+newpass
        }
        else
        {
            alert('La nueva password no es identica a la confirmacion, favor reeingresar correctamente')
            global_reingreso = true
        }  
       // alert(variables)
    }
     
   // alert(variables)
    if(global_reingreso == false)
    {
    etiqueta.innerHTML='<div align="center"><img src="images/loaders/loader6.gif"></div>'
    //var texto = document.getElementById('codigo_usuario').value
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

function enc(id,url,option){
    global_enc = false
    etiqueta = document.getElementById('principal')
    variables = 'id='+id
	//alert(variables)
    
    if( url== 'inet/encuestas_opciones.php')
    {
        var id    = document.getElementById('id').value
        variables = variables+'&id='+id
    }
	//alert(variables)
    
    if(global_enc == false)
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

 

 

function profile(id,url,option){
    global_profile = false
    etiqueta = document.getElementById('principal')
    variables = 'id='+id
    
    if( url== 'inet/profile.php')
    {
        var id    = document.getElementById('id').value
        variables = variables+'&id='+id
    }
    
    if(global_profile == false)
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

function radio_universal(radioName) {
  var rads = document.getElementsByName(radioName);
  largo = rads.length
  
  for(x=0;x<=largo;x++)
  {
    if(rads[x].checked)
    {
       // alert('entro perrin')
         return rads[x].value
    }
  }
  return null;
}

function app_usr_popup(url)
{
    window.open(url);
}
 
function app_org_popup(url) {
open(url,'','top=100,left=100,width=2000,height=1500,scrollbars=yes') ;
}

function app_dir_popup(url) {
open(url,'','top=100,left=100,width=1200,height=800,scrollbars=yes') ;
}

function app_enc_popup(url) {
open(url,'','top=100,left=100,width=1200,height=800,scrollbars=yes') ;
}

function app_snc_popup(url) {
open(url,'','top=100,left=100,width=1300,height=800,scrollbars=yes') ;
}
 
var nav4 = window.Event ? true : false;
function esnumero(evt){
// Backspace = 8, Enter = 13, ’0' = 48, ’9' = 57, ‘.’ = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}