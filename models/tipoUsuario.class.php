<?php
    class TipoUsuario{
        public function __construct(
            private int $idtipo_usuario = 0,
            private string $descritivo = "",
            private array $usuario = array()
        ){
            
        }
    }
?>