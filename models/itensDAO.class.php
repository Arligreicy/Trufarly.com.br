<?php
class ItensDAO
{
    public function __construct(
        protected $db = null
    ){}

    public function buscar_itens()
    {
        $sql = "SELECT * FROM itens";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todos os itens";
        }
    }

    public function cadastrar_item($item)
    {
        $sql = "INSERT INTO itens (valor, quantidade) VALUES (?,?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $item->getValor());
            $stm->bindValue(2, $item->getQuantidade());
            $stm->execute();
            $this->db = null;
            return "Item inserido com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao inserir item";
        }
    }

    public function buscar_um_item($item)
    {
        $sql = "SELECT * FROM itens WHERE valor = ? AND quantidade = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $item->getValor());
            $stm->bindValue(2, $item->getQuantidade());
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao encontrar o item";
        }
    }

    public function excluir_item($item)
    {
        $sql = "DELETE FROM itens WHERE valor = ? AND quantidade = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $item->getValor());
            $stm->bindValue(2, $item->getQuantidade());
            $stm->execute();
            $this->db = null;
            return "Item excluído";
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao excluir o item";
        }
    }

    public function alterar_item($item)
    {
        $sql = "UPDATE itens SET valor = ?, quantidade = ? WHERE valor = ? AND quantidade = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $item->getValor());
            $stm->bindValue(2, $item->getQuantidade());
            $stm->bindValue(3, $item->getValor());
            $stm->bindValue(4, $item->getQuantidade());
            $stm->execute();
            $this->db = null;
            return "Item alterado com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao alterar um item";
        }
    }
}
?>