<?php
//terminar a autenticação por token
require_once("configRestrit.php");

class UsuarioOk
{
    public $erros = array();

    public static function autenticar($token){
        try {
            //code...
            $objSql = new Sql();
            $usuario = $objSql->exComand("select*from login_usuario where token = :token", array(':token' => $token));
            if (isset($usuario) && !empty($usuario)) {
                return true;
            } else {
                throw new Exception("Ocorreu algum erro! Por favor, tente novamente!", 100);
                return false;
            }
        } catch (Exception $erro) {
            array_push($this->erros, array($erro->getCode() => $erro->getMessage()));
        }
    }
}

?>