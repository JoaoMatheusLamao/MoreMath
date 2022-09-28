<?php
    require_once('configRestrit.php');
    class Estatistica
    {
        public static function puxaEstat($id_usu, $status)
    {
        $Estat = new Sql();
        $Estat_usu = $Estat->exComand("select*from resposta_usuario where id_usuario = :usu and status_resposta = :status", array(
            ':usu' => $id_usu, 
            ':status' => $status
        ));

        return count($Estat_usu);
        
    }
    }
?>