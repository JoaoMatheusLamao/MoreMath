<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
session_start();
require_once("configRestrit.php");

$autentica = UsuarioOk::autenticar($_SESSION['token']);


?>