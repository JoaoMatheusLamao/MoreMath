<?php

//require_once("configRestrit.php");

class Exercicio{

    public $componente;
    public $nivel;

    public function __construct($nivel, $componente) {
        $this->componente = $componente;
        $this->nivel = $nivel;
    }

    public function puxaEx()
    {
        $tipo = $this->selectTipo();
        $exercicio = new Sql();
        return $exercicio->exComand("select*from exercicio where id_tipo_exercicio = :idTipo limit 1", array(
            ':idTipo' => $tipo));
    }

    public function selectTipo()
    {
        $nivel = new Sql();
        $id_tipo = $nivel->exComand("select id_tipo_exercicio from tipo_exercicio where id_componente = :idComp and id_nivel = :idNivel", array(
            ':idComp' =>" $this->componente",
            ':idNivel' => $this->nivel));
        foreach ($id_tipo as $key) {
            return $key['id_tipo_exercicio'];
        }
    }
}

?>