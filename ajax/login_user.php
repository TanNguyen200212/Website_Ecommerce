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
             
             $desh= $password===$row['password'];
            $status = $row['status'];
            if($desh==false){
                echo "invalid";
                echo "$email";
                // echo password_hash($password,PASSWORD_DEFAULT);
                echo $row['password'];
                echo "is equal or not: ". $desh;
            } 
            if($desh==true && $status==1){
                // echo "password matched";
                echo "valid";
                $_SESSION['EMAIL_USER_LOGIN']= $row['email'];
                $_SESSION['LOGGED_IN'] = true;
                header('Location: ../index.php');
                
            }
        }
        else{
            echo "Cannot fetch result";
        }
    }