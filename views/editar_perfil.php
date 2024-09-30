<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/style.css">
    <script src="http://localhost/Trufarly.com.br/views/js/index.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="http://localhost/Trufarly.com.br/views/js/edit_perfil.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Editar dados da minha conta | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="d-flex justify-content-center align-itens-center">
                    <img src="http://localhost/Trufarly.com.br/storage/usuario/<?php echo $img ?>" alt="" id="img" class="img-thumbnail mx-auto img_produto">
                </div>

                <div class="mb-3">
                  <label for="formFileSm" class="form-label">Escolha uma imagem para seu perfil:</label>
                  <input class="form-control form-control-sm" id="formFileSm" type="file" accept=".jpg , .png" onchange="mostrar(this)" name="img_perfil" value="">
                </div>

                <div>
                    <?php echo $msg_erro[0] ?>
                </div>
                
                <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                        Nome:
                    </label><br>
                    <input class="form-control" type="text" name="nome" value="<?php echo isset($_POST['nome'])?$_POST['nome']:$perfilUsuario->nome?>">
                </div>

                <div>
                    <?php echo $msg_erro[1] ?>
                </div>

                <div class="input-group input-group-md">
                    <label for="" class="input-group-text">
                        E-mail:
                    </label><br>
                    <input class="form-control" type="text" name="email" value="<?php echo isset($_POST['email'])?$_POST['email']:$perfilUsuario->email?>">
                </div>

                <div>
                    <?php echo $msg_erro[2] ?>
                </div>

                <div class='input-group input-group-md hidden'>
                    <label for='' class='input-group-text'>
                        Sexo:
                    </label><br>

                    <select class='form-select' aria-label='Default select example' name='sexo'>
                        <option selected value = '0'>Selecione uma opcão:</option>

                        <?php
                            if($perfilUsuario->sexo){
                                foreach ($sexos as $sexo) {
                                    if($perfilUsuario->sexo == $sexo->value){
                                        echo "<option value='$sexo->value' selected>$sexo->descritivo</option>";
                                    } else {
                                        echo "<option value='$sexo->value'>$sexo->descritivo</option>";
                                    }
                                }
                            } else {
                                foreach ($sexos as $sexo) {
                                    if($_POST['sexo'] == $sexo->value){
                                        echo "<option value='$sexo->value' selected>$sexo->descritivo</option>";
                                    } else {
                                        echo "<option value='$sexo->value'>$sexo->descritivo</option>";
                                    }
                                }
                            }

                        ?>

                    </select>
                </div>

                <div>
                    <?php echo $msg_erro[3] ?>
                </div>

                <div class='input-group input-group-md'>
                    <label for='' class='input-group-text'>
                        Sua data de nascimento:
                    </label><br>
                    <input class='form-control' type='date' name='datan' value='<?php echo isset($_POST['datan'])?$_POST['datan']:$perfilUsuario->datan ?>'>
                </div>

                <div>
                    <?php echo $msg_erro[4] ?>
                </div>

                <div class='input-group input-group-md'>
                    <label for='' class='input-group-text'>
                        CPF/CNPJ:
                    </label><br>
                    <input class='form-control' type='text' name='cpf_cnpj' value='<?php echo isset($_POST['cpf_cnpj'])?$_POST['cpf_cnpj']:$perfilUsuario->cpf_cnpj?>'>
                </div>

                <div>
                    <?php echo $msg_erro[5] ?>
                </div>

                <div class="row">
                    <button class="btn btn-orange">Alterar</button>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Complete seu cadasrtro :)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <span>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </span>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-continue" data-bs-dismiss="modal">Continuar</button>
            </div>
            </div>
        </div>
    </div>


    <?php require_once "carrinho_icon.php"; ?>
    <?php require_once "footer.php"; ?>
</body>
</html>
