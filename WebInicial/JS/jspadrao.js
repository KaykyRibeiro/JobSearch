var notif = window.document.getElementById('notificacao')
    
const msg = "teste de alerta !!!"
const divMessage = document.querySelector(".alert")
notif = document.querySelector("button")


function clicar(msg){
    const message = document.createElement("div")
    message.classList.add("message")
    message.innerText = msg
    divMessage.appendChild(message)
}



notif.addEventListener('click', ()=>{
    clicar(msg)
})
