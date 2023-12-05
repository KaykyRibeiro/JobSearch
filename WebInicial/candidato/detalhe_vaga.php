<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
$data = date("Y");

$user_id = $_SESSION['user_id'];

// Consulta SQL para obter informações do usuário
$query = "SELECT * FROM tbl_usuario WHERE usu_id = :user_id";


try {
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {

?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <title>Cadastrar Vaga de Emprego</title>
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/cadVaga.css">
    <link rel="stylesheet" href="../Estilos/detalhe_vaga.css">
    

    <style>
        .fundo > h2{
            text-transform: uppercase;
            font-size: 24px;
            text-align: center;
            margin: 10px;
        }
        .fundo >p{
            background-color: rgb(253, 251, 251);
            margin: 5px;
            width: auto;
            margin-top: 10px;
            border-radius: 5px;
            padding: 5px;
            font-size: 18px
        }
        .fundo >p >span{
            font-size: 14px;
            text-transform: uppercase;
            color: rgb(158, 157, 157);
        }
    </style>
</head>

<body>
    <a href="area_candidato.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>
    <div class="main">
        <div class="vaga">
           <?php
                
                    $vag_id = $_GET['id'];
                    $vaga = "SELECT * FROM tbl_vagas WHERE vag_id = $vag_id";
                    $sqlVag = $conexao->prepare($vaga);
                    $sqlVag -> execute();
                    if($row_vag = $sqlVag->fetch(PDO::FETCH_ASSOC)){?>
                        <div class="fundo">
                            <h2><?php echo $row_vag['vag_titulo']; ?></h2>
                            <p><span>Descrição: </span><?php echo $row_vag['vag_descricao']; ?></p>
                            <p><span>Modo de Trabalho: </span><?php echo $row_vag['vag_modo']; ?></p>
                            <p><span>Requisitos Básicos: </span><?php echo $row_vag['vag_requisitos']; ?></p>
                            <p><span>Requisitos diferenciais: </span><?php echo $row_vag['vag_reqdesejaveis']; ?></p>
                            <p><span>Local: </span><?php echo $row_vag['vag_local']; ?></p>
                            <p><span>Salário: </span><?php echo "R$ " . $row_vag['vag_salario']; ?></p>
                            <p><span>Data de publicação: </span><?php echo $row_vag['vag_dataPub']; ?></p>
                        </div>
                    
        </div>
        <div class="candidatos">
            <h3>Situação da sua candidatura</h3>
            <?php
            $id_user = $user['usu_id'];
            $querySit = "SELECT can_status FROM tbl_candidatura WHERE can_usu_id = $id_user AND can_vagId = $vag_id";
            $stmtSit = $conexao->prepare($querySit);
            $stmtSit->execute();
            while($rowSit = $stmtSit->fetch(PDO::FETCH_ASSOC)){
               ?> <p class="situacao"><?php echo $rowSit['can_status'];?></p><?php
               if($rowSit['can_status'] == "Em Analise"){
                echo "No momento a empresa está analisando sua candidatura, aguarde até a resposta";
               }else if($rowSit['can_status'] == "Aceito"){
                echo "Parábens a empresa em breve irá entrar em contato com você via E-mail para passar mais informações sobre entrevista ou processo seletivo, mas quem sabe a vaga já é sua!";
               }else{
                echo "Sinto muito, aparentemente você não cumpriu com os requisitos da empresa, mas não desista de outras vagas!";
               }
            }
            }
    }
    }
catch (PDOException $e) {
die("Erro ao recuperar informações do usuário: " . $e->getMessage());
}
            ?>
        </div>
    </div>

</body>
<script src="../JS/popup.js"></script>
</html>