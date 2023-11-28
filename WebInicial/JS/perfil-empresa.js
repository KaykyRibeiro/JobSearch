const btn1 = document.querySelector('#btn-1')
const btn2 = document.querySelector('#btn-2')
const btn3 = document.querySelector('#btn-3')
const btn4 = document.querySelector('#btn-4')

const div1 = document.querySelector('#div-1')
const div2 = document.querySelector('#div-2')
const div3 = document.querySelector('#div-3')
const div4 = document.querySelector('#div-4')

const btnAlterar = document.querySelector('#btn-editi-img')
const divEditImg = document.querySelector('#div-edit-img')
const btnCancelar = document.querySelector('#btn-cancelar')

const btnEdit = document.querySelectorAll('#btn-editar')
var config = 1


    btn1.addEventListener("click", () => {
        updateBtn1();
    });
    function updateBtn1(){
        btn1.classList.add("btn-ativo")
        div1.classList.add("ativo")

        btn2.classList.remove("btn-ativo")
        div2.classList.remove("ativo")

        btn3.classList.remove("btn-ativo")
        div3.classList.remove("ativo")

        btn4.classList.remove("btn-ativo")
        div4.classList.remove("ativo")

        config = 1
    }

    btn2.addEventListener("click", () => {
        updateBtn2();
    });
    function updateBtn2(){
        btn2.classList.add("btn-ativo")
        div2.classList.add("ativo")

        btn1.classList.remove("btn-ativo")
        div1.classList.remove("ativo")

        btn3.classList.remove("btn-ativo")
        div3.classList.remove("ativo")

        btn4.classList.remove("btn-ativo")
        div4.classList.remove("ativo")

        config = 2
    }

    btn3.addEventListener("click", () => {
        updateBtn3();
    });
    function updateBtn3(){
        btn3.classList.add("btn-ativo")
        div3.classList.add("ativo")

        btn1.classList.remove("btn-ativo")
        div1.classList.remove("ativo")

        btn2.classList.remove("btn-ativo")
        div2.classList.remove("ativo")

        btn4.classList.remove("btn-ativo")
        div4.classList.remove("ativo")

        config = 3
    }

    // btnEdit.addEventListener("click", () => {
    //     if(config === 1){
    //         const divConfig = document.querySelector('#divConfig')
    //         divConfig.innerHTML = `<p>teste</p>`
    //     }else if(config === 2){
    //         divConfig.innerHTML = `<p>teste</p>`
    //     }else if (config === 3){
    //         divConfig.innerHTML = `<p>teste</p>`
    //     }else if (config === 4){
    //         divConfig.innerHTML = `<p>teste</p>`
    //     }
    // });


    btnAlterar.addEventListener("click", () => {
        openEditImg();
    });
    function openEditImg(){
        divEditImg.classList.add("active")
    }
    btnCancelar.addEventListener("click", () => {
        closeEditImg();
    });
    function closeEditImg(){
        divEditImg.classList.remove("active")
    }
