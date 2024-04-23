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
            
                // set_message(display_success("category has been save in the database "));
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

//------------------------products page-------------------------------

function save_products(){
    global $con;
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['pro_btn'])){
        $cat_id= safe_value($con,$_POST['cat_id']);
        $product_name = safe_value($con,$_POST['product_name']);
        $mrp = safe_value($con,$_POST['mrp']);
        $price = safe_value($con,$_POST['price']);
        $qty =safe_value($con,$_POST['qty']);
        $desc = safe_value($con,$_POST['desc']);
        

        $img =$_FILES['img']['name'];
        $type= $_FILES['img']['type'];
        $tmp_name= $_FILES['img']['tmp_name'];
        $size =$_FILES['img']['size'];
        
        $img_ext =explode('.',$img);
        $img_correct_ext = strtolower(end($img_ext));
        $allow = array('jpg','jpeg','png');
        $path = "img/".$img;
        

        // if(in_array($img_correct_ext,$allow)&& $size < 100000)
        // {
        
        //         // $query ="INSERT INTO products (category_name, product_name, MRP, price, qty, img, description, status) VALUES ('$cat_id' , '$product_name', '$mrp', '$price', '$qty', '$img', '$desc','1')";
        //         // $result =mysqli_query($con,$query);
        //         $query = "INSERT INTO products(category_name, product_name, MRP, price, qty, img, description, status) VALUES ('$cat_id', '$product_name', '$mrp', '$price', '$qty', '$img', '$desc', '1')";
        //         $result = mysqli_query($con, $query);

        //         if($result){
        //                 move_uploaded_file($tmp_name,$path);
        //                 set_message(display_success("product has been saved in the database "));
        //                 header("location: manage_product.php"); // Chuyển hướng người dùng đến trang quản lý danh mục sản phẩm sau khi thêm sản phẩm thành công
        //                 exit();
        //         }
        //         else{
        //             set_message(display_error("Failed to add product to the database"));
        //         }
        //     }
        // }else{
        //     set_message(display_error("you can't store this file :("));
        // }


        if (in_array($img_correct_ext, $allow) && $size < 100000) {
            // Nếu hình ảnh hợp lệ, thực hiện thêm sản phẩm vào cơ sở dữ liệu
            $query = "INSERT INTO products(category_name, product_name, MRP, price, qty, img, description, status) VALUES ('$cat_id', '$product_name', '$mrp', '$price', '$qty', '$img', '$desc', '1')";
            $result = mysqli_query($con, $query);
    
            if ($result) {
            
                move_uploaded_file($tmp_name, $path);
                set_message(display_success("Product has been saved in the database"));
                header("location: manage_category.php"); 
                exit(); 
            } else {
                set_message(display_error("Failed to add product to the database"));
            }
        } else {
            set_message(display_error("You can't store this file :("));
        }
    }
}   


?>
