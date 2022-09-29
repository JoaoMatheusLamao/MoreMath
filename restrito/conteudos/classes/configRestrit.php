<?php
//quando uma classe é instanciada, o autoload busca e faz o require pela classe.
spl_autoload_register(function($clas_name){
    $filename  = $clas_name.".php";
    if (file_exists($filename)) {
        require_once($filename);
    }
});

?>