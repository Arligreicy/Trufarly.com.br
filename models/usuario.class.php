<?php
    class Usuario{
        public function __construct(
            private int $idusuario = 0,
            private string $nome = "",
            private string $img_perfil = "",
            private string $sexo = "",
            private string $datan = "",
            private string $cpf_cnpj = "",
            private string $email = "",
            private string $password = "",

            private array $telefones = array(),
            private array $pedidos = array(),
            private $tipo_usuario = null,
            private $status_usuario = null,
            private int $numero = 0,
            private string $cep = "",
            private string $complemento = ""

        ){
            $enderecos[] = new endereco(numero:$this->numero, cep:$this->cep, complemento:$this->complemento);
        }

        public function getIdusuario(){
            return $this->idusuario;
        }

        public function setIdusuario($idusuario){
            $this->idusuario = $idusuario;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getImgPerfil(){
            return $this->img_perfil;
        }

        public function setImgPerfil($img_perfil){
            $this->img_perfil = $img_perfil;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setSexo($sexo){
            $this->sexo = $sexo;
        }


        public function getDatan(){
            return $this->datan;
        }


        public function setDatan($datan){
            $this->datan = $datan;
        }

        public function getCpfCnpj(){
            return $this->cpf_cnpj;
        }


        public function setCpfCnpj($cpf_cnpj){
            $this->cpf_cnpj = $cpf_cnpj;
        }

        public function getEmail(){
            return $this->email;
        }


        public function setEmail($email){
            $this->email = $email;
        }


        public function getPassword(){
            return $this->password;
        }

        public function setPassword(string $password){
            $this->password = $password;
        }

        public function getTelefones(){
            return $this->telefones;
        }

        public function setTelefones($telefone){
            $this->telefones[] = $telefone;
        }

        public function getPedidos(){
            return $this->pedidos;
        }

        public function setPedidos($pedidos){
            $this->pedidos = $pedidos;
        }

        public function getTipoUsuario(){
            return $this->tipo_usuario;
        }

        public function setTipoUsuario($tipo_usuario){
            $this->tipo_usuario = $tipo_usuario;
        }

        public function getStatusUsuario(){
            return $this->status_usuario;
        }

        public function setStatusUsuario($status_usuario){
            $this->status_usuario = $status_usuario;
        }

        public function getEndereco(){
            return $this->enderecos;
        }

        public function setEndereco($endereco){
            $this->enderecos[] = $endereco;
        }

        public function passwordHash(){
            $this->password = $password = password_hash($this->password, PASSWORD_DEFAULT);;
        }
    
        public function passwordVerify($password){
            return $password = password_verify($this->password, $password);
        }

        public function criar_pasta(){
            // Caminho para a pasta que você deseja criar
                $pasta = "uploads/usuario123";

                // Verifique se a pasta existe
                if (!is_dir($pasta)) {
                    // Crie a pasta se ela não existir
                    if (mkdir($pasta, 0777, true)) {
                        echo "Pasta criada com sucesso: " . $pasta;
                    } else {
                        echo "Falha ao criar pasta: " . $pasta;
                    }
                } else {
                    echo "A pasta já existe: " . $pasta;
                }
        }
    }
?>