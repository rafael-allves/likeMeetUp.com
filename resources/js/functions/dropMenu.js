function handleClickOutside(element, buttonDropDown){
    const acceptedClick = document.getElementById('menu');
    if(!acceptedClick.contains(element.target)){
        buttonDropDown.setAttribute('aria-expanded', 'false');
        buttonDropDown.nextElementSibling.style.display = "none";
        buttonDropDown.classList.remove('active');

        const html = document;
        html.removeEventListener('click', handleClickOutside);
        html.removeEventListener('touchstart', handleClickOutside, {passive:false});
    }
}

export default function dropMenu(evt){
    evt.preventDefault();
    evt.stopPropagation();
    const expanded = evt.currentTarget.getAttribute('aria-expanded');

    evt.currentTarget.nextElementSibling.style.visibility = expanded == 'true' ? 'hidden': 'visible';

    evt.currentTarget.setAttribute('aria-expanded', expanded == 'true' ? 'false' : 'true');

    evt.target.classList.remove('active')

    if(expanded == 'false'){
        const html = document;
        
        evt.target.classList.add('active')

        const buttonDropDown = evt.currentTarget;

        html.addEventListener('click', (evt) => {
            handleClickOutside(evt, buttonDropDown)
        });
        html.addEventListener('touchstart', (evt)=>{
            handleClickOutside(evt, buttonDropDown)
        }, {passive:false});
    }
}