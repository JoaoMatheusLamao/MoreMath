<?php
session_start();
$id_componente = 4;
if (isset($_SESSION['componente']) && $_SESSION['componente'] != $id_componente) {
    $_SESSION['componente'] = $id_componente;
}
$_SESSION['componente'] = $id_componente;
//var_dump($_SESSION['componente']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisão</title>
    <link rel="shortcut icon" href="css/img/coruja.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_tela_conteudos.css">

    <!-- Menu Lateral Javascript -->
    <script language="javascript">
        visibilidade = 0

        function esconde_div(){
            if (visibilidade == 0){
                document.getElementById("menu_visbilidade").style.display=""
                visibilidade++
            }
            else{
                document.getElementById("menu_visbilidade").style.display="none"
                visibilidade = 0
            }
        }
    </script>
    <!-- Fim do menu lateral -->

</head> 
<body>
    <main>
        <div class="conteudo">
            <div class="menu_lateral">
                <div class="menu_lateral_andante">
                    <div class="menu" id="menu_visbilidade" style="display: none;">  <br>    
                        <a href="soma.php" id="primeiro"><p id="soma">Adição</p></a> <br>
                        <a href="subtracao.php"><p id="subtracao">Subtração</p></a><br>
                        <a href="multiplicacao.php"><p id="multiplacao">Multiplicação</p></a> <br>
                        <img src="css/img/Coruja.png" width="70%">
                    </div>
                    <div class="bt_lateral">
                        <a href="javascript:void(esconde_div())"><img src="css/img/bt_menu.png" alt=""></a>
                    </div>
                </div>
                
                <div class="bt_voltar_div"> <a href="../index.php" class="bt_voltar_a"><img src="css/img/bt_volta.png" alt="menu"></a></div> 

            </div>

            <div class="conteudos_bloco">
                <div class="titulo_conteudo"><p id="texto_titulo">Divisão</p></div>
                <div class="Corpo_conteudo">
                    <iframe src="css/docs/divisao.html" id="corpo">
                    </iframe>
                </div>
                
                
            </div>

            <div class="Div_bt_exercicios"> <a href="../exercicio/selectNivel.php" id="img_voltar"><img src="css/img/bt_exercicio.png" width="80%" id="img_bt_exercicio"></a><br></div>
        </div>
    </main>
</body>
</html>