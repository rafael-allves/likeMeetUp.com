function handleClickOutside(element){
    const acceptedClick = document.getElementById('dropdownAvatar');
    if(!acceptedClick.contains(element.target)){

        const buttonDropDown = document.getElementById('dropdownUserAvatarButton');
        buttonDropDown.setAttribute('aria-expanded', 'false');
        buttonDropDown.nextElementSibling.style.display = "none";

        const html = document;
        html.removeEventListener('click', handleClickOutside);
        html.removeEventListener('touchstart', handleClickOutside, {passive:false});
    }
}

export default function dropMenu(evt){
    evt.preventDefault();
    evt.stopPropagation();
    const expanded = evt.currentTarget.getAttribute('aria-expanded');

    evt.currentTarget.nextElementSibling.style.display = expanded == 'true' ? 'none': 'block';

    evt.currentTarget.setAttribute('aria-expanded', expanded == 'true' ? 'false' : 'true');

    if(expanded == 'false'){
        const html = document;
        html.addEventListener('click', handleClickOutside);
        html.addEventListener('touchstart', handleClickOutside, {passive:false});
    }
}