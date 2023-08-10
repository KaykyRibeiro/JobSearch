<?php

session_start();

 if($_POST){
    $nomeEmp=$_POST['txtnome'];
    $email=$_POST['txtemail'];
    $senha=$_POST['txtsenha'];
    $senha=$_POST['txtsenha2'];
    $telefone=$_POST['txttelefone'];
    $cnpj=$_POST['txtcnpj'];
    $logradouro=$_POST['txtlogradouro'];
    $numero=$_POST['numero'];
    $complemento=$_POST['txtcomplemento'];
    $bairro=$_POST['txtbairro'];
    $cep=$_POST['txtcep'];
    $cidade=$_POST['txtcidade'];
    $estado=$_POST['txtestado'];

   

    include "conexao.php";
    $sql = $conexao->prepare("INSERT INTO tbl_empresa (emp_nome,emp_email,emp_senha,emp_telefone,emp_cnpj,emp_logradouro, emp_numRua, emp_complemento, emp_bairro, emp_cep, emp_cidcodigo, emp_ufecodigo)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql ->bindParam(1, $nomeEmp);
    $sql ->bindParam(2, $email);
    $sql ->bindParam(3, $senha);
    $sql ->bindParam(4, $telefone);
    $sql ->bindParam(5, $cpf);
    $sql ->bindParam(6, $datanas);
    $sql ->bindParam(7, $logradouro);
    $sql ->bindParam(8, $numero);
    $sql ->bindParam(9, $complemento);
    $sql ->bindParam(10, $bairro);
    $sql ->bindParam(11, $cep);
    $sql ->bindParam(12, $cidade);
    $sql ->bindParam(13, $estado);

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