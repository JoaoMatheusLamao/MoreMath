<?php
require_once("config.php");
if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = Usuario::limpaPost($_POST['email']);
    $senha = Usuario::limpaPost($_POST['senha']);
    $senha_cripto = Usuario::criptoHash($senha);
    $erros_login = array();

    $loga = new Logar($email, $senha_cripto);
    $loga->Login();

    foreach ($loga->erros as $errinhos) {
        foreach ($errinhos as $cod => $value) {
        }
    }

    //if para os erros
    
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoreMath</title>
    <link rel="stylesheet" type="text/css" href="css/style_log_2.css">
</head>

<body>
    <div class="main">
        <div class="quadro">
            <div class="titulo">
                <h6 id="titulo_texto">Faça Login ♥</h6>

            </div>
            <div class="entrada_login">
                <form method="post">
                    <div id="grupo_1">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" id="email" <?php if(isset($_POST['email'])){echo 'value="'.$_POST['email'].'"';}?> placeholder="Digite seu melhor email!"><br>
                    </div>
                    <div id="grupo_2">
                        <label for="email">Senha:</label><br>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha"><br>
                    </div>
                    <div id="grupo_3">
                        <button type="submit" id="bt_login">Login</button>
                    </div>
                </form> 
            </div>
            <div class="cadastrar_se">
                <p class="msg_erro_off <?php if (isset($errinhos) && !empty($errinhos)) {echo "msg_erro_on";}?>"><?php if (isset($errinhos) && !empty($errinhos)) {echo $value;}?></p>
                <p>Ainda não tem um cadastro? <br><a href="cadastrar.php" id="cadastrar">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</body>

</html>