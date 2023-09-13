<?php
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./Estilos/estilos.css">
    <link rel="stylesheet" href="./Estilos/estilo2.css">
    
</head>

<body>
    <div class="caixa__cadastro">
        <h2>Cadastro Candidato</h2>
        <form action="validar_cadastro.php" method="post">
            <div class="caixa_cadastro_coluna1">
                <div class="caixa__login-input">
                    <input type="text" name="txtnome" required />
                    <label>Nome</label>
                </div>
                <div class="caixa__login-input">
                <input type="text" name="txtcpf"  data-mask="000.000.000-00" id="CPFInput" maxlength="11" oninput="criaMascara('CPF')" autocomplete="off" required />
                    <label>CPF</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtlogradouro" required />
                    <label>Logradouro</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtcomplemento" required />
                    <label>complemento</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtcidade" required />
                    <label>Cidade</label>
                </div>
                <div class="caixa__login-input">
                    <input type="email" name="txtemail" required />
                    <label>E-mail</label>
                </div>
                <div class="caixa__login-input">
                    <input type="password" name="txtsenha" required />
                    <label>Senha</label>
                </div>
                <div class="caixa__login-input">
                    <select class="select">
                        <option selected disabled>Informe seu sexo biológico</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                    
                </div>
            </div>
                
            <div class="caixa_cadastro_coluna2">
                <div class="caixa__login-input">
                    <input type="text" name="txtsobrenome" required />
                    <label>Sobrenome</label>
                </div>

                <div class="caixa__login-input">
                    <input  type="date" name="datanas" required />
                </div>

                <div class="caixa__login-input">
                    <input type="number_format" name="numero" required />
                    <label>Numero</label>
                </div>

                <div class="caixa__login-input">
                    <input type="text" name="txtbairro" required />
                    <label>Bairro</label>
                </div>

                <div class="caixa__login-input">
                    <input type="text" name="txtestado" required />
                    <label>Estado</label>
                </div>

                <div class="caixa__login-input">
                    <input type="tel" name="txttelefone"  data-mask="(00) 00000-0000" id="TELinput" maxlength="11" oninput="mascara('TEL')" autocomplete="off" required />
                    <label>Telefone</label>
                </div>

                <div class="caixa__login-input">
                    <input type="password" name="txtsenha2" required />
                    <label>Confirmar Senha</label>

                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txthab" required />
                    <label>Habilidades</label>
                </div>
            </div>
            
            <p><input type="checkbox" required /> Aceito os <a href="termos.html">Termos de uso</a></p>
            <input class="acessar" type="submit" value="Cadastrar-se">
            <!-- <a class="acessar" href="home.php">Acessar</a>-->
        </form>
    
    </div>
</body>
    <script>
        function criaMascara(mascaraInputCPF) {
        const maximoInput = document.getElementById(`${mascaraInputCPF}Input`).maxLength;
        let valorInput = document.getElementById(`${mascaraInputCPF}Input`).value;
        let valorSemPonto = document.getElementById(`${mascaraInputCPF}Input`).value.replace(/([^0-9])+/g, "");
        const mascaras = {
        CPF: valorInput.replace(/[^\d]/g, "").replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4")
        };

        valorInput.length === maximoInput ? document.getElementById(`${mascaraInputCPF}Input`).value = mascaras[mascaraInputCPF] : document.getElementById(`${mascaraInputCPF}Input`).value = valorSemPonto;
        };


        function mascara(mascaraInputTEL) {
        const maximoInput = document.getElementById(`${mascaraInputTEL}Input`).maxLength;
        let valorInput = document.getElementById(`${mascaraInputTEL}Input`).value;
        let valorSemPonto = document.getElementById(`${mascaraInputTEL}Input`).value.replace(/([^0-9])+/g, "");
        const mascaras = {
        TEL: valorInput.replace(/[^\d]/g, "").replace(/(\d{2})(\d{6})(\d{4})/, "($1) $2-$3")
        };

        valorInput.length === maximoInput ? document.getElementById(`${mascaraInputTEL}Input`).value = mascaras[mascaraInputTEL] : document.getElementById(`${mascaraInputTEL}Input`).value = valorSemPonto;
        };
    </script>
</html>