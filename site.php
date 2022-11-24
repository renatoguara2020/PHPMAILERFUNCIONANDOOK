<?php
// Iniciando uma sessão
session_start();
 
// Guardando dados na sessão
$_SESSION["nome"] = "RENATO";
$_SESSION["sobrenome"] = "ALVES SOARES";

echo "<h1>Logado RENATO ALVES SOARES </h1>";
echo 'Hi, ' . $_SESSION["nome"] . ' ' . $_SESSION["sobrenome"];