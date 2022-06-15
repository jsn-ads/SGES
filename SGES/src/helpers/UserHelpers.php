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
}

?>