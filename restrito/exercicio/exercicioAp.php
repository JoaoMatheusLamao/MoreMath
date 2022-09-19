<?php

require_once("configRestrit.php");
session_start();
$id_nivel = 2;
$_SESSION['nível'] = $id_nivel;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/img/Coruja.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style_exercicioAp.css">

    <title>Exercícios</title>
</head>
<body>
    <main>
        <div class="trilho_titulo">
            <div class="titulo">
                <h1 id="titulo">Resolva</h1>
            </div>
        </div>
        <div class="centro">
            <div class="quadro_conta">
                <div class="conta">
                    <p id="paragrafo_enunciado"></p>
                </div>
                <div class="form_resp">
                    <form id="formResposta" method="post">
                        <label for="inpResposta">R:</label>
                        <input type="text" autocomplete="off" name="inpResposta" id="inpResposta" class="input" placeholder="Insira sua resposta:">
                        <input type="submit" value="Responder" id="btnEnvia" class="input">
                    </form>
                </div>
                <span><p class="status"></p></span>
            </div>
            <form method="post">
                <input type="submit" name="pulaEx" id="pulaEx" value="Próximo exercício">
            </form>
        </div>
    </main>
    <script src="../assets/js/jqueryImport.js"></script>
    <script src="js/scriptExAp.js"></script>
</body>
</html>