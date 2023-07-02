import addError from './campvalidations/toggleError.js'
export default function register (event, controler){
    event.preventDefault();
    const username = document.getElementById('registerusername');
    const email = document.getElementById('registeremail');
    const password = document.getElementById('registerpassword');
    const confirmpassword = document.getElementById('confirmpassword');

    if(!controler.username)addError(username, "Nome inválido");

    if(!controler.email)addError(email, "Email inválido");

    if(!controler.password)addError(password, "Senha inválida");

    if(!controler.confirmpassword)addError(confirmpassword, "Esse Campo deve ser igual ao anterior!");

    if(!controler.username || !controler.email || !controler.password || !controler.confirmpassword)return; //Se algum campo não estiver validado ele simplesmente não faz a requisição


    const data = {
        username: username.value,
        email: email.value,
        password: password.value,
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
            addError(document.getElementById(response.error[0]), response.error[1]);
            //Dê uma olhada na user controler e veja que eu estou retornando o ID do campo incorreto e a mensagem por meio de um array!
            //Por isso escrevi dessa forma
        }
    })
}
