<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');
date_default_timezone_set('America/Sao_Paulo');

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
$data = date("Y/m/d");
$dataTeste = date('Y-m-d');


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
                while ($row_produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $datapub = $row_produto['vag_dataPub'];
                    $dataAtual = DateTime::createFromFormat('Y-m-d', $dataTeste);
                    $dataBanco = DateTime::createFromFormat('Y-m-d', $datapub);
                    $intervalo = $dataBanco->diff($dataAtual);

                    $idvaga = $row_produto['vag_id'];
                    $idemp = "SELECT vag_emp_id FROM tbl_vagas WHERE vag_id = $idvaga";
                    $sql = $conexao->prepare($idemp);
                    $sql->execute();
                    while ($row_emp = $sql->fetch(PDO::FETCH_ASSOC)) {
                        $teste = $row_emp['vag_emp_id'];
                        $nameemp = "SELECT emp_nome FROM tbl_empresa WHERE emp_id = $teste";
                        $sqlEmp = $conexao->prepare($nameemp);
                        $sqlEmp->execute();
                        while ($row_name = $sqlEmp->fetch(PDO::FETCH_ASSOC)) {



                            // 



                            //$temp = $data - $datapub;

                ?>

                            <a href="vagas.php?id=<?php echo $row_produto['vag_id']; ?>">
                                <div class="postagem">
                                    <div class="nome-empresa">
                                        <img class="img-perfil" src="../imagens/logo.png" alt="">
                                        <div class="greed">
                                            <h1>
                                                <?php echo $row_name['emp_nome'] ?>
                                            </h1>
                                            <p class="data">
                                            <?php

                                            if ($intervalo->format('%y') != 0) {
                                                echo $intervalo->format('%y anos');
                                            } else if ($intervalo->format('%m') != 0) {
                                                echo $intervalo->format('%m meses');
                                            } else if ($intervalo->format('%d') == 0) {
                                                echo "Hoje";
                                            } else if ($intervalo->format('%d') == 1) {
                                                echo $intervalo->format('%d a dia');
                                            } else {
                                                echo $intervalo->format('%d a dias');
                                            }
                                        } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <h2>
                                        <?php echo $row_produto['vag_titulo']; ?>
                                    </h2>
                                    <p class="txt">
                                        <?php echo $row_produto['vag_descricao']; ?>
                                    </p>

                                </div>

                            </a>
                    <?php
                    }
                }


                // Encerre o loop
                    ?>
            </div>
        </main>

        <script src="../JS/jspadrao.js"></script>


    </body>

    </html>