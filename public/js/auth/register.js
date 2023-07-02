import addError from './campvalidations/toggleError.js'
export default function register (event, controler){
    event.preventDefault();

    if(!controler.username || !controler.email || !controler.password || !controler.confirmpassword)return; //Se algum campo não estiver validado ele simplesmente não faz a requisição



    if(!controler.confirmpassword){
        addError(confirmpassword, "Esse Campo deve ser igual ao anterior!");
        return;
    }







    const username = document.getElementById('registerusername').value;
    const email = document.getElementById('registeremail').value;
    const password = document.getElementById('registerpassword').value;

    const data = {
        username: username,
        email: email,
        password: password,
    }

    fetch('/auth/register',{
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
          },
        body: JSON.stringify(data),
    })
    .then(data => data.json())
    .then((response) => {
        if(response.sucesso){
            location.href = response.sucesso; //MEU BACKEND VAI ME ENTREGAR UMA URL PARA REDIRECIONAR O USUÁRIO APÓS O REGISTRO CONCLUIDO CORRETAMENTE
        }else{

        }
    })
}
