<!DOCTYPE html>
<html>

<head>
    <title>Cadastrar Vaga de Emprego</title>
    <link rel="stylesheet" href="../Estilos/estilo3_h.css">
    <link rel="stylesheet" href="../Estilos/estilopadrao.css">
    <link rel="stylesheet" href="../Estilos/cadVaga.css">
    <link rel="stylesheet" href="../Estilos/detalhe_vaga.css">
</head>

<body>
    <a href="area_empresa.php"><img class="back" src="../imagens/arrow-left-svgrepo-com.svg" alt=""></a>
    <div class="main">
        <div class="vaga">
            timezone_offset_get
        </div>
        <div class="candidatos">
            <h3>Candidatos</h3>
            <div class="bloco">
                <div class="candidato" id="candidato">
                    <?php
                    while ($row_produto = mysqli_fetch_assoc($resultado_produto)) {
                    $_SESSION['usu_id'] = $row_produto['usuId'];
                    ?>
                    <div>
                        <img src="../imagens/logo.png" alt="" class="foto_perfil">
                    </div>
                    <div>
                        <?php
                        $teste = "Variável PHP";
                        ?>
                        <p class="txt">NOME: <span class="nome">cleitin da silva pires</span></p>
                        <p class="txt">IDADE: <span class="idade">17 anos</span></p>
                        <p class="txt">CPF: <span class="cpf">400.289.228-12</span> </p>
                    </div>

                </div>
                <div class="detalhes">
                    <button class="detalhe" id="detalheBtn" onclick="dados()">
                        <img class="img_detalhe" src="../imagens/menu-svgrepo-com.svg" alt="">
                    </button>
                </div>
            </div>

            <dialog open>
                teste
            </dialog>


        </div>
    </div>

</body>
<script>
    var teste = "<?php echo $teste; ?>"
</script>

</html>