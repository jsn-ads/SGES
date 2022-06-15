<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGES - Login</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css">
</head>
<body>

    <div class="container">
        
        <!-- card login -->
        <div class="card">
           
            <h5 class="card-header"><strong>SGES</strong></h5>
           
            <div class="card-body">
                
                <form action="<?= $base;?>/login" method="post">

                    <div class="form-group">
                        <input placeholder="Infome o E-Mail" type="email" class="form-control" id="email" name="email">
                    </div>
                    
                    <div class="form-group">
                        <input placeholder="Informe a Senha" type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <input id="btn-login" class="btn btn-outline-primary" type="submit" value="Acessar">
                    </div>

                </form>

            </div>

            <div class="card-footer">
                <small style="margin-top: 25px;">não possui cadastro ? <a href="<?=$base;?>/cadastro"><strong style="">clique aqui</strong></a></small>
            </div>

        </div>
        <!-- end card login -->

    </div>

    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.min.js"></script>
</body>
</html>