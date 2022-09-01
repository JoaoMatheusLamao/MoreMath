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

    <!-- Javascript cabeçario botão -->
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

    <!-- Swiper -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.esm.browser.min.js'
        const swiper = new Swiper()
    </script>
    <!-- fim swiper -->
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

    <!-- livros    -->
    <main> 
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide"><img src="css/img/Livro_1.png" alt="Livro de adilção" class="img_livros_swipe"></div>
                <div class="swiper-slide"><img src="css/img/Livro_2.png" alt="Livro de subtração" class="img_livros_swipe"></div>
                <div class="swiper-slide"><img src="css/img/Livro_3.png" alt="Livro de multiplicação" class="img_livros_swipe"></div>
                <div class="swiper-slide"><img src="css/img/Livro_4.png" alt="Livro de divisão" class="img_livros_swipe"></div>
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-next"></div>
        </div>
        <script lang="javascript">
            const swiper = new Swiper('.swiper', {
                // Optional parameters
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                },
            });
        </script>
    </main>


    
    


</body>
</html> 