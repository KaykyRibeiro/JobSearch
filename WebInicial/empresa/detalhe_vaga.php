<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['emp_id'])) {
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
            <h3>Candidatos</h3>
            <?php
                    try {
                        $vag_id = $_GET['id'];
                        $vag = "SELECT * FROM tbl_candidatura WHERE can_vagId = $vag_id";
                        $sql = $conexao->prepare($vag);
                        $sql->execute();
                        if($row = $sql->fetch(PDO::FETCH_ASSOC)){
                            $usuario = $row['can_usu_id'];
                            $query = "SELECT usu_id ,usu_nome, YEAR(usu_dataNasc),usu_cpf, usu_sobrenome, usu_email,usu_imagem , usu_sobre,usu_habilidade FROM tbl_usuario WHERE usu_id = $usuario";
                            $stmt = $conexao->prepare($query);
                            // Execute a consulta com a condição apropriada
                            $stmt->execute();
                        
                            // Recupere os resultados como um array associativo
                           
                            if( $row_produto = $stmt->fetch(PDO::FETCH_ASSOC)){
                               $nascimento = $row_produto["YEAR(usu_dataNasc)"];
                               $id_user = $row_produto['usu_id'];
                            ?>

            <div class="bloco">
                <div class="candidato" id="candidato">
                    <div>
                        <img src="<?php echo $row_produto['usu_imagem']; ?>" alt="" class="foto_perfil">
                    </div>
                    <div class="a">
                        <p class="txt">NOME: <span class="nome"><?php echo $row_produto['usu_nome'] . " " . $row_produto['usu_sobrenome']?></span></p>
                        <p class="txt">IDADE: <span class="idade"><?php echo $idade = $data - $nascimento;?></span></p>
                        <?php
                            if($row['can_status'] == "Aceito"){
                                ?>
                                <p class="txt">Email: <span class="idade"><?php echo $row_produto['usu_email']; ?></span></p>
                           <?php }
                           else if($row['can_status'] == "Rejeitado"){?>
                            <p class="txt">Situação <span class="idade"><?php echo $idade = $data - $nascimento;?></span></p>
                           <?php }
                           else{ ?>
                            <p class="txt"><span class=""></span></p>
                           <?php }
                        ?>
                        
                    </div>

                </div>
                <div class="detalhes">
                    <button class="detalhe" id="detalheBtn">
                        <img class="img_detalhe" src="../imagens/menu-svgrepo-com.svg" alt="">
                    </button>
                </div>
            </div>
            <?php
                       ?>

                <div class="painel-popup" id="div-popup">
                        <button class="close" id="close">
                            <img  class="img-close" src="../imagens/closure-svgrepo-com.svg" alt="">
                        </button>
                        <div class="profile">
                            <img class="foto-perfil" src="<?php echo $row_produto['usu_imagem']; ?>" alt="">
                        </div>
                        <h2><?php echo $row_produto['usu_nome'] ?></h2>
                        <div class="informacao">
                            
                            <p><span>Idade: </span><?php echo $idade = $data - $nascimento; ?></p>
                            <br>
                            <p><span>Sobre: </span><?php echo $row_produto['usu_sobre']; ?></p>
                            <br>
                            <p><span>Habilidade: </span><?php echo $row_produto['usu_habilidade']; ?></p>

                        </div>
                        <form class="form-final" action="#" method="post">
                            
                            <div class="opcao">
                                <input type="radio" class="radio" id="aceito" name="fav_languageA" value="CSS"><label>Liberar contato</label>
                                <input type="radio" class="radio" id="rejeitado" name="fav_languageR" value="CSS"><label>Rejeitar Candidato</label>
                            </div>
                            <div class="info-aceito alerta" id="alert-aceito">
                                <p>Ao selecionar está opção você ira librar o e-mail de contato do candidato com o intuito de empregalo ou intrevistalo, o e-mail será exibido na barra de candidatos(sua ação será informada para candidato).</p>
                            </div>
                            <div class="info-rejeitado alerta" id="alert-rejeitado">
                                <p>Ao selecionar está opção você irá reseitar o candidato, ele não receberá notificação mas será informado da sua escolha</p>
                            </div>
                           <input class="finalizar" id="finaliza" type="submit" value="Finalizar">
                        </form>
                       <?php
                       if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['fav_languageA'])){
                            $update = "UPDATE tbl_candidatura
                                       SET can_status = 'Aceito'
                                       WHERE can_usu_id = $id_user AND can_vagId = $vag_id";
                            $stmtUpdate = $conexao->prepare($update);
                            $stmtUpdate->execute();
                        }
                        else {
                            $update = "UPDATE tbl_candidatura
                                       SET can_status = 'Rejeitado'
                                       WHERE can_usu_id = $id_user AND can_vagId = $vag_id";
                            $stmtUpdate = $conexao->prepare($update);
                            $stmtUpdate->execute();
                        }
                    }
                    //    $id_user = $row_produto['usu_id'];
                    //     if($_POST['fav_language'] == 'aceito'){
                    //         $update = "UPDATE tbl_candidatura
                    //                    SET can_status = 'Aceito'
                    //                    WHERE can_usu_id = '$id_user'";
                    //         $stmtUpdate = $conexao->prepare($update);
                    //         $stmtUpdate->execute();
                    //     }
                    //     else {
                    //         $update = "UPDATE tbl_candidatura
                    //                    SET can_status = 'Rejeitado'
                    //                    WHERE can_usu_id = '$id_user'";
                    //                    $stmtUpdate = $conexao->prepare($update);
                    //                    $stmtUpdate->execute();
                    //     }
                    // }
                }
                    }
                } catch (PDOException $e) {
                        echo "Erro ao recuperar o usuId: " . $e->getMessage();
                    }?>
                       
                        
                </div>


        </div>
    </div>

</body>
<script src="../JS/popup.js"></script>
</html>