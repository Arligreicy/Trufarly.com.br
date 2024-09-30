function alterar_qtd_iten_carrinho(input){
    var quantidade = input.value;
    var linha = input.getAttribute("linha");

    var url = "http://localhost/Trufarly.com.br/alterar_qtd_iten_carrinho?linha=" + linha + "&qtde=" + quantidade;

    fetch(url).then((response)=>{
        location.reload();
    });
}