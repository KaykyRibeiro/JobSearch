<?php
function novaConexao(){
    $dns = 'mysql:host=localhost;dbname=jobsearch';
    $usuario = 'root';
    $senha = '';
    try{
        $conexao = new PDO($dns,$usuario,$senha);
        return $conexao;
    }
    catch(PDOException $e){
        echo 'Erro: ' . $e->getMessage();
    }
}
?>