<?php
    class UsuarioDAO{
        public function __construct(
            private $db = null
        ){

        }

        public function bucarEmailUsuario($usuario, $args){
            $erro = false;
            $sql = "SELECT email FROM usuarios WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getEmail());
                $stm->execute();
                $this->db = null;

                $email = $stm->Fetch(PDO::FETCH_OBJ);

                if($args == 'login'){

                    if(is_object($email)){
                        return false;
                    } else {
                        return array(
                            "erro" => true,
                            "msg" => "E-mail não encontrado."
                        );
                    }
                }

                if($args == 'cadastro'){

                    if(is_object($email)){
                        return array(
                            "erro" => true,
                            "msg" => "E-mail já cadastrado, use outro email ou faça:<a class='nav-link text-dark' href='http://localhost/Trufarly.com.br/login'>Login</a>"
                        );
                    } else {
                        return true;
                    }
                }


                if($args == 'edit'){
                    if(is_object($email)){
                        return array(
                            "erro" => true,
                            "msg" => "E-mail já cadastrado, use outro."
                        );
                    } else {
                        return true;
                    }
                }
                
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function buscarSenhaUsuario($usuario){
            $sql = "SELECT password FROM usuarios WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getEmail());
                $stm->execute();

                $password = $stm->Fetch(PDO::FETCH_OBJ);
                $password = $password->password;

                $validacao = $usuario->passwordVerify(password:$password);

                if($validacao){
                    
                    $usuario = $this->bucarDadosUsuario($usuario);
                    $this->db = null;

                    if(is_object($usuario)){
                        $_SESSION["id_usuario"] = $usuario->id_usuario;
                        $_SESSION["nome"] = $usuario->nome;
                        $_SESSION["email"] = $usuario->email;
                        $_SESSION["id_tipo_usuario"] = $usuario->id_tipo_usuario;
                        $_SESSION["logado"] = true;
                    }

                } else {
                    $this->db = null;
                    return array(
                        "erro" => true,
                        "msg" => "Credenciais não são validas."
                    );
                }

            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }


        public function bucarDadosUsuario($usuario){
            $sql = "
                    SELECT id_usuario , nome, email, id_tipo_usuario, id_status_usuario 
                    from usuarios 
                    where email = ?
                ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getEmail());
                $stm->execute();
                $this->db = null;
                return $stm->Fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function bucarPerfilUsuario($usuario){
            $sql = "
                    SELECT nome, email, img_perfil, nome, sexo, datan, cpf_cnpj
                    from usuarios 
                    where email = ?
                ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getEmail());
                $stm->execute();
                $this->db = null;
                return $stm->Fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function cadastrarUsuarioBasico($usuario){
            $sql = "
                INSERT INTO usuarios (nome, email, PASSWORD) VALUES (?, ?, ?)
            ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getNome());
                $stm->bindValue(2, $usuario->getEmail());
                $stm->bindValue(3, $usuario->getPassword());
                $stm->execute();
                $this->db = null;
                return true;
            } catch (PDOException $e) {
                return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }
        public function bucarDadosUsuarioCompleto($usuario){
            $sql = "
                    SELECT u.id_usuario , u.nome, u.email, u.cpf_cnpj, 
                    e.descritivo, e.numero, e.cep, e.complemento
                    from usuarios u INNER JOIN enderecos e 
                    ON(u.id_usuario = e.id_usuario) where u.id_usuario = ?;
                ";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getIdusuario());
                $stm->execute();
                $this->db = null;
                return $stm->Fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }

        public function updateUsuario($usuario){
            $sql = "UPDATE usuarios SET nome = ?, img_perfil = ?, sexo = ?, datan = ?, cpf_cnpj = ?, email = ? WHERE id_usuario = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $usuario->getNome());
                $stm->bindValue(2, $usuario->getImgPerfil());
                $stm->bindValue(3, $usuario->getSexo());
                $stm->bindValue(4, $usuario->getDatan());
                $stm->bindValue(5, $usuario->getCpfCnpj());
                $stm->bindValue(6, $usuario->getEmail());
                $stm->bindValue(7, $usuario->getIdusuario());

                $stm->execute();
                $this->db = null;
                return true;
            } catch (PDOException $e) {
                return "Erro, Message: {$e->getMessage()}\n Code:{$e->getCode()}";
            }
        }
        

    }

?>