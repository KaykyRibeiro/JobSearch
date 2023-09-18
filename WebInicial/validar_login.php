<?php
session_start();

$cpj=$_POST['CPJ'];
$senha=$_POST['txtsenha'];
$elementos = strlen($cpj);
            include ("conexao.php");
            
              if($elementos == 11){
                $stmt = $conexao->prepare("SELECT * FROM tbl_usuario where usu_cpf = ? and usu_senha = ?");
                $stmt-> bindParam(1,$email);
                $stmt-> bindParam(2,$senha);
                $categoria = "candidato";

                $stmt->execute();
               
                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $_SESSION['login'] = $result['usu_nome'];
                      header("refresh:3, home.php");          
                    }
              }
              else if($elementos == 14){
                $stmt = $conexao->prepare("SELECT * FROM tbl_empresa where emp_cnpj = ? and emp_senha = ?");
                $stmt-> bindParam(1,$email);
                $stmt-> bindParam(2,$senha);
                $categoria = "empresa";

                $stmt->execute();
               
                    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $_SESSION['login'] = $result['emp_nome'];
                      header("refresh:3, home.php");          
                    }
              }
              else{
                echo "erro";
              }


                
                
                
                
             
        ?>