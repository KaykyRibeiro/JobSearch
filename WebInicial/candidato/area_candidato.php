<?php
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


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Trabalho</title>
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <style>
        .create{
            position: fixed;
            top: 91%;
            right: 29px;
            width: 50px;
            height: 50px;
        }
        .border{
            background-color: #4938ffd7;
            border-radius: 50%;
            position: fixed;
            top: 90%;
            right: 20px;
            width: 70px;
            height: 70px;
        }
        .lista{
            background: #f5eeee4d;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 1px 2px 0px #4938ffd7;
        }
        .bloco{
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
    
</head>
<body>
<nav>
<a class="select" id="logo" href="home.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="select" id="home" href="home.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="selecionado" href="area_candidato.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg" alt="" /></a>
        <div class="alert">
                <button id="notificacao" class="select">
                    <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
                </button>
                <div class="notifica" id="divNotif">
                <?php
                $id_user = $user['usu_id'];
                $queryCan = "SELECT * FROM tbl_candidatura WHERE can_status = 'Aceito' AND can_usu_id = '$id_user'";
                $stmtCan = $conexao->prepare($queryCan);
                $stmtCan->execute();
                while ($row_can = $stmtCan->fetch(PDO::FETCH_ASSOC)) {
                    $idVag = $row_can['can_vagId'];
                    $queryVag = "SELECT * FROM tbl_vagas WHERE vag_id = $idVag";
                    $stmtVag = $conexao->prepare($queryVag);
                    $stmtVag->execute();
                    while ($rowVag = $stmtVag->fetch(PDO::FETCH_ASSOC)) {
                        $emp_id = $rowVag['vag_emp_id'];
                        $queryEmp = "SELECT * FROM tbl_empresa WHERE emp_id = $emp_id";
                        $stmtEmp = $conexao->prepare($queryEmp);
                        $stmtEmp->execute();
                        while ($rowEmp = $stmtEmp->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <div class="notif-bloco">
                                    <p>Você foi <span class="status"><?php echo $row_can['can_status']; ?></span> na vaga <span class="title"><?php echo $rowVag['vag_titulo']; ?></span> da empresa <span class="emp"><?php echo $rowEmp['emp_nome']; ?></span></p>
                                </div>
                <?php
                        }
                    }
                }
            } catch (PDOException $e) {
                die("Erro ao recuperar informações do usuário: " . $e->getMessage());
            }
                ?>
                </div>
            </div>
        <a class="select" href="perfil.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
        <a class="select" id="config" href="logof.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg" alt=""></a>
    </nav>
    <main>
    <h2>Candidaturas</h2>
        <div class="lista">
            <?php
            //$query = "SELECT vag_id, vag_titulo, vag_descricao FROM tbl_vagas WHERE vag_emp_id = $user_id";
            $query = "SELECT * FROM tbl_candidatura WHERE can_usu_id = $user_id";
            $stmt = $conexao->prepare($query);
            $stmt->execute();

            // Inicie o loop para criar os cartões de emprego
            while ($row_produto2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $can_vagId = $row_produto2['can_vagId'];
                $query2 = "SELECT * FROM tbl_vagas WHERE vag_id = $can_vagId";
                $stmt2 = $conexao->prepare($query2);
                $stmt2->execute();
                while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
            ?>
            <a href="detalhe_vaga.php?id=<?php echo $row['vag_id']; ?>">
            <div class="bloco">
            <h3><?php echo $row['vag_titulo']; ?></h3>
            <p><?php echo $row['vag_descricao']; ?></p>
            </div>
        </a>
        <?php
        }
    }
        // Encerre o loop
        ?>
            <!-- <a href="detalhe_vaga.php">
                <div class="bloco">
                <h3>teste</h3>                
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis enim at non consequuntur atque, nobis rem nihil fuga officia eum voluptas dolore facilis laudantium aperiam vitae rerum necessitatibus. Voluptate, excepturi.</p>
            </div>
            </a>
            
            <div class="bloco">
                <h3>teste</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis enim at non consequuntur atque, nobis rem nihil fuga officia eum voluptas dolore facilis laudantium aperiam vitae rerum necessitatibus. Voluptate, excepturi.</p>
            </div> -->
        </div>
           
    </main>
</body>
<script src="../JS/jspadrao.js"></script>
</html>