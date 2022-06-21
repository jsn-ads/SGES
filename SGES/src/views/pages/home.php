<?php 
    $render('header',[
                        'titulo' => $titulo,
                        'user'   => $user
                     ]); 
?>

<div class="section">
    <img src="<?= $base;?>/assets/img/logo.png" width="50%" height="100%" alt="">
</div>

<?php $render('footer');?>