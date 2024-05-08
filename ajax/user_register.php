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
            $query ="INSERT INTO user_register(name,email,password) values ('$name','$email','$password')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "you have successfully Register :) <a href ='./login.php'>Login</a>";
            }
        }
    }
