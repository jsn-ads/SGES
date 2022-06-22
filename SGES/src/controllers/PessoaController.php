<?php
namespace src\controllers;

use \core\Controller;
use EmptyIterator;
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

        $flash = '';

        if(!empty($_SESSION['flash']))
        {
            $flash = $_SESSION['flash'];

            $_SESSION['flash'] = '';
        }

        $this->render('pessoaCadastro', [
                                            'titulo' => 'Cadastro',
                                            'user'   => $this->user,
                                            'flash'  => $flash
                                        ]);
    }

    public function cadastro()
    {

        $id         = filter_input(INPUT_POST,'id');
        $id_user    = filter_input(INPUT_POST,'id_user');
        $nome       = filter_input(INPUT_POST,'nome');
        $telefone   = filter_input(INPUT_POST,'telefone');
        $data_nasc  = filter_input(INPUT_POST,'data_nasc');
        $cep        = filter_input(INPUT_POST,'cep');
        $rua        = filter_input(INPUT_POST,'rua');
        $qd         = filter_input(INPUT_POST,'qd');
        $lt         = filter_input(INPUT_POST,'lt');
        $num        = filter_input(INPUT_POST,'num');
        $bairro     = filter_input(INPUT_POST,'bairro');
        $cidade     = filter_input(INPUT_POST,'cidade');
        $estado     = filter_input(INPUT_POST,'estado');

        echo 'id= '. $id;
        echo 'id_user= '. $id_user;
        echo $nome;       
        echo $telefone;   
        echo $data_nasc;
        echo $cep;        
        echo $rua;        
        echo $qd;       
        echo $lt;         
        echo $num;        
        echo $bairro;     
        echo $cidade;     
        echo $estado;     

        if($id_user && $nome && $telefone && $data_nasc && $cep && $rua && $qd && $lt && $num && $bairro && $cidade && $estado)
        {

            echo 'th';

            if(empty($id))
            {
                UserHelpers::addPessoa($id_user, $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado);
            }
            else
            {
                UserHelpers::editPessoa($id , $id_user, $nome, $telefone, $data_nasc, $cep, $rua, $qd, $lt, $num, $bairro, $cidade, $estado);
            }
        }

        $this->redirect('/pessoa');
       
    }
}