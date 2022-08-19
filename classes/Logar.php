<?php
require_once("config.php");

class Logar
{
    public $email;
    private $senha;
    public $erros = array();

    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function Login()
    {
        //veriofica seja existe usuario
        try {
            $objSql = new Sql();
            $usuarios = $objSql->exComand("select*from login_usuario where email = :email and senha = :senha", array(
                ':email' => $this->email,
                ':senha' => $this->senha));
            //se existir... logar
            if ($usuarios) {
                session_start();
                echo "Login efetuado";
    
            } else {
                throw new Exception("Usuário ou senha incorretos", 10);
            }
        } catch (Exception $th) {
            array_push($this->erros, array($th->getCode() => $th->getMessage()));
        }
    }



}

?>