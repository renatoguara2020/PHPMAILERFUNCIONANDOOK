<?php

try {
 
 $stmt = $pdo->prepare("INSERT INTO  tb_clientes ( id, nome, email) VALUES (:id, :nome, :email)");
 $stmt->bindValue(':id', $id, PDO::PARAM_INT);
 $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
 $stmt->bindValue(':email, :email', $email, PDO::PARAM_STR);
  
 if ($stmt->execute()) {
      
     $cliente = $stmt->fetchAll(PDO::FETCH_OBJ); // O resultado neste caso gera um objeto
     $id = $cliente->id;
     $p_nome = $cliente->primeiro_nome;
     $s_nome = $cliente->sobre_nome;
     $email = $cliente->email;
     $celular = $cliente->celular;
          
          
 } else {
     echo "Erro: Não foi possível recuperar os dados do banco de dados";
 }

} catch (PDOException $erro) {

 echo "Erro: ".$erro->getMessage();
}   