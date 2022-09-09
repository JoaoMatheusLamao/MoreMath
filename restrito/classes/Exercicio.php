<?php

class Exercicio{

    public $componente;
    public $nivel;
    public $idExercicio;
    public $enunciado;
    public $respCorreta;

    public function puxaEx($nivel, $componente){
        $this->componente = $componente;
        $this->nivel = $nivel;

        $tipo = $this->selectTipo();

        

        $exercicio = new Sql();
        $ex = $exercicio->exComand("select*from exercicio where id_tipo_exercicio = :idTipo order by rand() limit 1", array(
            ':idTipo' => $tipo));
        foreach ($ex as $key) {
        }
        
        if ($this->noRepeatEx($key['id_exercicio']) == false) {
            $this->setIdEx($key['id_exercicio']);
            $this->setEnunciado($key['enunciado']);
            $this->setRespCorreta($key['resposta_correta']);
        } else {
            $this->setEnunciado("Parabéns, você fez todos os exercícios");
        }
    }

    public function noRepeatEx($idEx)
    {
        $objSql = new Sql();
        $exJaFeito = $objSql->exComand("select*from resposta_usuario where id_usuario = :idUsu and id_exercicio = :idEx and status_resposta = 1", array(
            ':idUsu' => $_SESSION['id_usuario'],
            ':idEx' => $idEx
        ));
        if (empty($exJaFeito)) {
            //se esta vazio é pq o usuario n respondeu esse exercicio ainda
            return true;
        } else {
            //se esta preenchido, o usuario ja respondeu corretamente o exercicio
            return false;
        }
    }

    //função para pegar o tipo de exercicio que o usuario quer
    public function selectTipo()
    {
        $nivel = new Sql();
        $id_tipo = $nivel->exComand("select id_tipo_exercicio from tipo_exercicio where id_componente = :idComp and id_nivel = :idNivel", array(
            ':idComp' => $this->componente,
            ':idNivel' => $this->nivel));
        foreach ($id_tipo as $key) {
            return $key['id_tipo_exercicio'];
        }
    }

    //setando id do exercicio
    public function setIdEx($id)
    {
        $this->idExercicio = $id;
        $_SESSION['idExercicio'] = $id;
    }
    //pegar id do exercicio
    public function getIdEx()
    {
        return $this->idExercicio;
    }

    //setando enunciado
    public function setEnunciado($enunciado)
    {
        $this->enunciado = $enunciado;
        $_SESSION['enunciadoEx'] = $enunciado;
    }
    //pegando enunciado
    public function getEnunciado()
    {
        return $this->enunciado;
    }

    //setando resposta correta
    public function setRespCorreta($respCorreta)
    {
        $this->respCorreta = $respCorreta;
        $_SESSION['respostaCorreta'] = $respCorreta;
    }
    //pegando resposta correta
    public function getRespCorreta()
    {
        return $this->respCorreta;
    }

    //funçao que corrige o exercicio
    public function corrigeEx($respUs)
    {
        if ($respUs == $_SESSION['respostaCorreta']) {
            $statusResp = true;
        } else {
            $statusResp = false;
        }
        $this->armazenaResp($respUs, $statusResp);
        return $statusResp;
    }


    //funçao que armazena a resposta do usuario
    public function armazenaResp($respUs, $statusResp)
    {
        $sql = new Sql();
        $sql->exComand("insert into resposta_usuario (status_resposta, resposta_usuario, id_exercicio, id_usuario) values (:stRsp, :rspUsu, :idEx, :idUsu)", array(
            ':stRsp'=>$statusResp,
            ':rspUsu'=>$respUs,
            ':idEx'=>$_SESSION['idExercicio'],
            ':idUsu'=>$_SESSION['id_usuario']
        ));
    }
}
?>