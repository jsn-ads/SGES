<?php

namespace src\helpers;

use src\models\User;

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

        echo 't1';

        User::insert([
                'id_user'   => $id_user,
                'nome'      => $nome,
                'telefone'  => $telefone,
                'data_nasc' => $data_nasc,
                'cep'       => $cep,
                'rua'       => $rua,
                'qd'        => $qd,
                'lt'        => $lt,
                'num'       => $num,
                'bairro'    => $bairro,
                'cidade'    => $cidade,
                'estado'    => $estado
        ])->execute();

    }

    // editar pessoa
    public static function editPessoa($id , $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado)
    {

        echo 't2';
        
        User::update()
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
}

?>