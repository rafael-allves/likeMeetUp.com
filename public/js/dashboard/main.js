const buttonsDashboard = Array.from(document.querySelectorAll('.main__container__form__section_authtype > button'));

buttonsDashboard.forEach((button) => {
    button.addEventListener('click', setDashboardType);
})

console.log(buttonsDashboard)

function setDashboardType(evt)
{
    const btnMeusEventos = document.getElementById("meusEventosBtn");
    const btnEventosParticipo = document.getElementById("eventosParticipoBtn");

    const meusEventos = document.getElementById("meusEventos");
    const eventosParticipo = document.getElementById("eventosParticipo");

    const typeSelected = document.querySelector('.authSelected');

    if(evt.target == btnEventosParticipo){
        eventosParticipo.style.display = "block";
        meusEventos.style.display = 'none';

        typeSelected.style.left = '50%';
        typeSelected.textContent = "Eventos que participo";
    }else{
        eventosParticipo.style.display = "none";
        meusEventos.style.display = 'block';

        typeSelected.style.left = '0.5rem';
        typeSelected.textContent = "Meus Eventos";
    }
}
