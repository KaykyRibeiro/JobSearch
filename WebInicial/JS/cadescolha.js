

const div = document.querySelector("div.escolhas")
function escolha(){
    var cadativo = document.getElementById('btncad')
    if(cadativo.classList.contains('cadativo')){
        cadativo.classList.remove("cadativo")
        cadativo.classList.add("cadastro")
        div.innerHTML = ''
    }else{
        div.innerHTML += `<input class="escolha" type="button" value="EMPRESA" id="empresa" onclick="msgEmpresa()">`
        div.innerHTML += `<input class="escolha" type="button" value="CANDIDATO" id="candidato" onclick="msgCandidato()">`
        cadativo.classList.remove("cadastro")
        cadativo.classList.add("cadativo")
        const empresa = window.document.getElementById('empresa')
        empresa = document.querySelector("button")
        const candidato = window.document.getElementById('candidato')
        candidato = document.querySelector("button")
    }
    
}
function msgEmpresa(){
    const divMessage = document.querySelector("div.escolhas")
    if(empresa.classList.contains('empAtivo')){
        empresa.classList.remove("empAtivo")
        empresa.classList.add("emp")
        ativNotif = false
        var destroi = document.querySelector("div.msgEmpresa")
        destroi.parentNode.removeChild(destroi)
        
        
    }else{
        empresa.classList.remove("emp")
        empresa.classList.add("empAtivo")
        const message = document.createElement("div")
        message.classList.add("msgEmpresa")
        message.innerHTML = `<h1>Empresa</h1>
                             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum molestiae, eos praesentium nihil consequatur fuga cumque aliquam aperiam, est odit labore ratione recusandae ducimus architecto dolor explicabo! Tenetur, est molestias?</p>
                             <input class="cadastro" type="button" value="CADASTRE AGORA!">`
        divMessage.appendChild(message)
        var destroi = document.querySelector("div.msgCandidato")
        destroi.parentNode.removeChild(destroi)
    }
}
function msgCandidato(){
    const divMessage = document.querySelector("div.escolhas")
    if(candidato.classList.contains('canAtivo')){
        candidato.classList.remove("canAtivo")
        candidato.classList.add("can")
        ativNotif = false
        var destroi = document.querySelector("div.msgCandidato")
        destroi.parentNode.removeChild(destroi)
        
        
    }else{
        candidato.classList.remove("can")
        candidato.classList.add("canAtivo")
        const message = document.createElement("div")
        message.classList.add("msgCandidato")
        message.innerHTML = `<h1>Candidato</h1>
                             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum molestiae, eos praesentium nihil consequatur fuga cumque aliquam aperiam, est odit labore ratione recusandae ducimus architecto dolor explicabo! Tenetur, est molestias?</p>
                             <input class="cadastro" type="button" value="CADASTRE AGORA!">`
        divMessage.appendChild(message)
        var destroi = document.querySelector("div.msgEmpresa")
        destroi.parentNode.removeChild(destroi)
    }
}
