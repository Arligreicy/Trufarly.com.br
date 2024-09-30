<?php
    class Telefones{
        public function __construct(
            private int $id_telefone = 0,
            private int $ddd = 00,
            private string $numero = "",
            private $usuario = null
        ){
            
        }
    }
?>