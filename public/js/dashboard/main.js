const buttonsDashboard = Array.from(document.querySelectorAll('.main__container__form__section_authtype > button'));

buttonsDashboard.forEach((button) => {
    button.addEventListener('click', setDashboardType);
})
