

const div = document.querySelector("div.escolhas")
function escolha(){
    var cadativo = document.getElementById('btncad')
    if(cadativo.classList.contains('cadativo')){
        cadativo.classList.remove("cadativo")
        cadativo.classList.add("cadastro")
        div.innerHTML = ''
    }else{
        div.innerHTML += `<input class="escolha" type="button" value="EMPRESA">`
        div.innerHTML += `<input class="escolha" type="button" value="CANDIDATO">`
        cadativo.classList.remove("cadastro")
        cadativo.classList.add("cadativo")
    }
    
}
