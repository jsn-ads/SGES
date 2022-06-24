<?php

namespace src\helpers;

use src\models\User;
use src\models\Pessoa;

class UserHelpers
{
    // verifica se a sessao posseui algum token , caso tenha verifica se esse token pertece algum usuario registrado 
    public static function checkLogin()
    {   
        if(!empty($_SESSION['token']))
        {
            $token = $_SESSION['token'];
        
            $sql = User::select()->where('token',$token)->one();

            if(!empty($sql))
            {
                $user         = new User;
                $user->id     = $sql['id'];
                $user->email  = $sql['email'];
                $user->nome   = $sql['nome'];
                $user->token  = $sql['token'];
                $user->navBar = $sql['navBar'];
                $user->card   = $sql['card'];

                return $user;
            }
        }

        return false;
    }

    // verifica se possui registro no sistema para acessar
    public static function verifyLogin($email , $password)
    {
        $user = USER::select()
                            ->where('email',$email)
                        ->one();
        if($user)
        {
            if(password_verify($password, $user['password']))
            {
                $token = md5(time().rand(0,9999).time());

                User::update()
                            ->set('token',$token)
                            ->where('email',$email)
                        ->execute();
                
                return $token;
            }
        }

        return false;
    }

    // verifica se ja existe email cadastrado
    public static function emailExists($email){

        $sql = User::select()
                            ->where('email',$email)
                        ->one();
        return $sql ? true : false;

    }

    // cadastro de usuario
    public static function addUser($nome , $email , $password)
    {
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).md5(time()));

        User::insert([
                'nome'     => $nome,
                'email'    => $email,
                'password' => $hash,
                'token'    => $token
            ])->execute();

        return $token;
    }

    // cadastro de pessoa
    public static function addPessoa($id_user, $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado)
    {

        Pessoa::insert([
                    'nome'      => $nome,
                    'data_nasc' => $data_nasc,
                    'telefone'  => $telefone,
                    'cep'       => $cep,
                    'rua'       => $rua,
                    'qd'        => $qd,
                    'lt'        => $lt,
                    'num'       => $num,
                    'bairro'    => $bairro,
                    'cidade'    => $cidade,
                    'estado'    => $estado,
                    'id_user'   => $id_user
        ])->execute();

    }

    // editar pessoa
    public static function editPessoa($id , $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado)
    {
        Pessoa::update()
                    ->set('nome',$nome)
                    ->set('telefone',$telefone)
                    ->set('data_nasc',$data_nasc)
                    ->set('cep',$cep)
                    ->set('rua',$rua)
                    ->set('qd',$qd)
                    ->set('lt',$lt)
                    ->set('num',$num)
                    ->set('bairro',$bairro)
                    ->set('cidade',$cidade)
                    ->set('estado',$estado)
                    ->where('id',$id)
                ->execute();

    }

    // carrega dados do usuario
    public static function selectCadastro($id)
    {
        $sql = Pessoa::select()
                            ->where('id_user',$id)
                        ->one();

        if(!empty($sql))
        {
            $cadastro               = new Pessoa();
            $cadastro->id           = $sql['id'];
            $cadastro->nome         = $sql['nome'];
            $cadastro->data_nasc    = $sql['data_nasc'];
            $cadastro->telefone     = $sql['telefone'];
            $cadastro->cep          = $sql['cep'];
            $cadastro->rua          = $sql['rua'];
            $cadastro->qd           = $sql['qd'];
            $cadastro->lt           = $sql['lt'];
            $cadastro->num          = $sql['num'];
            $cadastro->bairro       = $sql['bairro'];
            $cadastro->cidade       = $sql['cidade'];
            $cadastro->estado       = $sql['estado'];
            $cadastro->id_user      = $sql['id_user'];

            return $cadastro;
        }

        return false;
    }

    //atualiza nome e senha 

    public static function updateUser($id , $nome, $password)
    {

        $hash = password_hash($password , PASSWORD_DEFAULT);

        User::update()
                    ->set('nome'    , $nome)
                    ->set('password', $hash)
                    ->where('id'    , $id)
                ->execute();
    }

    //RGB

    public static function RGBMenu($id,$rgb)
    {
        User::update()
                    ->set('navBar' , $rgb)
                    ->where('id'   , $id)
                ->execute();
    }

    public static function RGBCard($id,$rgb)
    {
        User::update()
                    ->set('card' , $rgb)
                    ->where('id' , $id)
                ->execute();
    }
}

?>