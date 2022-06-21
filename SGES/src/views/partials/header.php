<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        SGES - <?php if($titulo):?> <?= $titulo;?> <?php endif;?>
    </title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap5.min.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">
</head>

<body>

<div class="menu">
    <div class="logo">
       <a href="<?= $base;?>"><img src="<?= $base;?>/assets/img/logo.png" alt=""></a>
    </div>
    <div class="submenu">

        <button class="btn-menu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <a href="">Home</a>
        </button>

        <div class="dropdown">
            <button class="btn-menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <?= ucwords($user->nome);?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Cadastro</a></li>
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn-menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Contas
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Contas</a></li>
                <li><a class="dropdown-item" href="#">Histórico de Movimentações</a></li>
            </ul>
        </div>

        <button class="btn-menu"></button>
    </div>
</div>
