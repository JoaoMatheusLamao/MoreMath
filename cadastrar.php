<?php
require_once("config.php");
if (isset($_POST['nomeUsuario']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['dataNascimento']) && isset($_POST['senha']) && isset($_POST['confirmaSenha']) && !empty($_POST['nomeUsuario']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['dataNascimento']) && !empty($_POST['senha']) && !empty($_POST['confirmaSenha'])) {
    $nome = Usuario::limpaPost($_POST['nomeUsuario']);
    $telefone = Usuario::limpaPost($_POST['telefone']);
    $email = Usuario::limpaPost($_POST['email']);
    $dataNasc = Usuario::limpaPost($_POST['dataNascimento']);
    $senha = Usuario::limpaPost($_POST['senha']);
    $confirmaSenha = Usuario::limpaPost($_POST['confirmaSenha']);

    $objUsu = new Usuario($nome, $email, $senha, $confirmaSenha, $telefone, $dataNasc);
    $objUsu->validarCadastro();
    if (empty($objUsu->errosFomr)) {
        $objUsu->cadastrar();
        $errinhos = $objUsu->trataErroCadastro();
        header('location: index.php');
        //$errinhos[codErro][value]
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se no MoreMath</title>

    <link rel="stylesheet" type="text/css" href="css/style_pag_cadastrar.css">
</head>

<body>
    <div class="main">
        <div class="quadro">
            <div class="Tit_1">
                <h1 class="titulo_texto_cadastrar">Cadastre-se</h1>
            </div>
            <div class="dados_usuario">
                <form method="post">
                    <div class="label_input">
                        <label for="nome_usuario">Nome:</label>
                        <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Digite seu nome" required> <br>
                    </div>
                    <div class="label_input">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-9999" onkeydown="return mascaraTelefone(event)" required><br>
                    </div>
                    <div class="label_input">
                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" name="dataNascimento" id="dataNascimento" required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu melhor email!" required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Senha:</label>
                        <input type="password" name="senha" id="senha" required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Confirme sua senha:</label>
                        <input type="password" name="confirmaSenha" id="confirmaSenha" required><br>
                    </div>
                    <button type="submit">Cadastrar</button>
                </form>
                <p id="voltar"><a href="index.php" class="bt_volta_login">Já tenho um cadastro</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/js_cadastrar.js"></script>

</body>

</html>