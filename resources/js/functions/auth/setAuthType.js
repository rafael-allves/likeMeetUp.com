export default function setAuthType(event, controler){
    const register = document.querySelector('#register');
    const login = document.querySelector('#login');

    const registerDiv = document.getElementById('registerform');
    const loginDiv = document.getElementById('loginform');

    const typeSelected = document.querySelector('.authSelected');

    if(event.target == register){
        registerDiv.style.display = "flex";
        loginDiv.style.display = 'none';

        typeSelected.style.left = '50%';
        typeSelected.textContent = "Register";

        controler.type.login = false;
        controler.type.register = true;
    }else{
        registerDiv.style.display = "none";
        loginDiv.style.display = 'flex';

        typeSelected.style.left = '0.5rem';
        typeSelected.textContent = "Login";

        controler.type.login = false;
        controler.type.register = true;
    }
}
