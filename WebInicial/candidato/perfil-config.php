<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}



// Recuperar informações do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta SQL para obter informações do usuário
$query = "SELECT * FROM tbl_usuario WHERE usu_id = :user_id";

try {
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_user = $user['usu_id'];
} catch (PDOException $e) {
    die("Erro ao recuperar informações do usuário: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/perfil-config.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>JobSearch</title>

</head>

<body>
    <a href="perfil.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>

    <main>
        <div class="bloco " id="divPerfil">
            <div class="caixa__login">
                <h2>Editar perfil</h2>

                <form action="#" method="post" id="formes">
                    <div class="coluna">
                        <div class="caixa__login-input">
                            <input type="text" name="txtnome" required />
                            <label class="label">Nome</label>
                        </div>
                        <div class="caixa__login-input">
                            <input type="text" name="txtsobrenome" required />
                            <label>Sobrenome</label>
                        </div>

                        <div class="caixa__login-input">
                            <input type="tel" name="txttelefone" maxlength="15" onkeyup="handlePhone(event)" required />
                            <label>Telefone</label>

                        </div>
                        <div class="caixa__login-input">
                            <input type="date" name="datanas" required />

                        </div>
                        <div class="caixa__login-input">
                            <label class="estado">Sexo</label>
                            <select class="select" name="sexo" required>
                                <option selected disabled>Informe seu sexo biológico</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="caixa__login-input">
                            <textarea name="txtsobre" required></textarea>
                            <label class="sobre">Fale um pouco sobre você</label>

                        </div>

                        <input class="acessar" type="submit" value="Salvar"> 
                        
                    </div>
                    
                </form>
                <?php
                            if($_POST){
                            $nome = $_POST['txtnome'];
                            $sobrenome = $_POST['txtsobrenome'];
                            $telefone = $_POST['txttelefone'];
                            $datanas = $_POST['datanas'];
                            $sexo = $_POST['sexo'];
                            $sobre = $_POST['txtsobre'];
                            try{
                                $editar = "UPDATE tbl_usuario
                                SET usu_nome = '$nome',
                                    usu_sobrenome = '$sobrenome',
                                    usu_telefone = '$telefone',
                                    usu_dataNasc = '$datanas', 
                                    usu_sexo = '$sexo', 
                                    usu_sobre = '$sobre'
                                WHERE usu_id = '$id_user'";
                            // $editar = "UPDATE usu_nome, usu_sobrenome, usu_telefone, usu_dataNasc, usu_sexo, usu_sobre FROM tbl_usuario WHERE usu_id = $id_user";
                            $sqlEditar = $conexao->prepare($editar);
                            $sqlEditar->execute();
                        }catch(PDOException $e){
                            echo 'Erro ao Atualizar Informações ' . $e->getMessage();
                        }
                    }
                        
                    ?>
                
               
            </div>
            
        </div>
        

        <div class="bloco " id="divConta">
            <div class="caixa__login">
                <h2>Editar conta</h2>

                <form action="#" method="post" id="formes">
                    <div class="coluna">
                        <div class="caixa__login-input">
                            <input type="email" name="txtemail" required />
                            <label>E-mail</label>
                        </div>
                        <div class="caixa__login-input">
                            <input type="password" name="txtsenha" id="senha1" minlength="8" required />
                            <label>Senha</label>
                        </div>

                        <div class="caixa__login-input">
                            <input type="password" name="txtsenha2" id="senha2" minlength="8" required />
                            <label>Confirmar Senha</label>

                        </div>
                        <input class="acessar" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>

        <div class="bloco " id="divEndereco">
            <div class="caixa__login">
                <h2>Editar endereço</h2>

                <form action="#" method="post" id="formes">
                    <div class="coluna">
                        <div class="caixa__login-input">
                            <input type="text" name="txtcep" id="cep" data-mask="00000-000" minlength="8" maxlength="8" required />
                            <label>CEP</label>
                        </div>
                        <div class="caixa__login-input">
                            <input type="text" name="txtlogradouro" id="logradouro" data-input required />
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
                            <input type="number_format" name="numero" required />
                            <label>Numero</label>
                        </div>
                        <div class="caixa__login-input">
                            <input type="text" name="txtbairro" id="bairro" required />
                            <label>Bairro</label>
                        </div>
                        <div class="caixa__login-input">
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

                        <input class="acessar" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>

        <div class="bloco " id="divHabilidade">
            <div class="caixa__login">
                <h2>Editar habilidades</h2>

                <form action="#" method="post" id="formes">
                    <div class="coluna">
                        <div class="caixa__login-input">
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
                                        <div class="no-result-message" style="display: none;" data-value="0">Não encontrado</div>
                                    </div>
                                    <span class="tag_error_msg error"></span>
                                </div>
                            </div>
                        </div>
                        <input class="acessar" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="../JS/select.js"></script>
</body>
<script src="../JS/cep.js" defer></script>
<script src="../JS/perfil-config.js"></script>
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