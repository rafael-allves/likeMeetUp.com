import emailValidation from "./campvalidations/emailValidation.js";
import toggleError from './campvalidations/toggleError.js'

function checkCamp(evt, controler){
    const camp = evt.target;
    const validityState = camp.validity;
    const id = camp.getAttribute('id');
    const icon = camp.nextElementSibling.classList == "material-symbols-outlined" ? camp.nextElementSibling : undefined;


    if(icon)icon.classList.remove('checkedCamp');
    if(icon)icon.innerText = '';

    const typeData = controler.type.login ? controler.login : controler.register;
    const controlData = id === 'confirmpassword' ? 'confirmpassword' :
     id.split('login')[0] === '' ? id.split('login')[1] :  id.split('register')[1];//Se o id não for confirmpassword ele vai checar qual campo é

    if(validityState.tooShort){
        toggleError(camp, `Esse campo deve ter no mínimo ${camp.getAttribute('minlength')} caracteres`)
    }

    if(id == "loginemail" || id == "registeremail"){
        const error = emailValidation(camp.value);
        if(error){
            toggleError(camp, error);
            return;
        }
    }

    if(id == 'confirmpassword'){
        const password = document.getElementById('registerpassword').value;
        if(camp.value != password){
            toggleError(camp, "Esse campo deve ser igual ao anterior!");
            return;
        }
    }



    //Se der tudo certo ele vai falar que o campo está validado

    typeData[controlData] = true;

    if(icon)icon.classList.add('checkedCamp');
    if(icon)icon.innerText = 'check_circle';

    camp.removeEventListener('focusout', (evt) =>{
        checkCamp(evt, controler)
    })
}

export default function inputListener(evt, controler){
    const transformValue = evt.target.value !== "" ? "-3px" : "0";
    const fontSizeValue = evt.target.value !== "" ? "0.8rem" : "1.2rem";

    evt.target.previousElementSibling.style.top = transformValue;
    evt.target.previousElementSibling.style.fontSize = fontSizeValue;

    evt.target.addEventListener('focusout', (evt) => {
        checkCamp(evt, controler)
    });//Validando campos
}
