<?php
    class vendaController
    {
        public function __construct(
            private $conexao = null,
        ){
            $this->conexao = Conexao::getInstancia();
        }

        public function finalizar_compra(){

            if($_SESSION["logado"] == false){
                header("location: http://localhost/Trufarly.com.br/login?login=false");
                die();
            }

            $msg_erro = array("", "");
            $erro = false;

            $usuario = new Usuario($_SESSION["id_usuario"]);

            $enderecoDAO = new enderecoDAO(db:$this->conexao);
            $enderecos = $enderecoDAO->buscarEnderecoUsuario($usuario);

            if(is_array($enderecos) && count($enderecos) <= 0 ){
                header("location: http://localhost/Trufarly.com.br/adicionar_endereco?adicionar=true");
                die();
            }


            $usuarioDAO = new UsuarioDAO($this->conexao);
            $retorno = $usuarioDAO->bucarDadosUsuarioCompleto($usuario);


            $formaspamentoDAO = new FormasPagamentoDAO($this->conexao);
            $formaspamento = $formaspamentoDAO->buscar_formas_pagamento();


            if($_POST){
                if(empty($_POST['endereco']) OR $_POST['endereco'] == 0){
                    $erro = true;
                    $msg_erro[0] = "<span class='text-danger'>Selecione um endereco!!<span>";
                }

                if(empty($_POST['fp']) OR $_POST['fp'] == 0){
                    $erro = true;
                    $msg_erro[1] = "<span class='text-danger'>Selecione uma formade de pagamento!!<span>";
                }

                
                if(!$erro){

                    $valor = 0.00;
                    $fp = new FormasPagamento(idformapag:$_POST['fp']);
                    $enderecoUser = new Endereco(idendereco:$_POST['endereco']);
                    $usuario = new Usuario(idusuario:$_SESSION['id_usuario']);
                    $status_pedido = new StatusPedido(idstatuspedido:2);

                    $pedidos = new Pedidos(data_da_venda:date("Y-m-d"), endereco:$enderecoUser, usuario:$usuario, formas_pagamento:$fp, status_pedido:$status_pedido);

                    foreach($_SESSION["carrinho"] as $linha => $iten){
                        $valor_unit = $iten['preco'] * $iten['quantidade'];
                        $valor = $valor + $valor_unit;
                        $itens = new Itens(valor:$valor_unit, quantidade:$iten['quantidade']);
                        $trufa = new Trufas(idtrufa:$iten['idtrufa']);
                        $itens->setTrufas($trufa);
                        $pedidos->setItens($itens);
                    }

                    $pedidos->setValor($valor);
                    $pedidosDAO = new PedidosDAO($this->conexao);
                    $ret = $pedidosDAO->inserirPedido($pedidos);

                    if($ret){
                        unset($_SESSION['carrinho']);
                        header("location: http://localhost/Trufarly.com.br/meus_pedidos?realizado=true");
                        die();
                    } else {
                        unset($_POST);
                        unset($_SESSION['carrinho']);
                        header("location: http://localhost/Trufarly.com.br/finalizar_compra?realizado=false");
                    }
                }

            }

            require_once "views/finalizar_compra.php";

        }

        /*public function processar_compra(){

                 if($_SESSION['logado'] == false){
                      header('Location: http://localhost/Trufarly.com.br/login');
                      die();
                 }
                $erro_msg = array("", "");
                $erro = false;
    
                $itens = new Itens(valor:$_SESSION['preco'], quantidade:$_SESSION['quantidade'], formas_pagamento:$_POST['fp'], id_cliente:$_SESSION['id_cliente']);
                $itensDAO = new itensDAO($this->conexao);
                $ret = $itensDAO->cadastraritens($itens);
                print_r($itens);

                        
                    if($ret){
                        header('Location: http://localhost/Trufarly.com.br/pedidorealizado');
                    die();
                   }
             } */
            /* public function editar_endereco_entrega(){

            $msg_erro = array("", "", "", "");
            $erro = false;
            
            if($_POST){

                if(isset($_POST['descricao'])){
                    if($_POST['descricao'] == ""){
                        $erro = true;
                        $msg_erro[0] = "Preencha o nome da rua.";
                    }
                }
    
                if(isset($_POST['numero'])){
                    if(empty($_POST['numero'])){
                        $erro = true;
                        $msg_erro[1] = "Preencha o numero.";
                    }
                }
                if(isset($_POST['cep'])){
                    if(empty($_POST['cep'])){
                        $erro = true;
                        $msg_erro[2] = "Preencha o cep.";
                    }
                }
                if(isset($_POST['complemento'])){
                    if(empty($_POST['complemento'])){
                        $erro = true;
                        $msg_erro[3] = "Preencha o complemento.";
                    }
                }
                if(!$erro){
                    $endereco = new Endereco(idendereco:['idendereco'], descricao:$_POST['descricao'], numero:$_POST['numero'], cep:$_POST['cep'], complemento:$_POST['complemento']);
                    $enderecoDAO = new EnderecoDAO($this->conexao);
                    
                }
            }
            $endereco = new Endereco(idendereco:['idendereco']);
            $enderecoDAO = new EnderecoDAO($this->conexao);
            $NovoEndereco = $enderecoDAO->bucarEnderecoUsuario($endereco);
            
            require_once "views/editar_endereco.php";
        }*/
            
    }
?>