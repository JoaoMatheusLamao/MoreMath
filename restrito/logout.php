<?php
    session_start();
    require_once("configRestrit.php");

    session_destroy();
    header("Location:../index.php");

?>