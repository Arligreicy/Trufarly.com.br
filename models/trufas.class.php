<?php
class Trufas
{
    public function __construct(
        private int $idtrufa = 0,
        private string $sabor = "",
        private string $img = "",
        private int $qtd_estoque = 0,
        private float $preco = 0.0,
        private string $descritivo = "",
        private $categoria = null,
        private $status_trufa = null,
        private array $itens = array()
    ){
        
    }

    public function getIdtrufa()
    {
        return $this->idtrufa;
    }

    public function getSabor()
    {
        return $this->sabor;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getQtdEstoque()
    {
        return $this->qtd_estoque;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }
    public function setIdtrufa($idtrufa)
    {
        $this->idtrufa = $idtrufa;
    }

    public function setSabor($sabor)
    {
        $this->sabor = $sabor;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function setQtdEstoque($qtd_estoque)
    {
        $this->qtd_estoque = $qtd_estoque;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }

}
?>