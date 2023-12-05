<?php
session_start();

$email=$_POST['txtEmail'];
$senha=$_POST['txtSen'];
            include ("conexao.php");
            
                $stmt = $conexao->prepare("SELECT * FROM adm where adm_email = ? and adm_senha = ?");
                $stmt-> bindParam(1,$email);
                $stmt-> bindParam(2,$senha);
                
                $stmt->execute();
               
                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $_SESSION['login'] = $result['adm_nome'];
                      header("refresh:3, ExibirTrab.php");          
                    }
                
             
        ?>