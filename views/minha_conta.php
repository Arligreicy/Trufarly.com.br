<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dda272e1ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/style.css">
    <link rel="stylesheet" href="http://localhost/Trufarly.com.br/views/css/perfil.css">
    <script src="http://localhost/Trufarly.com.br/views/js/index.js" defer></script>
    <script src="http://localhost/Trufarly.com.br/views/js/perfil.js" defer></script>

    <link rel="shortcut icon" href="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" type="image/x-icon">
    <title>Minha Conta | <?php echo $_ENV['nome_site']; ?></title>
</head>
<body>
    <?php require_once "header.php"; ?>

    <div id="container" class="container py-1">
        <div class="row row-sm-reverse">
            <div class="col-lg-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa-solid fa-user pe-4 icon_menu_minha_conta"></i> Minha Conta
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-user-gear pe-3 icon_menu_minha_conta"></i>Meus Dados
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <a class="nav-link" aria-current="" href="http://localhost/Trufarly.com.br/meus_enderecos">
                                            <i class="fa-solid fa-location-dot pe-3 icon_menu_minha_conta"></i>Meus Endereços
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center w-100">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-phone pe-3 icon_menu_minha_conta"></i>Meus Telefones
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <i class="fa-solid fa-truck-fast pe-4 icon_menu_minha_conta"></i> Meus Pedidos
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="http://localhost/Trufarly.com.br/meus_pedidos">
                                            <i class="fa-solid fa-check pe-3 icon_menu_minha_conta"></i>Pedidos realizados
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-clock pe-3 icon_menu_minha_conta"></i>Pedidos pedentes
                                        </a>
                                    </li>

                                    <li class="nav-item px-sm-0 py-md-1 w-100 d-md-flex justify-content-lg-start align-items-md-center">
                                        <a class="nav-link" aria-current="" href="">
                                            <i class="fa-solid fa-xmark pe-3 icon_menu_minha_conta"></i>Pedidos cancelados
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-lg-8">
                <div class="card py-3">
                    <div class="d-flex justify-content-end align-itens-center px-5">
                        <a href="http://localhost/Trufarly.com.br/alterar_perfil">
                            <i class="fa-solid fa-user-pen icon_alterar_dados_perfil"></i>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center align-itens-center px-5">
                        <img class="img-thumbnail mx-auto img-perfil" src="http://localhost/Trufarly.com.br/storage/usuario/<?php echo $perfilUsuario->img_perfil ?>" alt="" srcset="">
                    </div>

                    <div id="dados_usuario" class="px-5">
                        <div id="nome">
                            None: <?php echo $perfilUsuario->nome ?>
                        </div>
                        <div>
                            Email: <?php echo $perfilUsuario->email ?>
                        </div>
                        <div>
                            CPF/CNPJ: <?php echo $perfilUsuario->cpf_cnpj ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Atualização completa :)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <span>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </span>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-continue" data-bs-dismiss="modal">Continuar</button>
            </div>
            </div>
        </div>
    </div>

    <?php require_once "carrinho_icon.php"; ?>
    <?php require_once "footer.php"; ?>
</body>
</html>