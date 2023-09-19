<?php

session_start();
include('conexao.php');
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST) {
   $usu = $_POST['txtnome'];
   $sobrenome = $_POST['txtsobrenome'];
   $email = $_POST['txtemail'];
   $senha = $_POST['txtsenha'];
   $senha = $_POST['txtsenha2'];
   $telefone = $_POST['txttelefone'];
   $cpf = $_POST['txtcpf'];
   $datanas = $_POST['datanas'];
   $logradouro = $_POST['txtlogradouro'];
   $numero = $_POST['numero'];
   $complemento = $_POST['txtcomplemento'];
   $bairro = $_POST['txtbairro'];
   $cidNome = $_POST['txtcidade'];
   $estCod = $_POST['estado'];
   $sqlCidade = "SELECT cidCodigo FROM tblcidade WHERE cidNome = :cidNome";
   $stmtCidade = $conexao->prepare($sqlCidade);
   $stmtCidade->bindParam(':cidNome', $cidNome, PDO::PARAM_STR);
   $stmtCidade->execute();

   $rowCidade = $stmtCidade->fetch(PDO::FETCH_ASSOC);

   if ($rowCidade) {
      $codigoCidade = $rowCidade['cidCodigo'];
   } else {
      echo "Cidade não encontrada.";
      exit; // Saia do script
   }

   // Obter o código do estado com base no código do estado
   $sqlEstado = "SELECT ufeCodigo FROM tbluf WHERE ufeCodigo = :estCod";
   $stmtEstado = $conexao->prepare($sqlEstado);
   $stmtEstado->bindParam(':estCod', $estCod, PDO::PARAM_STR);
   $stmtEstado->execute();

   $rowEstado = $stmtEstado->fetch(PDO::FETCH_ASSOC);

   if ($rowEstado) {
      $codigoEstado = $rowEstado['ufeCodigo'];
   } else {
      echo "Estado não encontrado.";
      exit; // Saia do script
   }

   // Inserir dados na tabela tbl_usuario[]
   try{
   $sqlInserir = "INSERT INTO tbl_usuario (usu_nome, usu_sobrenome, usu_email, usu_senha, usu_telefone, usu_cpf, usu_dataNasc, usu_logradouro, usu_numRua, usu_complemento, usu_bairro, usu_cidCodigo, usu_ufeCodigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   $stmtInserir = $conexao->prepare($sqlInserir);
   $stmtInserir->execute([$usu, $sobrenome, $email, $senha, $telefone, $cpf, $datanas, $logradouro, $numero, $complemento, $bairro, $codigoCidade, $codigoEstado]);
   header('Location: login.php');
   }
   catch(PDOException $e){
      die("Erro ao Inserir os Dados Fornecidos: " . $e->getMessage());
   }

}
?>