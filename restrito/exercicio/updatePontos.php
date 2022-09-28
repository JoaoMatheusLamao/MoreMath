<?php
    session_start();
    header('Content-Type: application/json');
    require_once("configRestrit.php");
    $pont = new Pontuacao();
    $pont_total = $pont->puxaPont($_SESSION['id_usuario']);
    echo json_encode($pont_total);
?>