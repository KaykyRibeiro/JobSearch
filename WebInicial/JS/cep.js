/*const enderesso = document.querySelector("")*/
const cepInput = document.querySelector("#cep")
const logradouro = document.querySelector("#logradouro")
const cidade = document.querySelector("#cidade")
const bairro = document.querySelector("#bairro")
const estado = document.querySelector("#estado")

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

    if(dados.erro== "true"){
        cepInput.reset();
        return;
    }
};

const message = (msg) =>{
    const messageElement = document.querySelector("#message");
    const msgText = document.querySelector("#txtmsg")

    messageElement.classList.add("msg")
    messageElement.innerHTML = `<h3>ERRO</h3>`
    msgText.innerText = msg
    messageElement.innerHTML = `<button onclick="close()" class="close">
                                Fechar
                                </button>`

}