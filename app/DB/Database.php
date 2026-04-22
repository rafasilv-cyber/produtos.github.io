<?php

$dsn = 'mysql:host=localhost;dbname=dbinfo;charset=utf8';
$usuario = 'root';
$senha = '';

try{
    $pdo = new PDO($dsn, $usuario, $senha, );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}

?>