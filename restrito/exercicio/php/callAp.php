<?php

session_start();
$id_nivel = 2;
$_SESSION['nível'] = $id_nivel;

header('location: ../exercicioAp.php')

?>