/*const enderesso = document.querySelector("")*/
const cepInput = document.querySelector("#cep")
const ruaInput = document.querySelector("#logradouro")
const cidadeInput = document.querySelector("#cidade")
const bairroInput = document.querySelector("#bairro")
const estadoInput = document.querySelector("#estado")
/*const senha2 = document.querySelector("#senha2")*/
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

    ruaInput.value = dados.logradouro
    cidadeInput.value = dados.localidade
    bairroInput.value = dados.bairro
    estadoInput.value = dados.uf

};
function message(msg){
    console.log("teste")
    const message = document.createElement("div")
    message.classList.add("msg")
    message.innerText = msg
    
    message.innerHTML += `<button  class="btn" id="btn">Fechar</button>` 
    divMessage.appendChild(message)
    

    const btn = document.querySelector("button")
    btn.addEventListener("click", () => {
        msg = ""
        message.classList.remove("msg")
        message.innerHTML = ``
    })
}


/*senha2.addEventListener("keyup", (e) =>{
    const senha2Input = e.target.value
    const senha1Input = document.getElementById("#senha1").value
    console.log(senha1Input)
    console.log(senha2Input)
    if(senha1Input != senha2Input){
    message("SENHAS INVÁLIDAS.");
    return;
}
});*/


    
    