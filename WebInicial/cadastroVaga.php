<?php
session_start();
include('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $localizacao = $_POST['localizacao'];

    // Consulta SQL para inserir a vaga no banco de dados
    $query = "INSERT INTO vagas (titulo, descricao, localizacao) VALUES (:titulo, :descricao, :localizacao)";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':localizacao', $localizacao, PDO::PARAM_STR);
        $stmt->execute();

        // Vaga cadastrada com sucesso, redirecionar para uma página de sucesso ou lista de vagas
        header("Location: sucesso.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao cadastrar vaga: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Vaga de Emprego</title>
</head>
<body>
    <h2>Cadastrar Vaga de Emprego</h2>
    
    <form method="post" action="">
        <label for="titulo">Título da Vaga:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="descricao">Descrição da Vaga:</label>
        <textarea name="descricao" rows="4" cols="50" required></textarea><br><br>

        <label for="localizacao">Localização:</label>
        <input type="text" name="localizacao" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>