<?php

session_start();
include('conexao.php');

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
    $cidade=$_POST['txtcidade'];
    $estado=$_POST['txtestado'];

   

    
    $stmt = $conexao->prepare("INSERT INTO tbl_usuario (usu_nome,usu_sobrenome,usu_email,usu_senha,usu_telefone,usu_cpf,usu_dataNasc, usu_logradouro, usu_numRua, usu_complemento, usu_bairro, usu_cidcodigo, usu_ufecodigo)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt ->bindParam(1, $usu);
    $stmt ->bindParam(2, $sobrenome);
    $stmt ->bindParam(3, $email);
    $stmt ->bindParam(4, $senha);
    $stmt ->bindParam(5, $telefone);
    $stmt ->bindParam(6, $cpf);
    $stmt ->bindParam(7, $datanas);
    $stmt ->bindParam(8, $logradouro);
    $stmt ->bindParam(9, $numero);
    $stmt ->bindParam(10, $complemento);
    $stmt ->bindParam(11, $bairro);
    $stmt ->bindParam(12, $cidade);
    $stmt ->bindParam(13, $estado);

 if($stmt->execute()){
    if($stmt->rowCount()>0){
        echo"<script>alert('Cadastro realizado com sucesso!)';</script>";
        header("refresh:1, login.php");
    }else{
        echo "Erro nenhuma linha executada";                                                                          

    }
}

 }
 ?>