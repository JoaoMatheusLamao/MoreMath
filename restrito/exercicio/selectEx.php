<?php

//algoritmo que devolve para o javascript a correção do exercicio
session_start();
header('Content-Type: application/json');
require_once("configRestrit.php");

$respUsu = $_POST['resposta'];

$corrige = new Exercicio();
$statusResp = $corrige->corrigeEx($respUsu);
echo json_encode($statusResp);
?>