//cargar una pagina al principio 
window.onload = function () {
    respuesta();
}


function respuesta() {
    var respuesta = document.getElementById("respuesta").value;
    var modal = document.getElementById("modal");
    if (respuesta == "") {
        modal.style.display = "none";
    } else {
        modal.style.display = "block";
    }
}

//Validar formulario de publicar inmueble
function formInmuebleSet() {
    //capturar los id
    var oferta = document.getElementById("c1").value;
    var Tipo_de_Inmueble = document.getElementById("c2").value;
    var ciudad = document.getElementById("c6").value;
    var imagenes = document.getElementById("c15").files;

    //verificar
    if (oferta == "--oferta--") {
        alert("Debe seleccionar una oferta");
        return false;
    }
    if (Tipo_de_Inmueble == "--Tipo de Inmueble--") {
        alert("Debe seleccionar un Tipo de Inmueble");
        return false;
    }
    if (ciudad == "--Ciudad--") {
        alert("Debe seleccionar un Ciudad");
        return false;
    }

    if (imagenes.length > 20) {
        alert("Supera la cantidad máxima de imagenes");
        return false;
    }
    
    return true;
}

function formInmuebleEdit() {
    //capturar los id
    var oferta = document.getElementById("c1").value;
    var Tipo_de_Inmueble = document.getElementById("c2").value;
    var ciudad = document.getElementById("c6").value;
    var imagenes = document.getElementById("c15").files;

    //verificar
    if (oferta == "--oferta--") {
        alert("Debe seleccionar una oferta");
        return false;
    }
    if (Tipo_de_Inmueble == "--Tipo de Inmueble--") {
        alert("Debe seleccionar un Tipo de Inmueble");
        return false;
    }
    if (ciudad == "--Ciudad--") {
        alert("Debe seleccionar un Ciudad");
        return false;
    }

    if (imagenes.length > 20) {
        alert("Supera la cantidad máxima de imagenes");
        return false;
    }
    
    return true;
}

//Validar formulario de publicar inmueble
function formInmuebleFotos() {
    //capturar los id
    var imagenes = document.getElementById("c15").files;

    if (imagenes.length > 20) {
        alert("Supera la cantidad máxima de imagenes");
        return false;
    }
    
    return true;
}


function formUsuarioSet(){
    var rol = document.getElementById("c3").value;
    
    //verificar
    if (rol == "--Rol--") {
        alert("Debe seleccionar un Rol");
        return false;
    }
    return true;
}


//Formater numero 
function format(input) {
    var num = input.value.replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        input.value = num;
    } else {
        alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g, '');
    }
}






// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function myFunction() {
    var x = document.getElementById("demo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

