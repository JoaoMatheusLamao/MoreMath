<?php

require_once("configRestrit.php");
session_start();

//var_dump($_SESSION['componente']);
$puxaEx = new Exercicio("1", $_SESSION['componente']);
$teste = $puxaEx->puxaEx();
var_dump($teste);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/img/Coruja.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style_exercicios2.css">

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
                    <p>22 + 25 = <img src="css/img/interrogacao.png" id="imgInterrog"></p>
                </div>
                <div class="form_resp">
                    <form method="post">
                        <label for="inpResposta">R:</label>
                        <input type="text" name="inpResposta" id="inpResposta" class="input" placeholder="Insira sua resposta:">
                        <input type="submit" value="Responder" id="btnEnvia" class="input">
                    </form>
                </div>
            </div>
            <form method="post">
                <input type="submit" name="pulaEx" id="pulaEx" value="Pular exercício">
            </form>
        </div>
    </main>
</body>
</html>