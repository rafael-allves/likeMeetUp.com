import setAuthType from "./setAuthType.js";
import inputListener from "./inputListener.js";
import toggleShowPass from "./toggleShowPass.js";
import register  from "./register.js";
import login from "./login.js";

const buttonsAuthType = Array.from(document.querySelectorAll('.main__container__form__section_authtype > button'));

const inputs = Array.from(document.querySelectorAll('input'));

buttonsAuthType.forEach((button) => {
    button.addEventListener('click', function(evt){
        setAuthType(evt, controler);
    });
});

inputs.forEach((input) => {
    input.addEventListener('input', (evt) => {
        inputListener(evt, controler)
    });
});

Array.from(document.querySelectorAll('.showpassbtn')).map((showPassBtn) => {
    showPassBtn.addEventListener('click', toggleShowPass);
    showPassBtn.addEventListener('touchstart', toggleShowPass);
})

document.getElementById('formRegister').addEventListener('click', (evt) => {
    register(evt, controler.register);
});

document.getElementById('formLogin').addEventListener('click', (evt) => {
    login(evt, controler.login);
});

window.addEventListener('load', ()=>{
    inputs.forEach((input) =>{
        input.value = "";
    })
})
