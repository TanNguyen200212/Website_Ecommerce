<?php 
require_once 'db.php';


//display categories 
function display_cat(){
    global $con;
    $query ="select * from categories where status =1";
    return $result =mysqli_query($con,$query);
}


?>