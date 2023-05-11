<?php
session_start();
include_once('conexao.php');

if(!isset($_SESSION['login'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/estilopadrao.css">
    <link rel="stylesheet" href="./Estilos/estiloH.css">
    <title>JobSearch</title>
</head>
<body>
<nav>
        <a href="">Home</a>
        <a href="">Notificação</a>
        <a href="">teste</a>
        <a href="">teste</a>
    </nav>
    <main>
        <h2>Postagens</h2>
        <div class="quadro">
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
            <div class="postagem">
                <h1>Emprego</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi vitae laborum accusantium mollitia modi harum voluptate deleniti placeat asperiores delectus porro, dignissimos a sunt saepe qui voluptatem natus! Non, illo.</p>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>