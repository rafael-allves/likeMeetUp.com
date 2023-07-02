export default function addError(camp, messageError){
    const graphicalMessage = camp.parentNode.parentNode.nextElementSibling;
    const icon =  camp.parentNode.nextElementSibling;

    graphicalMessage.innerText = messageError;

    icon.classList.add('refusedCamp')
    icon.innerText = "cancel";

    camp.addEventListener('focusin', function(){
        removeError(camp, graphicalMessage, icon);
    });
}

function removeError(camp, graphicalMessage, icon){
    graphicalMessage.innerText = "";

    icon.classList.remove('refusedCamp');
    icon.innerText = "";

    camp.removeEventListener('focusin', removeError);
}
