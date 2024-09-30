<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/style.css">
    <script src="http://localhost/Trufarly.com.br/views/js/index.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Criar conta | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-1">
        <div class="row h-100">
            <form action="#" method="post" class="w-100 w-md-50 card d-flex flex-column justify-content-center align-items-center">

                <div class="row col-sm-12 col-md-8">
                    <label for="nome" class="col-sm-12 col-form-label">Nome:</label>
                    <div class="col-sm-12">
                        <input type="text" name="nome" class="form-control" id="nome" value="<?php echo isset($_POST['nome'])?$_POST['nome']:''?>">
                    </div>

                    <div>
                        <?php echo "<p class='text-danger'>".$msg_erro[0]."</p>";?>
                    </div>

                </div>

                <div class="row col-sm-12 col-md-8">
                    <label for="email" class="col-sm-12 col-form-label">Email:</label>
                    <div class="col-sm-12">
                        <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                    </div>

                    <div>
                        <?php echo "<p class='text-danger'>".$msg_erro[1]."</p>";?>
                    </div>

                    <label for="confirme_email" class="col-sm-12 col-form-label">Confirme Email:</label>
                    <div class="col-sm-12">
                        <input type="email" name="confirme_email" class="form-control" id="confirme_email" value="<?php echo isset($_POST['confirme_email'])?$_POST['confirme_email']:''?>">
                    </div>

                    <div>
                        <?php echo "<p class='text-danger'>".$msg_erro[2]."</p>";?>
                    </div>
                </div>

                <div class="row col-sm-12 col-md-8">
                    <label for="senha" class="col-sm-12 col-form-label">Senha:</label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" id="senha" value="<?php echo isset($_POST['password'])?$_POST['password']:''?>">
                    </div>
                    <div>
                        <?php echo "<p class='text-danger'>".$msg_erro[3]."</p>";?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary col-md-2">Criar conta</button>
            </form>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
</body>
</html>