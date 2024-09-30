<?php
class FormasPagamento
{
    public function __construct(
        private int $idformapag = 0,
        private string $descritivo = "",
        private array $pedidos = array()
    ){}

    public function getIdformapag()
    {
        return $this->idformapag;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }

    public function setId($idformapag)
    {
        $this->idformapag = $idformapag;
    }

    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }
}
?>