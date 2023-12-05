<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');

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
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_user = $user['usu_id'];
        $cidCodigo = $user['usu_cidCodigo'];
        $cid = "SELECT * FROM tblcidade WHERE cidCodigo = $cidCodigo";
        $sqlCid = $conexao->prepare($cid);
        $sqlCid->execute();
        while ($row_cid = $sqlCid->fetch(PDO::FETCH_ASSOC)) {
            $ufCodigo = $row_cid['ufeCodigo'];
            $uf = "SELECT * FROM tbluf WHERE ufeCodigo = $ufCodigo";
            $sqluf = $conexao->prepare($uf);
            $sqluf->execute();
            while ($row_uf = $sqluf->fetch(PDO::FETCH_ASSOC)) {
                if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {
                    $imagem = "../img-perfil/" . $_FILES['arquivo']['name'];
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $imagem);
                    $queryImg = "INSERT INTO tbl_usuario (usu_imagem) VALUES ('$imagem') WHERE usu_id = $id_user";
                    $resultImg = $conexao->prepare($queryImg);
                    $resultImg->execute();




                        ?>

                        <!DOCTYPE html>
                        <html lang="pt-bt">

                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link rel="stylesheet" href="../Estilos/perfil.css">
                            <link rel="stylesheet" href="../Estilos/estilo3_h.css">
                            <link rel="stylesheet" href="../Estilos/estilopadrao.css">

                            <title>JobSearch</title>

                        </head>

                        <body>
                            <nav>
                                <a class="select" id="logo" href="home.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
                                <a class="select" id="home" href="home.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg"
                                        alt=""></a>
                                <a class="select" href="area_candidato.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg"
                                        alt="" /></a>
                                <div class="alert">
                                    <button id="notificacao" class="select">
                                        <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
                                    </button>
                                </div>
                                <a class="selecionado" href="perfil.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
                                <a class="select" id="config" href="logout.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg"
                                        alt=""></a>
                            </nav>

                            <main>
                                <h2>Perfil de
                                    <?php echo $user['usu_nome']; ?>
                                </h2>
                                <div class="bloco">
                                    <div class="coluna-img">
                                        <div class="perfil">
                                            <img class="foto" src="../imagens/group-svgrepo-com.svg" alt="">
                                            <button class="btn-editi" id="btn-editi-img">Alterar imagem</button>
                                        </div>
                                        <div class="option-config">
                                            <button class="btn-option btn-ativo" id="btn-1">Perfil</button>
                                            <button class="btn-option" id="btn-2">Conta</button>
                                            <button class="btn-option" id="btn-3">Endereço</button>
                                            <button class="btn-option" id="btn-4">Habilidades</button>
                                        </div>
                                    </div>
                                    <div class="separa ativo" id="div-1">
                                        <div class="coluna-info ">
                                            <p><span>NOME: </span>
                                                <?php echo $user['usu_nome']; ?>
                                            </p>
                                            <p><span>SOBRENOME: </span>
                                                <?php echo $user['usu_sobrenome']; ?>
                                            </p>
                                            <p><span>TELEFONE: </span>
                                                <?php echo $user['usu_telefone']; ?>
                                            </p>
                                            <p><span>DATA DE NASCIMENTO: </span>
                                                <?php echo $user['usu_dataNasc']; ?>
                                            </p>
                                            <p><span>SEXO: </span>
                                                <?php if ($user['usu_sexo'] == 'F') {
                                                    echo 'Feminino';
                                                } else {
                                                    echo 'Masculino';
                                                }
                                                ?>
                                            </p>
                                            <p><span>SOBRE: </span>
                                                <?php echo $user['usu_sobre']; ?>
                                            </p>
                                        </div>
                                        <a class="btn-editar" id="bnt-editar" href="perfil-config.php?config=perfil">Editar</a>
                                    </div>
                                    <div class="separa" id="div-2">
                                        <div class="coluna-info">
                                            <p><span>E-MAIL: </span>
                                                <?php echo $user['usu_email']; ?>
                                            </p>
                                            <p><span>Senha: </span></p>
                                        </div>
                                        <a class="btn-editar" id="bnt-editar" href="perfil-config.php?config=conta">Editar</a>
                                    </div>
                                    <div class="separa" id="div-3">
                                        <div class="coluna-info">
                                            <p><span>COMPLEMENTO: </span>
                                                <?php echo $user['usu_complemento']; ?>
                                            </p>
                                            <p><span>CEP: </span>
                                                <?php echo $user['usu_cep']; ?>
                                            </p>
                                            <p><span>RUA: </span>
                                                <?php echo $user['usu_logradouro']; ?>
                                            </p>
                                            <p><span>NÚMERO: </span>
                                                <?php echo $user['usu_numRua']; ?>
                                            </p>
                                            <p><span>BAIRRO: </span>
                                                <?php echo $user['usu_bairro']; ?>
                                            </p>
                                            <p><span>CIDADE: </span>
                                                <?php echo $row_cid['cidNome']; ?>
                                            </p>
                                            <p><span>ESTADO: </span>
                                                <?php echo $row_uf['ufeNome']; ?>
                                            </p>

                                        </div>
                                        <a class="btn-editar" id="bnt-editar" href="perfil-config.php?config=endereco">Editar</a>
                                    </div>
                                    <div class="separa" id="div-4">
                                        <div class="coluna-info">
                                            <p><span>HABILIDADES: </span>
                                                <?php echo $user['usu_habilidade']; ?>
                                            </p>
                                        </div>
                                        <a class="btn-editar" id="bnt-editar" href="perfil-config.php?config=habilidade">Editar</a>
                                    </div>
                                </div>
                            </main>
                            <div class="edita-img" id="div-edit-img">
                                <form class="form-upload" action="#" method="post" enctype="multipart/form-data">
                                    <div class="img-expo">
                                        <img class="img-previl" id="image" src="<?php echo $user['usu_imagem'] ?>" alt="">
                                        <input type="file" class="arquivo" id="inImg" name="arquivo" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <div class="buttons">
                                        <button class="btn-salvar" id="btn-salvar">Salvar</button>
                                        <a class="btn-cancelar" id="btn-cancelar">Cancelar</a>
                                    </div>
                                </form>
                                </form>
                            </div>
                            <?php
                    }
                }
            }
        }
    
} catch (PDOException $e) {
    die("Erro ao recuperar informações do usuário: " . $e->getMessage());
}
// if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {
//     move_uploaded_file($_FILES['arquivo']['tmp_name'], "../img-perfil/" . $_FILES['arquivo']['name']);
// }
?>
    <script>
        var file = document.getElementById("inImg")
        var img = document.getElementById("image")
        file.addEventListener("change", (e) => {
            img.src = URL.createObjectURL(e.target.files[0])
        })
    </script>
</body>
<script src="../JS/jspadrao.js"></script>
<script src="../JS/perfil.js"></script>

</html>