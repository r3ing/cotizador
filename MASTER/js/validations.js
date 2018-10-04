'use strict';

function validaEmail(email){
    var regex = /^([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+$/;
    return regex.test(email);
}

function validaCellPhone(cellPhone){
    var regex = /(^9\d{8}$)|(^56\d{9}$)/;
    return regex.test(cellPhone);
}

function validaAlfanumerico(text){
    var regex = /^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s]+$/;
    return regex.test(text);
}

function validaNumeros(num){
    var regex = /^[\d]+$/;
    return regex.test(num);
}

function validaLetras(text){
    var regex = /^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/;
    return regex.test(text);
}

function validaLetrasSA(text){
    var regex = /^[A-Za-z0-9_/\s]+$/;
    return regex.test(text);
}

function validaRuta(text){
    var regex = /^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ_\s-]+$/;
    return regex.test(text);
}

function validaMenus(menu){
    var regex = /^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ/\s]+$/;
    return regex.test(menu);
}

function validaUsuario(text){
    var regex = /^[A-Za-z0-9-_\s]+$/;
    return regex.test(text);
}

function validaNodos(text){
    var regex = /^[A-Za-z0-9]+$/;
    return regex.test(text);
}

function validaIp(ip){
    var regex = /^((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){3}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})$/;
    return regex.test(ip);
}

function validaUrl(url){
    var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
    return regex.test(url);
}

function removeSpecialCharacters(text) {
    //var original = "áàäãâéèëêíìïóòöõôúùuñÁÀÄÃÂÉÈËÊÍÌÏÓÒÖÕÔÚÙÜÑçÇ";
    //var ascii    = "aaaaaeeeeiiiooooouuunAAAAAEEEEIIIOOOOOUUUNcC";
    var original = "áéíóúñÁÉÍÓÚÑ";
    var ascii    = "aeiounAEIOUN";
    var i;
    var j;
    for (j = 0; j < text.length; j++) {
        for (i = 0; i < original.length; i++) {
            text = text.replace(original.charAt(i), ascii.charAt(i));
        }
    }
    return text;
}

function onlyNumbers(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}