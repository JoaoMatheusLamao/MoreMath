<?php

session_start();
$id_nivel = 2;
$_SESSION['nível'] = $id_nivel;
$_SESSION['pontos'] = 15;

header('location: ../exercicioAp.php')

?>