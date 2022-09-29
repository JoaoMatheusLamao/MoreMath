<?php

require_once("configRestrit.php");

class Conteudo
{
    public static function puxaCont($id_comp)
    {
        $sql = new Sql();
        $link = $sql->exComand("select link_explicacao from conteudo_componente where id_componente = :idComp", array(
            ':idComp' => $id_comp
        ));
        foreach ($link as $key) {
            foreach ($key as $chave => $value) {
                # code...
            }
        }
        return $value;
    }
}


?>