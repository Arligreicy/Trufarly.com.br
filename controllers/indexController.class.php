<?php
    class indexController{
        public function __construct(
            private $conexao = null,
            private $categorias = null
        ){
            $this->conexao = Conexao::getInstancia();
            $categoriaDAO = new CategoriaDAO(db:$this->conexao);
            $this->categorias = $categoriaDAO->buscarCategoriasAtiva();
        }

        public function index(){
            $categorias = $this->categorias;
            $trufasDAO = new TrufasDAO(db:$this->conexao);
            $trufas = $trufasDAO->buscarTrufasAtiva();
            
            require_once "views/index.php";
        }
    }
?>