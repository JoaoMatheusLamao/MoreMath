<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
session_start();
require_once("configRestrit.php");

$autenticar = new UsuarioOk();
$testeToken = $autenticar->autenticar($_SESSION['token']);

//se o usuario não passar na autenicação via token, é redirecionado a pagina de login
if ($testeToken == false) {
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao More Math!!!</title>
</head>
<body>
    <a href="pagConteudos/conteudoAdicao.php">Conteúdo de adição</a>
</body>
</html>