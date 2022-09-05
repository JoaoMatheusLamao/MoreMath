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
    <link rel="stylesheet" href="css/style_divisao.css">

    <!-- Menu Lateral Javascript -->
    <script language="javascript">
        a = 0
        function esconde_div(){
            if (a == 0){
                document.getElementById("invisivel").style.display=""
                document.getElementById("bt_menu").style.display="none"
                a++
            }
            else{
                document.getElementById("bt_menu").style.display="none"
                document.getElementById("invisivel").style.display=""
                a=0
            }
        }
    </script>
    <!-- Fim do menu lateral -->

</head> 
<body>
    <div class="bt_menu" id="invisivel" style="display: a;">
        <!-- Chama função de mostrar/esconder o menu lateral -->
        <a href="javascript:void(esconde_div())" class="bt_menu_lateral"> → </a>
    </div>
    <main>
        <div class="conteudo">
            
            <div class="menu" id="invisivel" style="display: none;">    
                <div class="bt_voltar_div">
                    <a href="../index.php" class="bt_voltar_a"><p id="texto_bt_voltar">voltar</p></a>
                </div>
            </div>

            <div class="conteudos">

                <div class="titulo_conteudo"> <p id="texto_titulo">  Divisão </p></div>
                <div class="Corpo_conteudo">  <p id="conteudo_texto"> Conteudo Pertinente </p> </div>                
            </div>
        </div>
    </main>





    <!-- <a href="../exercicio/selectNivel.php">Faça exercícios</a> -->
</body>
</html>