<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
$data = date("Y/m/d");


// Recuperar informações do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta SQL para obter informações do usuário
$query = "SELECT * FROM tbl_empresa WHERE emp_id = :user_id";

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
        <a class="select" id="logo" href="home_empresa.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="selecionado" id="home" href="home_empresa.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="select" href="area_empresa.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg" alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
            </button>
        </div>
        <a class="select" href="perfil_empresa.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
        <a class="select" id="config" href="logout.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg" alt=""></a>
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
                // $idvaga = $row_produto['vag_id'];
                // $idemp = "SELECT vag_emp_id FROM tbl_vagas WHERE vag_id = $idvaga";
                // $nameemp = "SELECT emp_nome FROM tbl_empresa WHERE emp_id = $idemp";

                
                    $datapub = $row_produto['vag_dataPub'];
                    $temp = $datapub - $data;
                
            ?>
            
            <a href="vagas.php?id=<?php echo $row_produto['vag_id']; ?>">
            <div class="postagem">
                <div class="nome-empresa">
                    <img class="img-perfil" src="../imagens/logo.png" alt="">
                    <h1>Empresa de empresa</h1>
                </div>
            <h2><?php echo $row_produto['vag_titulo']; ?></h2>
            <p><?php echo $row_produto['vag_descricao']; ?></p>
            
            </div>
            <p class="data"><?php  
            if ($temp == 0) {
                echo "Hoje";
            }else if($temp > 0 && $temp < 7){
                echo "Há " . $temp . " Dias atrás";
            }else if($temp >= 7 && $temp < 14){
                echo "Há 1 semana atrás";
            }else if($temp >= 14 && $temp < 21){
                echo "Há 2 semanas atrás";
            }else if($temp >= 21 && $temp < 28){
                echo "Há 3 semanas atrás";
            }else if($temp >= 1 && $temp < 21){
                echo "Há 2 semanas atrás";
            }?></p>
        </a>
        <?php
        }
        
        // Encerre o loop
        ?>
        </div>
    </main>

    <script src="../JS/jspadrao.js"></script>


</body>

</html>