<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/cadEstilo.css">
    <script src="./JS/cadScript.js"></script>
    <script src="./JS/cep.js" defer></script>
    <title>Cadastro</title>
</head>

<body>
    <form action="validar_cadastro.php" method="post" class="form" id="formes">
        <h1>Cadastro Candidato</h1>
        <div class="progressbar">
            <div class="progress-step progress-step-active" data-title="Dados"></div>
            <div class="progress-step" data-title="Endereço"></div>
            <div class="progress-step" data-title="Contato"></div>
        </div>
        <div class="form-step form-step-active">
            <div class="coluna">
                <div class="input-group">
                    <input type="text" name="txtnome" required />
                    <label>Nome</label>
                </div>
                <div class="input-group">
                    <input type="text" name="txtsobrenome" required />
                    <label>Sobrenome</label>
                </div>
                <div class="input-group">
                    <input type="date" class="data" name="datanas" required />
                </div>
                <div class="input-group">
                    <input type="text" name="txtcpf" data-mask="000.000.000-00" id="CPFInput" maxlength="11" oninput="criaMascara('CPF')" autocomplete="off" required />
                    <label>CPF</label>
                </div>
                <div class="input-group">
                    <label>Sexo</label>
                    <select class="select" name="sexo" required />
                    <option selected disabled>Informe seu sexo biológico</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    </select>

                </div>
            </div>
            <div class="">
                <a href="#" class="acessar btn">Proximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="coluna">
                <div class="input-group">
                    <input type="text" name="txtcep" id="cep" data-mask="00000-000" minlength="8" maxlength="8" required />
                    <label>CEP</label>
                </div>
                <div class="input-group">
                    <input type="text" name="txtlogradouro" id="logradouro" data-input required />
                    <label>Rua</label>
                </div>
                <div class="input-group">
                    <input type="text" name="txtcomplemento" required />
                    <label>complemento</label>
                </div>
                <div class="input-group">
                    <input type="text" name="txtcidade" id="cidade" required />
                    <label>Cidade</label>
                </div>
                <div class="input-group">
                    <input type="number_format" name="numero" required />
                    <label>Numero</label>
                </div>

                <div class="input-group">
                    <input type="text" name="txtbairro" id="bairro" required />
                    <label>Bairro</label>
                </div>

                <div class="input-group">
                    <label class="estado">Estado</label>
                    <select class="select" name="estado" id="estado" required />
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
            </div>

            <div class="btns-groups">
                <a href="#" class="acessar btns btn-prev">Voltar</a>
                <a href="#" class="acessar btns btn-next">Proximo</a>
            </div>
        </div>
        <div class="form-step">
            <div class="coluna">
                <div class="input-group">
                    <input type="email" name="txtemail" required />
                    <label>E-mail</label>
                </div>
                <div class="input-group">
                    <input type="tel" name="txttelefone" maxlength="15" onkeyup="handlePhone(event)" required />
                    <label>Telefone</label>
                </div>
                <div class="input-group">
                    <input type="password" name="txtsenha" id="senha1" minlength="8" required />
                    <label>Senha</label>
                </div>
                <div class="input-group">
                    <input type="password" name="txtsenha2" id="senha2" minlength="8" required />
                    <label>Confirmar Senha</label>

                </div>
            </div>
            <div class="btns-groups">
                <a href="#" class="acessar btns btn-prev">Voltar</a>
                <input class="acessar btn_input" type="submit" value="Cadastrar">
            </div>
        </div>
    </form>
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
        value = value.replace(/\D/g, '')
        value = value.replace(/(\d{2})(\d)/, "($1) $2")
        value = value.replace(/(\d)(\d{4})$/, "$1-$2")
        return value
    }

    function validarSenha() {
        senha1 = document.getElementById('senha1').value;
        senha2 = document.getElementById('senha2').value;
        if (senha1 != senha2) {
            alert("SENHAS DIFERENTES! DIGITAR SENHAS IGUAIS");
            document.getElementById('senha1').value = "";
            document.getElementById('senha2').value = "";
        } else {
            document.formes.submit();
        }
    }
</script>
</html>