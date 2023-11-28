const openButton = document.querySelector('#detalheBtn')
const divPopup = document.querySelector('#div-popup')
const closeButton = document.querySelector('#close')
const aceito = document.querySelector('#aceito')
const rejeitado = document.querySelector('#rejeitado')
const alertAceito = document.querySelector('#alert-aceito')
const alertRejeitado = document.querySelector('#alert-rejeitado')
const finalizar = document.querySelector('#finaliza')


openButton.addEventListener("click" , () => {
    openDiv();
});
function openDiv(){
    divPopup.classList.add("ativa-popup")
}

closeButton.addEventListener("click" , () => {
    closeDiv();
});
function closeDiv(){
    divPopup.classList.remove("ativa-popup")
}

aceito.addEventListener("click" , () => {
    aceitoAlert();
});
function aceitoAlert(){
    alertAceito.classList.add("ativa-popup")
    alertRejeitado.classList.remove("ativa-popup")
}
rejeitado.addEventListener("click" , () => {
    rejeitadoAlert();
});
function rejeitadoAlert(){
    alertRejeitado.classList.add("ativa-popup")
    alertAceito.classList.remove("ativa-popup")
}
