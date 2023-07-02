import emailValidation from "./campvalidations/emailValidation.js";
import toggleError from './campvalidations/toggleError.js'

function checkCamp(evt, controler){
    const camp = evt.target;
    const id = camp.getAttribute('id');
    const icon = camp.parentNode.nextElementSibling;

    icon.classList.remove('checkedCamp');
    icon.innerText = '';

    const typeData = controler.type.login ? controler.login : controler.register;
    const controlData = id.split('login')[0] === '' ? id.split('login')[1] :  id.split('register')[1]

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

    icon.classList.add('checkedCamp');
    icon.innerText = 'check_circle';

    camp.removeEventListener('focusout', (evt) =>{
        checkCamp(evt, controler)
    })
}

export default function inputListener(evt, controler){
    const transformValue = evt.target.value !== "" ? "0" : "5px";
    const fontSizeValue = evt.target.value !== "" ? "1rem" : "1.3rem";

    evt.target.nextElementSibling.style.top = transformValue;
    evt.target.nextElementSibling.style.fontSize = fontSizeValue;

    evt.target.addEventListener('focusout', (evt) => {
        checkCamp(evt, controler)
    });//Validando campos
}
