// JavaScript Document

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

//Función para recoger los datos del formulario y enviarlos por post
function resultadoComprasFuncionarios(){

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultadoComprasFuncionarios');
    //recogemos los valores de los inputs
    dateIni=document.formComprasFuncionarios.dateIni.value;
    dateFin=document.formComprasFuncionarios.dateFin.value;
    sucursal=document.formComprasFuncionarios.sucursal.value;

    //instanciamos el objetoAjax
    ajax=objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "RESULT.php",true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange=function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState==4) {
            divResultado.innerHTML=ajax.responseText;
        }else{
            //divResultado.innerHTML='../MASTER/images/loaders/loader6.gif';
            document.getElementById('resultadoComprasFuncionarios').innerHTML='Cargando...';
        }
        // if (ajax.readyState==4) {
            //mostrar resultados en esta capa
            // divResultado.innerHTML = ajax.responseText
            //llamar a funcion para limpiar los inputs
            // LimpiarCampos();
        // }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("dateIni="+dateIni+"&dateFin="+dateFin+"&sucursal="+sucursal)
}



function enviarDatosEmpleado(){

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('divJournal');
    //recogemos los valores de los inputs
    dateJournal=document.formJournal.dateJournal.value;
    cod_sucursal=document.formJournal.cod_sucursal.value;
    terminal=document.formJournal.terminal.value;
    boleta=document.formJournal.boleta.value;

    //instanciamos el objetoAjax
    ajax=objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "JOURNAL.php",true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange=function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState==4) {
            divResultado.innerHTML=ajax.responseText;
        }else{
            //divResultado.innerHTML='../MASTER/images/loaders/loader6.gif';
            document.getElementById('divJournal').innerHTML='Cargando...';
        }
        // if (ajax.readyState==4) {
        //mostrar resultados en esta capa
        // divResultado.innerHTML = ajax.responseText
        //llamar a funcion para limpiar los inputs
        // LimpiarCampos();
        // }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("fecha="+fecha+"&cod_sucursal="+cod_sucursal+"&terminal="+terminal+"&boleta="+boleta)
}