<?php

//falta terminar os dados no cadastro... tem que pegar o telefone
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
require_once("configRestrit.php");
session_start();

//var_dump($_SESSION['nome_usuario']);

$usuario = new UsuarioOk();

//var_dump($_SESSION['token']);
if (!$usuario->autenticar($_SESSION['token'])) {
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="css/style1_livrinhos.css">
    <link rel="shortcut icon" href="css/img/Coruja.png" type="image/x-icon">
    <title>Conteudos</title>

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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

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
                <div class="nome_usuario"><p>  <?php if(isset($_SESSION['nome_usuario'])) {echo ucfirst($_SESSION['nome_usuario']);}?>  </p></div>
                <div class="dados_usuario">
                    <div class="pai_dados">
                        <p> <span class="esquerda">Email:</span>  <span class="direita"><?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];}?></span></p>
                    </div> 
                    <div class="pai_dados">
                        <p> <span class="esquerda">Telefone:</span>  <span class="direita"><?php if(isset($_SESSION['telefone'])) {echo $_SESSION['telefone'];}?></span></p>
                    </div> 
                    <div class="pai_dados">
                        <p> <span class="esquerda"> Data de nascimento: </span> <span class="direita"><?php if(isset($_SESSION['data_nasc_usu'])) {echo $_SESSION['data_nasc_usu'];}?></span></p>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <!-- livros    -->
    <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><a href="conteudos/soma.php"><img src="css/img/livro_1.png" alt="link de conteudo para soma"></a></div>
        <div class="swiper-slide"><a href="conteudos/subtracao.php"><img src="css/img/Livro_2.png" alt="link de conteudo para subtração"></a></div>
        <div class="swiper-slide"><a href="conteudos/multiplicacao.php"><img src="css/img/Livro_3.png" alt="link de conteudo para multiplicação"></a></div>
        <div class="swiper-slide"><a href="conteudos/divisao.php"><img src="css/img/Livro_4.png" alt="link de conteudo para divisão"></a></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            pagination: {
            el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
</body>
</html> 