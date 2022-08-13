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
    <script>
        function mascaraTelefone(event) {
            let tecla = event.key;
            let telefone = event.target.value.replace(/\D+/g, "");

            if (/^[0-9]$/i.test(tecla)) {
                telefone = telefone + tecla;
                let tamanho = telefone.length;

                if (tamanho >= 12) {
                    return false;
                }

                if (tamanho > 10) {
                    telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (tamanho > 5) {
                    telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
                } else if (tamanho > 2) {
                    telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                } else {
                    telefone = telefone.replace(/^(\d*)/, "($1");
                }

                event.target.value = telefone;
            }

            if (!["Backspace", "Delete"].includes(tecla)) {
                return false;
            }
        }
    </script>

    <link rel="stylesheet" type="text/css" href="css/style_pag_cadastrar.css">
</head>

<body >
    <div class="main">
        <div class="quadro">
            <div class="Tit_1">
                <h1 class="titulo_texto_cadastrar">Realizar cadastro</h1>
            </div>
            <div class="dados_usuario">
                <form method="post">
                    <label for="nome_usuario">Nome: </label>
                    <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Digite seu nome" required> <br>
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-9999" onkeydown="return mascaraTelefone(event)" required><br>
                    <label for="data_nascimento">Data de nascimento:</label>
                    <input type="date" name="dataNascimento" id="dataNascimento" required><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu melhor email!" required><br>
                    <label for="email">Senha:</label>
                    <input type="password" name="senha" id="senha" required><br>
                    <label for="email">Confirme sua senha:</label>
                    <input type="password" name="confirmaSenha" id="confirmaSenha" required><br>
                    <button type="submit">Cadastrar</button>
                </form>
                <p><a href="index.php">Já tenho um cadastro</a></p>
            </div>
        </div>


    </div>

</body>

</html>