<?php

 if($_POST){
   
    $trabalho=$_POST['txtTrabalho'];
    $Contato=$_POST['txtContato'];
    $regiao=$_POST['txtRegiao'];
    $foto=$_FILES["txtfoto"]['name'];

   move_uploaded_file($_FILES['txtfoto']['tmp_name'], 'img/'. $_FILES["txtfoto"]['name']);
  
    
    include "conexao.php";
    $st = $conexao->prepare("INSERT INTO trabalho (trab_nome,trab_contato,trab_reg,trab_foto)VALUES(?,?,?,?)");
     
    $st ->bindParam(1, $trabalho);
    $st ->bindParam(2, $Contato);
    $st ->bindParam(3, $regiao);
    $st ->bindParam(4, $foto);

 if($st->execute()){
    if($st->rowCount()>0){
        echo"<script>alert('Cadastro realizado com sucesso!)';</script>";
        header("refresh:1, home.php");
    }else{
        echo "Erro nenhuma linha executada";                                                                          

    }
}

}
 