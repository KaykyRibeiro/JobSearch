<?php

session_start();

 if($_POST){
    $cpf=$_POST['txtCpf'];
    $usu=$_POST['txtNome'];
    $email=$_POST['txtEmail'];
    $senha=$_POST['txtSen'];
   

    include "conexao.php";
    $st = $conexao->prepare("INSERT INTO cadastro (cad_cpf,cad_nome,cad_email,cad_senha)VALUES(?,?,?,?)");
    $st ->bindParam(1, $cpf);
    $st ->bindParam(2, $usu);
    $st ->bindParam(3, $email);
    $st ->bindParam(4, $senha);

 if($st->execute()){
    if($st->rowCount()>0){
        echo"<script>alert('Cadastro realizado com sucesso!)';</script>";
        header("refresh:1, login.php");
    }else{
        echo "Erro nenhuma linha executada";                                                                          

    }
}

 }
 ?>