<?php
    class searchController{
        public function __construct(
            private $conexao = null,
            private $categorias = null
        ){
            $this->conexao = Conexao::getInstancia();
            $categoriaDAO = new CategoriaDAO(db:$this->conexao);
            $this->categorias = $categoriaDAO->buscarCategoriasAtiva();
        }

        public function vw_search(){

            $erro = false;

            if($_POST){
                if(!empty($_POST['search'])){
                    require_once "views/search.php";
                } else {
                    $msg_erro_search = "Preencha o campo!!!";
                }
            }
        }
    }
?>