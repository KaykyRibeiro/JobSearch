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
    $_SESSION['loginUsu'] = $result['usu_nome'];
    $_SESSION['sobrenome'] = $result['usu_sobrenome'];
    $_SESSION['categoria'] = "candidato";
    header("Location: ./candidato/home.php");
    exit;
  } else {
    echo "Usuário não encontrado.";
    echo $senha;
  }
} else if ($elementos == 18) {
  $sqlEmpresa = "SELECT * FROM tbl_empresa WHERE emp_cnpj = :cpj and emp_senha = :senha";
  $stmtEmpresa = $conexao->prepare($sqlEmpresa);
  $stmtEmpresa->bindParam(':cpj', $cpj, PDO::PARAM_STR);
  $stmtEmpresa->bindParam(':senha', $senha);

  $stmtEmpresa->execute();

  $result = $stmtEmpresa->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $_SESSION['emp_id'] = $result['emp_id'];
    $_SESSION['loginEmp'] = $result['emp_nome'];
    $_SESSION['categoria'] = "empresa";
    header("Location: ./empresa/home_empresa.php");
    exit;
  } else {
    echo "Empresa não encontrada.";
  }
} else {
  echo "Erro: CPJ inválido";
}
?>
