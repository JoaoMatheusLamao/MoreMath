<?php
session_start();

require_once("configRestrit.php");

$usuario = new UsuarioOk();
if (!$usuario->autenticar($_SESSION['token'])) {
    header('location: ../../index.php');
}

$id_componente = 1;
if (isset($_SESSION['componente']) && $_SESSION['componente'] != $id_componente) {
    $_SESSION['componente'] = $id_componente;
}
$_SESSION['componente'] = $id_componente;
//var_dump($_SESSION['componente']);

$conteudo = Conteudo::puxaCont($_SESSION['componente']);
?>

<!DOCTYPE html>
<html lang="ptbr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição</title>
    <link rel="shortcut icon" href="css/img/coruja.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_telas.css">
    <!-- Menu Lateral Javascript -->
    <script language="javascript">
        visibilidade = 0

        function esconde_div() {
            if (visibilidade == 0) {
                document.getElementById("menu_visbilidade").style.display = ""
                visibilidade++
            } else {
                document.getElementById("menu_visbilidade").style.display = "none"
                visibilidade = 0
            }
        }

        var i = setInterval(function () {
        clearInterval(i);
        document.getElementById("loading").style.display = "none";
        document.getElementById("conteudo_pdf").style.display = "flex";
        }, 1000);
    </script>
    <!-- Fim do menu lateral -->

</head>

<body>

    <main>
        <div class="conteudo">

            <div class="menu_lateral">
                <div class="menu_lateral_andante">
                    <div class="menu" id="menu_visbilidade" style="display: none;">  <br>    
                        <a href="subtracao.php" id="primeiro"><p id="subtracao">Subtração</p></a><br>
                        <a href="multiplicacao.php"><p id="multiplacao">Multiplicação</p></a><br>
                        <a href="divisao.php"><p id="divisao">Divisão</p></a><br>
                        <img src="css/img/Coruja.png" width="70%">
                    </div>
                    <div class="bt_lateral">
                        <a href="javascript:void(esconde_div())"><img src="css/img/bt_menu.png" alt=""></a>
                    </div>
                </div>
                <div class="bt_voltar_div"> <a href="../index.php" class="bt_voltar_a"><img src="css/img/bt_volta.png" alt="menu"></a></div> 
            </div>

            <div class="conteudos_bloco">
                <div class="Corpo_conteudo">
                    <div id="loading" style="display: flex"> <img src="css/img/loading.gif"> </div>
                    <div id="conteudo_pdf" style="display: none">
                        <img src="docs/adicao/adicao1.png"><br>
                        <img src="docs/adicao/adicao2.png"><br>
                        <img src="docs/adicao/adicao3.png"><br>
                        <img src="docs/adicao/adicao4.png"><br>
                        <img src="docs/adicao/adicao5.png"><br>
                        <img src="docs/adicao/adicao6.png"><br>
                        <img src="docs/adicao/adicao7.png"><br>
                        <img src="docs/adicao/adicao8.png"><br>
                        <img src="docs/adicao/adicao9.png"><br>
                        <img src="docs/adicao/adicao10.png"><br>
                        <img src="docs/adicao/adicao11.png"><br>
                        <img src="docs/adicao/adicao12.png"><br>
                    </div>
                </div>
                
                
            </div>

            <div class="Div_bt_exercicios"> <a href="../exercicio/selectNivel.php" id="img_voltar"><img src="css/img/bt_exercicio.png" width="80%" id="img_bt_exercicio"></a><br></div>
        </div>

</body>

</html>