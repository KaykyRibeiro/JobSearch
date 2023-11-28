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
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../Estilos/perfil.css">
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    
    <title>JobSearch</title>
    
</head>

<body>
    <nav>
        <a class="select" id="logo" href="home.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="select" id="home" href="home.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="select" href="area_candidato.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg" alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
            </button>
        </div>
        <a class="selecionado" href="perfil.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
        <a class="select" id="config" href="logout.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg" alt=""></a>
    </nav>
    
    <main>
    <h2>Perfil de <?php echo $_SESSION['login']; ?></h2>
        <div class="bloco">
            <div class="coluna-img">
                <div class="perfil">
                    <img class="foto" src="../imagens/group-svgrepo-com.svg" alt="">
                    <button class="btn-editi" id="btn-editi-img">Alterar imagem</button>
                </div>
                <div class="option-config">
                    <button class="btn-option btn-ativo" id="btn-1" >Perfil</button>
                    <button class="btn-option" id="btn-2">Conta</button>
                    <button class="btn-option" id="btn-3">Endereço</button>
                    <button class="btn-option" id="btn-4">Habilidades</button>
                </div>
            </div>
            <div class="separa ativo" id="div-1">
                <div class="coluna-info " >
                    <p><span>NOME: </span><?php echo $_SESSION['login']; ?></p>
                    <p><span>SOBRENOME: </span><?php echo $_SESSION['sobrenome']; ?></p>
                    <p><span>TELEFONE: </span></p>
                    <p><span>DATA DE NASCIMENTO: </span></p>
                    <p><span>SEXO: </span></p>
                    <p><span>SOBRE: </span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt eum non nisi eaque veniam ipsam? Nam in illo, veniam sit, eos voluptatem, voluptas repellat placeat doloribus harum maiores accusamus reiciendis.</p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
            <div class="separa" id="div-2">
                <div class="coluna-info" >
                    <p><span>E-MAIL: </span></p>
                    <p><span>Senha: </span></p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
            <div class="separa" id="div-3">
                <div class="coluna-info" >
                    <p><span>COMPLEMENTO: </span></p>
                    <p><span>CEP: </span></p>
                    <p><span>RUA: </span></p>
                    <p><span>NÚMERO: </span></p>
                    <p><span>BAIRRO: </span></p>
                    <p><span>CIDADE: </span></p>
                    <p><span>ESTADO: </span></p>
                    
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
            <div class="separa" id="div-4">
                <div class="coluna-info" >
                    <p><span>HABILIDADES: </span></p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
        </div>
    </main>
    <div class="edita-img" id="div-edit-img">
            <form class="form-upload" action="" enctype="multipart/form-data">
                <div class="img-expo">
                    <img class="img-previl" src="../imagens/group-svgrepo-com.svg" alt="">
                    <input type="file" class="arquivo" id="arquivo" name="arquivo" accept=".png, .jpg, .jpeg">
                </div>
                <div class="buttons">
                    <button class="btn-salvar" id="btn-salvar">Salvar</button>
                    <a class="btn-cancelar" id="btn-cancelar">Cancelar</a>
                </div>
            </form>
    </div>
</body>
<script src="../JS/jspadrao.js"></script>
<script src="../JS/perfil.js"></script>
</html>

