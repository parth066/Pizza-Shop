function adminLogin() {
    var admin_name = $("#admin_username").val();
    var admin_password = $("#admin_password").val();
    $.ajax({
        url:"admin/addaAdmin.php",
        method:'POST',
        data:{
            admin_name:admin_name,
            admin_password:admin_password
        },
        success:function(data){
            if(data == 0) {
                $("#error-txt").html('<div>Invalid Email ID or password !</div>');
            }
            else if(data == 0) {
                $("#error-txt").html('<div>Success!</div>');
            }
        }
    })
    

}