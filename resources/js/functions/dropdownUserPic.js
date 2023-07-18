function handleClickOutside(element){
    const acceptedClick = document.querySelector('.dropdown-menu');
    if(!acceptedClick.contains(element.target)){


        buttonDropDown.setAttribute('aria-expanded', 'false');
        buttonDropDown.nextElementSibling.style.display = "none";

        html.removeEventListener('click', handleClickOutside);
        html.removeEventListener('touchstart', handleClickOutside, {passive:false});
    }
}

export default function dropMenu(evt){
    evt.preventDefault();
    evt.stopPropagation();
    const expanded = evt.currentTarget.getAttribute('aria-expanded');

    evt.currentTarget.nextElementSibling.style.display = expanded == 'true' ? 'none': 'block';

    evt.currentTarget.setAttribute('aria-expanded',
    expanded == 'false' ? 'true' : 'false');

    if(expanded == 'false'){
        html.addEventListener('click', handleClickOutside);
        html.addEventListener('touchstart', handleClickOutside, {passive:false});
    }
}


const buttonDropDown = document.getElementById('dropdownMenuButton') || false;
const html = document.documentElement;

if(buttonDropDown)buttonDropDown.addEventListener('click', dropMenu);
if(buttonDropDown)buttonDropDown.addEventListener('touchstart', dropMenu);
