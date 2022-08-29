<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
require_once("configRestrit.php");
session_start();

//var_dump($_SESSION['token']);

$usuario = new UsuarioOk();

// if (!$usuario->autenticar($_SESSION['token'])) {
//    header('location: ../index.php');
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="css/livrinhos_style.css">
    <link rel="shortcut icon" href="css/img/Coruja.png" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<!-- cabeçario com a logo, perfil, e nome da pagina  -->
    <header>        
        <div class="pag_nom">Conteúdos</div>
        <img src="css/img/Coruja.png">
        <button><img src="css/img/Usuario botão.png"></button>

    </header>
<!-- livros -->
    <main>  
        <div class="estante">
            <div class="livro_soma"><a href="conteudos/soma.php"><img src="css/img/livro_1.png" alt="Livro de adição"></a> </div>
            <div class="livro_subtracao"><a href="conteudos/subtracao.php"><img src="css/img/livro_2.png" alt="Livro de subtração"></a> </div>
            <div class="livro_multiplicao"><a href="conteudos/soma.php"><img src="css/img/livro_3.png" alt="Livro de multiplicação"></a> </div>
            <div class="livro_divisao"><a href="conteudos/multiplicacao.php"><img src="css/img/livro_4.png" alt="Livro de divisão"></a> </div>
        </div>
    </main>
</body>
</html> 