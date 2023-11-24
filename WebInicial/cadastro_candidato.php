<!DOCTYPE html>
<html lang="pt-bt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Estilos/style.css" />
    <script src="./JS/script.js" defer></script>
    <script src="./JS/cep.js" defer></script>
    <script src="./JS/select.js"></script>
    <title>Registraion Form</title>
  </head>
  <body>
    <form action="validar_cadastro.php" method="post" class="form">
      <h1 class="text-center">Cadastro Candidato</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title="Dados"
        ></div>
        <div class="progress-step" data-title="Endereço"></div>
        <div class="progress-step" data-title="Sobre você"></div>
        <div class="progress-step" data-title="Contato"></div>
      </div>

      <!-- Steps -->
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
                    <label class="estado">Sexo</label>
                    <select class="select" name="sexo" required>
                    <option selected disabled>Informe seu sexo biológico</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    </select>

                </div>
            </div>
        <div class="">
          <a href="#" class="acessar btn btn-next width-50 ml-auto">Proximo</a>
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
        <div class="btns-group">
          <a href="#" class="acessar btn btn-prev">Voltar</a>
          <a href="#" class="acessar btn btn-next">Proximo</a>
        </div>
      </div>

      <div class="form-step">
      <div class="coluna">
                <div class="input-group txtarea">
                    <textarea  name="txtsobre" required></textarea>
                    <label class="sobre">Fale um pouco sobre você</label>
                </div>
                <div class="input-group group-select">
                    <label class="hab">Habilidades</label> 

                    <div class="container">
                        <div class="custom-select">
                            <div class="select-box">
                                <input type="text" class="tags_input" name="tags" hidden>
                                <div class="selected-options">
                                </div>
                                <div class="arrow">
                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="options">
                                <div class="option-search-tags">
                                    <input type="text" class="search-tags" placeholder="Seleciona habilidades...">
                                    <button type="button" class="clear"><i class="fa fa-close"></i></button>
                                </div>
                                <div class="option all-tags" data-value="All">
                                    Select All
                                </div>
                                <div class="option" data-value="adaptabilidade">Adaptabilidade</div>
                                <div class="option" data-value="alinhamento cultural">Alinhamento cultural</div>
                                <div class="option" data-value="aprendizado contínuo">Aprendizado contínuo</div>
                                <div class="option" data-value="autonomia">Autonomia</div>
                                <div class="option" data-value="criatividade">Criatividade</div>
                                <div class="option" data-value="comunicação">Comunicação</div>

                                <div class="option" data-value="flexibilidade">Flexibilidade</div>
                                <div class="option" data-value="inteligência emocional">Inteligência emocional</div>
                                <div class="option" data-value="liderança">Liderança</div>
                                <div class="option" data-value="pensamento crítico">Pensamento crítico</div>
                                <div class="option" data-value="perfil analítico">Perfil analítico</div>

                                <div class="option" data-value="relacionamento interpessoal">Relacionamento interpessoal</div>
                                <div class="option" data-value="resiliência">Resiliência</div>
                                <div class="option" data-value="liderança">Liderança</div>
                                <div class="option" data-value="visão estratégica">Visão estratégica</div>
                                <div class="option" data-value="visão do negócio">Visão do negócio</div>
                                <div class="no-result-message" style="display: none;" data-value="0">0</div>
                            </div>
                            <span class="tag_error_msg error"></span>
                        </div>
                    </div>

                </div>
            </div>
        <div class="btns-group">
          <a href="#" class="acessar btn btn-prev">Voltar</a>
          <a href="#" class="acessar btn btn-next">Proximo</a>
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
        <div class="btns-group">
          <a href="#" class="acessar btn btn-prev">Voltar</a>
          <input type="submit" value="Cadastrar-se" class="acessar btn" onclick="validarSenha()" />
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
