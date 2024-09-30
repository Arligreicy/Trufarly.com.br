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
    <title>Editar endereço | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
        <div class="row g-2 py-4">
            <h1 class="w-100 text-center">Endereço para entrega</h1>
            <br>
            <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                        Rua:
                    </label><br>
                    <input class="form-control" type="text" name="nome" value="<?php echo isset($_POST['descricao'])?:$NovoEndereco->descricao?>">
                </div>

                <div>
                    <?php echo $msg_erro[0] ?>
                </div>
                <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                        Número:
                    </label><br>
                    <input class="form-control" type="text" name="nome" value="<?php echo isset($_POST['numero'])?:$NovoEndereco->numero?>">
                </div>

                <div>
                    <?php echo $msg_erro[1] ?>
                </div>
                <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                        Cep:
                    </label><br>
                    <input class="form-control" type="text" name="nome" value="<?php echo isset($_POST['cep'])?:$NovoEndereco->cep?>">
                </div>

                <div>
                    <?php echo $msg_erro[2] ?>
                </div>
                <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                    Complemento:
                    </label><br>
                    <input class="form-control" type="text" name="nome" value="<?php echo isset($_POST['complemento'])?:$NovoEndereco->complemento?>">
                </div>

                <div>
                    <?php echo $msg_erro[3] ?>
                </div>
                
            
            <form action="http://localhost/Trufarly.com.br/editar_endereco_entrega" method="POST" class="row g-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Confirmar endereço</button>
                </div>
            </form>
        </div>
    </div>

    <script src="http://localhost/Trufarly.com.br/views/js/meu_carrinho.js" defer></script>
    <?php require_once "carrinho_icon.php"; ?>
    <?php require_once "footer.php"; ?>
</body>
</html>