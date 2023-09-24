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
    </style>
    
</head>
<body>
<nav>
        <a class="select" id="logo" href="home_empresa.php"><img class="logo" src="../imagens/logo.png" alt=""></a>
        <a class="select" id="home" href="home_empresa.php"><img class="imgHome" src="../imagens/home-page-svgrepo-com.svg" alt=""></a>
        <a class="selecionado" href="area_empresa.php"><img class="icon" src="../imagens/notebook-svgrepo-com.svg" alt="" /></a>
        <div class="alert">
            <button id="notificacao" class="select">
                <img class="icon-notif" src="../imagens/remind-svgrepo-com.svg" alt="">
            </button>
        </div>
        <a class="select" href="perfil.php"><img class="icon" src="../imagens/group-svgrepo-com.svg" alt=""></a>
        <a class="select" id="config" href="logout.php"><img class="icon" src="../imagens/quit-svgrepo-com.svg" alt=""></a>
    </nav>
    <main>
    <h2>Vagas Existentes</h2>
        <div class="lista">
            <div class="bloco">
                <h3>teste</h3>                
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis enim at non consequuntur atque, nobis rem nihil fuga officia eum voluptas dolore facilis laudantium aperiam vitae rerum necessitatibus. Voluptate, excepturi.</p>
            </div>
            <div class="bloco">
                <h3>teste</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis enim at non consequuntur atque, nobis rem nihil fuga officia eum voluptas dolore facilis laudantium aperiam vitae rerum necessitatibus. Voluptate, excepturi.</p>
            </div>
        </div>
           <a class="border" href="cadastroVaga.php"><img class="create" src="../imagens/file-add-svgrepo-com.svg" alt=""></a> 
    </main>
</body>
<script src="../JS/jspadrao.js"></script>
</html>