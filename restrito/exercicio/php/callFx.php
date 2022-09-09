<?php

session_start();
$id_nivel = 1;
$_SESSION['nível'] = $id_nivel;

header('location: ../exercicioFx.php')

?>