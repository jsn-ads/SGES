<?php
use core\Router;

$router = new Router();

//Login
$router->get('/login'  , 'AuthController@index');

$router->post('/login' , 'AuthController@login');

//Logout
$router->get('/logout' , 'AuthController@logout');

//Cadastro 

$router->get('/cadastro'    , 'AuthController@cadastro');

$router->post('/cadastrar'  , 'AuthController@cadastrar');

//Home
$router->get('/' , 'HomeController@index');
 
//Cadastro Pessoa

$router->get('/pessoa'  , 'PessoaController@index');

$router->post('/pessoa' , 'PessoaController@cadastro');
