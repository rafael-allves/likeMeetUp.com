import axios from 'axios'
import addError from './campvalidations/toggleError.js'
export default function register (controler, name, email, password){
    if(!controler.username || !controler.email || !controler.password || !controler.confirmpassword)return; //Se algum campo não estiver validado ele simplesmente não faz a requisição

    const data = {
        name: name,
        email: email,
        password: password,
    }


    axios.post('/auth/register', data)
    .then((response) => {
        if(response.data.sucesso)location.href = response.data.sucesso; //MEU BACKEND VAI ME ENTREGAR UMA URL PARA REDIRECIONAR O USUÁRIO APÓS O REGISTRO CONCLUIDO CORRETAMENTEelse{
    })
    .catch((err) => {
        if(err.response.status === 400){
            addError(document.getElementById(err.response.data.campid), err.response.data.message);
            //Dê uma olhada na user controler e veja que eu estou retornando o ID do campo incorreto e a mensagem por meio de um array!
            //Por isso escrevi dessa forma
            const wrongData = campid.split('register')[1];
            controler[wrongData] = !controler[wrongData];
            //Isso previne que o usuário envie mais requests incorretas consecutivamente ele vai ter que mudar o campo errado primeiro para revalidá-lo
            
        }else{
            addError(document.getElementById('registeremail'), "Erro! Tente novamente mais tarde")
        }
    })
}