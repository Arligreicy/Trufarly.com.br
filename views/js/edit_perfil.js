function mostrar(img){

    if(img.files  && img.files[0]){

      var reader = new FileReader();
      reader.onload = function(e){
        $('#img')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
      };
      reader.readAsDataURL(img.files[0]);
    }
}
getUrl();

function getUrl(){
  let url = window.location.search;
  url = url.replace(/\?/, "");
  url = url.split('=')
  
  const parametro = url[0];
  const value = url[1];

  if(parametro == "complete" && value == "true"){
    const action = "show";
    exibirModal(action);
  }
}

function removeParametro(){
  let url = window.location.href;
  url = url.split(/\?/);
  url = url[0];
  window.location.href = url;
  console.log(url)
}


function exibirModal(param) {
  let modal = window.document.getElementById("modal");
  modal.classList.add(param);
  modal.classList.add('d-block');
}

const closeButton = modal.querySelector('.btn-close');
closeButton.addEventListener('click', function() {
  modal.classList.remove('show');
  modal.setAttribute('aria-modal', 'false');
  modal.setAttribute('data-bs-backdrop', '');
  modal.setAttribute('data-bs-keyboard', '');
  modal.classList.remove('d-block');
  modal.classList.add('none');
  removeParametro();
});

const closeConinue = modal.querySelector('.btn-continue');
closeConinue.addEventListener('click', function() {
  modal.classList.remove('show');
  modal.setAttribute('aria-modal', 'false');
  modal.setAttribute('data-bs-backdrop', '');
  modal.setAttribute('data-bs-keyboard', '');
  modal.classList.remove('d-block');
  modal.classList.add('none');
  removeParametro();
});