<?php
    class StatusUsuario{
        public function __construct(
            private int $idstatus_usuario = 0,
            private string $descritivo = "",
            private array $usuario = array()
        ){
            
        }
        
    }
?>