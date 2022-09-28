<?php


class Exercicio{

    public $componente;
    public $nivel;

    public $totalEx;
    public $idExercicio;
    public $enunciado;
    public $respCorreta;

    public function puxaEx($nivel, $componente){
        $this->componente = $componente;
        $this->nivel = $nivel;

        //selecionano tipo de exercicio que o usuario quer
        $tipo = $this->selectTipo();
        
        $this->setTotalEx($tipo);

        //pega um exercicio do banco
        $exercicio = new Sql();
        $ex = $exercicio->exComand("select*from exercicio where id_tipo_exercicio = :idTipo order by rand() limit 1", array(
            ':idTipo' => $tipo));
        
        foreach ($ex as $key) {
        }

        //usuario ja fez o exercicio corretamente?
        $jaFez = $this->exJaFeito($_SESSION['id_usuario'], $key['id_exercicio']);

        //se não, é mostrado ao usuario o exercicio para que ele responda
        if ($jaFez == false) {
            $this->setIdEx($key['id_exercicio']);
            $this->setEnunciado($key['enunciado']);
            $this->setRespCorreta($key['resposta_correta']);
        } else {
            //se sim, é verificado se ele ja respondeu todos os exercicios desse tipo
            $numExOk = $this->usuAllEx($_SESSION['id_usuario'], $tipo);
            if ($this->getTotalEx() !== $numExOk) {
                //se o usuario ainda não respondeu todos os ex, a pagina é recarregada e outro exercicios é puxado
                $this->setEnunciado("");
            } elseif ($this->getTotalEx() === $numExOk) {
                //se ja respondeu todos os ex, no javascript é colocado uma msg avisando q os exercicios acabaram
                $this->setEnunciado("Parece que você fez todos os exercícios! Parabéns!!!");
            }
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
            $_SESSION['id_tipo_exercicio'] = $key['id_tipo_exercicio'];
            return $key['id_tipo_exercicio'];
        }
    }

    //funcao q verifica quantos exercicios existem daquele tipo
    public function setTotalEx($tpEx)
    {
        $obj = new Sql();
        $total = $obj->exComand("select id_exercicio from exercicio where id_tipo_exercicio = :idTipo", array(
            ':idTipo' => $tpEx
        ));
        $totalNum = count($total);
        $this->totalEx =  $totalNum;
    }
    //funcao get para pegar o numero total de exercicios daquele tipo
    public function getTotalEx()
    {
        return $this->totalEx;
    }

    public function exJaFeito($idUsu, $idEx)
    {
        //busca no banco se o usuario ja respondeu corretamente aquele ex
        $obj = new Sql();
        $jaResp = $obj->exComand("select id_resposta_usuario from resposta_usuario where id_usuario = :idUsu and id_exercicio = :idEx and status_resposta = 1", array(
            ':idUsu'=>$idUsu,
            ':idEx'=>$idEx
        ));
        if (empty($jaResp)) {
            //se estiver vazio, o usuario ainda não respondeu corretamente
            return false;   
        } else {
            //se não estiver vazio é pq o usuario ja respondeu corretamente o exercicio
            return true;
        }
    }

    //função q retorna o tatal de exercicios de UM determinado tipo feitos corretamente pelo usuario
    public function usuAllEx($idUsu, $idTpEx)
    {
        $obj = new Sql;
        $allExUsu = $obj->exComand("select id_resposta_usuario from resposta_usuario where id_usuario = :idUsu and id_tipo_exercicio = :idTpEx and status_resposta = 1", array(
            ':idUsu'=>$idUsu,
            ':idTpEx'=>$idTpEx
        ));
        $numAllExUsu = count($allExUsu);
        return $numAllExUsu;
    }

    //funçao que corrige o exercicio
    public function corrigeEx($respUs, $pontos)
    {
        if ($respUs == $_SESSION['respostaCorreta']) {
            $statusResp = true;
            $this->updatePont($_SESSION['id_usuario'], $pontos);
        } else {
            $statusResp = false;
        }
        $this->armazenaResp($respUs, $statusResp);
        return $statusResp;
    }


    //funcao q atualiza os pontos no banco
    public function updatePont($idUsu, $pontos)
    {
        $obj = new Sql();
        $pontEx = $obj->exComand("select total_pontos from pontuacao where id_usuario = :idUsu", array(
            ':idUsu' => $idUsu
        ));
        foreach ($pontEx as $key) {
            # code...
        }
        $novaPont = $key['total_pontos'] + $pontos;
        $obj->exComand("update pontuacao set total_pontos = :totalPt where id_usuario = :idUsu", array(
            'totalPt' => $novaPont,
            ':idUsu'=> $idUsu
        ));
    }


    //funçao que armazena a resposta do usuario
    public function armazenaResp($respUs, $statusResp)
    {
        $sql = new Sql();
        $sql->exComand("insert into resposta_usuario (status_resposta, resposta_usuario, id_exercicio, id_usuario, id_tipo_exercicio) values (:stRsp, :rspUsu, :idEx, :idUsu, :idTipo)", array(
            ':stRsp'=>$statusResp,
            ':rspUsu'=>$respUs,
            ':idEx'=>$_SESSION['idExercicio'],
            ':idUsu'=>$_SESSION['id_usuario'],
            ':idTipo'=>$_SESSION['id_tipo_exercicio']
        ));
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
}
?>