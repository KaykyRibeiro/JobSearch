<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['emp_id'])) {
    header("Location: ../login.php");
    exit();
}



// Recuperar informações do usuário da sessão
$user_id = $_SESSION['emp_id'];

// Consulta SQL para obter informações do usuário
$query = "SELECT * FROM tbl_empresa WHERE emp_id = :user_id";

try {
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_user = $user['emp_id'];
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
    <a href="perfil_empresa.php"><img class="back" src="../imagens/arrow-white-left-svgrepo-com.svg" alt=""></a>

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
                            <input type="tel" name="txttelefone" maxlength="15" onkeyup="handlePhone(event)" required />
                            <label>Telefone</label>

                        </div>
                        <input class="acessar" type="submit" value="Salvar"> 
                        
                    </div>
                    
                </form>
                <?php
                if ($_GET['config'] == 'perfil') {
                            if($_POST){
                            $nome = $_POST['txtnome'];
                            $telefone = $_POST['txttelefone'];
                            try{
                                $editar = "UPDATE tbl_empresa
                                SET emp_nome = '$nome',
                                    emp_telefone = '$telefone'";
                            // $editar = "UPDATE usu_nome, usu_sobrenome, usu_telefone, usu_dataNasc, usu_sexo, usu_sobre FROM tbl_usuario WHERE usu_id = $id_user";
                            $sqlEditar = $conexao->prepare($editar);
                            $sqlEditar->execute();
                            header('Location: perfil-empresa.php');
                        }catch(PDOException $e){
                            echo 'Erro ao Atualizar Informações ' . $e->getMessage();
                        }
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
                <?php
                if ($_GET['config'] == 'conta') {
                    if ($_POST) {
                        $email = $_POST['txtemail'];
                        $senha = $_POST['txtsenha'];
                        $senha2 = $_POST['txtsenha2'];
                        try {
                            $editar = "UPDATE tbl_empresa
                                SET emp_email = '$email',
                                    emp_senha = '$senha'
                                WHERE emp_id = '$id_user'";
                            $sqlEditar = $conexao->prepare($editar);
                            $sqlEditar->execute();
                            header('Location: perfil.php');
                        } catch (PDOException $e) {
                            echo 'Erro ao Atualizar Informações ' . $e->getMessage();
                        }
                    }
                }
                ?>
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
                <?php
                    if ($_GET['config'] == 'endereco') {
                        if ($_POST) {
                            $cep = $_POST['txtcep'];
                            $rua = $_POST['txtlogradouro'];
                            $complemento = $_POST['txtcomplemento'];
                            $numRua = $_POST['numero'];
                            $bairro = $_POST['txtbairro'];
                            $estado = $_POST['estado'];
                            $cidade = $_POST['txtcidade'];
                            try {
                            $queryCid = "SELECT * FROM tblcidade WHERE cidNome = :cidade";
                            $sqlCid = $conexao->prepare($queryCid);
                            $sqlCid->bindParam(':cidade', $cidade, PDO::PARAM_STR);
                            $sqlCid->execute();
                            $row_cid = $sqlCid->fetch(PDO::FETCH_ASSOC);
                            if ($row_cid) {
                                $codigoCidade = $row_cid['cidCodigo'];
                                $queryUf = "SELECT * FROM tbluf WHERE sigla = :estado";
                                $sqlUf = $conexao->prepare($queryUf);
                                $sqlUf->bindParam(':estado', $estado, PDO::PARAM_STR);
                                $sqlUf->execute();
                                $row_estado = $sqlUf->fetch(PDO::FETCH_ASSOC);
                                if ($row_estado) {
                                    $ufCodigo = $row_estado['ufeCodigo'];
                                    $editar = "UPDATE tbl_empresa
                                        SET emp_cep = '$cep',
                                            emp_logradouro = '$rua',
                                            emp_complemento = '$complemento',
                                            emp_cidCodigo = '$codigoCidade',
                                            emp_ufeCodigo = '$ufCodigo',
                                            emp_numRua = '$numRua',
                                            emp_bairro = '$bairro'
                                        WHERE emp_id = '$id_user'";
                                    $sqlEditar = $conexao->prepare($editar);
                                    $sqlEditar->execute();
                                }
                            } 
                        } catch (PDOException $e) {
                            echo 'Erro ao Atualizar Informações ' . $e->getMessage();
                        }
                        header('Location: perfil.php');
                        }
                    }
                    
                
                ?>
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