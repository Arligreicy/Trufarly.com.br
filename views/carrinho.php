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
    <title>Carrinho | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

        <div class="container py-2">
            <div class="row g-2 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-4">
            <h1 class="w-100"> Carrinho de Compras </h1>

            <?php
                if(isset($_SESSION["carrinho"]))
                {
            ?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Produto</th>
                    <th>Sabor</th>
                    <th>Preço(R$)</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            <?php
                $subtotal = 0;
                $total = 0;
                foreach($carrinho as $linha=>$dado){
                    $subtotal = $dado["preco"] * $dado["quantidade"];
                    //print_r($carrinho);
                    $total += $subtotal;
                    echo "<tr>
                            <td>{$dado["nome"]}</td>
                            <td>{$dado["sabor"]}</td>
                            <td>" . number_format($dado["preco"],2, ",",".") . "</td>

                            <td><input type='number' min='1' value='{$dado['quantidade']}' linha='$linha' onchange='alterar_qtd_iten_carrinho(this)'></td>

                            <td>" . number_format($subtotal,2, ",",".") . "</td>
                            <td>
                                <a href='http://localhost/Trufarly.com.br/remover_carrinho?linha=$linha'>Excluir</a>
                            </td>
                           </tr>";
                
                }

                echo "<tr>
                        <td colspan='4'>Total da compra</td>
                        <td colspan='2'>" .number_format($total,2, ",",".") . "</td>
                    </tr>";
            ?>
            </table>

            <a class="btn btn-primary" href='http://localhost/Trufarly.com.br/'>Continuar Comprando</a><br>
            <a class="btn btn-primary" href='http://localhost/Trufarly.com.br/finalizar_compra'>Finalizar a Compra</a>
        <?php       
            }
            else{
                echo "<br><br><h3>Não há produtos no carrinho de compras </h3>";
            }
        ?>
            </div>
        </div>

    <script src="http://localhost/Trufarly.com.br/views/js/meu_carrinho.js" defer></script>

    <?php require_once "carrinho_icon.php" ?>
    <?php require_once "footer.php"; ?>
</body>
</html>