<?php
    class trufasController{
        public function __construct(
            private $conexao = null,
            private $categorias = null
        ){
            $this->conexao = Conexao::getInstancia();
            $categoriaDAO = new CategoriaDAO(db:$this->conexao);
            $this->categorias = $categoriaDAO->buscarCategoriasAtiva();
        }

        public function ListarTrufasDisponiveis()
        {   $categorias = $this->categorias;
            $trufasDAO = new TrufasDAO(db:$this->conexao);
            $trufas = $trufasDAO->buscarTrufasAtiva();
            
            require_once "views/listar_trufas.php";
        }

        public function buscar(){
            
        }
    }
?>