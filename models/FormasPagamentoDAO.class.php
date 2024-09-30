<?php
class FormasPagamentoDAO
{
    public function __construct(
        private $db = null
    ){
    }

    public function buscar_formas_pagamento()
    {
        $sql = "SELECT * FROM formas_pagamento";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todas as formas de pagamento";
        }
    }

    public function cadastrar_forma_pagamento($forma_pagamento)
    {
        $sql = "INSERT INTO formas_pagamento (descritivo) VALUES (?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $forma_pagamento->getDescritivo());
            $stm->execute();
            $this->db = null;
            return "Forma de pagamento inserida com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao inserir forma de pagamento";
        }
    }

    public function buscar_uma_forma_pagamento($forma_pagamento)
    {
        $sql = "SELECT * FROM formas_pagamento WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $forma_pagamento->getId());
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao encontrar a forma de pagamento";
        }
    }

    public function excluir_forma_pagamento($forma_pagamento)
    {
        $sql = "DELETE FROM formas_pagamento WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $forma_pagamento->getId());
            $stm->execute();
            $this->db = null;
            return "Forma de pagamento excluída";
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao excluir a forma de pagamento";
        }
    }

    public function alterar_forma_pagamento($forma_pagamento)
    {
        $sql = "UPDATE formas_pagamento SET descritivo = ? WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $forma_pagamento->getDescritivo());
            $stm->bindValue(2, $forma_pagamento->getId());
            $stm->execute();
            $this->db = null;
            return "Forma de pagamento alterada com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao alterar uma forma de pagamento";
        }
    }
}
?>