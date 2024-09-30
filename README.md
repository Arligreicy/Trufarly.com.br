## Olá! Tudo bem ? 
Esse projeto faz parte da disciplina Desenvolvimento para Servidores II.
Realizando no 5º semestre da Faculdade de Tecnologia de Jahu administrado pela  Profº Vânia Somaio Teixeira.

# Loja.Trufarly


## Critérios para a criação do projeto.
- Programação Orientada a Objetos.
- Padrão MVC.
- Composite.
- Singleton.
- Bootstrap.
- JSON.
- Ajax.
- API

## REQUISITOS FUNCIONAIS ##
    # USUARIO
        -   FAZER LOGIN
        -   FAZER CADASTRO
        -   ALTERAR DADOS
        -   ADICIONAR ITENS AO CARRINHO
        -   SELECIONAR FORMA DE PAGAMENTO
        -   FINALIZAR PEDIDO
        -   VER MEUS PEDIDOS
            -   CANCELAR PEDIDO


    # ADMIN
        -   GERENCIAR PEDIDOS
            -   MARCA COMO:
                -   ENVIADO
                -   CANCELADO

        -   GERENCIAR USUSARIOS
            -   ATIVAR
            -   INATIVAR
            -   ADICIONAR
            -   EXCLUIR LOGICO

        -   GERENCIAR PRODUTOS
            -   ATIVAR
            -   INATIVAR
            -   ADICIONAR
            -   EDITAR
            -   EXCLUIR LOGICO

    # SISTEMA
        -   CARRINHO DE COMPRA
        -   CHECKOUT (NAO IMPLEMENTAR)
        -   FORMAS PAGAMENTO(NAO IMPLEMENTAR)
## --------------------------------------------- ##

<i class="fa-solid fa-pen-to-square"></i>
<i class="fa-solid fa-user-pen"></i>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
https://thispersondoesnotexist.com/

index.php = responsável por carregar todos os Controllers

<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Check if the file was uploaded successfully
    if ($_FILES['image']['error'] === 0) {

        // Get uploaded file information
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        // Generate unique file name
        $newFileName = uniqid() . '-' . $fileName;

        // Move uploaded file to desired location
        $targetPath = 'uploads/' . $newFileName;
        if (move_uploaded_file($tmpName, $targetPath)) {

            // Image saved successfully
            echo "Image uploaded and saved as: " . $newFileName;

            // Save image information to database or file system
            // ...

        } else {
            // Error moving uploaded file
            echo "Error saving the uploaded file.";
        }

    } else {
        // Error during file upload
        echo "Error uploading the file.";
    }
}

?>