<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Estilos/estilos.css">
</head>

<body>
    <div class="caixa__login">
        <h2>Login</h2>
        <form action="validar_login.php" method="post" id="formes">
            <div class="caixa__login-input">
                <input type="text" name="CPJ" id="cpj" maxlength="18" required />
                <label>Informe o CPF ou CNPJ</label>
            </div>
            <div class="caixa__login-input">
                <input type="password" name="txtsenha" required />
                <label>Senha</label>

            </div>
            <input class="acessar" type="submit" value="Acessar">
            <!-- <a class="acessar" href="home.php">Acessar</a>-->

        </form>
        <a class="recupera" href="recuperarsenha.html">esqueceu a senha?</a>
        <p>Não possui uma conta? <a href="index.html">Cadastre-se</a></p>
    </div>

</body>
<script>
    const formes = document.querySelector("#formes")
    const cpj = document.querySelector("#cpj") 
    cpj.addEventListener("keypress", (e) => {
    const numeros = /[0-9]/;
    const key = String.fromCharCode(e.keyCode);
        
    if (!numeros.test(key)) {
        e.preventDefault();
        return;
    };
    });
    
   /* function mascara(){
        
        
        console.log(valor)
        console.log(element)
            if(element == 14){
                valor = valor.replace(/^(\d{2})\.(\d{3})(\d)/, "$1 $2 $3")
                valor = valor.replace(/^(\d)(\d{4})$/,"$1-$2")
                valor = valor.replace(/(\d{4})(\d)/, "$1-$2")
                return valor
            }
            
            if(element == 11){
                 valor = valor.replace(/\D/g,'')
                valor = valor.replace(/[^\d]/g, "").replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4")
                return valor 
            }
            if (!valor) return "Erro"
    }*/

    
    document.getElementById('cpj').addEventListener('input', function (e) {
    let valor = document.querySelector("#cpj").value;
    var element = valor.length
    console.log(valor)
    console.log(element)
   
    if(element <= 12){
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '-' + x[4] + (x[5] ? '-' + x[5] : '');
    }
    if(element >= 15){
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
      e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
    }  
    });
    
        
        
       
        
        
           
</script>

</html>