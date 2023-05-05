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
    <title>JobSearch</title>
</head>
<body>
    <h1>aaaaaaaaa</h1>
</body>
</html>