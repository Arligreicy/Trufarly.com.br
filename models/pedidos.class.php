<?php
class Pedidos{
    public function __construct(
        private int $idvenda = 0,
        private string $data_da_venda = "",
        private float $valor = 0.0,
        private $endereco = null,
        private $usuario = null,
        private $status_pedido = null,
        private $formas_pagamento = null,
        private array $itens = array() 
    ){}

    public function getIdVenda()
    {
        return $this->idvenda;
    }

    public function getDataDaVenda()
    {
        return $this->data_da_venda;
    }

    public function setIdVenda($idvenda)
    {
        $this->idvenda = $idvenda;
    }

    public function setDataDaVenda($data_da_venda)
    {
        $this->data_da_venda = $data_da_venda;
    }

    public function getItens(){
        return $this->itens;
    }

    public function setItens($itens){
        $this->itens[] = $itens;
    }

    public function getValor(){
        return $this->valor;
    }


    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getFormasPagamento(){
        return $this->formas_pagamento;
    }

    public function setFormasPagamento($formas_pagamento){
        $this->formas_pagamento = $formas_pagamento;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getStatusPedido(){
        return $this->status_pedido;
    }

    public function setStatusPedido($status_pedido){
        $this->status_pedido = $status_pedido;
    }
}
?>