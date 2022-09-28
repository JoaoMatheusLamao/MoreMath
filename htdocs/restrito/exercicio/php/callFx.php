<?php

session_start();
$id_nivel = 1;
$_SESSION['nível'] = $id_nivel;
$_SESSION['pontos'] = 5;

header('location: ../exercicioFx.php')

?>