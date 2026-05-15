<?php
class UsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodos() {
        $stmt = $this->pdo->query('SELECT * FROM usuarios');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function buscarUsuario($id) {
        // Nota: Usei prepare para manter o padrão de segurança
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $email, $senha) {
        $sql = ("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':senha' => $senha
        ]);        
    }

    public function editar($nome, $email, $senha, $id) {
        $sql = "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $nome, $email, $senha, $id
        ]);
    }

    public function deletar($id) {
        $sql = ("DELETE FROM usuarios WHERE id = ?");
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);       
    }

    // --- ESTA É A ALTERAÇÃO NECESSÁRIA PARA O LOGIN ---
    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        // Retorna os dados do usuário se encontrar, ou false se não existir
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}