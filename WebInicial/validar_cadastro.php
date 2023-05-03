<?php

session_start();

 if($_POST){
    $usu=$_POST['txtnome'];
    $sobrenome=$_POST['txtsobrenome'];
    $email=$_POST['txtemail'];
    $senha=$_POST['txtsenha'];
    $senha=$_POST['txtsenha2'];
    $telefone=$_POST['txttelefone'];
    $cpf=$_POST['txtcpf'];
    $datanas=$_POST['datanas'];
    $logradouro=$_POST['txtlogradouro'];
    $numero=$_POST['numero'];
    $complemento=$_POST['txtcomplemento'];
    $bairro=$_POST['txtbairro'];
    $cep=$_POST['txtcep'];
    $cidade=$_POST['txtcidade'];
    $estado=$_POST['txtestado'];

   

    include "conexao.php";
    $sql = $conexao->prepare("INSERT INTO tbl_usuario (usu_nome,usu_sobrenome,usu_email,usu_senha,usu_telefone,usu_cpf,usu_dataNasc, usu_logradouro, usu_numRua, usu_complemento, usu_bairro, usu_cep, usu_cidcodigo, usu_ufecodigo)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql ->bindParam(1, $usu);
    $sql ->bindParam(2, $sobrenome);
    $sql ->bindParam(3, $email);
    $sql ->bindParam(4, $senha);
    $sql ->bindParam(5, $telefone);
    $sql ->bindParam(6, $cpf);
    $sql ->bindParam(7, $datanas);
    $sql ->bindParam(8, $logradouro);
    $sql ->bindParam(9, $numero);
    $sql ->bindParam(10, $complemento);
    $sql ->bindParam(11, $bairro);
    $sql ->bindParam(12, $cep);
    $sql ->bindParam(11, $cidade);
    $sql ->bindParam(12, $estado);

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