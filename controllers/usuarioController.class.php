<?php
    class usuarioController{
        public function __construct(
            private $conexao = null,
            private $categorias = null
        ){
            $this->conexao = Conexao::getInstancia();
            $categoriaDAO = new CategoriaDAO(db:$this->conexao);
            $this->categorias = $categoriaDAO->buscarCategoriasAtiva();
        }

        public function login(){
            $msg_erro = array("","");
            $erro = false;

            if($_SESSION['logado'] != 0){
                header("Location: http://localhost/Trufarly.com.br/minha_conta");
                die();
            }

            if($_POST){

                if(empty($_POST['email'])){

                    $erro = true;
                    $msg_erro[0] = "Preencha o email!";

                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                        $erro = true;
                        $msg_erro[0] = "Preencha com email um email valido!";

                    } else {

                        $usuario = new Usuario(email:$_POST['email']);
                        $usuarioDAO = new UsuarioDAO($this->conexao);
                        $validacao = $usuarioDAO->bucarEmailUsuario($usuario, args:'login');

                        if(isset($validacao['erro']) && isset($validacao['msg'])){
                            $erro = $validacao['erro'];
                            $msg_erro[0] = $validacao['msg'];
                        }
                    }

                }

                if(empty($_POST['password'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o senha!";
                }

                if(!$erro){
                    $usuario = new Usuario(email:$_POST['email'], password:$_POST['password']);
                    $usuarioDAO = new UsuarioDAO($this->conexao);
                    $validacao = $usuarioDAO->buscarSenhaUsuario($usuario);
    
                    if(isset($validacao['erro']) && isset($validacao['msg'])){
                        $erro = $validacao['erro'];
                        $msg_erro[0] = $validacao['msg'];
                    } else {
                        if(($_SESSION['email'] != null) == ($usuario->getEmail())){
                            header("Location: http://localhost/Trufarly.com.br/minha_conta");
                        }
                    }
                }

            }

            require_once "views/login.php";
        }

        public function criar_conta(){
            $msg_erro = array("","", "", "");
            $erro = false;

            if($_SESSION['logado'] != 0){
                header("Location: http://localhost/Trufarly.com.br/minha_conta");
                die();
            }

            if($_POST){

                if(empty($_POST['nome'])){
                    $erro = true;
                    $msg_erro[0] = "Preencha o campo nome.";
                }

                if(empty($_POST['email'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o email.";
                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                        $erro = true;
                        $msg_erro[1] = "Preencha com email um email valido!";

                    } else {
                        
                        $usuario = new Usuario(email:$_POST['email']);
                        $usuarioDAO = new UsuarioDAO($this->conexao);
                        $validacao = $usuarioDAO->bucarEmailUsuario($usuario, args:'cadastro');

                        if(isset($validacao['erro']) && isset($validacao['msg'])){
                            $erro = $validacao['erro'];
                            $msg_erro[1] = $validacao['msg'];
                        }
                    }
                }

                if(empty($_POST['confirme_email'])){
                    $erro = true;
                    $msg_erro[2] = "Preencha o campo confirmar email.";
                } else {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $erro = true;
                        $msg_erro[2] = "Preencha com email um email valido!";
                    } 
                    
                    if($_POST['email'] != $_POST['confirme_email']){
                        $erro = true;
                        $msg_erro[2] = "E-mail(s) não conferem";
                    }
                }

                if(empty($_POST['password'])){
                    $erro = true;
                    $msg_erro[3] = "Preencha o campo senha.";
                }

                if(!$erro){
                    $usuario = new Usuario(nome:$_POST['nome'], email:$_POST['email'], password:$_POST['password']);
                    $usuario->passwordHash();
                    $usuarioDAO = new UsuarioDAO($this->conexao);
                    $validacao = $usuarioDAO->cadastrarUsuarioBasico($usuario);

                    if($validacao){
                        header("Location: http://localhost/Trufarly.com.br/login");
                        die();
                    } else {
                        $msg_erro[0] = "{$validacao}";
                    }
                }
            }
            require_once "views/criar_conta.php";
        }

        public function minha_conta(){

            if($_SESSION['logado'] == 0){
                header("Location: http://localhost/Trufarly.com.br/login");
                die();
            }

            if($_SESSION['email'] != null){
                $usuario = new Usuario(idusuario:$_SESSION['id_usuario'], email:$_SESSION['email']);
                $usuarioDAO = new UsuarioDAO($this->conexao);
                $perfilUsuario = $usuarioDAO->bucarPerfilUsuario($usuario);

                if($_SESSION['email'] != $perfilUsuario->email){
                    $this->logoff();
                    header("Location: http://localhost/Trufarly.com.br/login");
                    die();
                }

                if(empty($perfilUsuario->datan) OR empty($perfilUsuario->cpf_cnpj)){
                    header("Location: http://localhost/Trufarly.com.br/alterar_perfil?complete=true");
                    die();
                }
            }

            require_once "views/minha_conta.php";
        }

        public function logoff(){
            session_unset();
            session_destroy();
            header("Location: http://localhost/Trufarly.com.br/");
            die();
        }

        public function alterar_perfil(){
            $msg_erro = array("", "", "", "", "", "");
            $erro = false;
            $datan = null;
            $cpf_cnpj = null;

            $sexos = array(
                1 => new stdClass(),
                2 => new stdClass(),
                3 => new stdClass()
            );

            $sexos[1]->value = "M";
            $sexos[1]->descritivo = "Masculino";

            $sexos[2]->value = "F";
            $sexos[2]->descritivo = "Feiminino";

            $sexos[3]->value = "O";
            $sexos[3]->descritivo = "Outro";

            $usuario = new Usuario(idusuario:$_SESSION['id_usuario'], email:$_SESSION['email']);
            $usuarioDAO = new UsuarioDAO($this->conexao);
            $perfilUsuario = $usuarioDAO->bucarPerfilUsuario($usuario);

            if(!empty($perfilUsuario->img_perfil)){
                $img = $perfilUsuario->img_perfil;
            }

            if($_POST){

                if(isset($_FILES["img_perfil"])){
                    if(empty($_FILES["img_perfil"]['name']) && empty($perfilUsuario->img_perfil)){
                        $erro = true;
                        $msg_erro[0] = "Escolha uma imagem para continuar.";
                    }

                    if(isset($_FILES["img_perfil"]['name'])){
                        if(!empty($_FILES["img_perfil"]['name'])){
                            $img = $_FILES["img_perfil"]['name'];
                        }
                    }

                }

                if(isset($_POST['nome'])){
                    if($_POST['nome'] == ""){
                        $erro = true;
                        $msg_erro[1] = "Preencha o nome.";
                    }
                }

                if(empty($_POST['email'])){
                    $erro = true;
                    $msg_erro[2] = "Preencha o email.";
                } else {
                    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $erro = true;
                        $msg_erro[2] = "Preencha com email, valido.";
                    } else {
                        
                        if($_POST['email'] != $_SESSION['email']){
                            $usuarioEmail = new Usuario(email:$_POST['email']);
                            $usuarioDAO = new UsuarioDAO($this->conexao);
                            $validacao = $usuarioDAO->bucarEmailUsuario($usuarioEmail, args:'edit');

                            if(isset($validacao['erro']) && isset($validacao['msg'])){
                                $erro = $validacao['erro'];
                                $msg_erro[2] = $validacao['msg'];
                            }

                        }
                    }

                }
    

                if(isset($_POST['sexo'])){
                    if($_POST['sexo'] <= 0){
                        $erro = true;
                        $msg_erro[3] = "Preencha esse campo para completar o seu cadastro";
                    }
                }

                if(empty($_POST['datan'])){
                    $erro = true;
                    $msg_erro[4] = "Preencha esse campo: 'Data Nacimento', para completar o seu cadastro";
                } else {
                    if($_POST['datan'] >= date("Y-m-d")){
                        $erro = true;
                        $msg_erro[4] = "Data não e valida, voce esta tentado colocar uma data superior a data de hoje: ".date("d-m-Y");
                    } else {
                        $datan = $_POST['datan'];
                    }
                  
                }

                if(empty($_POST['cpf_cnpj'])){
                    $erro = true;
                    $msg_erro[5] = "Preencha esse campo: 'CPF/CNPJ', para completar o seu cadastro";
                } else {
                    $cpf_cnpj = $_POST['cpf_cnpj'];
                }

                if(!$erro){

                    $usuario->setNome($_POST['nome']);
                    $usuario->setImgPerfil($img);
                    $usuario->setSexo($_POST['sexo']);
                    $usuario->setCpfCnpj($_POST['cpf_cnpj']);
                    $usuario->setDatan($_POST['datan']);
                    $usuario->setEmail($_POST['email']);

                    $usuarioDAO = new UsuarioDAO($this->conexao);
                    $ret = $usuarioDAO->updateUsuario($usuario);

                    if($ret){
                        header("Location: http://localhost/Trufarly.com.br/minha_conta?update=true");
                    }
                    
                }
            }

            require_once "views/editar_perfil.php";
        }

        public function meus_pedidos(){
            require_once "views/meus_pedidos.php";
        }

        public function enderecosUsuario(){
            $usuario = new Usuario(idusuario:$_SESSION['id_usuario']);
            $enderecoDAO = new EnderecoDAO($this->conexao);
            $endercos = $enderecoDAO->buscarEnderecoUsuario($usuario);

            require_once "views/meus_enderecos.php";
        }

        public function adicionar_endereco(){
            $msg_erro = array("", "", "", "");
            $erro = false;


            if(isset($_POST)){

                if(empty($_POST['rua'])){
                    $erro = true;
                    $msg_erro[0] = "Preencha o campo acima";
                }
    
                if(empty($_POST['cep'])){
                    $erro = true;
                    $msg_erro[1] = "Preencha o campo acima";
                }
    
                if( empty($_POST['numero'])){
                    $erro = true;
                    $msg_erro[2] = "Preencha o campo acima";
                }
    
                if(empty($_POST['complemento'])){
                    $erro = true;
                    $msg_erro[3] = "Preencha o campo acima";
                }
    
                if(!$erro){
                    $usuario = new Usuario(idusuario:$_SESSION['id_usuario']);
                    $endercos = new Endereco(descricao:$_POST['rua'], numero:$_POST['numero'], cep:$_POST['cep'], complemento:$_POST['complemento'], usuario:$usuario);
                    $endercosDAO = new EnderecoDAO($this->conexao);
                    $ret = $endercosDAO->adicionarEndereco($endercos);


                    if($ret){
                        header("Location: http://localhost/Trufarly.com.br/meus_enderecos?adicionar=true");
                        die();
                    }
                }
            }


            require_once "views/adicionar_endereco.php";
        }
    }
?>