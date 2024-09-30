<?php
class StatusTrufas
{
    public function __construct(
        private int $idstatustrufa = 0,
        private string $descritivo = ""
    ){}

    public function getIdstatustrufa()
    {
        return $this->idstatustrufa;
    }

    public function getDescritivo()
    {
        return $this->descritivo;
    }

    public function setIdstatustrufa($idstatustrufa)
    {
        $this->idstatustrufa = $idstatustrufa;
    }

    public function setDescritivo($descritivo)
    {
        $this->descritivo = $descritivo;
    }
}
?>