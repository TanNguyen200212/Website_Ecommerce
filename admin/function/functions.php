<?php

//set session message

function set_message($msg){

    if (!empty($msg)){
        $_SESSION['MESSAGE']=$msg;
    }
    else {
        $msg="";
    }
}

//display message
function display_message(){
    if(isset($_SESSION['MESSAGE']))
    {
        echo $_SESSION['MESSAGE'];
        unset($_SESSION['MESSAGE']);
    }
}
//errors message
function display_error($error){
    return  "<span class ='alert alert_danger text_center'>$error</span>";
}
//succes message
function display_success($success){
    return "<span class ='alert alert-success text-center'> $success</span>";
}


//get safe value
function safe_value($con,$value){
    return mysqli_real_escape_string($con,$value);
}

function login_system()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_signin']))
    {
        global $con;
        $username = safe_value($con,$_POST['username']);
        $password = safe_value($con,$_POST['password']);
        
        if(empty($username) || empty($password))
        {
            set_message(display_error("Please fill the forms"));
        }
        else
            {
                 //query
                $query = "SELECT * FROM users WHERE username='$username' AND password='$password' OR email='$username' AND password='$password'";
                $result = mysqli_query($con,$query);

                if(mysqli_fetch_assoc($result))
                {              
                $_SESSION['ADMIN']=$username;
                    header("location: ./dashboard.php");
            }
                else
                {
                    set_message(display_error("you have entered a wrong password/username"));
                }
        }
    }
}

//add category function
function add_category()
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cat_btn']))
    {
        global $con;
        $category = safe_value($con,$_POST['category']);
    
        if(empty ($category))
        {
        
            set_message(display_error("please enter Category Name"));
        }
        else
        {
           // see if thers existing data on the database
            $sql = "SELECT * FROM categories WHERE cat_name = '$category' ";
            $check = mysqli_query($con, $sql);

            if(mysqli_fetch_assoc($check))
            {
                set_message(display_error("category already exists"));
            }
            else
            {
            $query = "INSERT INTO categories(cat_name ,status) values('$category','1')";
            $result = mysqli_query($con,$query);
            if($result)
            {
                set_message(display_success("a category has been added"));
                echo "<a href='manage_category.php'> View Category </a>";
            }
            }
        }

    }
}

//view category
function view_cat(){
    global $con;
    $sql ="select * from categories ";
    return mysqli_query($con,$sql);
}


//category status active or deactive

function active_status()
{
    global $con;
    if(isset($_GET['opr']) && $_GET['opr']!="")
    {
        $operation = safe_value($con,$_GET['opr']);
        $id = safe_value($con,$_GET['id']);

        if($operation=='active')
        {
            $status = 1;
        }else{
            $status = 0;
        }

        $query = "UPDATE categories SET status='$status' WHERE id='$id'";
        $result = mysqli_query($con,$query);

        if($result){
            header("location:manage_category.php");
            set_message(display_success("category has been updated"));
        }

    }

}




// update category

function update_cat()
{ 
    global $con;
    if(isset($_POST['cat_btn_up']))
    {
        $category_name = safe_value($con,$_POST['category_up']);
        $id = safe_value($con,$_POST['cat_id']);

            if(!empty($category_name))
            {
                $sql = "UPDATE categories SET cat_name= '$category_name' WHERE id='$id' ";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    header("location:manage_category.php");
                }

            }



        
    }

}

?>
