<?php
session_start();

$cpj = $_POST['CPJ'];
$senha = $_POST['txtsenha'];
$elementos = strlen($cpj);
include("conexao.php");

if ($elementos == 14) {


  $stmt = $conexao->prepare("SELECT * FROM tbl_usuario where usu_cpf = ? and usu_senha = ?");
  $stmt->bindParam(1, $cpj); 
  $stmt->bindParam(2, $senha);
  $categoria = "candidato";

  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $_SESSION['login'] = $result['usu_nome'];
    header("Location: home.php");
    exit(); 
  }
} else if ($elementos == 18) {
  $stmt = $conexao->prepare("SELECT * FROM tbl_empresa where emp_cnpj = ? and emp_senha = ?");
  $stmt->bindParam(1, $cpj); 
  $stmt->bindParam(2, $senha);
  $categoria = "empresa";

  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $_SESSION['login'] = $result['emp_nome'];
    header("Location: home.php");
    exit();
  }
} else {
  echo "erro";
}
?>

