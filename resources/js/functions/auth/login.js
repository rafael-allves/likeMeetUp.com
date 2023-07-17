import addError from './campvalidations/toggleError.js'
import axios from 'axios';

export default function login (controler, email, password){
    if(!controler.email || !controler.password)return;

    const data = {
        email: email,
        password: password,
    }
    
    axios.post('/auth/login', data)
    .then(response => {
        if(response.data.sucesso)location.href = response.data.sucesso  //MEU BACKEND VAI ME ENTREGAR UMA URL PARA REDIRECIONAR O USUÁRIO APÓS O REGISTRO CONCLUIDO CORRETAMENTE
        
    })
    .catch(err => {
        if(err.response.status === 400){
            addError(document.getElementById(err.response.data.campid), err.response.data.message);
            //Dê uma olhada na user controler e veja que eu estou retornando o ID do campo incorreto e a mensagem por meio de um array!
            //Por isso escrevi dessa forma
            const wrongData = err.response.data.campid.split('login')[1];
            controler[wrongData] = !controler[wrongData]
            //Isso previne que o usuário envie mais requests incorretas consecutivamente ele vai ter que mudar o campo errado primeiro para revalidá-lo
            return;
        }else{ 
            addError(document.getElementById('loginemail'), "Erro! Tente novamente mais tarde")
        }
    });
}
