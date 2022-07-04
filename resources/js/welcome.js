
$(() => {
    let buttons = $('button.nav-link');
    buttons.on('click', (event) => {
        let clickbutton = event.currentTarget;
        let cb_dbt = clickbutton.getAttribute('data-bs-target');
        console.log(cb_dbt);
    });
});
