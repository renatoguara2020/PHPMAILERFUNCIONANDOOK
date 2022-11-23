Be careful when trying to validate using PDO::PARAM_INT.

Take this sample into account:

<?php
/* php --version
* PHP 5.6.25 (cli) (built: Aug 24 2016 09:50:46)
* Copyright (c) 1997-2016 The PHP Group
* Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies
*/

$id = '1a';
$stmt = $pdo->prepare('select * from author where id = :id');
$bind = $stm->bindValue(':id', $id, PDO::PARAM_INT);

$stmt->execute();
$authors = $stmt->fetchAll();

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