<?php 
    $render('header',[
                        'titulo' => $titulo,
                        'user'   => $user
                     ]); 
?>

<div class="section">
    
    <div class="card text-center">

        <div class="card-header <?= $user->card;?>">
            Configuração
        </div>

        <form action="<?= $base;?>/config" method="POST">
    
            <div class="card-body">

                <?php if(!empty($notificacao)):?>
                    <div class="alert alert-<?= $notificacao['tipo'];?>">
                        <div class="alert1"><?= $notificacao['msg'];?></div>
                        <div class="alert2"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                    </div>
                <?php endif;?>
                   
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Nome" type="text" class="form-control" id="nome" name="nome" value="<?= $user->nome;?>" required maxlength="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="E-mail" type="text" class="form-control" id="email" name="email" value="<?= $user->email;?>" required maxlength="200" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input placeholder="Nova Senha" type="password" class="form-control" id="password" name="password" maxlength="200">
                    </div>
                </div>

            </div>

            <div class="card-footer text-muted <?= $user->card;?>">
                <input id="btn-login" class="btn btn-<?= $user->navBar;?>" type="submit" value="Salvar">
            </div>

        </form>

    </div>

    <div class="min-card">
        <div class="card text-center">

            <div class="card-header <?= $user->card;?>">
                Cor Menu
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-12" style="display:flex;justify-content:center;">
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="menu" value="menu">
                            <input type="hidden" name="rgb" id="rgb"   value="dark">
                            <button id="btn-rgb" class="btn btn-1"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="menu" value="menu">
                            <input type="hidden" name="rgb" id="rgb"   value="blue">
                            <button id="btn-rgb" class="btn btn-2"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="menu" value="menu">
                            <input type="hidden" name="rgb" id="rgb"   value="green">
                            <button id="btn-rgb" class="btn btn-3"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="menu" value="menu">
                            <input type="hidden" name="rgb" id="rgb"   value="yellow">
                            <button id="btn-rgb" class="btn btn-4"></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer text-muted <?= $user->card;?>">
                <form action="<?= $base;?>/rgb" method="POST">
                    <input type="hidden" name="tipo" id="menu" value="menu">
                    <input type="hidden" name="rgb" id="rgb"   value="">
                    <input id="btn-reset" class="btn btn-<?= $user->navBar;?>" type="submit" value="RESET">
                </form>
            </div>

        </div>

        <div class="card text-center">

            <div class="card-header <?= $user->card;?>">
                Cor Card
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-12" style="display:flex;justify-content:center;">
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="card" value="card">
                            <input type="hidden" name="rgb" id="rgb"   value="bg-dark text-white">
                            <button id="btn-rgb" class="btn btn-dark"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="card" value="card">
                            <input type="hidden" name="rgb" id="rgb"   value="bg-primary text-white">
                            <button id="btn-rgb" class="btn btn-primary"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="card" value="card">
                            <input type="hidden" name="rgb" id="rgb"   value="bg-success text-white">
                            <button id="btn-rgb" class="btn btn-success"></button>
                        </form>
                        <form action="<?= $base;?>/rgb" method="POST">
                            <input type="hidden" name="tipo" id="card" value="card">
                            <input type="hidden" name="rgb" id="rgb"   value="bg-warning text-white">
                            <button id="btn-rgb" class="btn btn-warning"></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer text-muted <?= $user->card;?>">
                <form action="<?= $base;?>/rgb" method="POST">
                    <input type="hidden" name="tipo" id="card" value="card">
                    <input type="hidden" name="rgb" id="rgb"   value="">
                    <input id="btn-reset" class="btn btn-<?= $user->navBar;?>" type="submit" value="RESET">
                </form>
            </div>

        </div>
                     
    </div>

</div>

<?php $render('footer');?>