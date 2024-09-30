<?php
class StatusPedido
{
    public function __construct(
        private int $idstatuspedido = 0,
        private string $descritivo = ""
    ){}

    public function getIdstatuspedido()
    {
        return $this->idstatuspedido;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }

    public function setIdstatuspedido($idstatuspedido)
    {
        $this->idstatuspedido = $idstatuspedido;
    }

    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }
}
?>