<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['emp_id'])) {
    header("Location: ../login.php");
    exit();
}
// Recuperar informações do usuário da sessão
$user_id = $_SESSION['emp_id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Trabalho</title>
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/vaga.css">
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
    </style>
    
</head>
<body>
    <a href="home_empresa.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>
    <main>
    <h2>Vaga</h2>
        <div class="lista">
            <div class="detalhe">
                <?php
                $vag_id = $_GET['id'];
                $query = "SELECT * FROM tbl_vagas where vag_id = $vag_id";
                $sql = $conexao->prepare($query);
                try{
                    $sql->execute();
                    
                    if($row = $sql->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <h3><?php echo $row['vag_titulo']?></h3>
                        <p> <span>Modo de Trabalho: </span><?php echo $row['vag_modo']?></p>
                        <p><span>Descrição: </span> <?php echo $row['vag_descricao']?></p>
                        <p><span>Requisitos Básicos: </span><?php echo $row['vag_requisitos']?></p>
                        <p><span>Requisitos Diferenciais: </span><?php echo $row['vag_reqdesejaveis']?></p>
                        <p><span>Salário: </span><?php echo $row['vag_salario']?></p>
                        <p><span>Local: </span><?php echo $row['vag_local']?></p>
                        <p><span>Publicado em: </span><?php echo $row['vag_dataPub']?></p>
                        
                  <?php 
                  }
                 // header("Location: home.php");
                }
                catch(PDOException $e){
                    echo ("Erro: " . $e->getMessage());
                }
                ?>
                
            </div>
        </div>
           
    </main>
</body>
<script src="../JS/jspadrao.js"></script>
</html>