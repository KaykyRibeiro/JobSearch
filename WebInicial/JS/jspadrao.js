const notif = document.querySelector('#notificacao')
const imgNotificacao = document.querySelector(".icon-notif")
const divNotofica = document.querySelector('#divNotif')    
const divMessage = document.querySelector(".alert")
var ativNotif = false

notif.addEventListener("click", () => {
    
    if(ativNotif){
        ativNotif = false
        notif.classList.remove("selecionado")        
        divNotofica.classList.remove("message")
    }else{
        ativNotif = true
        notif.classList.add("selecionado")
        divNotofica.classList.add("message")
    }
})

