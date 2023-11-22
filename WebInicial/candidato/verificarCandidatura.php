<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
// Recuperar informações do usuário da sessão
$user_id = $_SESSION['user_id'];
$vag_id = $_GET['id'];

$data = date("Y/m/d");
$query = "INSERT INTO tbl_candidatura (can_dataEnvio, can_vagId, can_usu_id) VALUES (:can_dataEnvio, :can_vagId, :can_usu_id)";

    try {
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':can_dataEnvio', $data, PDO::PARAM_STR);
        $stmt->bindValue(':can_vagId', $vag_id, PDO::PARAM_STR);
        $stmt->bindValue(':can_usu_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $_SESSION['vag_id'] = '';
        header("Location: area_candidato.php");
    }
    catch(PDOException $e){
        echo ("Erro ao Efetuar a Candidatura: " . $e->getMessage());
    }
?>