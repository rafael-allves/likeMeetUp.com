export default function addError(camp, messageError){
    const graphicalMessage = camp.parentNode.parentNode.nextElementSibling;
    const icon = camp.nextElementSibling.classList == "material-symbols-outlined" ? camp.nextElementSibling : undefined;

    graphicalMessage.innerText = messageError;

    if(icon)icon.classList.add('refusedCamp')
    if(icon)icon.innerText = "cancel";

    camp.addEventListener('focusin', function(){
        removeError(camp, graphicalMessage, icon);
    });
}

function removeError(camp, graphicalMessage, icon){
    graphicalMessage.innerText = "";

    if(icon)icon.classList.remove('refusedCamp');
    if(icon)icon.innerText = "";

    camp.removeEventListener('focusin', removeError);
}
