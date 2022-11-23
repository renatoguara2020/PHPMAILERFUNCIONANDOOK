Be careful when trying to validate using PDO::PARAM_INT.

Take this sample into account:

<?php

require_once('./pdoPHP.php');

$nome = 'RENATO ALVES SOARES';
$id = '1a';
$stmt = $conn->prepare('select * from author where id = :id, nome = :nome');
$bind = $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$bind = $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);

$stmt->execute();
$authors = $stmt->fetchAll();
foreach ($authors as  $autor){

    $stmt->fetchAll($autor);
}

var_dump($id);         // string(2)
var_dump($bind);       // true
var_dump((int)$id);    // int(1)
var_dump(is_int($id)); // false
var_dump($authors);    // the author id=1  =(

// remember
var_dump(1 == '1');    // true
var_dump(1 === '1');   // false
var_dump(1 === '1a');  // false
var_dump(1 == '1a');   // true
?>