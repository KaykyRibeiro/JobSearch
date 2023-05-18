var notif = window.document.getElementById('notificacao')
var imgNotificacao = document.querySelector(".icon-notif")
const header = document.querySelector("header")

var home = document.getElementById('home')
var imgHome = document.querySelector(".imgHome")
    
const msg = "teste de alerta !!!"
const divMessage = document.querySelector(".alert")
notif = document.querySelector("button")

function clicar(msg){
    const message = document.createElement("div")
    message.classList.add("message")
    message.innerText = msg
    divMessage.appendChild(message)
}
var ativNotif = false
notif.addEventListener("click", () => {
    
    if(ativNotif){
        ativNotif = false
        imgNotificacao.setAttribute("src", "./imagens/sino.png")
        notif.classList.remove("selecionado")
        home.classList.add("selecionado")
        imgHome.setAttribute("src", "./imagens/home_azul.png")
        var destroi = document.querySelector("div.message")
        destroi.parentNode.removeChild(destroi)
        
        
    }else{
        ativNotif = true
        imgNotificacao.setAttribute("src", "./imagens/sino_azul.png")
        notif.classList.add("selecionado")
        home.classList.remove("selecionado")
        imgHome.setAttribute("src", "./imagens/home.png")
        clicar(msg)
    }
})



