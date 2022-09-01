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
                //pega o id_usuario do login_usuario para buscas nas outras tabelas
                foreach ($usuarios as $key) {
                    $this->idUsu = $key['id_usuario'];
                    $this->email = $key['email'];
                }
                //função para setar os dados na sessao
                $this->setDados();
                //entra no restrito
                header('location: restrito/index.php');
            } else {
                //erro caso senha e usuario não correspondam
                throw new Exception("Usuário ou senha incorretos", 10);
            }
        } catch (Exception $th) {
            array_push($this->erros, array($th->getCode() => $th->getMessage()));
        }
    }

    //função para setar os dados na sessao
    public function setDados(){
        //start sessão
        session_start();

        //gerando token
        $this->token = Usuario::criptoHash(uniqid().date('d-m-Y-H-i-s'));

        //adcionando token ao banco
        $objSql = new Sql();
        $objSql->exComand("update login_usuario set token = :token where email = :email and senha = :senha", array(
            ':token' => $this->token,
            ':email' => $this->email,
            ':senha' => $this->senha));

        //pegar dados do respectivo usuario em perfil_usuario
        $usuario = $objSql->exComand("select*from perfil_usuario where id_usuario = :idUsu", array(':idUsu' => $this->idUsu));
        //setando dados nos flags da sessao
        //set nome, data_nasc_usu
        foreach ($usuario as $key) {
            $_SESSION['nome'] = $key['nome_usuario'];
            $_SESSION['data_nasc_usu'] = str_replace('-', '/', date('d-m-Y', strtotime($key['data_nasc_usu'])));
        }
        //set token
        $_SESSION['token'] = $this->token;
        //set email
        $_SESSION['email'] = $this->email;
        //set id_usuario
        $_SESSION['id_usuario'] = $this->idUsu;

        //pegar telefone do usuario
        $telUsuario = $objSql->exComand("select*from telefone_usuario where id_usuario = :idUsu", array(':idUsu' => $this->idUsu));
        foreach ($telUsuario as $dadosTel) {
            $ddd = $dadosTel['ddd'];
            $numero = $dadosTel['numero'];
            $numeroCompleto = '(' . $dadosTel['ddd'] . ') ' . $dadosTel['numero'];
        }
        //set telefone
        $_SESSION['telefone'] = $numeroCompleto;
    }
}
?>