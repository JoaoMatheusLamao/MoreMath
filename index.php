<?php
require_once("config.php");

if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = Usuario::limpaPost($_POST['email']);
    $senha = Usuario::limpaPost($_POST['senha']);
    $senha_cripto = Usuario::criptoHash($senha);


    $loga = new Logar($email, $senha_cripto);
    $loga->Login();

    if (isset($loga->erros) && !empty($loga->erros)) {
        print_r($loga->erros);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoreMath</title>
</head>

<body>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu melhor email!"><br>
        <label for="email">Senha:</label>
        <input type="password" name="senha" id="senha"><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p>Ainda não tem um cadastro?<a href="cadastrar.php">Cadastre-se</a></p>
</body>

</html>