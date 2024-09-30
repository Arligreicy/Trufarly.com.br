<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/style.css">
    <script src="http://localhost/Trufarly.com.br/views/js/index.js" defer></script>
    <script src="http://localhost/Trufarly.com.br/views/js/login.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Login | <?php echo $_ENV['nome_site']; ?></title>

</head>
<body>
    <?php require_once "header.php"; ?>

    <div id="container" class="container py-1">
        <div class="row">
            <form action="login"  method="post"  class="card py-5" onsubmit="login(event, this)">
                <H2 class="display-5 pb-3">Seja bem vindo de volta</H2>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" aria-describedby="" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>">
                    <div id="" class="form-text erro_input">
                        <?php echo "<p class='text-danger'>".$msg_erro[0]."</p>";?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_POST['password'])?$_POST['password']:''?>">
                    <div id="" class="form-text erro_input">
                        <?php echo "<p class='text-danger'>".$msg_erro[1]."</p>";?>
                    </div>
                </div>

                <div class="mb-3">
                    <a class='nav-link text-dark' aria-current='' href='http://localhost/Trufarly.com.br/criar_conta'>Ainta não tem conta? Criar Conta </i><i class='fa-solid fa-right-to-bracket'></i></a>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Fazer login</button>
                </div>

            </form>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
</body>
</html>