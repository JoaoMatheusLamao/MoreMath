

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="css/img/Coruja.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style_ex.css">

    <title>Escolha um nível</title>
</head>

<body>
    <main>
        <div class="quadro" id="Quadro_1">
            <div class="select_nivel" id="esquerda">
                <p>Nível :</p>
                <form action="php/callFx.php">
                    <input type="submit" value="Fixação">
                </form>  
            </div>
        </div>
        <div class="quadro" id="Quadro_2">
            <div class="select_nivel" id="direita">
                <p>Nível :</p>
                <form action="php/callAp.php">
                    <input type="submit" value="Aprofundamento">
                </form>  
            </div>
        </div>
    </main>
</body>
</html>