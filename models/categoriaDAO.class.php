<?php
//Nao e necessario extendes de Conexao
class CategoriaDAO
{
    public function __construct(
        private $db = null
    ){

    }

    public function buscarCategoriasAtiva()
    {
        $sql = "SELECT * FROM categorias WHERE STATUS = 'Ativo'";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todas as categorias";
        }
    }

    public function buscar_categorias()
    {
        $sql = "SELECT * FROM categorias";
        try {
            $stm = $this->db->prepare($sql);
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao buscar todas as categorias";
        }
    }

    public function cadastrar_categoria($categoria)
    {
        $sql = "INSERT INTO categorias (descritivo) VALUES (?)";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getDescritivo());
            $stm->execute();
            $this->db = null;
            return "Categoria inserida com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao inserir categoria";
        }
    }

    public function buscar_uma_categoria($categoria)
    {
        $sql = "SELECT * FROM categorias WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getId());
            $stm->execute();
            $this->db = null;
            return $stm->FetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao encontrar a categoria";
        }
    }

    public function excluir_categoria($categoria)
    {
        $sql = "DELETE FROM categorias WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getId());
            $stm->execute();
            $this->db = null;
            return "Categoria excluída";
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema ao excluir a categoria";
        }
    }

    public function alterar_categoria($categoria)
    {
        $sql = "UPDATE categorias SET descritivo = ? WHERE id = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $categoria->getDescritivo());
            $stm->bindValue(2, $categoria->getId());
            $stm->execute();
            $this->db = null;
            return "Categoria alterada com sucesso";
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
            echo "Problema ao alterar uma categoria";
        }
    }
}
?>