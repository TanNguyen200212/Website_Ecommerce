<?php 
require_once 'db.php';


//display categories 
function display_cat(){
    global $con;
    $query ="select * from categories where status =1";
    return $result =mysqli_query($con,$query);
}

//get_products

function get_products($cat_id=''){
    global $con;
    $query = "select * from products where status=1 order by p_id desc";
    
    if($cat_id != ''){
        $query = "select * from products where cat_name = $cat_id";
    }
    return $result = mysqli_query ($con,$query);
}

//display product
// function display_product($p_id){
//     global $con;
//     $query = "select * from products where p_id = $p_id";
//     return $result = mysqli_query($con,$query);
// }

?>