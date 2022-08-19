<?php
require_once("config.php");

class Logar
{
    private $idUsu;
    public $email;
    public $nome;
    private $senha;
    private $token;
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
                foreach ($usuarios as $key) {
                    $this->idUsu = $key['id_usuario'];
                }
                $this->setDados();
                header('location: restrito/index.php');
    
            } else {
                throw new Exception("Usuário ou senha incorretos", 10);
            }
        } catch (Exception $th) {
            array_push($this->erros, array($th->getCode() => $th->getMessage()));
        }
    }

    //função para setar os dados na sessao
    public function setDados(){
        $objSql = new Sql();
        $usuario = $objSql->exComand("select*from perfil_usuario where id_usuario = :idUsu", array(':idUsu' => $this->idUsu));
        session_start();
        //setando dados nos flags da sessao
        $_SESSION['id_usuario'] = $this->idUsu;
        foreach ($usuario as $key) {
            foreach ($key as $cod => $value) {
                $_SESSION[$cod] = $value;
            }
        }
        //adcionando token ao banco
        $this->token = Usuario::criptoHash(uniqid().date('d-m-Y-H-i-s'));
        $objSql->exComand("update login_usuario set token = :token where email = :email and senha = :senha", array(
            ':token' => $this->token,
            ':email' => $this->email,
            ':senha' => $this->senha));
    }
}
//tirar metodo contrutor
?>