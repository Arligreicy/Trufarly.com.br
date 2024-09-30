<header id="header" class="bg-custom-green py-2 py-md-0 sticky-top z-2">
    <div class="container px-0">
        <nav id="navbar" class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-brand col-md-2 col-sm-10">
                    <a class="text-light" href="http://localhost/Trufarly.com.br/">
                        <img src="http://localhost/Trufarly.com.br/storage/imgs/<?php echo $_ENV['logo']; ?>" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">    
                        <?php echo $_ENV['nome_site']; ?>
                    </a>
                </div>

                <button class="navbar-toggler d-lg-none focus-ring focus-ring-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-light fs-1"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <form action="http://localhost/Trufarly.com.br/buscar" method="POST" class="d-flex w-100 py-4" role="search">
                        <input name="search" class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" onsubmit="search(event, this)">
                        <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end">
                        <li class="nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center">
                            <a class="nav-link text-light" aria-current="" href="http://localhost/Trufarly.com.br/">Inicio</a>
                        </li>
                        
                        <!--
                        <li class="nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center">
                            <a class="nav-link text-light" aria-current="" href="http://localhost/Trufarly.com.br/trufas_disponiveis">Trufas disponiveis</a>
                        </li>
                        -->

                        <li class="dropdown nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center">
                            <a class="dropdown-toggle nav-link text-light" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                Categorias
                            </a>

                            <ul class="dropdown-menu bg-custom-beige px-4">
                                <?php
                                    if(isset($categorias)){
                                        if(is_array($categorias)){
                                            foreach ($categorias as $categoria) {
                                                echo    "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>";
                                                echo    "<a class='nav-link text-dark dropdown-item' href='http://localhost/Trufarly.com.br/index.php?'>{$categoria->descritivo}</a>";
                                                echo    "</li>";
                                            }
                                        }
                                    } else {
                                        echo    "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>";
                                        echo    "<a class='nav-link text-dark dropdown-item disabled' href=''>Não foi encontrado categorias</a>";
                                        echo    "</li>";
                                    }
                                ?>
                            </ul>
                        </li>

                        <?php
                            if($_SESSION["id_usuario"] == 0){
                                echo "<li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'><a class='nav-link text-light' aria-current='' href='http://localhost/Trufarly.com.br/login'>Entrar <i class='fa-solid fa-user'></i></a></li>";
                            }

                            if ($_SESSION["id_usuario"] != 0) {
                                echo "
                                    <li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>
                                        <a class='nav-link text-light' aria-current='' href='http://localhost/Trufarly.com.br/minha_conta'> Perfil <i class='fa-solid fa-user'></i></a>
                                    </li>

                                    <li class='nav-item px-0 px-sm-0 w-100 d-md-flex justify-content-lg-center align-items-md-center'>
                                        <a class='nav-link text-danger' aria-current='' href='http://localhost/Trufarly.com.br/logoff'> Sair <i class='fa-solid fa-right-from-bracket'></i></a>
                                    </li>
                                ";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>