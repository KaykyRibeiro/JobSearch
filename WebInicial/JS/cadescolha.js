

const div = document.querySelector("div.escolhas")
function escolha() {
    var cadativo = document.getElementById('btncad')
    if (cadativo.classList.contains('cadativo')) {
        cadativo.classList.remove("cadativo")
        cadativo.classList.add("cadastro")
        div.innerHTML = ''
    } else {
        div.innerHTML += ` <a href="cadastro_empresa.php"><input class="escolha" type="button" value="EMPRESA" id="empresa" onmouseenter="msgEmpresa()" onmouseout="msgEmpresaSair()"></a>`
        div.innerHTML += `<a href="cadastro_candidato.php"><input class="escolha" type="button" value="CANDIDATO" id="candidato" onmouseenter="msgCandidato()" onmouseout="msgCandidatoSair()"></a>`
        cadativo.classList.remove("cadastro")
        cadativo.classList.add("cadativo")
        const empresa = window.document.getElementById('empresa')
        empresa = document.querySelector("button")
        const candidato = window.document.getElementById('candidato')
        candidato = document.querySelector("button")
    }

}
function msgEmpresa() {
    const divMessage = document.querySelector("div.escolhas")
        

        empresa.classList.remove("emp")
        empresa.classList.add("empAtivo")
        const message = document.createElement("div")
        message.classList.add("msgEmpresa")
        message.innerHTML = `<h1>Empresa</h1>
                             <p>Cadastre sua empresa e comece hoje a oferecer oportunidades para os jovens iniciarem suas carreiras profissionais.</p>
                             <br>`
        divMessage.appendChild(message)
        var destroi = document.querySelector("div.msgCandidato")
        destroi.parentNode.removeChild(destroi)
    
}
function msgEmpresaSair(){
        empresa.classList.remove("empAtivo")
        empresa.classList.add("emp")
        ativNotif = false
        var destroi = document.querySelector("div.msgEmpresa")
        destroi.parentNode.removeChild(destroi)
}
function msgCandidato() {
    const divMessage = document.querySelector("div.escolhas")
        candidato.classList.remove("can")
        candidato.classList.add("canAtivo")
        const message = document.createElement("div")
        message.classList.add("msgCandidato")
        message.innerHTML = `<h1>Candidato</h1>
                             <p>Cadastre-se e encontre a sua primeira oportunidade de emprego que se adeque às suas características.</p>
                             <br>`
        divMessage.appendChild(message)
        var destroi = document.querySelector("div.msgEmpresa")
        destroi.parentNode.removeChild(destroi)
    
}
function msgCandidatoSair(){
        candidato.classList.remove("canAtivo")
        candidato.classList.add("can")
        ativNotif = false
        var destroi = document.querySelector("div.msgCandidato")
        destroi.parentNode.removeChild(destroi)
}
