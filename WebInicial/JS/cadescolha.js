

const div = document.querySelector("div.escolhas")
function escolha() {
    var cadativo = document.getElementById('btncad')
    if (cadativo.classList.contains('cadativo')) {
        cadativo.classList.remove("cadativo")
        cadativo.classList.add("cadastro")
        div.innerHTML = ''
    } else {
        div.innerHTML += ` <a href="cadastro_empresa.php"><input class="escolha" type="button" value="EMPRESA" id="empresa" onmouseenter="msgEmpresa()" onmouseout="msgEmpresaSair()"></a>`
        div.innerHTML += `<a href="cad_candidato.php"><input class="escolha" type="button" value="CANDIDATO" id="candidato" onmouseenter="msgCandidato()" onmouseout="msgCandidatoSair()"></a>`
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
                             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum molestiae, eos praesentium nihil consequatur fuga cumque aliquam aperiam, est odit labore ratione recusandae ducimus architecto dolor explicabo! Tenetur, est molestias?</p>
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
                             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum molestiae, eos praesentium nihil consequatur fuga cumque aliquam aperiam, est odit labore ratione recusandae ducimus architecto dolor explicabo! Tenetur, est molestias?</p>
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
