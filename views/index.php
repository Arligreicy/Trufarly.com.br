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
    <title>Seja bem-vindo | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
        <div class="row g-2 g-lg-4 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-4">
            <?php
                if(is_array($trufas)){
                    foreach ($trufas as $trufa) {
                        echo"
                            <div class='col'>
                                <div class='card p-4 w-100 h-100 justify-content-between bg-custom-beige'>
                                    <div class='titulo_produto py-1'>
                                        <h2 class='fs-4'>{$trufa->descritivo}</h2>
                                    </div>

                                    <div class='imagem_produto py-2 d-flex justify-content-center align-items-center'>
                                        <img class='rounded img_produto' src='http://localhost/Trufarly.com.br/storage/imgs/{$trufa->img}' alt='' srcset=''>
                                    </div>

                                    <div class='informacoes_produto'>
                                        <div class='sabor mb-1'>Sabor: {$trufa->sabor}</div>
                                        <div class='categoria mb-1'>{$trufa->descritivo}</div>
                                        <div class='categoria mb-1'>{$trufa->categoria}</div>

                                        <div class='input-group input-group-sm'>
                                            QTD: {$trufa->qtd_estoque}
                                        </div>
                                        <div class='preco mb-1'>Valor: ".number_format($trufa->preco, 2, ',', '.')." R$</div>
                                    </div>

                                    <div class='row gy-2 py-2'>
                                        <a class='btn btn-custom-green btn-lg my-1' aria-current='' href='http://localhost/Trufarly.com.br/adicionar_carrinho?idtrufa={$trufa->idtrufa}'>Adicionar ao carrinho</a>
                                    </div>
                                </div>
                            </div>"
                        ;
                    }
                }
            ?>
        </div>

        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item mx-1">
                        <button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">Anterior</button>
                    </li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link active" type="button" onclick="PaginacaoProdutos(this);">1</button></li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">2</button></li>
                    <li class="page-item mx-1"><button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">3</button></li>
                    <li class="page-item mx-1">
                        <button class="btn btn-green page-link" type="button" onclick="PaginacaoProdutos(this);">Próximo</button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <?php require_once "carrinho_icon.php"; ?>
    <?php require_once "footer.php"; ?>
</body>
</html>
