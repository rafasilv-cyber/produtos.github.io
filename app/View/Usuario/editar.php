<?php

require_once 'C:/Turma2/xampp/htdocs/produtos.github.io/app/DB/DataBase.php';
require_once 'C:/Turma2/xampp/htdocs/produtos.github.io/app/Controller/UsuarioController.php';

$usuarioController = new UsuarioController($pdo);


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $usuarioController->buscarUsuario($id);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite sua conta</title>
</head>
<body>
    
<form method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" value="<?=$usuario['nome'];?>" required><br><br>

    <label for="nome">E-mail:</label><br>
    <input type="email" name="email" id="email" value="<?=$usuario['email'];?>" required><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" name="senha" id="senha" value="<?=$usuario['senha'];?>" required><br><br>
    <input type="submit" value="Salvar">
</form>
</body>
</html>
<?php
} else {
    header('Location: listar.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarioController->editar($nome, $email, $senha, $id);

    header('Location: ../../index.php');
}

?>