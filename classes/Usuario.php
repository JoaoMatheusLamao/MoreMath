<?php

class Usuario
{
    private $id_usu;
    public $nome;
    public $email;
    public $telefone;
    public $dataNasc;
    private $senha;
    private $confirmaSenha;
    private $senhaCripto;
    // contem todos os erros referentes ao envio do formulario
    public $errosForm = array();
    // contem todos os erros referentes a inserção no banco
    public $errosInsert = array();

    public $logErros = array();
    public $logEr = array();


    public function __construct($nome, $email, $senha, $confirmaSenha, $telefone, $dataNasc)
    {
        //aqui setamos as variaveis com seus respectivos valores
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
        $this->confirmaSenha = $confirmaSenha;
        $this->dataNasc = $dataNasc;
        //criptografar senha
        $this->senhaCripto = $this->criptoHash($this->senha);
    }

    public function validarCadastro()
    {
        try {
            //valida nome
            if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/", $this->nome)) {
                throw new Exception("Por favor, informe um nome válido!", 1);
            }
            //valida email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Por favor, informe um email válido!", 2);
            }
            //valida senha
            if (strlen($this->senha) < 6) {
                throw new Exception("Senha deve ter 6 caracteres ou mais!", 3);
            }
            //valida repete senha
            if ($this->senha !== $this->confirmaSenha) {
                throw new Exception("Senha e confirmação de senha não coincidem!", 4);
            }
        } catch (Exception $erro) {
            //colocando os erros dentro do array errosForm
            array_push($this->errosForm, array($erro->getCode() => $erro->getMessage()));
        }
    }

    public function cadastrar()
    {
        try {
            //verificando se ja existe algum email no banco
            $objSql = new Sql();
            $usuarios = $objSql->exComand("select*from login_usuario where email = :email", array(':email' => $this->email));
            //se não existir nenhum email:
            if (!$usuarios) {
                //Cadastrar nome e data de nascimento do usuario
                $usuario = $objSql->exComand("call sp_usuarios_insert(:nome, :data_nasc)", array(
                    ':nome' => $this->nome,
                    ':data_nasc' => $this->dataNasc
                ));
                //pegando id do usuario que vem do comando acima
                $usu = $usuario[0];
                $this->id_usu = $usu['id_usuario'];
                //cadastrando email e senha
                $objSql->exComand("insert into login_usuario (email,senha,id_usuario) values (:email, :senha, :id_usu)", array(
                    ':email' => $this->email,
                    ':senha' => $this->senhaCripto,
                    ':id_usu' => $this->id_usu
                ));
                //inserindo o telefone
                $telFiltrado = $this->filtroTel($this->telefone);
                foreach ($telFiltrado as $key => $value) {
                    $objSql->exComand("insert into telefone_usuario (ddd,numero,id_usuario) values (:ddd, :numero, :id_usu)", array(
                        ':ddd' => $key,
                        ':numero' => $value,
                        ':id_usu' => $this->id_usu
                    ));
                }
            } else {
                throw new Exception("Email já está sendo utilizado!", 5);
            }
        } catch (Exception $erro) {
            array_push($this->errosInsert, array($erro->getCode() => $erro->getMessage()));
        }
    }

    //tratando os erros
    public function trataErroCadastro(){
        //tratando os erros
        if(!empty($this->errosForm)){
            foreach ($this->errosForm as $key) {
                foreach ($key as $codErro => $value) {
                    # code...
                    array_push($this->logErros, array($codErro =>$value));
                }
            }
        }
        if(!empty($this->errosInsert)){
            foreach ($this->errosInsert as $key) {
                foreach ($key as $codErro => $value) {
                    # code...
                    array_push($this->logErros, array($codErro =>$value));
                }
            }
        }

        //cancatenando todos os erros
        unset($this->logEr);
        if (!empty($this->logErros)) {
            foreach ($this->logErros as $erros) {
                foreach ($erros as $codErro => $value) {
                    $this->logEr['codErro']=$codErro;
                    $this->logEr['value']=$value;
                }
            }
        }
        return $this->logEr;
    }

    //filtrar o dado de telefone inserido
    public static function filtroTel($telefone)
    {
        $ddd = substr($telefone, 0, 4);
        $ddd = str_replace('(', '', $ddd);
        $ddd = str_replace(')', '', $ddd);
        $numero = substr($telefone, 5, strlen($telefone));
        $numero = str_replace('-', '', $numero);
        return $telefoneFiltrado = array($ddd => $numero);
    }

    //função para criptografar senha
    public static function criptoHash($senha)
    {
        define('SECRET_IV', pack('a16', 'senha'));
        define('SECRET', pack('a16', 'senha'));

        return $senhaCripo = openssl_encrypt($senha, 'AES-128-CBC', SECRET, 0, SECRET_IV);
    }

    //função para limpar os dados inseridos, afim de evitar um possivel ataque
    public static function limpaPost($dados)
    {
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);
        return $dados;
    }
}
