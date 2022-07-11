$(function(){
    let elements = {
        showPasswordCheckbox:  $('#fb_reg_show_pwd'),
        password: $('#password'),
        'password-confirm': $('#password-confirm')
    };
    elements['showPasswordCheckbox'].on('change',function(){
        if($(this).is(':checked')){
            elements['password'].attr('type','text');
            elements['password-confirm'].attr('type','text');
        }
        else{
            elements['password'].attr('type','password');
            elements['password-confirm'].attr('type','password');
        }
    });
});