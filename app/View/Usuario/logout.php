<?php
session_start();

// Destrói todas as informações da sessão (tira a "pulseira" do usuário)
session_destroy(); 

// Como o logout.php agora está na mesma pasta que o login.php, o caminho do redirecionamento é direto:
header("Location: login.php"); 
exit;
?>