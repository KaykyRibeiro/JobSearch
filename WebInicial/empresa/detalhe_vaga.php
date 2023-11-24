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
<html>

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
    <a href="area_empresa.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>
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
                            <p><span>Requisitos diferenciais: </span><?php echo $row_vag['vag_reqDesejaveis']; ?></p>
                            <p><span>Local: </span><?php echo $row_vag['vag_local']; ?></p>
                            <p><span>Salário: </span><?php echo "R$ " . $row_vag['vag_salario']; ?></p>
                            <p><span>Datat de publicação: </span><?php echo $row_vag['vag_dataPub']; ?></p>
                        </div>
                    <?php } 
                }
                catch(PDOException $e){
                    echo 'Erro ao exibir as informações' . $e->getMessage();
                }

           ?>
        </div>
        <div class="candidatos">
            <h3>Candidatos</h3>
            <?php
                    try {
                        $vag_id = $_GET['id'];
                        $vag = "SELECT can_usu_id FROM tbl_candidatura WHERE can_vagId = $vag_id";
                        $sql = $conexao->prepare($vag);
                        $sql->execute();
                        if($row = $sql->fetch(PDO::FETCH_ASSOC)){
                            $usuario = $row['can_usu_id'];
                            $query = "SELECT usu_nome, YEAR(usu_dataNasc),usu_cpf, usu_sobrenome FROM tbl_usuario WHERE usu_id = $usuario";
                            $stmt = $conexao->prepare($query);
                            // Execute a consulta com a condição apropriada
                            $stmt->execute();
                        
                            // Recupere os resultados como um array associativo
                           
                            if( $row_produto = $stmt->fetch(PDO::FETCH_ASSOC)){
                               $nascimento = $row_produto["YEAR(usu_dataNasc)"];
                            ?>

            <div class="bloco">
                <div class="candidato" id="candidato">
                    <div>
                        <img src="../imagens/logo.png" alt="" class="foto_perfil">
                    </div>
                    <div class="a">
                        <p class="txt">NOME: <span class="nome"><?php echo $row_produto['usu_nome'] . " " . $row_produto['usu_sobrenome']?></span></p>
                        <p class="txt">IDADE: <span class="idade"><?php echo $idade = $data - $nascimento;?></span></p>
                        
                    </div>

                </div>
                <div class="detalhes">
                    <button class="detalhe" id="detalheBtn" onclick="dados()">
                        <img class="img_detalhe" src="../imagens/menu-svgrepo-com.svg" alt="">
                    </button>
                </div>
            </div>
            <?php
                        }
                    }
                        } catch (PDOException $e) {
                            echo "Erro ao recuperar o usuId: " . $e->getMessage();
                        }?>
            <dialog class="pupup" open>
                <div class="painel-popup">
                        <div class="profile">
                            <img class="foto-perfil" src="../imagens/logo.png" alt="">
                        </div>
                        <div class="informaçao">
                            <h2><?php echo $row_vag['vag_titulo']; ?></h2>
                            <p><span>Idade: </span><?php echo $row_vag['vag_descricao']; ?></p>
                            <p><span>Sobre: </span><?php echo $row_vag['vag_modo']; ?></p>
                            <p><span>Habilidade: </span><?php echo $row_vag['vag_requisitos']; ?></p>
                            <select name="" id="">
                                <option value="entrevista">Liberar contato</option>
                                <option value="Rejeitar">Rejeitar Candidato</option>
                            </select>
                            <dialog class="info-aceito">
                                <p>Ao selecionar está opção você ira librar o e-mail de contato do candidato e juntamente irá informar o candidato de sua escolha.</p>
                            </dialog>
                            <dialog class="info-rejeitado">
                                <p>Ao selecionar está opção você irá reseitar o candidato, ele não receberá notificação</p>
                            </dialog>
                            <button type="button">Finalizar</button>
                        </div>
                </div>
            </dialog>


        </div>
    </div>

</body>
</html>