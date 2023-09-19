/*const enderesso = document.querySelector("")*/
const cepInput = document.querySelector("#cep")
const logradouro = document.querySelector("#logradouro")
const cidade = document.querySelector("#cidade")
const bairro = document.querySelector("#bairro")
const estado = document.querySelector("#estado")

const divMessage = document.querySelector(".mensagem")


cepInput.addEventListener("keypress", (e) =>{
    const numeros = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);

    if(!numeros.test(key)){
        e.preventDefault();
        return;
    };
});

cepInput.addEventListener("keyup", (e) =>{
    const inputValor = e.target.value

    if(inputValor.length == 8){
        getEnderesso(inputValor);
    }
});

const getEnderesso = async (cep) =>{
    

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;
    const reposta = await fetch(apiUrl);
    const dados = await reposta.json();
    console.log(dados)

    if(dados.erro == "true"){
        message("ERRO! CEP INVÁLIDO.");
        return;
    }
};
function message(msg){
    console.log("teste")
    const message = document.createElement("div")
    message.classList.add("msg")
    message.innerText = msg
    
    divMessage.innerHTML += `<button  class="btn" id="btn">Fechar</button>` 
    divMessage.appendChild(message)
    
}


    
    