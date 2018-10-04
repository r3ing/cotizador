function app_sucursal_ads(app,id,url,evento){
    global_app_sucursal_ads = false
    var variables

    switch (evento)
    {
        case 'vista_sucursal_ads': etiqueta = document.getElementById('vista_sucursal_ads'); break;
        case 'principal': etiqueta = document.getElementById('principal'); break;
        default:   alert('No existe Div');
    }

    switch (app)
    {
        case 1: variables = 'ini=ini'; break; //LINK ADD
        case 2: variables = add_app_sucursal_ads(id); break; // ADD DB
        case 3: variables = 'id='+id; break; // UPDATE DB
        case 4: variables = add_app_sucursal_ads(id); break; // UPDATE DB
        case 5: variables = eli_app_sucursal_ads(id); break; // DELETE DB
        default:   alert ('no hubo accion de la DB');
    }
    variables =  variables +'&evento='+evento

    if(global_app_sucursal_ads == false)
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

function add_app_sucursal_ads(id)
{
    valida_formulario_app_sucursal_ads()
    verificaSucursal(id, document.getElementById('codigo').value, document.getElementById('direccion').value)

    id                  =    id
    codigo              =    document.getElementById('codigo').value
    direccion 			=	 document.getElementById('direccion').value
    nodoPrimario		=	 document.getElementById('nodoPrimario').value
    ipPrimario			=	 document.getElementById('ipPrimario').value
    nodoSecundario		=	 document.getElementById('nodoSecundario').value
    ipSecundario 		=	 document.getElementById('ipSecundario').value

    variables = 'id='+id+'&codigo='+codigo+'&direccion='+direccion+'&nodoPrimario='+nodoPrimario+'&ipPrimario='+ipPrimario+'&nodoSecundario='+nodoSecundario+'&ipSecundario='+ipSecundario;
    return variables;
}

function verificaSucursal(id, cod_sucursal, direccion){
    var datos = 'id='+id+'&cod_sucursal='+cod_sucursal+'&direccion='+direccion;
    $.ajax({
        type: "POST",
        url: "../APP/APP_ADM_SUCURSALES_ADS/DB/VERIFICA_SUCURSAL.php",
        data: datos,
        success: function (r) {
            if (r == 1) {
                $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>C&oacute;digo Existente.</span>");
                global_app_sucursal_ads = true
            }
            else if (r == 2) {
                $('#msgDireccion').fadeIn(1000).html("<span style='color:#FF0000;'>Direcci&oacute;n Existente.</span>");
                global_app_sucursal_ads = true
            }
            else if (r == 3) {
                $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>C&oacute;digo Existente.</span>");
                $('#msgDireccion').fadeIn(1000).html("<span style='color:#FF0000;'>Direcci&oacute;n Existente.</span>");
                global_app_sucursal_ads = true
            }
        }
    });
}

function valida_formulario_app_sucursal_ads ()
{
    if (document.getElementById('codigo').value == '')
    {
        $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese C&oacute;digo Sucursal.</span>");
        global_app_sucursal_ads = true
    }
    else {
        if(!validaNumeros(document.getElementById('codigo').value)){
            $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>C&oacute;digo Sucursal Inv&aacute;lida.</span>");
            global_app_sucursal_ads = true
        }else
            $('#msgCodigo').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('direccion').value == '')
    {
        $('#msgDireccion').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Direcci&oacute;n.</span>");
        global_app_sucursal_ads = true
    }
    else {
        if(!validaNumeros(document.getElementById('direccion').value)){
            $('#msgDireccion').fadeIn(1000).html("<span style='color:#FF0000;'>Direcci&oacute;n Inv&aacute;lida.</span>");
            global_app_sucursal_ads = true
        }else
            $('#msgDireccion').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('nodoPrimario').value == '')
    {
        $('#msgNodoPrimario').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nodo Primario.</span>");
        global_app_sucursal_ads = true
    }
    else {
        if(!validaNodos(document.getElementById('nodoPrimario').value)){
            $('#msgNodoPrimario').fadeIn(1000).html("<span style='color:#FF0000;'>Nodo Primario Inv&aacute;lido.</span>");
            global_app_sucursal_ads = true
        }else
            $('#msgNodoPrimario').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('ipPrimario').value == '')
    {
        $('#msgIpPrimario').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese IP Primario.</span>");
        global_app_sucursal_ads = true
    }
    else{
        if(!validaIp(document.getElementById('ipPrimario').value)){
            $('#msgIpPrimario').fadeIn(1000).html("<span style='color:#FF0000;'>IP Primario Inv&aacute;lido.</span>");
            global_app_sucursal_ads = true
        }
        else
            $('#msgIpPrimario').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('nodoSecundario').value == '')
    {
        $('#msgNodoSecundario').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nodo Secundario.</span>");
        global_app_sucursal_ads = true
    }
    else{
        if(!validaNodos(document.getElementById('nodoSecundario').value)){
            $('#msgNodoSecundario').fadeIn(1000).html("<span style='color:#FF0000;'>Nodo Secundario Inv&aacute;lido.</span>");
            global_app_sucursal_ads = true
        }else
            $('#msgNodoSecundario').fadeIn(1000).html("&nbsp;");
    }

    if (document.getElementById('ipSecundario').value == '')
    {
        $('#msgIpSecundario').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese IP Secundario.</span>");
        global_app_sucursal_ads = true
    }
    else{
        if(!validaIp(document.getElementById('ipSecundario').value)){
            $('#msgIpSecundario').fadeIn(1000).html("<span style='color:#FF0000;'>IP Secundario Inv&aacute;lido.</span>");
            global_app_sucursal_ads = true
        }
        else
            $('#msgIpSecundario').fadeIn(1000).html("&nbsp;");
    }

}

function eli_app_sucursal_ads(id)
{
    var si = confirm('Realmente desea eliminar esta Sucursal ADS?');
    if (si)
    {
        variables = 'id='+id;
    }
    else
    {
        global_app_sucursal_ads = true;
    }

    return variables;
}


