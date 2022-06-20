<?php
use core\Router;

$router = new Router();

//Login
$router->get('/login'  , 'AuthController@index');

$router->post('/login' , 'AuthController@login');

//Cadastro 

$router->get('/cadastro'    , 'AuthController@cadastro');

$router->post('/cadastrar'  , 'AuthController@cadastrar');

//Home
$router->get('/' , 'HomeController@index');
 
