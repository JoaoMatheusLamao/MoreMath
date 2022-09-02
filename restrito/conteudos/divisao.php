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
</head> 
<body>
    <a href="../exercicio/selectNivel.php">Faça exercícios</a>
</body>
</html>