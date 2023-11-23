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
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">


    <title>JobSearch</title>
</head>

<body>
    <nav>
        <a class="select" id="logo" href="home.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="selecionado" id="home" href="home.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="select" href="area_candidato.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg" alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
            </button>
        </div>
        <a class="select" href="perfil.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
        <a class="select" id="config" href="logof.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg" alt=""></a>
    </nav>

    <main>

        <h2>Postagens</h2>
        <div class="quadro">
            <?php
            $query = "SELECT * FROM tbl_vagas";
            $stmt = $conexao->prepare($query);
            $stmt->execute();

            // Inicie o loop para criar os cartões de emprego
            while ($row_produto= $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <a href="vagas.php?id=<?php echo $row_produto['vag_id']; ?>">
            <div class="postagem">
            <h1><?php echo $row_produto['vag_titulo']; ?></h1>
            <p><?php echo $row_produto['vag_descricao']; ?></p>
            </div>
        </a>
        <?php
        }
        // Encerre o loop
        ?>
            <!-- <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div> -->
        </div>
        <!-- <input type="button" value="Recaregar pagina" onclick="recaregar()"> -->
    </main>

    <script src="../JS/jspadrao.js"></script>


</body>

</html>