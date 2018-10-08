'use strict'

$(function(){
    showTable();
    /*$('#loading').show();
    $('#result').hide();
    $.ajax({
        type: 'GET',
        url: 'VIEW/LIST.php',
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    })*/
});

$('#load').on('submit', function(e) {
    e.preventDefault();
    $('#result').hide();
    $('#loading').show();
    $.ajax({
        type: 'POST',
        url: 'DB/ADD_DB.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
        },
        success: function (data) {
            if(data = 1){
                //document.getElementById('result').innerHTML = " <?php include 'VIEW/_LIST.php';?> ";
                //$("#result").html(" <?php include 'VIEW/_LIST.php';?> ");
                $("#result").load('VIEW/LIST.php');
                document.getElementById('file').value='';
            }
            else if(data == 0){
                alert('Error! Problemas al cargar archivos');
                document.getElementById('file').value='';
            }
            else if(data == 2){
                alert('Error! Problemas de Comunicaci\u00F3n');
                document.getElementById('file').value = '';
            }else{
                alert('Seleccione un archivo correcto');
                $('#file').val('');
            }
        },
        complete: function () {
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    });
});

function showTable(){
    $('#loading').show();
    $('#result').hide();
    $.ajax({
        type: 'GET',
        url: 'VIEW/LIST.php',
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    })
}


function _edit(id){
    $('#formFiles').hide();
    $('#result').hide();
    $('#loading').show();
    $.ajax({
        type: 'POST',
        url: 'DB/EDIT.php',
        data: 'id='+id,
        success: function(data) {
            $('#result').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    })
}

function _delete(id){
    var si = confirm('Realmente desea eliminar esta frecuencia?')
    if (si)    {
        $('#formFiles').hide();
        $('#result').hide();
        $('#loading').show();
        $.ajax({
            type: 'POST',
            url: 'DB/DELETE_DB.php',
            data: 'id='+id,
            success: function(data) {
                $('#result').html(data);
            },
            complete: function(){
                $('#loading').hide();
                $('#result').fadeIn('slow');
            }
        })
    }
}

function cancel(){
    $('#formFiles').fadeIn('slow');
    showTable();
}

function validateFrm(){
    var form = true;

    if (document.getElementById('codigo').value == '')
    {
        $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese C&oacute;digo.</span>");
        form = false;
    }
    else{
        if(!validaAlfanumerico(document.getElementById('codigo').value)){
            $('#msgCodigo').fadeIn(1000).html("<span style='color:#FF0000;'>C&oacute;digo Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgCodigo').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('tienda').value == '')
    {
        $('#msgTienda').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Tienda.</span>");
        form = false;
    }
    else{
        if(!validaAlfanumerico(document.getElementById('tienda').value)){
            $('#msgTienda').fadeIn(1000).html("<span style='color:#FF0000;'>Tienda Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgTienda').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('despacho').value == '')
    {
        $('#msgDespacho').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Despacho.</span>");
        form = false;
    }
    else{
        if(!validaAlfanumerico(document.getElementById('despacho').value)){
            $('#msgDespacho').fadeIn(1000).html("<span style='color:#FF0000;'>Despacho Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgDespacho').fadeIn(1000).html("&nbsp;");
        }
    }

    return form;
}



