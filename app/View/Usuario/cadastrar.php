<?php
// 1. INICIA A SESSÃO (Para podermos logar o usuário após o cadastro)
session_start();

require_once "C:/Turma2/xampp/htdocs/produtos.github.io/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/produtos.github.io/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

// 2. VERIFICA SE O FORMULÁRIO FOI ENVIADO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Tenta cadastrar no banco
    $cadastrou = $usuarioController->cadastrar($nome, $email, $senha);

    if ($cadastrou) {
        // CADASTRO BEM SUCEDIDO!
        // Já "loga" o usuário no sistema dando a sessão a ele
        $_SESSION['usuario_logado'] = true;
        $_SESSION['usuario_nome'] = $nome;

        // Redireciona direto para a Dashboard
        header("Location: /produtos.github.io/app/index.php");
        exit; // Para o carregamento desta página
    } else {
        $erro = "Erro ao cadastrar usuário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário RDE</title> 
    <link rel="stylesheet" href="../../style.css"> 
</head>
<body>
    
<form method="post">
    <h2>Cadastre-se</h2>

    <?php if(isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>
    
    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required><br><br>
    
    <input type="submit" value="Cadastrar">
</form>

<br>
<input type="button" value="Voltar para o Login" onclick="window.location.href='login.php'">

</body>
</html>