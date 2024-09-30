<?php
    class rotas
    {
        private array $rotas = [];

        public function get(string $caminho, array $dados)
        {
            $this->rotas['GET'][$caminho] = $dados;
        }
        public function post(string $caminho, array $dados)
        {
            $this->rotas['POST'][$caminho] = $dados;
        }
        public function instancia_rota(string $metodo, string $url)
        {


            if(isset($this->rotas[$metodo][$url]))
            {
                $dados_rota = $this->rotas[$metodo][$url];
                $classe = new $dados_rota[0];
                $metodo = $dados_rota[1];
                return $classe->$metodo();
            }
            //print_r($_REQUEST);
            exit("Rota Inválida");
        }
    }//FIM DA CLASSE
    
    $router = new Rotas();
    //inicio da rota
    $router->get("/", [indexController::class, "index"]);

    $router->get("/login", [usuarioController::class, "login"]);
    $router->get("/logoff", [usuarioController::class, "logoff"]);
    $router->get("/minha_conta", [usuarioController::class, "minha_conta"]);
    $router->get("/criar_conta", [usuarioController::class, "criar_conta"]);
    $router->get("/alterar_perfil", [usuarioController::class, "alterar_perfil"]);
    $router->get("/meus_enderecos", [usuarioController::class, "enderecosUsuario"]);
    $router->get("/meus_pedidos", [usuarioController::class, "meus_pedidos"]);
    $router->get("/adicionar_endereco", [usuarioController::class, "adicionar_endereco"]);

    $router->post("/login", [usuarioController::class, "login"]);
    $router->post("/criar_conta", [usuarioController::class, "criar_conta"]);
    $router->post("/alterar_perfil", [usuarioController::class, "alterar_perfil"]);
    $router->post("/meus_enderecos", [usuarioController::class, "enderecosUsuario"]);
    $router->post("/adicionar_endereco", [usuarioController::class, "adicionar_endereco"]);
#--------------------------------------------------------------------------------------------------------------#
    $router->get("/meu_carrinho", [carrinhoController::class, "ver_carrinho"]);
    $router->get("/adicionar_carrinho", [carrinhoController::class, "inserir_carrinho"]);
    $router->get("/alterar_qtd_iten_carrinho", [carrinhoController::class, "alterar_qtd_iten_carrinho"]);
    $router->get("/remover_carrinho", [carrinhoController::class, "excluir_carrinho"]);
    $router->get("/bucar_qtd_carrinho", [carrinhoController::class, "bucarQtdCarrinho"]);
   // $router->get("/adicionar_carrinho_do_listar", [carrinhoController::class, "adicionar_carrinho"]);
#--------------------------------------------------------------------------------------------------------------#

    //$router->get("/trufas_disponiveis", [trufasController::class, "ListarTrufasDisponiveis"]);
    $router->post("/buscar", [trufasController::class, "buscar"]);
    $router->get("/finalizar_compra", [vendaController::class, "finalizar_compra"]);
    //$router->get("/processar_compra", [vendaController::class, "processar_compra"]);
    //$router->get("/editar_endereco_entrega", [vendaController::class, "editar_endereco_entrega"]);

    $router->post("/finalizar_compra", [vendaController::class, "finalizar_compra"]);


    
 
?>