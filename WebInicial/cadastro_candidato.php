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
        <form action="validar_cadastro.php" method="post" id="formes">
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
                    <input type="text" name="txtlogradouro" id="logradouro" data-input required/>
                    <label>Rua</label>
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
                    <input type="password" name="txtsenha" id="senha1" minlength="8" required />
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
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="GO">GO</option>
                        <option value="ES">ES</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SE">SE</option>
                        <option value="SP">SP</option>
                        <option value="TO">TO</option>
                    </select>
                    
                </div>

                <div class="caixa__login-input">
                    <input type="tel" name="txttelefone" maxlength="15" onkeyup="handlePhone(event)" required />
                    <label>Telefone</label>
                </div>

                <div class="caixa__login-input">
                    <input type="password" name="txtsenha2" id="senha2" minlength="8" required />
                    <label>Confirmar Senha</label>

                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txthab" required />
                    <label>Habilidades</label>
                </div>
            </div>
            
            <p><input type="checkbox" required /> Aceito os <a href="termos.html">Termos de uso</a></p>
            <input class="acessar" type="submit" onclick="validarSenha()" value="Cadastrar-se">
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

        function validarSenha(){
        senha1 = document.getElementById('senha1').value;
        senha2 = document.getElementById('senha2').value;
        if (senha1 != senha2) {
            alert("SENHAS DIFERENTES! DIGITAR SENHAS IGUAIS"); 
            document.getElementById('senha1').value = "";
            document.getElementById('senha2').value = "";
        }else{
            document.formes.submit();
        }
        }
    </script>
</html>