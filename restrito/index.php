<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
session_start();
require_once("configRestrit.php");

$autenticar = new UsuarioOk();
$testeToken = $autenticar->autenticar($_SESSION['token']);

//se o usuario n passar na autenicação via token, é redirecionado a pagina de login
if ($testeToken == false) {
    header('location: ../index.php');
}
?>