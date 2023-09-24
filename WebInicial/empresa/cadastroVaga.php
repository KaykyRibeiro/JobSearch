<?php
session_start();
include('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar dados do formulário
    $titulo = $_POST['titulo'];
    $modo = $_POST['modo'];
    $descricao = $_POST['descricao'];
    $reqbasicos = $_POST['reqbasicos'];
    $reqdesejados = $_POST['reqdesejados'];
    $salario = $_POST['salario'];
    $localizacao = $_POST['local'];

    // Consulta SQL para inserir a vaga no banco de dados
    $query = "INSERT INTO tbl_vagas (vag_titulo, vag_modo, vag_descricao, vag_reqbasicos, vag_reqdesejados, vag_salario, vag_local) VALUES (:titulo, :modo, :descricao, :reqbasicos, :reqdesejados, :salario, :local)";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':modo', $modo, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':reqbasicos', $reqbasicos, PDO::PARAM_STR);
        $stmt->bindParam(':reqdesejados', $reqdesejados, PDO::PARAM_STR);
        $stmt->bindParam(':salario', $salario, PDO::PARAM_STR);
        $stmt->bindParam(':local', $localizacao, PDO::PARAM_STR);
        $stmt->execute();

        // Vaga cadastrada com sucesso, redirecionar para uma página de sucesso ou lista de vagas
        header("Location: area_empresa.php");
        exit();
    } catch (PDOException $e) {
        echo("Erro ao cadastrar vaga: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html>
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
                <input type="text" name="salario" required>
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