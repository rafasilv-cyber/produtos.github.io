<?php
require_once __DIR__ . '/../Model/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($pdo) {
        $this->usuarioModel = new UsuarioModel($pdo);
    }
    
    public function listar() {
        $usuarios = $this->usuarioModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/produtos.github.io/app/View/Usuario/listar.php";
        return;
    }

    public function cadastrar($nome, $email, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $senha);
    }

    public function editar($nome, $email, $senha, $id) {
        $this->usuarioModel->editar($nome, $email, $senha, $id);
    }
    
    public function buscarUsuario($id) {
        return $this->usuarioModel->buscarUsuario($id);
    }
    
    public function deletar($id) {
       $usuario = $this->usuarioModel->deletar($id);
       return $usuario;
    }

    // --- NOVO MÉTODO DE LOGIN ---
    public function login($email, $senha) {
        // 1. Pede para o Model buscar o usuário no banco pelo e-mail
        $usuario = $this->usuarioModel->buscarPorEmail($email);

        // 2. Se o usuário existir, vamos verificar a senha
        if ($usuario) {
            
            // VERIFICAÇÃO DE SENHA
            // Se você salvou a senha criptografada no cadastro (usando password_hash), use:
            // if (password_verify($senha, $usuario['senha'])) { ... }
            
            // Se você salvou a senha normal, sem criptografia, use a comparação direta:
            if ($senha === $usuario['senha']) {
                return $usuario; // Retorna os dados do usuário (login deu certo)
            }
        }

        // Se o e-mail não existir ou a senha não bater, retorna falso
        return false;
    }
}
?>