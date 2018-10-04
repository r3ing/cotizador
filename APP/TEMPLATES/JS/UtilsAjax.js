// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

var hoy = new Date();
var dd = hoy.getDate();
var mm = hoy.getMonth()+1; //hoy es 0!
var yyyy = hoy.getFullYear();

if(dd<10) {
    dd='0'+dd
}

if(mm<10) {
    mm='0'+mm
}

$(function() {
    $('#dateIni').datepicker({
        format: "dd-mm-yyyy",
        endDate: dd+'-'+mm+'-'+yyyy,
        clearBtn: true,
        orientation: "bottom left",
        autoclose: true
    });
    $('#dateFin').datepicker({
        format: "dd-mm-yyyy",
        endDate: dd+'-'+mm+'-'+yyyy,
        clearBtn: true,
        orientation: "bottom left",
        autoclose: true
    });
});

function setDoc(boleta){

    if(!isNaN(boleta)){
        uri = document.getElementById('ifJournal').getAttribute('src');
        document.getElementById('ifJournal').setAttribute('src', uri.substring(0, uri.length - String(boleta).length)+String(boleta));
        document.getElementById('nDoc').setAttribute('data-b', boleta);
    }
}

function showJournal(b){
    if(!isNaN(b)){
        document.getElementById('nDoc').setAttribute('data-b', '');
        document.getElementById('tools-shj').style.display = "none";
        uri = document.getElementById('ifJournal').getAttribute('src');
        document.getElementById('ifJournal').setAttribute('src', uri.substring(0, uri.length - (String(b).length + 8)));
    }
}

$(document).ready(function() {
    $('#form, #fat, #formTest, #formSearch').submit(function() {
        $('#loading').show();
        $('#result').hide();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);
            },
            complete: function(){
                $('#loading').hide();
                $('#result').fadeIn('slow');
            }
        })

        return false;
    });
});


$('#file').change(function (){
    var file = $(this).val().toLowerCase(),
        regex = new RegExp(/(.*?)\.(xls|xlsx)$/);
    if(file != null){
        if(!regex.test(file)){
            $(this).val('');
            alert('Seleccione un archivo correcto');
        }
    }
});


/*
function submitForm()
{
    var sendForm = true;
    var dateIni = document.getElementById("dateIni").value.split("-");
    var dateIniParse = new Date(parseInt(dateIni[2]),parseInt(dateIni[1]-1),parseInt(dateIni[0]));
    var dateIniGetTime = dateIniParse.getTime();


    var dateFin = document.getElementById("dateFin").value.split("-");
    var dateFinParse = new Date(parseInt(dateFin[2]),parseInt(dateFin[1]-1),parseInt(dateFin[0]));
    var dateFinGetTime = dateFinParse.getTime();


    if (dateIniGetTime > dateFinGetTime) {
        alert('La fecha de inicio debe ser menor a la fecha de termino');
        sendForm = false;
    }


    $(document).ready(function() {
        console.log(sendForm + " antes del submit");
        $("#form, #fat, #formTest, #formSearchDateSuc, #formTransaccionesConTarjeta").submit(function() {
            console.log("entro al submit");
            if (sendForm == true){
                console.log(sendForm);
                $('#loading').show();
                $('#result').hide();
                $.ajax({
                    type: 'POST',
                    //url: $(this).attr('action'),
                    url: 'TABLE.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result').html(data);
                    },
                    complete: function(){
                        $('#loading').hide();
                        $('#result').fadeIn('slow');
                    }
                })

                return false;
            }
        });
    });

    return sendForm;
}
*/
