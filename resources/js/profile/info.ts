$(()=>{
     //detect showPassword checkbox changes
     $('#showPassword').on('change',function(){
        //console.log("ShowPassword change");
        var checked = $(this).is(":checked");
        if(checked){
            $('#oldpwd').attr('type','text');
            $('#newpwd').attr('type','text');
            $('#confnewpwd').attr('type','text');
        }
        else{
            $('#oldpwd').attr('type','password');
            $('#newpwd').attr('type','password');
            $('#confnewpwd').attr('type','password');
        }
    });
});