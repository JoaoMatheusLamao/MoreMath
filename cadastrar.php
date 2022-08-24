<?php
require_once("config.php");

if (isset($_POST['nomeUsuario']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['dataNascimento']) && isset($_POST['senha']) && isset($_POST['confirmaSenha'])) {
    $nome = Usuario::limpaPost($_POST['nomeUsuario']);
    $telefone = Usuario::limpaPost($_POST['telefone']);
    $email = Usuario::limpaPost($_POST['email']);
    $dataNasc = Usuario::limpaPost($_POST['dataNascimento']);
    $senha = Usuario::limpaPost($_POST['senha']);
    $confirmaSenha = Usuario::limpaPost($_POST['confirmaSenha']);

    if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($dataNasc) && !empty($senha) && !empty($confirmaSenha)){
    
    $objUsu = new Usuario($nome, $email, $senha, $confirmaSenha, $telefone, $dataNasc);
    $objUsu->validarCadastro();
    $errinhos = $objUsu->trataErroCadastro();
    if (empty($errinhos)) {
        $objUsu->cadastrar();
        $errinhos = $objUsu->trataErroCadastro();
        if (empty($errinhos)) {
            header('location: index.php');
        }
        //$errinhos[codErro][value]
    }
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

    <link rel="stylesheet" type="text/css" href="css/cad_style.css">
</head>

<body>
    <div class="main">
        <div class="quadro">
            <div class="titulo">
                <h1 id="texto_titulo">Cadastre-se</h1>
            </div>
            <div class="dados_usuario">
                <form method="post" class="entrada">
                    <div class="label_input">
                        <label for="nome_usuario">Nome</label><br>
                        <input type="text" name="nomeUsuario" id="nomeUsuario" <?php if(isset($_POST['nomeUsuario'])){echo 'value="'.$_POST['nomeUsuario'].'"';}?> placeholder="Digite seu nome" required> <br>
                    </div>
                    <div class="label_input">
                        <label for="telefone">Telefone</label><br>
                        <input type="text" name="telefone" id="telefone" <?php if(isset($_POST['telefone'])){echo 'value="'.$_POST['telefone'].'"';}?> placeholder="(99) 99999-9999" onkeydown="return mascaraTelefone(event)" required><br>
                    </div>
                    <div class="label_input">
                        <label for="data_nascimento">Data de nascimento</label><br>
                        <input type="date" name="dataNascimento" id="dataNascimento" <?php if(isset($_POST['dataNascimento'])){echo 'value="'.$_POST['dataNascimento'].'"';}?> required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" <?php if(isset($_POST['email'])){echo 'value="'.$_POST['email'].'"';}?> placeholder="Digite seu melhor email!" required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Senha</label><br>
                        <input type="password" name="senha" id="senha" required><br>
                    </div>
                    <div class="label_input">
                        <label for="email">Confirme sua senha</label><br>
                        <input type="password" name="confirmaSenha" id="confirmaSenha" required><br>
                    </div>
                    <div class="label_input">
                        <label id="erro" class="label_erro_off <?php if (!empty($errinhos)){echo 'erro_on';}?>"><?php if (!empty($errinhos)){echo $errinhos['value'];}?></label>
                    </div>

                    <button type="submit" id="bt_cadastra">Cadastrar</button>
                </form>                    
            </div>
            <div class="logo">            
                <div class="Bt_retorna">
                    <a href="index.php" id="A_Bt_Retorna"><p id="texto_retorna">Já tem um cadastro</p></a>
                </div>
            </div>            
        </div>
    </div>
    <script type="text/javascript" src="js/js_cadastrar.js"></script>

</body>

</html>