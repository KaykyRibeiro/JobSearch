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
        <h2>Cadastro Empresa</h2>
        <form action="validar_cadastro.php" method="post">
            <div class="caixa_cadastro_coluna1">
                <div class="caixa__login-input">
                    <input type="text" name="txtnome" required />
                    <label>Nome Empresa</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtcpf" maxlength="18" onkeyup="handlePhone(event)" required />
                    <label>CNPJ</label>
                </div>
                <div class="caixa__login-input">
                    <input type="text" name="txtlogradouro" required />
                    <label>Rua</label>
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
                    <label>E-mail de contato</label>
                </div>
            </div>

            <div class="caixa_cadastro_coluna2">
                <div class="caixa__login-input">
                    <input type="text" name="txtcep" id="cep" data-mask="00000-000" minlength="8" maxlength="8" required />
                    <label>CEP</label>
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
                    <label>Estado</label>
                    <select class="select" name="estado" id="estado" required />
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
                    <input type="tel" name="txttelefone" required />
                    <label>Telefone</label>
                </div>
                <div class="caixa__login-input">
                    <input type="password" name="txtsenha" required />
                    <label>Senha</label>

                </div>

                <div class="caixa__login-input">
                    <input type="password" name="txtsenha2" required />
                    <label>Confirmar Senha</label>

                </div>
            </div>

            <p><input type="checkbox" required /> Aceito os <a href="termos.html">Termos de uso</a></p>
            <input class="acessar" type="submit" value="Cadastrar-se">
            <!-- <a class="acessar" href="home.php">Acessar</a>-->
        </form>

    </div>
</body>
<script>
    const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g, '')
        value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, "$1.$2.$3/$4-$5")
        return value
    }
</script>

</html>