<?php 
session_start();
require_once '../functions/db.php';
require_once '../functions/functions.php';   


    if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
        $email = safe_value($con,$_POST['email']);
        $password = safe_value($con,$_POST['password']);

        $query ="select * from user_register where email = '$email'";
        $result = mysqli_query($con,$query);

        if($row= mysqli_fetch_assoc($result))
        {
            //$desh= password_verify($password,$row['password']);
            $desh = $password === $row["password"];
            
            if($desh==false){
                echo "invalid";
                echo "$email";
                echo "$password";
                echo $row['password'];
                echo $desh;
            } 
            if($desh==true){
                // echo "password matched";
                echo "valid";
                $_SESSION['EMAIL_USER_LOGIN']= $row['email'];
                header('Location: ../index.php');
                $_SESSION['LOGGED_IN'] = true;
            }
        }
        else{
        
        }
    }