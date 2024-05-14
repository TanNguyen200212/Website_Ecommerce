<?php 
require_once '../functions/db.php';
require_once '../functions/functions.php';   


    if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
        $name = safe_value($con,$_POST['Name']);
        $email = safe_value($con,$_POST['Email']);
        $password = safe_value($con,$_POST['Password']);

        $query ="select * from user_register where email ='$email'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) ){
            echo "Email already exist";
        }
        else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
<<<<<<< HEAD
            $query ="INSERT INTO user_register(name,email,password) values ('$name','$email','$hash')";
            $result = mysqli_query($con,$query);
            if($result){
                //echo "you have successfully Register :) <a href ='./login.php'>Login</a>";
                
=======
        
            $query ="INSERT INTO user_register(name,email,password) values ('$name','$email','$hash')";
            $result = mysqli_query($con,$query);
            if($result){
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
    
                        // Chuyển hướng đến trang "myprofile"
                        header("Location: myprofile.php");
                        exit(); // Đảm bảo không có mã HTML hoặc dữ liệu nào được gửi đi sau header()
                    } else {
                        echo "Failed to register user.";
                    }
>>>>>>> 8061c79ffd651c8bb09d11623ba5e69cba4c3cf2
            }
            header('Location: ../login.php');
        }
<<<<<<< HEAD
    }
=======

>>>>>>> 8061c79ffd651c8bb09d11623ba5e69cba4c3cf2
