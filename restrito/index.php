<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
require_once("configRestrit.php");
session_start();

//var_dump($_SESSION['token']);

$usuario = new UsuarioOk();

if (!$usuario->autenticar($_SESSION['token'])) {
    header('location: ../index.php');
}
?>