<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário RDE</title> <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form method="post" >
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>
    
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required><br><br>
    
    <input type="submit" value="Cadastrar">

</form>
<input type="button" value="Voltar" onclick="window.location.href='../../index.php'">
<?php

require_once "C:/Turma1/xampp/htdocs/produtos.github.io/app/DB/DataBase.php";
require_once "C:/Turma1/xampp/htdocs/produtos.github.io/app/Controller/UsuarioController.php";



$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuarioController->cadastrar($nome, $email, $senha);
}