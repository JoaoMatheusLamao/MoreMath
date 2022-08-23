<?php
require_once("../configRestrit.php");
session_start();

if (isset($_POST['fixacao'])) {
    var_dump($_SESSION['nome_usuario']);
}
if (isset($_POST['aprofundamento'])) {
    var_dump($_SESSION['data_nasc_usu']);
}
?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha o nível do exercicio</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="fixacao" value="Fixação"></input>
        <input type="submit" name="aprofundamento" value="Aprofundamento"></input>
    </form>
</body>
</html>