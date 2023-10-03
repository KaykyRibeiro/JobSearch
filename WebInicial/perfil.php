<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('conexao.php');

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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
    <link rel="stylesheet" href="./Estilos/estilo3_h.css">
    <link rel="stylesheet" href="./Estilos/estilopadrao.css">


    <title>JobSearch</title>
</head>

<body>
    <nav>
        <a class="select" id="logo" href="home.php"><img class="logo" src="./imagens/logo.png" alt=""></a>
        <a class="select" id="home" href="home.php"><img class="imgHome" src="./imagens/home_azul.png" alt=""></a>
        <a class="select" href="chat.php"><img class="icon" src="./imagens/chat_azul.png" alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="./imagens/sino_azul.png" alt="">
            </button>
        </div>
        <a class="selecionado" href="perfil.php"><img class="icon" src="./imagens/perfil_azul.png" alt=""></a>
        <a class="select" id="config" href="config.php"><img class="icon" src="./imagens/config_azul.png" alt=""></a>
    </nav>
    <h2>Perfil de <?php echo $_SESSION['login']; ?></h2>
    
    <!-- Exibir informações do usuário -->
    <p>ID do usuário: <?php echo $_SESSION['user_id']; ?></p>
    <p>Nome de usuário: <?php echo $_SESSION['login']; ?></p>

    <!-- Adicione mais informações do usuário aqui, se necessário -->

    <p><a href="logout.php">Sair</a></p>
</body>

</html>

