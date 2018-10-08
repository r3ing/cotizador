'use strict'

$(function(){
    showTable();
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
    var si = confirm('Realmente desea eliminar registro?')
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
    $('#formFiles').show();
    showTable();
}


function validateFrm(){
    var form = true;

    if (document.getElementById('sku').value == '')
    {
        $('#msgSku').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese SKU.</span>");
        form = false;
    }
    else{
        if(!validaNumeros(document.getElementById('sku').value)){
            $('#msgSku').fadeIn(1000).html("<span style='color:#FF0000;'>SKU Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgDespacho').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('descripcion').value == '')
    {
        $('#msgDescripcion').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Descripci&oacute;n.</span>");
        form = false;
    }
    else{
        if(!validaProvedor(document.getElementById('descripcion').value)){
            $('#msgDescripcion').fadeIn(1000).html("<span style='color:#FF0000;'>Descripci&oacute;n Inv&aacute;lida.</span>");
            form = false;
        }
        else{
            $('#msgDescripcion').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('rut').value == '')
    {
        $('#msgRut').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Rut.</span>");
        form = false;
    }
    else{
        if(!validaNumeros(document.getElementById('rut').value)){
            $('#msgRut').fadeIn(1000).html("<span style='color:#FF0000;'>Rut Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgRut').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('nombre').value == '')
    {
        $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Nombre.</span>");
        form = false;
    }
    else{
        if(!validaProvedor(document.getElementById('nombre').value)){
            $('#msgNombre').fadeIn(1000).html("<span style='color:#FF0000;'>Nombre Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgNombre').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('costo').value == '')
    {
        $('#msgCosto').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Costo.</span>");
        form = false;
    }
    else{
        if(!validaDecimal(document.getElementById('costo').value)){
            $('#msgCosto').fadeIn(1000).html("<span style='color:#FF0000;'>Costo Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgCosto').fadeIn(1000).html("&nbsp;");
        }
    }

    if (document.getElementById('capacidad').value == '')
    {
        $('#msgCapacidad').fadeIn(1000).html("<span style='color:#FF0000;'>Ingrese Capacidad.</span>");
        form = false;
    }
    else{
        if(!validaDecimal(document.getElementById('capacidad').value)){
            $('#msgCapacidad').fadeIn(1000).html("<span style='color:#FF0000;'>Capacidad Inv&aacute;lido.</span>");
            form = false;
        }
        else{
            $('#msgCapacidad').fadeIn(1000).html("&nbsp;");
        }
    }

    return form;
}




