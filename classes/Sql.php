<?php

//classe para realizar ações no banco
class Sql extends PDO {

    private $conn;
    //função para conectar no banco
    //utilizando o método construtor que é chamado toda vez que essa classe for instanciada
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=moremathdb", "root", "");
    }


    //função que recebe o comando (no caso o select) e também os parâmetros de identificação do usuário
    //retorna $stmt, que é a zona de espera para a execução, que contem um array com os resultados da busca
    public function exComand($rawQuery, $params = array()):array
    {
        $stmt = $this->exQuery($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //funçao para setar executar o comando
    public function exQuery($rawQuery, $params = array())
    {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    //função para substituir os identificadores do comando sql (:id) pelos seus respectivos valores
    private function setParams($statement, $parameters = array())
    {
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }
    private function setParam($statment, $key, $value)
    {
        $statment->bindParam($key, $value);
    }
}
?>