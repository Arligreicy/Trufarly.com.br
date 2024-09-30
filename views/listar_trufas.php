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
    <title>Estão disponiveis | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-2">
        <div class="row">
            <h1 class="d-flex justify-content-center aling-itens-center">Trufas Disponíveis</h1>
        </div>  
        <div class="row g-2 g-lg-4 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 py-4">
            <!-- <h1>Trufas Disponíveis</h1><br><br>-->
    		<table class="table">
			<tr>
				<th>Sabor</th>
                <th>Categoria</th>
				<th>Preço</th>
				<th>Deseja adicionar?</th>
                
			</tr>
            <?php
                if(is_array($trufas)){
                    foreach ($trufas as $trufa) 
                    {
                        echo "<tr>
						      <td>{$trufa->sabor}</td>
							  <td>{$trufa->categoria}</td>
							  <td>{$trufa->preco}</td>
                              <td><a class='btn btn-orange page-link'href='http://localhost/Trufarly.com.br/adicionar_carrinho_do_listar?idtrufa={$trufa->idtrufa}'>Adicionar ao carrinho</a></td>
			  				  </tr>";
                     }
                }
            ?>
        </table>
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
