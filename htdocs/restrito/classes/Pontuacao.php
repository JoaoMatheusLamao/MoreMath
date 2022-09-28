<?php
require_once('configRestrit.php');
class Pontuacao
{
    public function puxaPont($id_usu)
    {
        $pont = new Sql();
        $pont_usu = $pont->exComand("select total_pontos from pontuacao where id_usuario = :usu", array(
            ':usu' => $id_usu
        ));
        foreach ($pont_usu as $key) {
            # code...
            foreach ($key as $chave => $value) {
                # code...
            }
        }
        return $value;
        
    }
}

?>