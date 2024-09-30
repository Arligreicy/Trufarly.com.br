var data = new Date().getFullYear();
document.getElementById("myData").innerText = data;

function search(event, form){
    console.log(form);
    event.preventDefault();
}


bucarQtdCarrinho();
function bucarQtdCarrinho() {
    const url = "http://localhost/Trufarly.com.br/bucar_qtd_carrinho";
    const qtd_carrinho = document.getElementById("qtd_carrinho");
    
    fetch(url).then((response) => {
            return response.json();
        })
        .then((qtd) => {
            let qtd_response;

            if(qtd >= 99){
                qtd_response = document.createTextNode("+99");
            }else if (qtd > 0 && qtd <= 9){
                qtd_response = document.createTextNode("0"+qtd);
            }else{
                qtd_response = document.createTextNode(qtd);
            }
            
            content = qtd_carrinho.lastChild;
            qtd_carrinho.removeChild(content);
            qtd_carrinho.appendChild(qtd_response);
        })
        .catch((error) => {
            console.log(error);
            }
        );
}