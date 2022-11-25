<?php
//flags da sessao disponiveis:
//$_SESSION['token'], $_SESSION['nome_usuario'], $_SESSION['data_nasc_usu'], $_SESSION['id_usuario']
require_once("configRestrit.php");
session_start();

$usuario = new UsuarioOk();
if (!$usuario->autenticar($_SESSION['token'])) {
    header('location: ../index.php');
}

$certo = Estatistica::puxaEstat($_SESSION['id_usuario'], 1);
$errado = Estatistica::puxaEstat($_SESSION['id_usuario'], 0);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="css/style_livros_1.css">
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
        <div class="cabecario">    
            <div><p id="pag_nom"> More Math </p></div>
            <div><img src="css/img/Coruja.png" id="img" style="visibility: visible;"></div>
            <div id="tela_perfil"><a href="javascript:void(esconde_div())"><img src="css/img/Usuario botão.png"> </a></div>
        </div>
        <!-- display flutuante que forma a tela de perfil-->
            <div id="invisivel" style="visibility: hidden;">
                <div class="display_flutuante">
                    <div class="imagem">
                        <img src="css/img/Coruja.png">
                        <div class="botoes_saida">
                            <form action="logout.php"><input id="bt_sair" type="submit" value="Sair"></form>
                        </div>
                    </div>
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
                            <div class="pai_dados">
                                <p> <span class="esquerda"> Exercícios corretos: </span> <span class="direita"><?php {echo $certo;}?></span></p>
                            </div> 
                            <div class="pai_dados">
                                <p> <span class="esquerda"> Exercícios incorretos: </span> <span class="direita"><?php {echo $errado;}?></span></p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
    </header>
<!-- Fim cabeçario -->

<!-- livros  -->
    <div class="bloco_do_swiper">
        <div class="swiper mySwiper" id="swiper-size">
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
    </div>
<!-- Fim livros -->
<!-- Rodapé -->
    <footer>
        <a href="sobre_nos.php" id="bt_quem_somos"> <p id="texto_bt_quem_somos"> Sobre nós </p></a>
    </footer>

</body>
</html> 
