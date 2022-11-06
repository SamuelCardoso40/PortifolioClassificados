const data = new Date()

const dia = String(data.getDate()).padStart(2,'0') + "/"

const mes = String(data.getMonth() + 1).padStart(2,'0') + "/"

const ano = data.getFullYear()

const dataAtual = [dia + mes + ano]

var btn = document.querySelector("#btn");

function carData() {
    document.getElementById("data").innerHTML = dataAtual
}

//btn.addEventListener("click", function() {
   // document.getElementById("data").innerHTML = dataAtual
//})