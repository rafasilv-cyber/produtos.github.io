<?php
// INICIA A SESSÃO: Isso é obrigatório para podermos "salvar" que o usuário logou
session_start();

require_once "C:/Turma2/xampp/htdocs/produtos.github.io/app/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/produtos.github.io/app/Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

// Variável para exibir mensagens de erro no HTML, caso o login falhe
$erroLogin = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Chama o método de login (que vamos criar no Controller abaixo)
    $usuario = $usuarioController->login($email, $senha);

    if ($usuario) {
        // LOGIN BEM SUCEDIDO: Salva os dados na sessão
        $_SESSION['usuario_logado'] = true;
        $_SESSION['usuario_id'] = $usuario['id']; // Assumindo que sua tabela tem 'id'
        $_SESSION['usuario_nome'] = $usuario['nome'];

        // Redireciona para a dashboard
        header("Location: /produtos.github.io/app/index.php"); 
        exit;
    } else {
        // LOGIN FALHOU
        $erroLogin = "E-mail ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso RDE</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form method="post">
    <h2>Fazer Login</h2>

    <?php if(!empty($erroLogin)): ?>
        <p style="color: red;"> <?php echo $erroLogin; ?> </p>
    <?php endif; ?>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required><br><br>
    
    <input type="submit" value="Entrar">
</form>

<br>
<p>Não tem uma conta? <a href="cadastrar.php">Cadastre-se aqui</a></p>

</body>
</html>