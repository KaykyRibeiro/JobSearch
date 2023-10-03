<?php
session_start();

$cpj = $_POST['CPJ'];
$elementos = strlen($cpj);
include("conexao.php");
$senha = $_POST['txtsenha'];

if ($elementos == 14) {
  $sqlTeste = "SELECT * FROM tbl_usuario WHERE usu_cpf = :cpj and usu_senha = :senha";
  $stmtCandidato = $conexao->prepare($sqlTeste);
  $stmtCandidato->bindParam(':cpj', $cpj, PDO::PARAM_STR);
  $stmtCandidato->bindParam(':senha', $senha);

  $stmtCandidato->execute();

  $result = $stmtCandidato->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $_SESSION['user_id'] = $result['usu_id'];
    $_SESSION['login'] = $result['usu_nome'];
    $_SESSION['categoria'] = "candidato";
    header("Location: home.php");
    exit;
  } else {
    echo "Usuário não encontrado.";
    echo $senha;
  }
} else if ($elementos == 18) {
  $sqlEmpresa = "SELECT * FROM tbl_empresa where emp_cnpj = :cpj and emp_senha = :senha";
  $stmtEmpresa = $conexao->prepare($sqlEmpresa);
  $stmtEmpresa->bindParam(':cpj', $cpj, PDO::PARAM_STR);
  $stmtEmpresa->bindParam(':senha', $senha);

  $stmtEmpresa->execute();

  $result = $stmtEmpresa->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $_SESSION['login'] = $result['emp_nome'];
    $_SESSION['categoria'] = "empresa";
    header("Location: home.php");
    exit;
  } else {
    echo "Usuário não encontrado.";
  }
} else {
  echo "Erro: CPJ inválido";
}
?>
