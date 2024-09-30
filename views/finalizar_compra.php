<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/style.css">
    <script src="http://localhost/Trufarly.com.br/views/js/index.js" defer></script>
    <script src="http://localhost/Trufarly.com.br/views/js/finalizar_compra.js" defer></script>
    <link rel="shortcut icon" href="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Finalizar Compra | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
        <div class="row g-2 py-4">
            <h1 class="w-100 text-center">Finalização</h1>
            <br>


            <form action="" method="POST" class="row g-3">
                    <div>
                        <h2>Dados do Cliente</h2>
                    </div>
                    <div class="col-6">
                        <p><strong>Nome:</strong> <?php echo $retorno->nome; ?></p>
                        <p><strong>Email:</strong> <?php echo $retorno->email; ?></p>
                    </div>
                    <div class="col-6">
                        <p><strong>Selecione o Endereço:</strong></p>
                        <select name="endereco" required style="max-width: 500px">
                            <option value="0" >Selecione um endereco de entregar</option>
                                <?php
                                    foreach ($enderecos as $endereco) {
                                        if(isset($_POST['endereco']) && $_POST['endereco'] == $endereco->id_endereco){
                                            echo   "
                                                <option value='{$endereco->id_endereco}' selected>
                                                    Rua: {$endereco->descritivo}, Número: {$endereco->numero},CEP: {$endereco->cep}, Complemento: {$endereco->complemento}
                                                </option>";
                                        } else {
                                            echo   "
                                                <option value='{$endereco->id_endereco}'>
                                                    Rua: {$endereco->descritivo}, Número: {$endereco->numero}, CEP: {$endereco->cep}, Complemento: {$endereco->complemento}
                                                </option>";
                                        }
                                }

                            ?>
                        </select>

                        <div>
                            <?php echo $msg_erro[0] ?>
                        </div>
                    </div>



                    <h2 class="w-100">Resumo do Pedido</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Sabor</th>
                                <th>Preço (R$)</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $qtd = 0;
                                $valor = 0;

                                if(is_array($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0){
                                        foreach($_SESSION["carrinho"] as $linha => $dado){

                                            $subtotal = $dado["preco"] * $dado["quantidade"];
                                            $qtd += $dado["quantidade"];
                                            $valor += $subtotal;
                                            echo "<tr>
                                                    <td>{$dado['nome']}</td>
                                                    <td>{$dado['sabor']}</td>
                                                    <td>" . number_format($dado['preco'], 2, ',', '.') . "</td>
                                                    <td>{$dado['quantidade']}</td>
                                                    <td>" . number_format($subtotal, 2, ',', '.') . "</td>
                                                </tr>";
                                        }
                                } else {
                                    echo "
                                    <tr>
                                        <td colspan='5'>Seu carrinho esta vazio.</td>
                                    </tr>";
                                }


                            ?>
                            <tr>
                                <td colspan="4"><strong>Total da compra</strong></td>
                                <td><strong><?php echo number_format($valor, 2, ',', '.'); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class='mb-1'>
                        <label for=''>
                            Forma de pagamento
                        </label>

                        <select name="fp" id="">
                            <option value="0">Selecione uma FP</option>
                                <?php
                                    if(is_array($formaspamento)){
                                        foreach ($formaspamento as $fp) {
                                            if(isset($_POST['fp']) && $_POST['fp'] == $fp->id_fp){
                                                echo "<option value='{$fp->id_fp}' selected>{$fp->descritivo}</option>";
                                            } else {
                                                echo "<option value='{$fp->id_fp}'>{$fp->descritivo}</option>";
                                            }
                                        }
                                    }
                                ?>
                        </select>

                        <div>
                            <?php echo $msg_erro[1] ?>
                        </div>
                    </div>

                <div>
                    <button type="submit" class="btn btn-success">Confirmar Compra</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Tivemos o probela com o pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <span>
                    Tente novamente :)
                </span>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-continue" data-bs-dismiss="modal">Continuar</button>
            </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/Trufarly.com.br/views/js/meu_carrinho.js" defer></script>
    <?php require_once "carrinho_icon.php"; ?>
    <?php require_once "footer.php"; ?>
</body>
</html>
