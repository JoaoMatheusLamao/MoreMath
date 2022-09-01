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


    <script language="javascript">
        a = 0

        
        function esconde_div(){
            if (a == 0){
                document.getElementById("invisivel").style.visibility="visible"
                document.getElementById("img").style.visibility="hidden"
                a++
            }
            else{
                document.getElementById("invisivel").style.visibility="hidden"
                document.getElementById("img").style.visibility="visible"
                a = 0
            }
        }
    </script>
</head>
<body>
    <!-- cabeçario com a logo, perfil, e nome da pagina  -->
    <header>    
        <div><p id="pag_nom"> Conteúdos </p></div>
        <div><img src="css/img/Coruja.png" id="img" style="visibility: visible;"></div>
        <div id="tela_perfil"><a href="javascript:void(esconde_div())"><img src="css/img/Usuario botão.png"> </a></div>
    </header>
    <!-- display flutuante que forma a tela de perfil-->
    <div id="invisivel" style="visibility: hidden;">
        <div class="display_flutuante">
            <div class="imagem"> <img src="css/img/Coruja.png"></div>
            <div class="usuario">
                <div class="nome_usuario"><p>  Nome de usuario  </p></div>
                <div class="dados_usuario"> 
                    <p> Email: </p>
                    <p> Telefone:</p>
                    <p> Data de nascimento:</p>
                </div>
            </div>
        </div>
    </div>

    <!-- livros -->
    <main>  
        <div class="estante">
            <div class="livro_soma"><a href="conteudos/soma.php"><img src="css/img/Livro_1.png" alt="Livro de adilção"></a> </div>
            <div class="livro_subtracao"><a href="conteudos/subtracao.php"><img src="css/img/Livro_2.png" alt="Livro de subtração"></a> </div>
            <div class="livro_multiplicao"><a href="conteudos/multiplicacao.php"><img src="css/img/Livro_3.png" alt="Livro de multiplicação"></a> </div>
            <div class="livro_divisao"><a href="conteudos/divisao.php"><img src="css/img/Livro_4.png" alt="Livro de divisão"></a> </div>
        </div>
    </main>
</body>
</html> 