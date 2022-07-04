
$(()=>{
    let buttons = $('button.nav-link');
    buttons.on('click',(event)=>{
         let clickbutton = event.currentTarget;
         console.log(clickbutton);
         let cb_dbt = clickbutton.getAttribute('data-bs-target');
         console.log(cb_dbt);
         $(''+cb_dbt).css('display','block');
         $('div[role=tabpanel]:not('+cb_dbt+')').css('display','none');

    });
});