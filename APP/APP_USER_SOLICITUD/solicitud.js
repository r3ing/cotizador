'use strict'

$(function(){
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
                $("#result").load('VIEW/LIST.php');
                document.getElementById('file').value='';

            }
            else if(data == 0){
                alert('Error! Problemas al cargar archivos');
                document.getElementById('file').value='';
            }
            else {
                alert('Error! Problemas de Comunicaci\u00F3n');
                document.getElementById('file').value = '';
            }
        },
        complete: function () {
            $('#loading').hide();
            $('#result').fadeIn('slow');
        }
    });
});



