<?php
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./Estilos/estilos.css">
</head>

<body>
    <div class="caixa__login">
        <h2>Cadastro</h2>
        <form action="validar_cad_usu.php" method="post">
            <div class="caixa__login-input">
                <input type="text" name="txtnome" required />
                <label>Nome</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtsobrenome" required />
                <label>Sobrenome</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtemail" required />
                <label>E-mail</label>
            </div>
            <div class="caixa__login-input">
                <input type="password" name="txtsenha" required />
                <label>Senha</label>
                
            </div>
            <div class="caixa__login-input">
                <input type="password" name="txtsenha2" required />
                <label>Confirmar Senha</label>
                
            </div>
            
            <input class="acessar" type="submit" value="Acessar">
            <!-- <a class="acessar" href="home.php">Acessar</a>-->
        </form>
    </div>
    
</body>

</html>