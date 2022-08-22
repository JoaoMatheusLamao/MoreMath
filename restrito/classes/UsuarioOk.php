<?php
require_once("configRestrit.php");

class UsuarioOk
{
    public $erros = array();

    //funcao para autenticar o usuario na area restrita

    public function autenticar($token){
        try {
            //code...
            $objSql = new Sql();
            $usuario = $objSql->exComand("select*from login_usuario where token = :token", array(':token' => $token));
            //se encontrar algum usuario com o token que esta na sessão...
            if (isset($usuario) && !empty($usuario)) {
                //tudo ok, usuario pode continuar na plataforma
                return true;
            } else {
                //usuario não autenticado via token
                throw new Exception("Ocorreu algum erro! Por favor, tente novamente!", 100);
                return false;
            }
        } catch (Exception $erro) {
            array_push($this->erros, array($erro->getCode() => $erro->getMessage()));
        }
    }
}

?>