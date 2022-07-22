//Implementacion del AddEvenListener
window.onload = function () {
    //Mi primer evento
    document.getElementById("MiBoton").addEventListener('click', function () {
        this.style.backgroundColor = "Blue"
    })

    document.getElementById("MiBoton").addEventListener('dblclick', function () {
        this.style.backgroundColor = "Red"

    })

    //Segundo evento
    document.getElementById("MiParrafo").addEventListener('click', cambiartexto);

}//Fin AddEvenListener


function cambiartexto() {
    document.getElementById("MiParrafo").innerHTML = "Derechos Reservados 2022";
}


function FechaActual() {
    var fecha = new Date();
     MiVariable  = "Clase de Programación";
    alert("La Fecha Actual es: "+ fecha.toUTCString());
}

function Suma() {
    var numero1 =  "10";
    var numero2 =  "5";
    var Total = numero1 + numero2;
}

