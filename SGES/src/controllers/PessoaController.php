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

        $noticicacao = [];
        $cadastro = '';

        if(!empty($_SESSION['msg']))
        {
            $noticicacao['msg']  = $_SESSION['msg'];
            $noticicacao['tipo'] = $_SESSION['tipo'];

            $_SESSION['msg']  = '';
            $_SESSION['tipo'] = '';
        }

        if(UserHelpers::selectCadastro($this->user->id))
        {
            $cadastro = UserHelpers::selectCadastro($this->user->id);
        }

        $this->render('pessoaCadastro', [
                                            'titulo'       => 'Cadastro',
                                            'user'         => $this->user,
                                            'notificacao'  => $noticicacao,
                                            'cadastro'     => $cadastro
                                        ]);
    }

    public function cadastro()
    {

        $id         =  filter_input(INPUT_POST,'id');
        $id_user    =  filter_input(INPUT_POST,'id_user');
        $nome       =  filter_input(INPUT_POST,'nome');
        $telefone   =  filter_input(INPUT_POST,'telefone');
        $data_nasc  =  filter_input(INPUT_POST,'data_nasc');
        $cep        =  filter_input(INPUT_POST,'cep');
        $rua        =  filter_input(INPUT_POST,'rua');
        $qd         =  filter_input(INPUT_POST,'qd');
        $lt         =  filter_input(INPUT_POST,'lt');
        $num        =  filter_input(INPUT_POST,'num');
        $bairro     =  filter_input(INPUT_POST,'bairro');
        $cidade     =  filter_input(INPUT_POST,'cidade');
        $estado     =  filter_input(INPUT_POST,'estado');

        $data_nasc = explode('/', $data_nasc);


        if(strlen($telefone) != 15)
        {
            $_SESSION['msg']  = 'Telefone invalido';
            $_SESSION['tipo'] = 'danger';
            $this->redirect('/pessoa');
        }

        if(strlen($cep) != 10)
        {
            $_SESSION['msg']  = 'Cep invalido';
            $_SESSION['tipo'] = 'danger';
            $this->redirect('/pessoa');
        }

        if(count($data_nasc) != 3)
        {
            $_SESSION['msg']  = 'Data invalida';
            $_SESSION['tipo'] = 'danger';
            $this->redirect('/pessoa');
        }

        $data_nasc = $data_nasc[2].'-'.$data_nasc[1].'-'.$data_nasc[0];
 
        if($id_user && $nome && $telefone && $data_nasc && $cep && $rua && $qd && $lt && $num && $bairro && $cidade && $estado)
        {

            if(empty($id))
            {
                UserHelpers::addPessoa($id_user, $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado);
                $_SESSION['msg']  = 'Cadastro Adicionado com Sucesso';
                $_SESSION['tipo'] = 'primary';
               
            }
            
            else
            {
                UserHelpers::editPessoa($id , $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado);
                $_SESSION['msg']  = 'Cadastro Atualizado com Sucesso';
                $_SESSION['tipo'] = 'info';
                
            }
        }

        $this->redirect('/pessoa');
       
    }

    public function config()
    {
        $noticicacao = [];
        $cadastro = '';

        if(!empty($_SESSION['msg']))
        {
            $noticicacao['msg']  = $_SESSION['msg'];
            $noticicacao['tipo'] = $_SESSION['tipo'];

            $_SESSION['msg']  = '';
            $_SESSION['tipo'] = '';
        }

        $this->render('pessoaConfig', [
                                            'titulo'       => 'Configuracao',
                                            'user'         => $this->user,
                                            'notificacao'  => $noticicacao,
                                            'cadastro'     => $cadastro
                                        ]);
    }

    public function configAction()
    {
        $nome       = trim(filter_input(INPUT_POST, 'nome'));
        $password   = trim(filter_input(INPUT_POST, 'password'));

        if(strlen($password) < 4 || strlen($password) > 8)
        {
            $_SESSION['msg'] = 'Senha deve possui de 4 a 8 caracteres';
            $_SESSION['tipo'] = 'danger';

            $this->redirect('/config');
        }

        UserHelpers::updateUser($this->user->id , $nome, $password);

        $_SESSION['msg']  = 'Dados Atualizado com sucesso';
        $_SESSION['tipo'] = 'info';
        $this->redirect('/config');

    }

    public function rgb()
    {
        $tipo = filter_input(INPUT_POST,'tipo');
        $rgb  = filter_input(INPUT_POST,'rgb');

        switch($tipo){
            case 'menu':
                UserHelpers::RGBMenu($this->user->id, $rgb);
                break;
            case 'card':
                UserHelpers::RGBCard($this->user->id, $rgb);
                break;
        }

        $this->redirect('/config');
    }
}