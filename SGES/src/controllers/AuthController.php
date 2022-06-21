<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;

class AuthController extends Controller 
{
    // metodo GET login
    public function index() 
    {
        $flash = '';

        if(!empty($_SESSION['flash']))
        {
            $flash = $_SESSION['flash'];

            $_SESSION['flash'] = '';
        }

        $this->render('login',[
                                'flash' => $flash
                              ]);
    }

    // metodo POST login
    public function login()
    {
        $email = filter_input(INPUT_POST , 'email' , FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST , 'password');

        if($email && $password)
        {   
            if(UserHelpers::verifyLogin($email,$password))
            {
                $_SESSION['token'] = UserHelpers::verifyLogin($email,$password);
                $this->redirect('/');
            }
            else
            {
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem';
                $this->redirect('/login');
            }
        }
        else
        {
            $this->redirect('/login');
        }
    }

    // metodo GET de sair
    public function logout()
    {
        if($_SESSION['token'])
        {
            $_SESSION['token'] = null;
        }

        $this->redirect('/');
    }

    // metodo GET cadastro
    public function cadastro()
    {
        $flash = '';

        if(!empty($_SESSION['flash']))
        {
            $flash = $_SESSION['flash'];

            $_SESSION['flash'] = '';
        }

        $this->render('cadastro',[
                                'flash' => $flash
                              ]);
    }

    // metodo POST cadastro
    public function cadastrar()
    {
        $nome     = filter_input(INPUT_POST , 'nome');
        $email    = filter_input(INPUT_POST , 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST , 'password');

        if(!empty($nome) && !empty($email) && !empty($password))
        {
 
            if(UserHelpers::emailExists($email) === true)
            {
                $_SESSION['flash'] = 'E-mail ja cadastrado';

                $this->redirect('/cadastro');
            }

            if(strlen($password) < 4 || strlen($password) > 8)
            {
                $_SESSION['flash'] = 'Senha deve possui de 4 a 8 caracteres';

                $this->redirect('/cadastro');
            }
            
            $_SESSION['token'] =  UserHelpers::addUser($nome , $email , $password);

            $this->redirect('/');
            
        }

    }
}