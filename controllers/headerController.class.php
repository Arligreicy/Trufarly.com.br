<?php
    class headerController{
        public function __construct(
            private $conexao = null
        ){
            $this->conexao = Conexao::getInstancia();
        }

        //public static function getCategorias(){
        //    $categoriaDAO = new CategoriaDAO(db:$this->conexao);
        //    return $categorias = $categoriaDAO->buscarCategoriasAtiva();
        //}
    }
?>