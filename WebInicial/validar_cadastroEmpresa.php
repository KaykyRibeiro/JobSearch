<?php

session_start();
include('conexao.php');

if ($_POST) {
    $nomeEmp = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $senha = $_POST['txtsenha2'];
    $telefone = $_POST['txttelefone'];
    $cnpj = $_POST['txtcnpj'];
    $logradouro = $_POST['txtlogradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['txtcomplemento'];
    $bairro = $_POST['txtbairro'];
    $cep = $_POST['txtcep'];
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
    $sqlEstado = "SELECT ufeCodigo FROM tbluf WHERE sigla = :sigla";
    $stmtEstado = $conexao->prepare($sqlEstado);
    $stmtEstado->bindParam(':sigla', $estCod, PDO::PARAM_STR);
    $stmtEstado->execute();

    $rowEstado = $stmtEstado->fetch(PDO::FETCH_ASSOC);

    if ($rowEstado) {
        $codigoEstado = $rowEstado['ufeCodigo'];
    } else {
        echo "Estado não encontrado.";
        exit; // Saia do script
    }

    $consulta = "SELECT * FROM tbl_empresa WHERE emp_cnpj = :cnpj";
    $stmtConsulta = $conexao->prepare($consulta);
    $stmtConsulta->bindParam(':cnpj', $cnpj);
    $stmtConsulta->execute();
    $rowConsulta = $stmtConsulta->fetch(PDO::FETCH_ASSOC);
    if ($rowConsulta) {
        echo "CNPJ já cadastrado.";
    } else {

        // Inserir dados na tabela tbl_usuario[]
        try {
            $sqlInserir = "INSERT INTO tbl_empresa (emp_nome, emp_email, emp_senha, emp_telefone, emp_cnpj, emp_logradouro, emp_num, emp_complemento, emp_bairro, emp_cidCodigo, emp_ufeCodigo, emp_cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtInserir = $conexao->prepare($sqlInserir);
            $stmtInserir->execute([$nomeEmp, $email, $senha, $telefone, $cnpj, $logradouro, $numero, $complemento, $bairro, $codigoCidade, $codigoEstado, $cep]);
            header('Location: login.php');
        } catch (PDOException $e) {
            die("Erro ao Inserir os Dados Fornecidos: " . $e->getMessage());
        }
    }
}
