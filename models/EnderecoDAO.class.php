<?php
    class EnderecoDAO{
        public function __construct(
            private $db = null
        ){

        }
        public function buscarEnderecoUsuario($usuario){
            $sql = "
                SELECT e.id_endereco, e.descritivo, e.numero, e.cep, e.complemento, u.id_usuario
                FROM enderecos e INNER JOIN usuarios u
                ON(e.id_usuario = u.id_usuario)
                WHERE u.id_usuario = ?
                ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getIdUsuario());
                $stm->execute();
                $this->db = null;
                return $stm->FetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function adicionarEndereco($endereco){
            $sql = "INSERT INTO enderecos (descritivo, cep, numero, complemento, id_usuario) VALUES (?,?,?,?,?)";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $endereco->getDescricao());
                $stm->bindValue(2, $endereco->getCep());
                $stm->bindValue(3, $endereco->getNumero());
                $stm->bindValue(4, $endereco->getComplemento());
                $stm->bindValue(5, $endereco->getUsuario()->getIdusuario());
                $stm->execute();
                $this->db = null;
                return 1;
            } catch (PDOException $e) {
                echo $e->getCode();
                echo $e->getMessage();
                echo "Problema ao inserir item";
            }
        }
    }

?>