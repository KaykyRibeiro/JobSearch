<?php
// Iniciar a sessão (se ainda não estiver iniciada)
session_start();
include('../conexao.php');

// Verificar se o usuário está logado, redirecionar para a página de login se não estiver
if (!isset($_SESSION['emp_id'])) {
    header("Location: ../login.php");
    exit();
}



// Recuperar informações do usuário da sessão
$user_id = $_SESSION['emp_id'];

// Consulta SQL para obter informações do usuário
$query = "SELECT * FROM tbl_empresa WHERE emp_id = :user_id";

try {
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        $cidCodigo = $user['emp_cidCodigo'];
        $cid = "SELECT * FROM tblcidade WHERE cidCodigo = $cidCodigo";
        $sqlCid = $conexao->prepare($cid);
        $sqlCid->execute();
        while($row_cid = $sqlCid->fetch(PDO::FETCH_ASSOC)){
            $ufCodigo = $row_cid['ufeCodigo'];
            $uf = "SELECT * FROM tbluf WHERE ufeCodigo = $ufCodigo";
            $sqluf = $conexao->prepare($uf);
            $sqluf->execute();
            while($row_uf = $sqluf->fetch(PDO::FETCH_ASSOC)){


?>

<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/perfil.css">

    <title>JobSearch</title>
</head>

<body>

    <nav>
        <a class="select" id="logo" href="home_empresa.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="select" id="home" href="home_empresa.php"><img class="imgHome"
                src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="select" href="area_empresa.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg"
                alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
            </button>
        </div>
        <a class="selecionado" href="perfil_empresa.php"><img class="icon" src="../imagens/group-svgrepo-com.svg"
                alt=""></a>
        <a class="select" id="config" href="logout.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg"
                alt=""></a>
    </nav>
    <main>
        <h2>Perfil de
            <?php echo $user['emp_nome']; ?>
        </h2>
        <div class="bloco">
            <div class="coluna-img">
                <div class="perfil">
                    <img class="foto" src="../imagens/group-svgrepo-com.svg" alt="">
                    <button class="btn-editi" id="btn-editi-img">Alterar imagem</button>
                </div>
                <div class="option-config">
                    <button class="btn-option btn-ativo" id="btn-1">Perfil</button>
                    <button class="btn-option" id="btn-2">Conta</button>
                    <button class="btn-option" id="btn-3">Endereço</button>
                </div>
            </div>
            <div class="separa ativo" id="div-1">
                <div class="coluna-info ">
                    <p><span>NOME: </span>
                    <?php echo $user['emp_nome']; ?>
                    </p>
                    <p><span>TELEFONE: </span><?php echo $user['emp_telefone']; ?></p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
            <div class="separa" id="div-2">
                <div class="coluna-info">
                    <p><span>E-MAIL: </span><?php echo $user['emp_email']; ?></p>
                    <p><span>Senha: </span> ********</p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
            <div class="separa" id="div-3">
                <div class="coluna-info">
                    <p><span>COMPLEMENTO: </span><?php echo $user['emp_complemento']; ?></p>
                    <p><span>CEP: </span><?php echo $user['emp_cep']; ?></p>
                    <p><span>RUA: </span><?php echo $user['emp_logradouro']; ?></p>
                    <p><span>NÚMERO: </span><?php echo $user['emp_num']; ?></p>
                    <p><span>BAIRRO: </span><?php echo $user['emp_bairro']; ?></p>
                    <p><span>CIDADE: </span><?php echo $row_cid['cidNome']; ?></p>
                    <p><span>ESTADO: </span><?php echo $row_uf['ufeNome']; ?></p>
                </div>
                <a class="btn-editar" id="bnt-editar" href="perfil-config.php">Editar</a>
            </div>
        </div>
    </main>
    <div class="edita-img" id="div-edit-img">
        <form class="form-upload" action="" enctype="multipart/form-data">
            <div class="img-expo">
                <img class="img-previl" id="image" src="../imagens/group-svgrepo-com.svg" alt="">
                <input type="file" class="arquivo" id="inImg" name="arquivo" accept=".png, .jpg, .jpeg">
            </div>
            <div class="buttons">
                <button class="btn-salvar" id="btn-salvar">Salvar</button>
                <a class="btn-cancelar" id="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
    <?php
    }
    }
    }
    } catch (PDOException $e) {
        die("Erro ao recuperar informações do usuário: " . $e->getMessage());
    }
    ?>
    <script>
        var file = document.getElementById("inImg")
        var img = document.getElementById("image")
        file.addEventListener("change", (e) => {
            img.src = URL.createObjectURL(e.target.files[0])
        })
    </script>
</body>
<script src="../JS/jspadrao.js"></script>
<script src="../JS/perfil-empresa.js"></script>

</html>