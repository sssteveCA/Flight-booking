
$(function(){
    //detect showPassword checkbox changes
    $('#showPassword').on('change',function(){
        var checked = $(this).is(":checked");
        if(checked){
            $('#password').attr('type','text');
        }
        else{
            $('#password').attr('type','password');
        }
    });
});
