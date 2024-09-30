<?php
    class Itens{
        public function __construct(
            private float $valor = 0.0,
            private int $quantidade = 0,
            private $pedido = null,
            private $trufa = null

        ){}

        public function getValor()
        {
            return $this->valor;
        }

        public function getQuantidade()
        {
            return $this->quantidade;
        }

        public function setValor($valor)
        {
            $this->valor = $valor;
        }

        public function setQuantidade($quantidade)
        {
            $this->quantidade = $quantidade;
        }

        public function getTrufas(){
            return $this->trufa;
        }

        public function setTrufas($trufa){
            $this->trufa = $trufa;
        }
    }
?>