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

    if(empty($product_name)|| empty($mrp) ||empty($price)|| empty($desc) || empty($img)){
            set_message(display_error("please fill in the blanks "));
    }else{
        if(in_array($img_correct_ext,$allow))
        {
            if($size<1000000)
            {
                if($cat_id == 0)
                {
                    set_message(display_error(" please select a category"));
                }
                else
                {
                    $query = " SELECT * FROM products WHERE product_name='$product_name'";
                    $result = mysqli_query($con, $query);

                    if(mysqli_fetch_assoc($result))
                    {
                        set_message(display_error(" Product Name already Given"));
                    }
                    else
                    {
                        $query = "INSERT INTO products(category_name, product_name, MRP, price, qty, img, description, status) VALUES ('$cat_id', '$product_name', '$mrp', '$price', '$qty', '$img', '$desc', '1')";
                        $result = mysqli_query($con, $query);

                if($result){
                    set_message(display_success(" product added"));
                    move_uploaded_file($tmp_name,$path);
                    }
                }

                }
            } else
            {
                set_message(display_error(" image size too large"));
            }
    
        }
        else
        {
            set_message(display_error(" you cant store those format"));
        }
    

        }

    }
    }



//view products

function view_product(){
    global $con;
    $query ="SELECT products.p_id, categories.cat_name, products.product_name, products.MRP, products.price, products.qty, products.img, products.description, products.status from products INNER JOIN categories on products.category_name = categories.id";
    return $result = mysqli_query($con,$query);
}

//product status active or deactive

function active_status_product()
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

        $query = "UPDATE products SET status='$status' WHERE p_id='$id'";
        $result = mysqli_query($con,$query);

        if($result){
            header("location:manage_product.php");
            set_message(display_success("product has been updated"));
        }

    }

}


//edit product 
function edit_record(){
    global $con;
    if(isset($_GET['id'])){
        $edit_id =safe_value($con,$_GET['id']);
        $sql="select * from products where p_id='$edit_id'";
        $res= mysqli_query($con,$sql);
        return $res;
    }
}


//update record
// function update_record(){
//     global $con;
//     if($_SERVER['REQUEST_METHOD'] =='POST'&& isset($_POST['btn_edit_product'])){
//         $cat_id= safe_value($con,$_POST['cat_id']);
//         $product_id =safe_value($con,$_POST['product_id']);
//         $product_name = safe_value($con,$_POST['product_name']);
//         $mrp = safe_value($con,$_POST['mrp']);
//         $price = safe_value($con,$_POST['price']);
//         $qty =safe_value($con,$_POST['qty']);
//         $desc = safe_value($con,$_POST['desc']);
        

//         $img =$_FILES['img']['name'];
//         $type= $_FILES['img']['type'];
//         $tmp_name= $_FILES['img']['tmp_name'];
//         $size =$_FILES['img']['size'];
        
//         $img_ext =explode('.',$img);
//         $img_correct_ext = strtolower(end($img_ext));
//         $allow = array('jpg','jpeg','png');
//         $path = "img/".$img;

//         if(empty($product_name)|| empty($mrp) ||empty($price)|| empty($aty) || empty($desc)){
//             set_message(display_error("Fill up the remaning form "));
//     }
//     else
//     {
        
//         if(empty($img))
//         {
//             if($cat_id == 0)
//                 {
//                     set_message(display_error(" select a category"));
//                 }
//                 else
//                 {
//                 $query = "UPDATE products SET category_name='$cat_id', product_name='$product_name',MRP='$mrp',price='$price',qty='$qty',description='$desc' where  p_id='$product_id'  ";
//                 $result = mysqli_query($con,$query);

//                 if($result)
//                 {
                    
//                     set_message(display_success("product details has been updated"));
//                     move_uploaded_file($tmp_name,$path);
                
//                 }

//                 }
//         }
//         else {

//             if($size<5000000)
//             {
//                 if(in_array($img_correct_ext,$allow))
//             {
//                 $query = "UPDATE products SET category_name='$cat_id', product_name='$product_name',MRP='$mrp',price='$price',qty='$qty',img='$img',description='$desc' where  p_id='$product_id'  ";
//                 $result = mysqli_query($con,$query);

//                 if($result)
//                 {
//                     set_message(display_success("product details has been updated"));
//                     move_uploaded_file($tmp_name,$path);
//                 }
//             }
//             else
//             {
//                 set_message(display_error(" you cant store those format"));
//             }
//             } 
//             else
//             {
//                 set_message(display_error(" image size too large"));
//             }

            
//         }
//         }

//     }
// }

function update_record()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pro_btn_edit'])) {

        $cat_id = safe_value($con, $_POST['cat_id']);
        $product_id = safe_value($con, $_POST['product_id']);
        $product_name = safe_value($con, $_POST['product_name']);
        $mrp = safe_value($con, $_POST['mrp']);
        $price = safe_value($con, $_POST['price']);
        $qty = safe_value($con, $_POST['qty']);
        $desc = safe_value($con, $_POST['desc']);

        $img = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $size = $_FILES['img']['size'];

        $img_Ext = explode('.', $img);
        $img_correct_ext = strtolower(end($img_Ext));
        $allow = array('jpg', 'png', 'jpeg');
        $path = "img/" . $img;



        if (empty($product_name) || empty($mrp) || empty($price) || empty($qty) || empty($desc)) {
            set_message(display_error("Fill up the remaning form"));
        } else {
            if (empty($img)) {
                if ($cat_id == 0) {
                    set_message(display_error("select a category"));
                } else {
                    // $query = "update products set category_name='$cat_id', product_name='$product_name', MRP='$mrp', price='$price', qty='$qty', description='$desc' where p_id='$product_id'";
                    $query = "update products set category_name='$cat_id', product_name='$product_name', MRP='$mrp', price='$price', qty='$qty', img='$img', description='$desc' where p_id='$product_id'";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        set_message(display_success("product details has been updated ! "));
                        move_uploaded_file($tmp_name, $path);
                    }
                }
            } else {

                if ($size < 500000) {
                    if (in_array($img_correct_ext, $allow)) {
                        $query = "update products set category_name='$cat_id', product_name='$product_name', MRP='$mrp', price='$price', qty='$qty', img='$img', description='$desc' where p_id='$product_id'";
                        // $query = "update products set category_name ='$cat_id', product_name='$product_name', MRP='$mrp', price='$price', qty='$qty', img='$img', description='$desc' where p_id='$product_id'";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            set_message(display_success("product details has been updated ! "));
                            move_uploaded_file($tmp_name, $path);
                        }
                    } else {
                        set_message(display_error("you cant store those format"));
                    }
                } else {
                    set_message(display_error("image size too large"));
                }
            }
        }
    }
}



//////////contact us page

function contact()
{
    global $con;
    $sql = "SELECT * FROM contact ";
    return $query = mysqli_query($con, $sql);
}


?>