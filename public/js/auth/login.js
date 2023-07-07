import addError from './campvalidations/toggleError.js'
export default function login (event, controler){
    event.preventDefault();

    const email = document.getElementById('loginemail').value;
    const password = document.getElementById('loginpassword').value;

    if(!controler.email || !controler.password)return;

    const data = {
        email: email,
        password: password,
    }
    fetch('/auth/login',{
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
             //MEU BACKEND VAI ME ENTREGAR UMA URL PARA REDIRECIONAR O USUÁRIO APÓS O REGISTRO CONCLUIDO CORRETAMENTE
            location.href = response.sucesso
        }else{
            addError(document.getElementById(response.campid), response.message);
            //Dê uma olhada na user controler e veja que eu estou retornando o ID do campo incorreto e a mensagem por meio de um array!
            //Por isso escrevi dessa forma
            const wrongData = campid.split('login')[1];
            controler[wrongData];
            //Isso previne que o usuário envie mais requests incorretas consecutivamente ele vai ter que mudar o campo errado primeiro para revalidá-lo
        }
    })
}
