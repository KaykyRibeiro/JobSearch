<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
$data = date("Y");

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
                try{
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
                    <?php } 
                }
                catch(PDOException $e){
                    echo 'Erro ao exibir as informações' . $e->getMessage();
                }

           ?>
        </div>
        <div class="candidatos">
            <h3>Situação</h3>
        </div>
    </div>

</body>
<script src="../JS/popup.js"></script>
</html>