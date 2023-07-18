function handleClickOutside(element, buttonDropDown){
    const acceptedClick = document.getElementById('dropdownAvatar');
    if(!acceptedClick.contains(element.target)){
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

    evt.target.classList.remove('active')

    if(expanded == 'false'){
        const html = document;
        
        evt.target.classList.add('active')

        html.addEventListener('click', (evt) => {
            handleClickOutside(evt, evt.currentTarget)
        });
        html.addEventListener('touchstart', (evt)=>{
            handleClickOutside(evt, evt.currentTarget)
        }, {passive:false});
    }
}