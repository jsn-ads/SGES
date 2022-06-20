<?php
namespace src\controllers;

use \core\Controller;
use src\helpers\UserHelpers;

class HomeController extends Controller 
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
        $this->render('home', [
                                'titulo' => 'HOME',
                                'user'   => $this->user
                              ]);
    }
}