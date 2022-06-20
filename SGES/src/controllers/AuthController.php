<?php
namespace src\controllers;

use \core\Controller;

class AuthController extends Controller 
{

    public function index() 
    {
        $this->render('login');
    }

    public function login()
    {
        echo 'cheguei aqui';
    }

    public function cadastro()
    {
        $this->render('cadastro');
    }

    public function cadastrar()
    {
        echo 'cadastrando';
    }
}