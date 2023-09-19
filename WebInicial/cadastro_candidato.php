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
    <script src="./JS/cep.js" defer></script>
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
                    <input type="text" name="txtcep" id="cep" data-mask="00000-000" minlength="8" maxlength="8" required/>
                    <label>CEP</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtlogradouro" id="logradouro" required/>
                    <label>Logradouro</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtcomplemento" required />
                    <label>complemento</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtcidade" id="cidade" required />
                    <label>Cidade</label>
                </div>
                <div class="caixa__login-input">
                    <input type="email" name="txtemail" required />
                    <label>E-mail</label>
                </div>
                <div class="caixa__login-input">
                    <input type="password" name="txtsenha" minlength="8" required />
                    <label>Senha</label>
                </div>
                <div class="caixa__login-input">
                    <label>Sexo</label>
                    <select class="select" name="sexo" required/>
                        <option selected disabled>Informe seu sexo biológico</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
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
                    <input type="text" name="txtbairro" id="bairro" required />
                    <label>Bairro</label>
                </div>

                <div class="caixa__login-input">
                    <label>Estado</label>
                    <select class="select" name="estado" id="estado" required/>
                        <option selected disabled>Informe seu Estado</option>
                        <option value="1">AC</option>
                        <option value="2">AL</option>
                        <option value="3">AP</option>
                        <option value="4">AM</option>
                        <option value="5">BA</option>
                        <option value="6">CE</option>
                        <option value="7">DF</option>
                        <option value="8">GO</option>
                        <option value="9">ES</option>
                        <option value="10">MA</option>
                        <option value="11">MT</option>
                        <option value="12">MS</option>
                        <option value="13">MG</option>
                        <option value="14">PA</option>
                        <option value="15">PB</option>
                        <option value="16">PR</option>
                        <option value="17">PE</option>
                        <option value="18">PI</option>
                        <option value="19">RJ</option>
                        <option value="20">RN</option>
                        <option value="21">RS</option>
                        <option value="22">RO</option>
                        <option value="23">RR</option>
                        <option value="24">SC</option>
                        <option value="25">SE</option>
                        <option value="26">SP</option>
                        <option value="27">TO</option>
                    </select>
                    
                </div>

                <div class="caixa__login-input">
                    <input type="tel" name="txttelefone" maxlength="15" onkeyup="handlePhone(event)" required />
                    <label>Telefone</label>
                </div>

                <div class="caixa__login-input">
                    <input type="password" name="txtsenha2" minlength="8" required />
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
    <div class="mensagem">
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


        const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
        }
    </script>
</html>