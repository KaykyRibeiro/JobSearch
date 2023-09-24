var notif = window.document.getElementById('notificacao')
var imgNotificacao = document.querySelector(".icon-notif")


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

        notif.classList.remove("selecionado")

        var destroi = document.querySelector("div.message")
        destroi.parentNode.removeChild(destroi)
        
        
    }else{
        ativNotif = true

        notif.classList.add("selecionado")
        clicar(msg)
    }
})



