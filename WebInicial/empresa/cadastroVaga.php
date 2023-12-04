<?php
session_start();
include('../conexao.php');
if (!isset($_SESSION['emp_id'])) {
    header("Location: ../login.php");
    exit();
}
// Recuperar informações do usuário da sessão
$user_id = $_SESSION['emp_id'];
date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar dados do formulário
    $titulo = $_POST['titulo'];
    $modo = $_POST['modtrabalho'];
    $descricao = $_POST['descricao'];
    $reqbasicos = $_POST['reqbasicos'];
    $reqdesejaveis = $_POST['reqdesejaveis'];
    $salario = $_POST['salario'];
    $localizacao = $_POST['local'];
    $dtPub = date("Y/m/d");
    $reqdesejaveis = $_POST['reqdesejaveis'];

    // Consulta SQL para inserir a vaga no banco de dados
    $empresa = "INSERT INTO tbl_vagas (vag_titulo, vag_modo, vag_descricao, vag_dataPub, vag_requisitos, vag_reqdesejaveis, vag_salario, vag_local, vag_emp_id) VALUES (:titulo, :modo, :descricao, :dtPub, :reqbasicos, :reqdesejaveis, :salario, :localizacao, :user_id)";

    try {
        $stmt = $conexao->prepare($empresa);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':modo', $modo, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':dtPub', $dtPub);
        $stmt->bindValue(':reqbasicos', $reqbasicos, PDO::PARAM_STR);
        $stmt->bindValue(':reqdesejaveis', $reqdesejaveis, PDO::PARAM_STR);
        //$stmt->bindValue(':reqdesejaveis', $reqdesejaveis, PDO::PARAM_STR);
        $stmt->bindValue(':salario', $salario);
        $stmt->bindValue(':localizacao', $localizacao, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $user_id);

        $stmt->execute();
        // $stmt = $conexao->prepare($empresa);
        // //$stmt->bindParam($titulo, $modo, $descricao, $dtPub, $reqbasicos, $salario, $localizacao, $user_id);
        // $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        // $stmt->bindParam(':modo', $modo, PDO::PARAM_STR);
        // $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        // $stmt->bindParam(':dtPub', $dtPub);
        // $stmt->bindParam(':reqbasicos', $reqbasicos, PDO::PARAM_STR);
        // //$stmt->bindParam(':reqdesejados', $reqdesejados, PDO::PARAM_STR);
        // $stmt->bindParam(':salario', $salario);
        // $stmt->bindParam(':localizacao', $localizacao, PDO::PARAM_STR);
        // $stmt->bindParam(':usur_id', $user_id);

        // $stmt->execute();

        // Vaga cadastrada com sucesso, redirecionar para uma página de sucesso ou lista de vagas
        header("Location: area_empresa.php");
        exit();
    } catch (PDOException $e) {
        echo ("Erro ao cadastrar vaga: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Cadastrar Vaga de Emprego</title>
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/cadVaga.css">
</head>

<body>
    <a href="area_empresa.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>
    <form method="post" action="" class="form">
        <h2>CADASTRAR VAGA DE EMPREGO</h2>

        <div class="display">
            <div class="input_group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="input_group">
                <label for="modo">Modo de Trabalho</label>
                <select name="modtrabalho" required>
                    <option selected disabled value=""></option>
                    <option value="Presencial">Presencial</option>
                    <option value="Remoto">Remoto</option>
                    <option value="Hibrido">Hibrido</option>
                </select>
            </div>
            <div class="input_group">
                <label for="Descricao">Descrição</label>
                <textarea name="descricao" required></textarea>
            </div>
            <div class="input_group">
                <label for="reqbasicos">Requisitos Básicos</label>
                <textarea name="reqbasicos" required></textarea>
            </div>
            <div class="input_group">
                <label for="reqdesejaveis">Requisitos Diferenciais</label>
                <textarea name="reqdesejaveis" required></textarea>
            </div>
            <div class="input_group">
                <label for="salario">Salário</label>
                <input type="number" placeholder="0.00" name="salario" required>
            </div>
            <div class="input_group">
                <label for="local">Localização da vaga</label>
                <input type="text" name="local" required>
            </div>
        </div>
        <input class="btn" type="submit" value="Publicar">
    </form>
</body>

</html>