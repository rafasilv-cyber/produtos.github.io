<?php
// 1. INICIA A SESSÃO (Sempre a primeira linha!)
session_start();

// 2. BLOQUEIO DE SEGURANÇA
// Se o usuário não estiver logado, manda ele para a tela de login e para a execução da página.
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("Location: /produtos.github.io/app/View/Usuario/login.php");
    exit;
}

// 3. CARREGA AS DEPENDÊNCIAS DO SISTEMA
require_once "DB/DataBase.php";
require_once "Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->listar();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Info</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="/produtos.github.io/app/View/Usuario/logout.php" style="color: red;">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="hero">
            <h1>Your Info</h1>
            <p>Bem-vindo à Your Info, a sua plataforma de referência para infoprodutos de alto desempenho.

Em um cenário onde a atualização constante é o maior diferencial competitivo, a Your Info atua como uma ponte estratégica entre você e o conhecimento de ponta. Nossa loja é dedicada à curadoria e distribuição de materiais digitais premium — abrangendo e-books técnicos, treinamentos especializados, templates e ferramentas de gestão —, todos desenvolvidos para otimizar processos, acelerar carreiras e impulsionar negócios.

Nossa missão é ir além da teoria, fornecendo um acervo de conteúdo estritamente focado em aplicabilidade prática e resultados mensuráveis. Na Your Info, entendemos que o seu tempo é valioso e que a informação correta é o motor da inovação.</p>
            <button>Chamada para Ação</button>
        </section>

        <section id="servicos">
            <h2>Nossos Serviços</h2>
            <article>
                <h3>Serviço 1</h3>
                <p>Descrição detalhada.</p>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 - Todos os direitos reservados.</p>
    </footer>
</body>
</html>