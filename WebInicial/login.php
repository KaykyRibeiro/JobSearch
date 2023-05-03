<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Estilos/estilos.css">
</head>

<body>
    <div class="caixa__login">
        <h2>Login</h2>
        <form action="validar_login.php" method="post">
            <div class="caixa__login-input">
                <input type="text" name="txtemail" required />
                <label>E-mail</label>
            </div>
            <div class="caixa__login-input">
                <input type="password" name="txtsenha" required />
                <label>Senha</label>
                
            </div>
            <input class="acessar" type="submit" value="Acessar">
            <!-- <a class="acessar" href="home.php">Acessar</a>-->
            
        </form>
      <a class="recupera" href="recuperarsenha.html">esqueceu a senha?</a>
      <p>Não possui uma conta? <a href="cadastro.html">Cadastre-se</a></p>
    </div>
    
</body>

</html>