<?php
try {
   $conexao = new PDO("mysql:host=localhost;dbname=mei", "root", "");
   $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexao->exec("set names utf8");
} catch (PDOException $erro) {
   echo "erro na conexão: " . $erro->getMessage();
}
