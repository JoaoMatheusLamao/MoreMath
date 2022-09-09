<?php
session_start();
header('Content-Type: application/json');

require_once("configRestrit.php");

$puxaEx = new Exercicio();
$puxaEx->puxaEx($_SESSION['nível'], $_SESSION['componente']);

$enunciado = utf8_encode($puxaEx->getEnunciado());

echo json_encode($enunciado);

?>