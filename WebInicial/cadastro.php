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
        <form action="validar_cadastro.php" method="post">
            <div class="caixa__login-input">
                <input type="text" name="txtnome" required />
                <label>Nome</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtsobrenome" required />
                <label>Sobrenome</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtcpf" required />
                <label>CPF</label>
            </div>
            <div class="caixa__login-input">
                <input type="date" name="datanas" required />
                <label>Data de nascimento</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtlogradouro" required />
                <label>Logradouro</label>
            </div>
            <div class="caixa__login-input">
                <input type="number_format" name="numero" required />
                <label>Numero</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtcomplemento" required />
                <label>complemento</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtbairro" required />
                <label>Bairro</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtcidade" required />
                <label>Cidade</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtestado" required />
                <label>Estado</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txtemail" required />
                <label>E-mail</label>
            </div>
            <div class="caixa__login-input">
                <input type="text" name="txttelefone" required />
                <label>Telefone</label>
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