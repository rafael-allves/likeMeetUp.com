import { router } from '@inertiajs/vue3'
import addError from './campvalidations/toggleError.js'
export default function register (controler, name, email, password){
    if(!controler.username)addError(username, "Nome inválido");

    if(!controler.email)addError(email, "Email inválido");

    if(!controler.password)addError(password, "Senha inválida");

    if(!controler.confirmpassword)addError(confirmpassword, "Esse Campo deve ser igual ao anterior!");

    if(!controler.username || !controler.email || !controler.password || !controler.confirmpassword)return; //Se algum campo não estiver validado ele simplesmente não faz a requisição


    const data = {
        name: username.value,
        email: email.value,
        password: password.value,
    }

    fetch('/auth/register',{
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
          },
        body: JSON.stringify(data),
    })
    .then(data => data.json())
    .then((response) => {
        if(response.sucesso){
            location.href = response.sucesso; //MEU BACKEND VAI ME ENTREGAR UMA URL PARA REDIRECIONAR O USUÁRIO APÓS O REGISTRO CONCLUIDO CORRETAMENTE
        }else{
            addError(document.getElementById(response.campid), response.message);
            //Dê uma olhada na user controler e veja que eu estou retornando o ID do campo incorreto e a mensagem por meio de um array!
            //Por isso escrevi dessa forma
            const wrongData = campid.split('register')[1];
            controler[wrongData];
            //Isso previne que o usuário envie mais requests incorretas consecutivamente ele vai ter que mudar o campo errado primeiro para revalidá-lo
        }
    })
}
