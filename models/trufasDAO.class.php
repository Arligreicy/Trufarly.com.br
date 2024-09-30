<?php
class TrufasDAO
{
    public function __construct(
        private $db = null
    ){}

    public function buscarTrufasAtiva()
    {
        $sql = "
            SELECT t.id_trufa 'idtrufa', t.descritivo 'descritivo', t.sabor 'sabor', t.img 'img', t.qtd_estoque, t.preco, c.descritivo 'categoria' 
            FROM trufas t 
            INNER JOIN categorias c 
            ON(t.id_categoria=c.id_categoria)
            INNER JOIN status_trufa sf
            ON(t.id_status_trufa=sf.id_status_trufa)
            WHERE sf.descritivo = 'ativo' AND c.status = 'ativo'
            ORDER BY t.id_trufa;
        ";

        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todas as trufas";
        }
    }

    public function cadastrar_trufa($trufa)
    {
        $sql = "INSERT INTO trufas (sabor, img, qtd_estoque, preco, descritivo) VALUES (?,?,?,?,?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $trufa->getSabor());
            $stm->bindValue(2, $trufa->getImg());
            $stm->bindValue(3, $trufa->getQtdEstoque());
            $stm->bindValue(4, $trufa->getPreco());
            $stm->bindValue(5, $trufa->getDescritivo());
            $stm->execute();
            $this->db = null;
            return "Trufa inserida com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao inserir trufa";
        }
    }

    public function buscar_uma_trufa($trufa)
    {
        $sql = "SELECT * FROM trufas WHERE id_trufa = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $trufa->getIdtrufa());
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao encontrar a trufa";
        }
    }

    public function excluir_trufa($trufa)
    {
        $sql = "DELETE FROM trufas WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $trufa->getId());
            $stm->execute();
            $this->db = null;
            return "Trufa excluída";
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao excluir a trufa";
        }
    }

    public function alterar_trufa($trufa)
    {
        $sql = "UPDATE trufas SET sabor = ?, img = ?, qtd_estoque = ?, preco = ?, descritivo = ? WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $trufa->getSabor());
            $stm->bindValue(2, $trufa->getImg());
            $stm->bindValue(3, $trufa->getQtdEstoque());
            $stm->bindValue(4, $trufa->getPreco());
            $stm->bindValue(5, $trufa->getDescritivo());
            $stm->bindValue(6, $trufa->getId());
            $stm->execute();
            $this->db = null;
            return "Trufa alterada com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao alterar uma trufa";
        }
    }
}
?>