<?php
class Categoria
{
    public function __construct(
        private int $idcategoria = 0,
        private string $descritivo = "",
        private array $trufa = array()
        
    ){}

    public function getidcategoria()
    {
        return $this->idcategoria;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }

    public function setidcategoria($idcategoria)
    {
        $this->idcategoria = $idcategoria;
    }

    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }
}
?>