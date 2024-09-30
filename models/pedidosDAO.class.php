<?php
class PedidosDAO
{
    public function __construct(
        private $db = null
    ){

    }

    public function buscar_pedidos()
    {
        $sql = "SELECT * FROM pedidos";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todos os pedidos";
        }
    }

    public function buscar_um_pedido($pedido)
    {
        $sql = "SELECT * FROM pedidos WHERE id_venda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pedido->getIdVenda());
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao encontrar o pedido";
        }
    }

    public function excluir_pedido($pedido)
    {
        $sql = "DELETE FROM pedidos WHERE id_venda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pedido->getIdVenda());
            $stm->execute();
            $this->db = null;
            return "Pedido excluído";
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao excluir o pedido";
        }
    }

    public function alterar_pedido($pedido)
    {
        $sql = "UPDATE pedidos SET data_da_venda = ? WHERE id_venda = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pedido->getDataDaVenda());
            $stm->bindValue(2, $pedido->getIdVenda());
            $stm->execute();
            $this->db = null;
            return "Pedido alterado com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao alterar um pedido";
        }
    }


    public function inserirPedido($pedido)
    {
        $sql = "INSERT INTO pedidos (data_venda, valor_total, id_endereco, id_fp, id_usuario, id_status_pedido) VALUES (?,?,?,?,?,?)";
        try {
            $this->db->beginTransaction();
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pedido->getDataDaVenda());
            $stm->bindValue(2, $pedido->getValor());
            $stm->bindValue(3, $pedido->getEndereco()->getIdendereco());
            $stm->bindValue(4, $pedido->getFormasPagamento()->getIdformapag());
            $stm->bindValue(5, $pedido->getUsuario()->getIdUsuario());
            $stm->bindValue(6, $pedido->getStatusPedido()->getIdstatuspedido());
            $ret = $stm->execute();
            
            if($ret){
                $id_pedido = $this->db->lastInsertId();
                $sql = "INSERT INTO itens (qtd_trufa, valor_unit, id_trufa, id_pedido) VALUES (?,?,?,?)";
                $stm = $this->db->prepare($sql);

                foreach ($pedido->getItens() as $iten) {

                    $stm->bindValue(1, $iten->getQuantidade());
                    $stm->bindValue(2, $iten->getValor());
                    $stm->bindValue(3, $iten->getTrufas()->getIdtrufa());
                    $stm->bindValue(4, $id_pedido);
                    $ret = $stm->execute();
                }
            }



            $this->db->commit();
            $this->db = null;
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            $this->db = null;
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao inserir pedido";
        }
    }
}
?>