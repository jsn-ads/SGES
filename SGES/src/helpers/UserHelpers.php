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
}

?>