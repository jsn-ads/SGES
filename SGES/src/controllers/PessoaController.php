<?php
namespace src\controllers;

use \core\Controller;
use src\helpers\UserHelpers;

class PessoaController extends Controller 
{
    private $user;

    public function __construct()
    {   
        $this->user = UserHelpers::checkLogin();
        if($this->user === false)
        {
            $this->redirect('/login');
        }
    }

    public function index() 
    {
        $this->render('pessoaCadastro', [
                                            'titulo' => 'Cadastro',
                                            'user'   => $this->user
                                        ]);
    }
}