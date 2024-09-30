<?php
    class carrinhoController{
        public function __construct(
            private $conexao = null,
            private $categorias = null
        ){
            $this->conexao = Conexao::getInstancia();
            $categoriaDAO = new CategoriaDAO(db:$this->conexao);
            $this->categorias = $categoriaDAO->buscarCategoriasAtiva();
        }

        public function ver_carrinho(){
            $carrinho = $_SESSION['carrinho'];
            require_once "views/carrinho.php";
        }

        public function excluir_carrinho(){
            $carrinho = $_SESSION['carrinho'];

            if(isset($_GET["linha"])){
                unset($_SESSION["carrinho"][$_GET["linha"]]);
                require_once "views/carrinho.php";
            }
        }

        public function inserir_carrinho(){
            if(isset($_GET["idtrufa"])){
                $linha = -1;
                $achou = false;
                if(isset($_SESSION["carrinho"]))
                {
                    foreach($_SESSION["carrinho"] as $linha=>$dado)
                    {
                        if($_GET["idtrufa"] == $dado["idtrufa"]){
                            $achou = true;
                        }
                    }
                }

                if(!$achou){
                    $trufa = new Trufas($_GET["idtrufa"]);
                    $trufaDAO = new TrufasDAO($this->conexao);
                    $retorno = $trufaDAO->buscar_uma_trufa($trufa);
                    $_SESSION["carrinho"][$linha + 1 ]["idtrufa"] = $retorno[0]->id_trufa;
                    $_SESSION["carrinho"][$linha + 1 ]["nome"] = $retorno[0]->descritivo;
                    $_SESSION["carrinho"][$linha + 1 ]["sabor"] = $retorno[0]->sabor;
                    $_SESSION["carrinho"][$linha + 1 ]["preco"] = $retorno[0]->preco;
                    $_SESSION["carrinho"][$linha + 1 ]["quantidade"] = 1;
                }
                $carrinho = $_SESSION['carrinho'];
                require_once "views/carrinho.php";
            }
        }

       /* public function adicionar_carrinho(){
            if(isset($_GET["idtrufa"])){
                $linha = -1;
                $achou = false;
                if(isset($_SESSION["carrinho"]))
                {
                    foreach($_SESSION["carrinho"] as $linha=>$dado)
                    {
                        if($_GET["idtrufa"] == $dado["idtrufa"]){
                            $achou = true;
                        }
                    }
                }

                if(!$achou){
                    //buscar dados do trufa
                    $trufa = new Trufas($_GET["idtrufa"]);
                    $trufaDAO = new TrufasDAO($this->conexao);
                    $retorno = $trufaDAO->buscar_uma_trufa($trufa);

                    print_r($retorno);
                    //guardar o trufa na sessão
                    $_SESSION["carrinho"][$linha + 1 ]["idtrufa"] = $retorno[0]->idtrufa;
                    $_SESSION["carrinho"][$linha + 1 ]["nome"] = $retorno[0]->descritivo;
                    $_SESSION["carrinho"][$linha + 1 ]["sabor"] = $retorno[0]->sabor;
                    $_SESSION["carrinho"][$linha + 1 ]["preco"] = $retorno[0]->preco;
                    $_SESSION["carrinho"][$linha + 1 ]["quantidade"] = 1;

                }
                header("location:http://localhost/Trufarly.com.br/trufas_disponiveis");
            }
        }*/

        public function alterar_qtd_iten_carrinho(){
            //Verificar quantidade disponivel antes de adicionar
            if(isset($_GET["linha"])){ 
                if($_GET["qtde"] > 0){
                  $_SESSION["carrinho"][$_GET["linha"]]["quantidade"] = $_GET["qtde"];
                }
             }
        }

        public function bucarQtdCarrinho(){
            $qtd = 0;

            if(is_array($_SESSION['carrinho'])){
                
                foreach ($_SESSION['carrinho'] as $carrinho) {
                    $qtd += $carrinho['quantidade'];
                }
                echo $qtd;
            }
            
            $qtd = json_decode($qtd);
            return $qtd;
        }
    }
?>