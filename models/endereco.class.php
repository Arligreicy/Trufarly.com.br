<?php
    class Endereco{
        public function __construct(
            private int $idendereco = 0,
            private string $descricao = "",
            private int $numero = 000,
            private string $cep = "",
            private string $complemento = "",
            private $usuario = null
        ){
            
        }

        public function getIdendereco(){
            return $this->idendereco;
        }

 
        public function setIdendereco(int $idendereco){
            $this->idendereco = $idendereco;
        }

            public function getDescricao(): string
            {
                        return $this->descricao;
            }


            public function setDescricao(string $descricao): self
            {
                        $this->descricao = $descricao;

                        return $this;
            }

            public function getNumero(): int
            {
                        return $this->numero;
            }


            public function setNumero(int $numero): self
            {
                        $this->numero = $numero;

                        return $this;
            }


            public function getCep(): string
            {
                        return $this->cep;
            }


            public function setCep(string $cep): self
            {
                        $this->cep = $cep;

                        return $this;
            }


            public function getComplemento(): string
            {
                        return $this->complemento;
            }


            public function setComplemento(string $complemento): self
            {
                        $this->complemento = $complemento;

                        return $this;
            }


            public function getUsuario()
            {
                        return $this->usuario;
            }


            public function setUsuario($usuario): self
            {
                        $this->usuario = $usuario;

                        return $this;
            }


        public function apiValidationEndereco(){
            
            if(!empty($this->cep)){

                try {

                    $url = "https://api.brasilaberto.com/v1/zipcode/{$this->cep}/";

                    $request = curl_init();
                    curl_setopt($request, CURLOPT_URL, $url);
                    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
                    $request = json_decode(curl_exec($request), true);

                    if($result = isset($request['result'])){
                        $result = $request['result'];

                        if(isset($result['error'])){
                            return "Cep não encontrado.";
                        } else {
                            return array(

                                "rua" => $result['street'],
                                "bairro" => $result['district'],
                                "cidade" => $result['city'],
                                "uf" => $result['city'],
                                "cep" => $result['zipcode']

                            );

                        }
                    }

                
                    if (curl_errno($request)) {
                        echo "Error: " . curl_error($request);
                        exit;
                    }
                    
                    curl_close($request);

                } catch (\Throwable $e) {
                    return "Erro ao consultar API.";
                }

            } else {
                return "Erro cep esta vazio.";
            }
        }
        
    }

?>