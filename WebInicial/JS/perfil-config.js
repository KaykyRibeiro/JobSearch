const parametro = new URLSearchParams(window.location.search)
const paramConif = parametro.get("config")
const divPerfil = document.querySelector('#divPerfil')
const divConta = document.querySelector('#divConta')
const divEndereco = document.querySelector('#divEndereco')
const divHabilidade = document.querySelector('#divHabilidade')

if(paramConif === "perfil"){
    divPerfil.classList.add("ativo")
    divConta.classList.remove("ativo")
    divEndereco.classList.remove("ativo")
    divHabilidade.classList.remove("ativo")
}else if(paramConif === "conta"){
    divConta.classList.add("ativo")
    divPerfil.classList.remove("ativo")
    divEndereco.classList.remove("ativo")
    divHabilidade.classList.remove("ativo")
}
else if(paramConif === "endereco"){
    divEndereco.classList.add("ativo")
    divPerfil.classList.remove("ativo")
    divConta.classList.remove("ativo")
    divHabilidade.classList.remove("ativo")
}
else if(paramConif === "habilidade"){
    divHabilidade.classList.add("ativo")
    divPerfil.classList.remove("ativo")
    divConta.classList.remove("ativo")
    divEndereco.classList.remove("ativo")
}







// if(window.location.href.split("?")[1] == "perfil"){
//     console.log("perfil")
// }else if(window.location.href.split("?")[1] == "conta"){
//     console.log("conta")
// }