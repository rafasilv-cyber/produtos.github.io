<?php

require_once "DB/DataBase.php";
require_once "Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->listar();

?>
