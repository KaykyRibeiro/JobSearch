<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['login'])) {
    header("location: login.php");
}

$anuncio = "SELECT * FROM vagas WHERE vag_id = 1";
$post = $mysqli->query($anuncio);
?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/estilopadrao.css">
    <link rel="stylesheet" href="./Estilos/estilo3_h.css">
    <title>JobSearch</title>
</head>

<body>
    <nav>

        <a class="selecionado" href=""><img class="icon" src="./imagens/home_azul.png" alt=""></a>
        <a class="select" href="chat.php"><img class="icon" src="./imagens/chat.png" alt="" /></a>
        <button id="notificacao" class="select">
            <img class="icon" src="./imagens/sino.png" alt="">
        </button>
        <a class="select" href=""><img class="icon" src="./imagens/perfil.png" alt=""></a>
        <a class="select" id="config" href=""><img class="icon" src="./imagens/config.png" alt=""></a>
    </nav>
    <main>
        <h2>Postagens</h2>
        <div class="quadro">
            <?php
            while ($row_produto2 = mysqli_fetch_assoc($resultado_produto2)) {
                $_SESSION['livroId'] = $row_produto2['livId'];
            ?>
                <a href="livros.php?id=<?php echo $row_produto2['livId']; ?>">
                    <div class="postagem">

                        <img src="<?php echo $row_produto2['livImg'] ?>" class="card-img-top" alt="...">

                        <h1>
                            <?php echo $row_produto2['livTitulo'] ?>
                        </h1>
                        <p>
                            <?php echo $row_produto2['vagdescricao'] ?>
                        </p>
                    <?php }
                    ?>
                    </div>
                </a>
        </div>
    </main>

    <script src="./JS/jspadrao.js"></script>
</body>

</html>