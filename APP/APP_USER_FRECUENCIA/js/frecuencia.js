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
            window.scrollTo(0, 0);
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
        url: url,
        data: 'id='+id,
        success: function(data) {
            $('#forms').html(data);
        },
        complete: function(){
            $('#loading').hide();
            $('#forms').fadeIn('slow');
            //window.scrollTo(0, document.body.scrollHeight);
            //$("html, body").animate({ scrollTop: 0 }, "slow");

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
                window.scrollTo(0, 0);
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



