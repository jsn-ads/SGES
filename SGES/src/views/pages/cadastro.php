<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGES - Cadastro</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css">
</head>
<body>

    <div class="container">
        
        <!-- card login -->
        <div class="card">
           
            <h5 class="card-header"><strong>SGES - Cadastro</strong></h5>
           
            <div class="card-body">
                
                <form action="<?= $base;?>/cadastrar" method="post">

                    <div class="form-group">
                        <input placeholder="Nome" type="nome" class="form-control" id="nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <input placeholder="E-Mail" type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <input placeholder="Senha" type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <input id="btn-login" class="btn btn-outline-success" type="submit" value="Cadastrar">
                    </div>

                </form>

            </div>

            <div class="card-footer">
                <small style="margin-top: 25px;">possui cadastro ? <a href="<?=$base;?>/login"><strong style="">clique aqui para fazer Login</strong></a></small>
            </div>

        </div>
        <!-- end card login -->

    </div>

    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.min.js"></script>
</body>
</html>