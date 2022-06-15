<?php
use core\Router;

$router = new Router();

//Login
$router->get('/login' , 'LoginController@index');

//Home
$router->get('/'      , 'HomeController@index');

