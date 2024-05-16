
$(document).ready(function(){
    save_record();
    save_user_record();
    login_user_record();
    add_cart();
})

// save  record fun
function save_record(){
    $(document).on('click','#btn_cnt',function(){
        var name=$('#name').val();
        var email= $('#email').val();
        var subject= $('#subject').val();
        var msg= $('#msg').val();
            if(name =="" || email ==""  || subject=="" || msg=="") {
                $('error_msg').html("Please fill in the blanks");
                } else{
                    $.ajax(
                        {
                            url:'ajax/cnt.php',
                            method:'post',
                            data:{Name:name,Email:email,Subject:subject,Msg:msg},
                            success:function(data){
                                $('success_msg').html(data);
                                $('form').trigger('reset'); 
                                $('#error_msg').html('');                      
                            }
                        })  
                }
    })
}
// save user record fun
function save_user_record(){
    $(document).on('click','#btn_register',function(){
    
        var name=$('#name').val();
        var email= $('#email').val();
        var password= $('#password').val();
        var cpassword= $('#cpassword').val();
            if(name =="" || email ==""  || password=="" || cpassword=="") {
                $('#error').html("Please fill in the blanks");
                }
                
                if(password!=cpassword){
                    $('#error').html("Password not matched");
                }
                    else{
                        $.ajax(
                            {
                                url:'ajax/user_register.php',
                                method:'post',
                                data:{Name:name,Email:email,Password:password},
                                success:function(data){
                                    $('#success').html(data);
                                    $('form').trigger('reset'); 
                                    $('#error').html('');                      
                                }
                            })  
                    }
    })
}


// login user record fun
function login_user_record(){
    $(document).on('click','#btn_login',function(){
        var email= $('#email').val();
        var password= $('#password').val();


            if( email ==""  || password ==""  ) {
                $('#error').html("Please fill in the blanks");
                }
                    else{
                        $.ajax(
                            {
                                url:'ajax/login_user.php',
                                method:'post',
                                data:{Email:email,Password:password},
                                success:function(data)
                                {

                                    if(data == 'valid'){
                                        $('form').trigger('reset'); 
                                        $('#error').html(''); 
                                        window.location.href='index.php';   
                                    }
                                    if(data == 'invalid'){
                                        $('#error').html('please enter correct password');
                                    }
                                                    
                                }
                            
                            })  
                    }
    })
}

function add_cart(){
    $(document).on('click','.site-btn',function(){
    var qty = $('#qty').val();
    var pid =$('#p_id').val();
    var pname =$('#p_name').val();
    var price =$('#price').val();

    console.log({Qty: qty, p_id: pid, p_name: pname,price:price, type: 'add'});
    $.ajax(     
        {
            url:'ajax/manage_cart.php',
            method:'post',
            data:{Qty:qty,p_id:pid,p_name:pname,price:price,type:'add'},
            success:function(data){
            {
                $('#cart_counter').html(data);
            }
        }

    })
})
}