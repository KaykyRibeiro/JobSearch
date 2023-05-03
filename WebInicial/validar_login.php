<?php
session_start();

$email=$_POST['txtemail'];
$senha=$_POST['txtsenha'];
            include "conexao.php";
            
                $stmt = $conexao->prepare("SELECT * FROM tbl_usuario where usu_email = ? and usu_senha = ?");
                $stmt-> bindParam(1,$email);
                $stmt-> bindParam(2,$senha);
                
                $stmt->execute();
               
                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $_SESSION['login'] = $result['usu_nome'];
                      header("refresh:3, home.php");          
                    }
                
             
        ?>