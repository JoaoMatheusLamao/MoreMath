<?php
session_start();
header('Content-Type: application/json');

require_once("configRestrit.php");

$puxaEx = new Exercicio();
$puxaEx->puxaEx($_SESSION['nível'], $_SESSION['componente']);

$enunciado = $puxaEx->getEnunciado();

echo json_encode($enunciado);

?>