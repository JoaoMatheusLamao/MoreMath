<?php
require_once("config.php");

class Logar
{
    public $email;
    private $senha;
    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function Login()
    {
        //veriofica seja existe usuario
        
        $objSql = new Sql();
        $usuarios = $objSql->exComand("select*from login_usuario where email = :email and senha = :senha", array(':email' => $this->email, ':senha' => $this->senha));
        if ($usuarios) {
            session_start();
            var_dump($_SESSION['id']);
            echo "login ok";

        } else {
            echo "usuario não encontrado";

        }
    }



}

?>