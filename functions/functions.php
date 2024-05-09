<?php 
require_once 'db.php';


//display categories 
function display_cat(){
    global $con;
    $query ="select * from categories where status =1";
    return $result =mysqli_query($con,$query);
}



//get safe value
function safe_value($con,$value){
    return mysqli_real_escape_string($con,$value);
}


function get_products($cat_id='', $product_id='')  //,$vmin=0,$vmax=999
{
    global $con;
    $query = "select * from products where status=1 order by p_id desc ";//and (price >= $vmin and price <= $vmax) order by p_id desc

    if($cat_id!='')
    {
        $query = "select * from products where category_name='$cat_id ')";//and (price >= $vmin and price <= $vmax 
    }
    if($product_id!='')
    {
        $query = "select * from products where p_id='$product_id' )"; //and (price >= $vmin and price <= $vmax
    }
    // return [];
    return $result = mysqli_query($con,$query);

    
}


//display cat links 
function display_cat_links($category_id="")
{
    global $con;
    $query = "select products.p_id, products.category_name, categories.cat_name FROM products INNER JOIN categories on products.category_name=categories.id where products.category_name='$category_id'";
    return $result = mysqli_query($con,$query);
}


//display product
// function display_product($p_id){
//     global $con;
//     $query = "select * from products where p_id = $p_id";
//     return $result = mysqli_query($con,$query);
// }

//add to cart fun

function add_cart($pid,$qty){
    $_SESSION['CART'][$pid]['QTY']=$qty;
}

//total cart values
function total_cart_value(){
    if(isset($_SESSION['CART']))
    {
        return count($_SESSION['CART']);    
    }else{
        return 0;
    }
}
